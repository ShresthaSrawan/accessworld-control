<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsPackage extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug',
        'description',
        'cpu',
        'ram',
        'disk',
        'traffic',
        'price_npr',
        'price_usd',
        'discount',
        'is_published',
        'is_featured'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_published' => 'boolean',
        'is_featured'  => 'boolean'
    ];

    /**
     * @param $query
     * @return mixed
     */
    public function scopePublished($query)
    {
        return $query->where('is_published', '1');
    }

    /**
     * Route resource binding using slug
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
