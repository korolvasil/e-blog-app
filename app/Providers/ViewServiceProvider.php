<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\BlogTagsModuleComposer;
use App\Http\View\Composers\BlogCategoriesModuleComposer;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( ['blog.partials.sidebar.modules.categories.tree', 'blog.partials.sidebar.modules.categories.flat'],
            BlogCategoriesModuleComposer::class
        );

        View::composer( ['blog.partials.sidebar.modules.tags.list'],
            BlogTagsModuleComposer::class
        );
    }
}
