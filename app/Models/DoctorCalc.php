<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DoctorCalc extends Model
{
    use HasFactory;
    protected $fillable = [
      'hospital_id', 'department_id', 'monthly_hours', 'doctor_count', 'doctor_result', 'doctor_need'
    ];

    //relationship between doctorcalc and hospital and department
    public function hospital()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function employee()
    {
        return $this->hasMany(Employee::class);
    }
}
