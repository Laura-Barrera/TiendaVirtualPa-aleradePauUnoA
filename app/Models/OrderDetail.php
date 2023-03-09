<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OrderDetail extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'dateOrder',
        'fullValue',
        'id_PaymentMethod'
    ];

    public function paymentMethod(): BelongsTo
    {
        return $this->belongsTo(PaymentMethod::class);
    }

    public function shippingOrder(): HasMany
    {
        return $this->hasMany(ShippingOrder::class);
    }
}
