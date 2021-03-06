<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VpsOrder extends Model {

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'operating_system_id',
        'data_center_id',
        'order_id',
        'name',
        'term',
        'cpu',
        'ram',
        'disk',
        'traffic',
        'price',
        'currency',
        'discount',
        'is_trial',
        'is_managed',
        'is_provisioned',
        'additional_ip'
    ];

    /**
     * @param $query
     * @param $type
     * @return mixed
     */
    public function scopeProvisioned($query, $type)
    {
        return $query->whereIsProvisioned($type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    /**
     * @return mixed
     */
    public function customer()
    {
        return $this->order->customer();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function provision()
    {
        return $this->hasOne(VpsProvision::class);
    }
}
