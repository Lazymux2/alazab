<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Moreitem extends Model
{
    //
    public $table='moreitems';

    //public $timestamps=false;
    protected $casts =[
        'imgs' => 'array',
    ];

    public function item(){
        return $this->belongsTo('App\Item');
        }

        public function orders(){
            return $this->hasMany('App\Order');
        }
        


}
