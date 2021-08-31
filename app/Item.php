<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    public $table='items';
    public function moreitems(){
        return $this->hasMany('App\Moreitem');
    }
}
