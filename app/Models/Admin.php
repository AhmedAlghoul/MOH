<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Spatie\Permission\Traits\HasRoles;

class Admin extends Authenticatable
{
    use HasFactory , HasRoles;
    protected $guarded = [];
    protected $table = 'wisn_db.admins';
    public $timestamps = true;

    public function getAuthPassword()
    {
        return $this->user_password;
    }

}

