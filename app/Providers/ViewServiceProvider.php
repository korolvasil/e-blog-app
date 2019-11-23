<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            'blog.partials.sidebar.modules.categories.tree',
            'App\Http\View\Composers\SidebarBlogCategoriesModuleComposer'
        );
    }
}
