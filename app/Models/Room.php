<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'boarding_house_id',
        'capacity',
        'rent_price',
        'photo',
    ];

    public function boardingHouse(): BelongsTo
    {
        return $this->belongsTo(BoardingHouse::class);
    }
    public function boarders(): HasMany
    {
        return $this->hasMany(Boarder::class);
    }
    public function getpopulation()
    {
        $boarder = Boarder::where('room_id', $this->id)->get();
        return count($boarder);
    }
    public function getVacancies()
    {
        $boarder = Boarder::where('room_id', $this->id)->get();
        return $this->capacity - count($boarder);
    }
}
