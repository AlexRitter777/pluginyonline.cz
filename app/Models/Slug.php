<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Slug extends Model
{

    protected $fillable = ['slug', 'is_current'];

    use HasFactory;

    public function portfolio(): BelongsTo
    {
        return $this->belongsTo(Portfolio::class);
    }


}
