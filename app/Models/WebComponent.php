<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebComponent extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'slug', 'price', 'unit'
    ];
}