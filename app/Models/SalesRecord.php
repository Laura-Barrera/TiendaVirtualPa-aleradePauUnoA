<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SalesRecord extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $guarded = ['id'];

    protected $fillable = [
        'dateOrder',
        'fullValue'
    ];

    public function product(): HasMany
    {
        return $this->hasMany(Product::class);
    }
    public function sale(): HasMany
    {
        return $this->hasMany(Sale::class);
    }
}
