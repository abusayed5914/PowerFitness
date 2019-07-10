<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Category;
use App\ProgramCategory;
use App\VideoCategory;
use App\NutrationCategory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $allCategories = Category::all();
        $allVideoCategories = VideoCategory::all();
        $allProgramCategories = ProgramCategory::all();
        $nutrationProgramCategories = NutrationCategory::all();
        view()->share('categories', $allCategories);
        view()->share('categoryCategories', $allVideoCategories);
        view()->share('programCategories', $allProgramCategories);
        view()->share('nutrationCategories', $nutrationProgramCategories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
