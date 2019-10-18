<?php

use App\Models\BlogCategory;
use Illuminate\Database\Seeder;

class BlogCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database Categories seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(BlogCategory::class, 20)->create()->each(function ($category) {
            $hasParent = rand(1, 100) <= 45;
            $parentID = rand(1, 20);
            $parentID = $parentID == $category->id ? null : $parentID;

            $category->name = 'Category #'.$category->id;
            $category->slug =  Str::slug($category->name);
            $category->parent_id = $parentID && $hasParent ? $parentID : null;

            $category->save();
        });
    }
}
