<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    //

    use HasFactory;

    protected $table = 'sliders';

    protected $fillable = [
        'title',
        'body',
        'link_title',
        'link_address'
    ];
}
