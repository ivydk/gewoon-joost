<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sections extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'deadline',
        'description'
    ];

    public function children(): HasMany
    {
        return $this->hasMany(Sections::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Sections::class, 'parent_id');
    }
}
