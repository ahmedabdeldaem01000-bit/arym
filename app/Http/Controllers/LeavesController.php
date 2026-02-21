<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Soldier;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;

class LeavesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Soldier::with('regiment');
        $levees = Leave::whereHas('soldier', function ($query) {
            $query->where('status', 'leave'); // البحث عن الجنود الذين في إجازة
        })
        ->with('soldier.regiment') // تحميل الجندي والسرية المرتبطة به
        ->get();
        
        // dd($levees);
    return view('leaves.index' ,compact('levees','query'));



    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }
    public function showLeavesForm()
    {
        // اختيار الجنود بناءً على معايير معينة
        $soldiers = Soldier::where('status', 'in-service')->get(); // اختيار الجنود اللي في الخدمة
    
        // إرجاع العرض مع قائمة الجنود
        return view('leaves.form', compact('soldiers'));
    }
    /**
     * Store a newly created resource in storage.
     */
 

     public function store(Request $request)
     {
         // تأكد من وصول الجنود
         if (!$request->has('soldiers') || !is_array($request->soldiers)) {
             return back()->withErrors(['soldiers' => 'لم يتم تحديد أي جندي.']);
         }
     
         foreach ($request->soldiers as $soldier_id) {
             // التأكد من عدم وجود الجندي في الإجازة بالفعل
             $alreadyOnLeave = Leave::where('soldier_id', $soldier_id)->exists();
     
             if ($alreadyOnLeave) {
                 continue;  // تجاهل إذا كان في إجازة بالفعل
             }
     
             // استرجاع الجندي من قاعدة البيانات
             $soldier = Soldier::find($soldier_id);
     
             if ($soldier) {
                 // تحديث حالة الجندي إلى "leave"
                 $soldier->status = 'leave';
                 $soldier->save();  // استخدم save بدلاً من update
                 \Log::info("تم تحديث الجندي رقم {$soldier_id} إلى leave");
     
                 // التحقق من التحديث
                 $soldier->refresh();
             }
     
             // إنشاء سجل جديد في جدول الإجازات مع نفس الحالة "leave"
             Leave::create([
                 'soldier_id' => $soldier_id,
                 'start_date' => $request->leave_start_date,
                 'end_date' => $request->leave_end_date,
                 'status' => 'leave'  // إضافة حالة "leave" في جدول الإجازات
             ]);
         }
     
         return redirect()->route('leaves.index')->with('success', 'تم إرسال الجنود إلى الإجازة.');
     }
     

    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
 
    
}
