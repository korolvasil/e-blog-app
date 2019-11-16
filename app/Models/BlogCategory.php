<?php

namespace App\Models;

use Kalnoy\Nestedset\NodeTrait;
use App\Traits\Eloquent\HasLive;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BlogCategory extends Model
{
    use SoftDeletes, HasLive, NodeTrait;

    protected $fillable = [
        'name', 'slug', 'description', 'parent_id', 'user_id', 'is_published'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function posts()
    {
        return $this->hasMany(BlogPost::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
