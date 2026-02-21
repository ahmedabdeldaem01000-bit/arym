<?php

namespace App\Http\Controllers;

use App\Models\Soldier;
use Illuminate\Http\Request;
use App\Http\Controllers\getNumberOfTablenames;
namespace App\Http\Controllers;

use App\Models\Soldier;
use Database\Seeders\SoldierSeeder;
use Illuminate\Http\Request;

class SoldiersDataController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $soldiers = Soldier::all(); // جلب الجنود من قاعدة البيانات
        
        // return view('soldiers-data.index', compact('soldiers')); // إظهار الجنود في View
        $soldiers = Soldier::with(['regiment', 'leaves']) // جلب بيانات السرية والإجازات
        ->where('status', 'working')
        ->get();
        return view('soldiers-data.index',compact('soldiers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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

    public function bulkLeave(Request $request)
    {
        try {
            // التحقق من البيانات
            $validated = $request->validate([
                'soldiers' => 'required|array|min:1',
                'soldiers.*' => 'integer|exists:soldiers,id',
                'start_leave' => 'required|date',
                'endLeave' => 'required|date|after:start_leave'
            ]);
    
            // تحديث البيانات
            $updated = Soldier::whereIn('id', $request->soldiers)
                ->update([
                    'status' => 'leave',
                    'start_leave' => $request->start_leave,
                    'endLeave' => $request->end_leave
                ]);
    
            return response()->json([
                'success' => true,
                'message' => 'تم تحديث '.$updated.' سجلات بنجاح'
            ]);
    
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'حدث خطأ: '.$e->getMessage()
            ], 500);
        }
    }
 }
