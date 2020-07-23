<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = ['name','address','tel','img','user_id'];

    public function user(){ // nome contacts plurale
        return $this->belongsTo('App\User');
    }
}
