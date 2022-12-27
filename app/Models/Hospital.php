<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hospital extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.hospitals';

    protected $fillable = [
        'name',
    ];
    //write relation to has many departments
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'hospital_departments','hospital_id', 'department_id');
    }
    //write relation to has many employees
    public function employees()
    {
        return $this->hasMany(Employee::class,'hospital_id', 'id');
    }


}
