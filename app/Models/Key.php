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
    public function roles()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }
}
