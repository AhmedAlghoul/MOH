<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'job_number', 'employee_name', 'date_of_hiring', 'hospital_id', 'department_id', 'role_id', 'mobile_number'
    ];
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
