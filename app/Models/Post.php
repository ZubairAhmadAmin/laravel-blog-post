<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function profile() {
        return $this->belongsTo(Profile::class);
    }

    public function topics() {
        return $this->belongsToMany(Topic::class, 'posts_topics');
    }
    
    public function images() {
        return $this->morphMany(Image::class, 'imageable');
    }

    protected $fillable = ['title', 'sub_title', 'description', 'slug', 'lang', 'profile_id'];
}