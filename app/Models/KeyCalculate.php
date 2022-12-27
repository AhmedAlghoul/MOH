<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeyCalculate extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.key_calculates';
    public function hospitals()
    {
        return $this->belongsTo(Hospital::class, 'hospital_id', 'id');
    }
    public function departments()
    {
        return $this->belongsTo(department::class, 'department_id', 'id');
    }
    public function EmployeesRoles()
    {
        return $this->belongsTo(EmployeeRole::class, 'role_id', 'id');
    }
}
