<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Invitation extends Authenticatable
{
    use HasFactory, HasApiTokens;

    protected $fillable = ['recipient', 'access_name', 'access_code'];

    protected $hidden = ['access_code'];

    public function guests(): HasMany
    {
        return $this->hasMany(Guest::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['recipient'] ?? false) {
            $query->where('recipient', 'like', '%'.request('recipient').'%');
        }
    }
}
