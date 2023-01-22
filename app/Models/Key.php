<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.keys';

    // public function departments()
    // {
    //     return $this->belongsTo(Department::class, 'department_id', 'id');
    // }
    public function EmployeesRoles()
    {
        return $this->belongsTo(EmployeeRole::class, 'role_id', 'jobtitle_code');
    }
    public function Constants(){
        return $this->belongsTo(Constant::class, 'calc_type_id', 'const_id');
    }

}
