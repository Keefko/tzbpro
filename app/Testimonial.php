<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    protected $table = 'testimonials';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $text;
    private $type_id;

    public function type(){
        return $this->belongsTo(Type::Class, 'type_id');
    }
}
