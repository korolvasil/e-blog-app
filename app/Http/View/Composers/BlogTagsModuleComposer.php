<?php

namespace App\Http\View\Composers;

use App\Models\Tag;
use Illuminate\View\View;

class BlogTagsModuleComposer
{
    public function compose(View $view)
    {
        $tags = Tag::whereHas('posts', function ($q) {
                return $q
                    ->whereDoesntHave('category', function ($q) {
                        return $q->notPublished();
                    })
                    ->whereDoesntHave('category.ancestors', function ($q) {
                        return $q->notPublished();
                    })
                    ->published();
            })
            ->withCount(['posts' => function ($q) {
                return $q
                    ->whereDoesntHave('category', function ($q) {
                        return $q->notPublished();
                    })
                    ->whereDoesntHave('category.ancestors', function ($q) {
                        return $q->notPublished();
                    })
                    ->published();
            }])
            ->published()->get();

        return $view->with('tags', $tags);
    }

}
