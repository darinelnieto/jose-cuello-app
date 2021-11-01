<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    // relación order state
    public function states(){
        return $this->belongsToMany('App\Models\State')->withTimestamps();
    }

    public function users(){
        return $this->belongsToMany('App\Models\User')->withTimestamps();
    }
}
