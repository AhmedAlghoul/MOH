<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class circle extends Model
{
    use HasFactory;
    protected $table = 'wisn_db.circles';
    public function employee()
    {
        return $this->hasMany(Employee::class, 'circle_id', 'id');
    }
}
