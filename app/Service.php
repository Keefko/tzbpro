<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';
    public $primaryKey = 'id';
    public $timestamps = false;
    private $title;
    private $icon;
    private $text;
    private $button_text;
    private $button_url;


}

