<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'name',
        'is_active'
    ];
    protected $table = 'departments';
    
    //write relation to has many hospitals
    // public function hospitals()
    // {
    //     return $this->belongsToMany(Hospital::class, 'hospitals_departments','department_id', 'hospital_id');
    // }
}
