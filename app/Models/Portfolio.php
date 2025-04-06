<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{

    protected $fillable = ['title', 'name', 'type', 'purpose', 'features', 'requirements', 'description', 'content', 'is_published', 'thumbnail', 'position'];

    public function images()
    {
        return $this->hasMany(Image::class)->orderBy('position');
    }

}
