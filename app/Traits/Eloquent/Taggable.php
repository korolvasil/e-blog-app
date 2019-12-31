<?php

namespace App\Traits\Eloquent;

use App\Models\Tag;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Model;

trait Taggable
{
    use TaggableScopesTrait;

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function tag($tags)
    {
        $this->addTags($this->getWorkableTags($tags));
    }

    public function untag($tags = null)
    {
        if ($tags === null) {
            $this->removeAllTags();
            return;
        }

        $this->removeTags($this->getWorkableTags($tags));
    }

    public function retag($tags)
    {
        $this->removeAllTags();
        $this->tag($tags);
    }

    private function removeAllTags()
    {
        $this->removeTags($this->tags);
    }

    private function removeTags(Collection $tags)
    {
        $this->tags()->detach($tags);

        foreach ($tags->where('count', '>', 0) as $tag) {
            $tag->decrement('count');
        }
    }

    private function addTags(Collection $tags)
    {
        $sync = $this->tags()->syncWithoutDetaching($tags->pluck('id')->toArray());

        foreach (Arr::get($sync, 'attached') as $attachedId) {
            $tags->where('id', $attachedId)->first()->increment('count');
        }
    }

    private function getWorkableTags($tags) : Collection
    {
        if (is_array($tags)) {
            return $this->getTagModels($tags);
        }

        if ($tags instanceof Model) {
            return $this->getTagModels([$tags->slug]);
        }

        // We need to filter these tags
        return $this->filterTagsCollection($tags);
    }

    private function filterTagsCollection(Collection $tags) : Collection
    {
        return $tags->filter(function ($tag) {
            return $tag instanceof Model;
        });
    }

    private function getTagModels(array $tags)
    {
        return Tag::whereIn('slug', $this->normaliseTagNames($tags))->get();
    }

    private function normaliseTagNames(array $tags)
    {
        return array_map(function ($tag) {
            return Str::slug($tag);
        }, $tags);
    }
}
