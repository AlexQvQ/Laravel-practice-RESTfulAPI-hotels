<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Client extends Model
{
    use HasFactory;
    protected $fillable = [
    'fio',
    'email',
    'phone',
    'birth_date',
    'room_id'
];
    public $timestamps = false;
    public function room() : BelongsTo{
        return $this->belongsTo(Room::class);
    }
}
