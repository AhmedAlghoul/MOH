<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeRole extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.jobtitle_vw';

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }



}
