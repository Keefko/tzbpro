<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    protected $table = 'types';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $type;


    public function testimonials(){
        return $this->hasMany('App\Testimonial');
    }
}
