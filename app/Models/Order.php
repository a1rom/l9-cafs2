<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'delivery_address_id',
        'invoice_address_id',
        'status',
    ];

    private $statusCodes = [
        'pending' => 0,
        'processing' => 1,
        'shipped' => 2,
        'delivered' => 3,
        'cancelled' => 4,
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deliveryAddress()
    {
        return $this->belongsTo(Address::class, 'delivery_address_id');
    }

    public function invoiceAddress()
    {
        return $this->belongsTo(Address::class, 'invoice_address_id');
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    protected function status() : Attribute
    {
        return Attribute::make(
            get: function ($value) {
                return array_search($value, $this->statusCodes);
            },
            set: function ($value) {
                return $this->statusCodes[$value];
            },
            );
    }
}
