<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'desc_data'
    ];
    public $timestamps = false;
    public function client() : HasMany{
        return $this->hasMany(Client::class);
    }
}
