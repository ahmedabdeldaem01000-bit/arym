<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Regiment extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // العلاقة مع Soldier (Regiment يحتوي على العديد من Soldiers)
    public function soldiers()
    {
        return $this->hasMany(Soldier::class);
    }
}
