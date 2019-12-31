<?php

namespace App\Http\View\Composers;

use Illuminate\View\View;
use App\Models\BlogCategory;

class BlogCategoriesModuleComposer
{
    private $category;

    public function __construct(BlogCategory $category)
    {
        $this->category = $category;
    }

    public function compose(View $view)
    {
        $pathArr = explode('.',$view->name());
        $categoriesModuleType = end($pathArr);

        if(!in_array($categoriesModuleType, ['tree', 'flat'])){
            throw new \Exception('Wrong type of CategoryModule.');
        }

        $categories = $categoriesModuleType === 'tree' ? $this->sidebarCategoriesTree() : $this->sidebarCategoriesFlat();

        return $view->with('categories', $categories);
    }

    /* Get Categories as nested set tree */
    protected function sidebarCategoriesTree()
    {
        $categoriesTree = $this->category
            ->withCountOfPublished('posts')
            ->displayable()
            ->get()
            ->toTree();

        return $this->increaseWithChildren($categoriesTree, 'posts_count')
            ->where('posts_count','!=', 0);
    }

    /* Get Categories as flat tree */
    protected function sidebarCategoriesFlat()
    {
        /*
           // Without Using nested set toTree() getter
            $categories = $this->category
                ->withCountOfPublished('posts')
                ->withLive(['descendants'=> function($q){ return $q->withCountOfPublished('posts'); }])
                ->displayable()
                ->get();

            foreach ($categories as $category){
                if($category->descendants->isNotEmpty()){
                    $category->posts_count += $category->descendants->pluck('posts_count')->sum();
                }
            }
        */

        $categories = $this->sidebarCategoriesTree();

        function extractChildren($categories, $flat = null){
            if(is_null($flat)) $flat = [];
            foreach ($categories as $category) {
                $flat[] = $category;
                if($category->children->isNotEmpty())
                    $flat = extractChildren($category->children, $flat);
            }
            return $flat;
        }

        $categories = collect(extractChildren($categories))->sortBy('id');

        return $categories;
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
}
