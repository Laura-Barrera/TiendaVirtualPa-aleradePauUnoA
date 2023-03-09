<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Customer extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'lastName',
        'documentType',
        'documentNumber',
        'phoneNumber',
        'address',
        'email',
    ];
    public function shippingOrder(): HasMany
    {
        return $this->hasMany(ShippingOrder::class);
    }

}
