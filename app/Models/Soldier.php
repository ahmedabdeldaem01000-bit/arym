<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Soldier extends Model
{
    use HasFactory;
    protected $appends = [];
    use SoftDeletes; // لو عايز دعم for withTrashed

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'name',
        'police_number',
        'national_id',
        'date_of_conscription',
        'discharge_from_conscription',
        'governorate',
        'phone_number',
        'medical_condition',
        'job_id',
        'notes',
        'start_date',
        'regiment_id',
        'batch_id',
        'authority_id',
        'image',
        'status',
        'start_leave',
        'endLeave'
    ];
 
    protected $casts = [
        'status' => 'string', // أو 'enum' إذا كنت تريد أن يكون لديك تعامل أفضل مع الـ enum
    ];
    public function job()
    {
        return $this->belongsTo(Job::class)->withDefault([
            'name' => 'بدون وظيفة',
        ]);
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
    // العلاقة مع Regiment (Soldier ينتمي إلى Regiment)
    public function regiment()
    {
        return $this->belongsTo(Regiment::class);
    }

    // العلاقة مع Leave (Soldier يمكن أن يكون له العديد من Leaves)
    public function leaves()
    {
        return $this->hasMany(Leave::class);
    }
   public function authority()
    {
        return $this->belongsTo(Authority::class)->withDefault([
            'name' => 'غير محدد'
        ]);
    }
    protected static function booted()
    {
        static::deleting(function ($soldier) {
            // حذف كل السجلات المرتبطة في جدول leaves
            $soldier->leaves()->delete();
        });
    }
}
