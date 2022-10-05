<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalDepartment extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'hospital_id',
        'department_id',
    ];
    //relation to get departments
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }

    // public function departments()
    // {
    //     return $this->hasMany(Department::class, 'department_id', 'id');
    // }

}
