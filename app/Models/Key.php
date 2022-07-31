<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;

    public function departments()
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
    public function EmployeesRoles()
    {
        return $this->belongsTo(EmployeeRole::class, 'role_id', 'id');
    }
}
