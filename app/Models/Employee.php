<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Employee extends Model
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
        'hiringDate',
        'salary',
        'user_id'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
