<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use HasFactory;

    protected $fillable = ['firstname', 'lastname', 'invitation_id'];

    public function invitation(): BelongsTo
    {
        return $this->belongsTo(Invitation::class, 'id');
    }

    public function scopeFilter($query, array $filters)
    {
        if($filters['invitation'] ?? false) {
            $query->where('invitation_id', '=', request('invitation'));
        }
        if($filters['name'] ?? false) {
            $query->where('firstname', 'like', '%'.request('name').'%')
            ->orWhere('lastname', 'like', '%'.request('name').'%');
        }
    }
}
