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
            $hasParent = rand(1, 100) <= 30;
            $parentID = rand(1, 20);
            $parentID = $parentID == $category->id ? null : $parentID;

            if ($parentID && $hasParent) {
                $category->parent_id = $parentID;
            }

            $prefix = $category->parent ? $category->parent->name . ' ' : '';
            $category->slug =  Str::slug($prefix . $category->name);

            $category->save();
        });
    }
}
