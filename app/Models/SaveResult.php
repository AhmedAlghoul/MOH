<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaveResult extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.REUSLT_CALCS';

    public function EmployeeRole()
    {
        return $this->belongsTo(EmployeeRole::class, 'jobtitle_id', 'jobtitle_code');
    }
    public function DepartmentName()
    {
        return $this->belongsTo(Managment::class, 'department_id', 'tb_managment_code');
    }
    public function CalculateType()
    {
        return $this->belongsTo(Constant::class, 'calc_type_id', 'const_id');
    }


}
