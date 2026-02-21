<?php

namespace App\Http\Controllers;

use App\Http\Requests\RequestSoldier;
use App\Http\Requests\UpdateSoldierRequest;
use App\Models\Authority;
use App\Models\Batch;
use App\Models\Job;
 use App\Models\Leave;
use App\Models\Regiment;
use App\Models\Soldier;
use Cache;
 use Illuminate\Http\RedirectResponse;
 use Illuminate\Http\Request;
use Intervention\Image\Drivers\Gd\Driver;
 use Intervention\Image\ImageManager;
 use Illuminate\Support\Facades\Storage;





class SoldiersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
$soldiers = Soldier::with(['authority', 'regiment', 'batch', 'job'])->get();

    // إرجاع العرض مع الجنود والفرق
    // dd($soldiers);
    return view('soldiers-data.index', compact('soldiers'));
    }
// soldiers.statueChang
    // public function updateStatus(Request $request, Soldier $soldier)
    // {
    //     $request->validate([
    //         'status' => 'required|in:working,leave',
    //     ]);
    
    //     $soldier->update([
    //         'status' => $request->status,
    //     ]);
    
    //     return redirect()
    //         ->back()
    //         ->with('success', 'تم تحديث حالة الجندي بنجاح');
    // }
    // التحقق من الـ checkbox الذي يطلب عرض الجنود في إجازة فقط
        // if ($request->has('status') && $request->status == 'leave') {
        //     $query->where('status', 'leave'); // تصفية الجنود في إجازة
        // }

        // جلب الجنود بناءً على الفلاتر
        // $soldiers = $query->get();
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $regiments = Regiment::all();
        // $batches = Batch::all();
        // $authorities = Authority::all();
        // $jobs = Job::all(); // ✅ الصح
$regiments = Cache::rememberForever('regiments', fn() => Regiment::select('id','name')->get());
$batches = Cache::rememberForever('batches', fn() => Batch::select('id','name')->get());
$authorities = Cache::rememberForever('authorities', fn() => Authority::select('id','name')->get());
$jobs = Cache::rememberForever('jobs', fn() => Job::select('id','name')->get());      

                return view('soldiers.create', compact('regiments', 'batches', 'authorities','jobs'));
    }

    

    /**
     * Store a newly created resource in storage.
     */

public function statue(Request $request, $id)
{
    $soldier = Soldier::findOrFail($id);
    $soldier->status = $request->status;
    $soldier->save();

    return redirect()->back()->with('success', 'تم تحديث الحالة بنجاح');
}

     public function store(RequestSoldier $request)
     {
$data = $request->validated();

if ($request->hasFile('image')) {
    $image = $request->file('image');
    $filename = time() . '.' . $image->getClientOriginalExtension();

    $manager = new ImageManager(new Driver());
    $img = $manager->read($image)->resize(300, 300);

    $path = 'soldiers/' . $filename;
    Storage::disk('public')->put($path, (string) $img->encode());

    $data['image'] = $path;
}

// ✅ الآن authority_id موجود في $data
Soldier::create($data);

return redirect()->route('soldiers.create')->with('success', 'تم إضافة الجندي بنجاح');
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
    // جلب الجندي المطلوب فقط
    $soldier = Soldier::findOrFail($id);

    // الكاش للبيانات الثابتة فقط (مش soldiers)
    $regiments = Cache::rememberForever('regiments', fn() => Regiment::select('id','name')->get());
    $batches = Cache::rememberForever('batches', fn() => Batch::select('id','name')->get());
    $authorities = Cache::rememberForever('authorities', fn() => Authority::select('id','name')->get());
    $jobs = Cache::rememberForever('jobs', fn() => Job::select('id','name')->get());

    return view('soldiers.edit', compact('soldier', 'regiments', 'batches', 'authorities', 'jobs'));
}

// Meredith Burch =>William Ortiz
    /**
     * Mitchell Beahan->Phoebe Mcmillan
     * Update the specified resource in storage.
     *
     */
public function update(RequestSoldier $request, $id)
{
    $soldier = Soldier::findOrFail($id);
    $data = $request->validated();

    if ($request->hasFile('image')) {
        if ($soldier->image && Storage::disk('public')->exists($soldier->image)) {
            Storage::disk('public')->delete($soldier->image);
        }

        // أسرع طريقة تخزين
        $path = $request->file('image')->store('soldiers', 'public');
        $data['image'] = $path;

        // لو عايز تعمل resize في الخلفية
        // dispatch(new ResizeSoldierImageJob($path));
    }

    if ($request->has('status')) {
        $data['status'] = $request->status;
    }

    $soldier->update($data);

    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => 'تم تحديث بيانات المجند بنجاح',
            'soldier' => [
                'id' => $soldier->id,
                'name' => $soldier->name,
                'image' => asset('storage/' . $soldier->image),
            ],
        ]);
    }

    return redirect()->route('soldiers.index')->with('success', 'تم تحديث بيانات المجند بنجاح');
}
 
    
    
    // William Ortiz	=>
    




    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    $soldier = Soldier::findOrFail($id);

    // حذف نهائي مع سجلاته
    $soldier->forceDelete();
return redirect()
    ->route('regiments.show', $soldier->regiment_id)
    ->with('success', 'تم حذف الجندي نهائيًا مع جميع سجلاته المرتبطة.');
}


    public function deleteOnLeave(): RedirectResponse
    {
    Leave::query()->delete(); // ده هيحذف كل السجلات في جدول leaves

    // 2️⃣ تحديث حالة كل الجنود إلى 'work'
    Soldier::query()->update(['status' => 'working']);
           return redirect()->back()->with('success', 'تم حذف جميع الجنود في الإجازة.');
    }

}
