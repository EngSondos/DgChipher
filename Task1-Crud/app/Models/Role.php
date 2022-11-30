<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    public function Permission (){
        return $this->hasMany(Permission::class);
    }
    public function admin(){
        return $this->hasMany(Admin::class);
    }
}
