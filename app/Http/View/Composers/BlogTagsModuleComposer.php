<?php

namespace App\Http\View\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class BlogTagsModuleComposer
{
    public function compose(View $view)
    {
        $tags = Tag::withCountOfLive('posts')->whereHasLive('posts')->published()->get();

        return $view->with('tags', $tags);
    }

}
