<?php
namespace App\Models;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends  Authenticatable implements  MustVerifyEmail

{
    use HasApiTokens, HasFactory, Notifiable,HasRoles;

        protected $guarded = [];
        public function setPasswordAttribute($value){
            $this->attributes['password'] = bcrypt($value);
        }  
}
