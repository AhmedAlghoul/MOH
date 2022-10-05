<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'is_active'
    ];
    protected $table = 'departments';
    
    public function hospital()
    {
        return $this->belongsToMany(Hospital::class, 'hospital_departments', 'department_id', 'hospital_id');
    }

    public function employee()
    {
        return $this->hasMany(Employee::class, 'department_id', 'id');
    }



    //write relation to has many hospitals
    // public function hospitals()
    // {
    //     return $this->belongsToMany(Hospital::class, 'hospital_departments','department_id', 'hospital_id');
    // }
}
