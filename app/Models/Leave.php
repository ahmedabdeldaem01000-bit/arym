<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
   
    use HasFactory;

    protected $fillable = [
        'start_date',
        'end_date',
        'vacation_reason',
        'soldier_id',
        "endLeave",
                'days',
    ];

    // العلاقة مع Soldier (Leave ينتمي إلى Soldier واحد)
    public function soldier()
    {
        return $this->belongsTo(Soldier::class);
    }
    
}
