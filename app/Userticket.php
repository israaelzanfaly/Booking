<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Userticket extends Model
{
    protected $table="userstickets";
    protected $fillable = ['name','email','phone','category_id'];
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
