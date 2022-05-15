<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    // protected $fillable = [
    //     'employee_name', 'hospital_id', 'role_id', 'department_id', 'job_number', 'date_of_hiring', 'mobile_number'
    // ];
    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function hospitals()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
    public function Roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
