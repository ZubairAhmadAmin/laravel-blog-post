<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    public function imageable() {
        return $this->morphTo();
    }

    protected $fillable = ['image', 'imageable_type', 'imageable_id'];
}
