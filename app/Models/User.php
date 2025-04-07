<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\RoleEnum;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    const ROLE_ADMIN = 'admin';
    const ROLE_EMPLOYEE = 'employee';

    public function isAdmin()
    {
        return $this->role === self::ROLE_ADMIN;
    }

    public function isEmployee()
    {
        return $this->role === self::ROLE_EMPLOYEE;
    }

    public function customers()
    {
        return $this->hasMany(Customer::class, 'employee_id');
    }

    public function actions()
    {
        return $this->hasMany(Action::class, 'employee_id');
    }
}
