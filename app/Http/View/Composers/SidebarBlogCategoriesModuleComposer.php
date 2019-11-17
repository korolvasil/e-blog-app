<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\BlogCategory;

class SidebarBlogCategoriesModuleComposer
{
    protected $categories;

    public function __construct(BlogCategory $category)
    {
        $this->categories = $this->sidebarCategoriesTree($category);
    }

    public function compose(View $view)
    {
        return $view->with('categories', $this->categories);
    }

    /* Get Categories as nested set tree */
    protected function sidebarCategoriesTree($categoryModel)
    {
        $categoriesTree = $categoryModel->with(['descendants' => function ($q) { return $q->live(); }])
            ->withCount(['posts' => function ($q) { return $q->live(); }])
            ->whereHas('descendants', function ($q) {
                return $q->whereHas('posts', function ($q) { return $q->live(); })->live();
            })
            ->orWhereHas('posts', function ($q) { return $q->live(); })
            ->live()
            ->get()
            ->toTree();

        return $this->increaseWithChildren($categoriesTree, 'posts_count')
            ->where('posts_count','!=', 0);
    }

    /* Increase posts_count with children's posts_count by recursion   */
    protected function increaseWithChildren($categories, $property) {
        foreach ($categories as $category) {
            if (count($category->children)) {
                $this->increaseWithChildren($category->children, $property);
                $category->{$property} += $category->children->pluck($property)->sum();
            }
        }
        return $categories;
    }

    /* Get Categories as flat tree */
    protected function sidebarCategoriesFlat($categoryModel)
    {
        /* Using Eloquent Builder */
        $categories = $categoryModel->withCount(['posts' => function ($q) { return $q->live(); }])
            ->live()
            ->whereHas('posts', function ($q) { return $q->live();})
            ->get();

        /* We should increase each category's posts_count with theirs children's posts_count */
        foreach ($categories as $category) {
            $category->posts_count += $categories->where('parent_id', $category->id)->pluck('posts_count')->sum();
        }

        return $categories;
    }
}
