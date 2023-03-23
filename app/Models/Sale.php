<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Sale extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'id_shipping_order',
        'id_customer',
        'id_payment_method',
        'saleDate',
        'totalCost',
        'shipping_status',
        'saleStatus'
    ];

    function shippingOrder(): BelongsTo
    {
        return $this->belongsTo(ShippingOrder::class);
    }
    public function customer(): BelongsTo
    {
        return $this->belongsTo(Customer::class);
    }
    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    public function orderDetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }

}
