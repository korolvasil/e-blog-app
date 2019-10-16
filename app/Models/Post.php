<?php

namespace App\Models;

use App\Traits\Eloquent\HasLive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes, HasLive;

    protected $fillable = ['user_id', 'slug', 'title', 'excerpt', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
