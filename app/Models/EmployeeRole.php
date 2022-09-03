<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    use HasFactory;
    protected $table = 'employee_roles';
    protected $fillable = [
        'role_name',
    ];

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

     

}
