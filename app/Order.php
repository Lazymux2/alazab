<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //


    public function moreitem(){
        return $this->belongsTo('App\Moreitem');
        }
        public function user(){

            return $this->belongsTo('App\User');
        }
}
