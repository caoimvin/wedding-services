<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invitation extends Model
{
    use HasFactory;

    protected $fillable = ['recipient', 'password'];

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
