<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Regiment;
use App\Models\Soldier;
use Illuminate\Http\Request;

class VactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $batches= Batch::all();
        return view('vacation_permits.index' ,compact('batches'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(string $batchId)
    {
        $soldiers = Soldier::whereHas('leaves') // بس الجنود اللي عندهم إجازات
        ->with('regiment', 'authority', 'batch', 'leaves')
        ->where('batch_id', $batchId)
        ->get();
        $batchname = Batch::with('soldiers')->findOrFail($batchId);
// جلب جميع الدفعات لتوفيرها في واجهة المستخدم
$regiments = Regiment::select('id', 'name')->get();
$batches = Batch::select('id', 'name')->get(); // جلب جميع الدفعات
// $batchname = Batch::find($batchId); // جلب جميع الدفعات


// إرجاع العرض مع الجنود والدفعات
return view('vacation_permits.show', compact('soldiers', 'regiments', 'batchname','batches','batchId'));   
        
 
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
