<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id', 'tax', 'total', 'sub_total', 'is_take_away', 'note', 'status'];

    public function orderDetails(){
        return $this->hasMany(OrderDetails::class);
    }

    public function scopeNewOrders(Builder $query){
        return $query->whereStatus('new');
    }

    public function scopeReceivedOrders(Builder $query){
        return $query->whereStatus('received');
    }

    public function scopeProcessedOrders(Builder $query){
        return $query->whereStatus('processed');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

}
