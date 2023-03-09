<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PaymentMethod extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'nameMethod',
        'additionalCost'
    ];

    public function orderdetail(): HasMany
    {
        return $this->hasMany(OrderDetail::class);
    }
}
