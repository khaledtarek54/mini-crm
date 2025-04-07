<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = ['name', 'address', 'phone', 'email', 'employee_id'];


    public function employee()
    {
        return $this->belongsTo(User::class, 'employee_id');
    }


    public function actions()
    {
        return $this->hasMany(Action::class);
    }
}
