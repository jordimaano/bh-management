<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class BoardingHouse extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'owner_id',
        'location',
        'photo',
    ];

    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function room(): HasMany
    {
        return $this->hasMany(Room::class);
    }
    public function vacancies(): int
    {
        return $this->room->sum(function (Room $room) {
            return $room->getVacancies();
        });
    }
}
