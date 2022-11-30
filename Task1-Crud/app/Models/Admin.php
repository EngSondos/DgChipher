<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected  $fillable=['name','password','email','role_id'];
    use HasFactory;
    public function role(){
        return $this->belongsTo(Role::class);
    }
}
