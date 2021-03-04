<?php

namespace App\Providers;

use App\Contact;
use App\Member;
use App\Page;
use App\Section;
use App\Service;
use App\Testimonial;
use App\Type;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('partials.services', function ($view) {
            $view->with('services', Service::all()->take(6));
        });

        view()->composer('page.show', function ($view) {
            $view->with('services', Service::all());
        });

        view()->composer('page.show', function ($view) {
            $view->with('types', Type::all());
        });

        view()->composer('page.show', function ($view) {
            $view->with('contact', Contact::findOrFail(1));
        });

        view()->composer('contact', function ($view) {
            $view->with('members', Member::all());
        });

        view()->composer('dashboard.contact.index', function ($view) {
            $view->with('members', Member::all());
        });

        view()->composer('partials.contact', function ($view) {
            $view->with('contact', Contact::findOrFail(1));
        });
        view()->composer('partials.services', function ($view) {
            $view->with('section', Section::findOrFail(1));
        });

        view()->composer('services', function ($view) {
            $view->with('section', Section::findOrFail(1));
        });

        view()->composer('partials.header', function ($view) {
            $view->with('section', Section::findOrFail(2));
        });

        view()->composer('partials.about', function ($view) {
            $view->with('section', Section::findOrFail(3));
        });

        view()->composer('partials.info', function ($view) {
            $view
                ->with('info' ,Section::findOrFail(4))
                ->with('price' ,Section::findOrFail(5))
                ->with('cooperation' ,Section::findOrFail(6));
        });

        view()->composer('partials.testimonial', function ($view) {
            $view->with('testimonial' ,Section::findOrFail(7));
        });

        view()->composer('partials.testimonial', function ($view) {
            $view->with('testimonials' ,Testimonial::all()->take(12));
        });

        view()->composer('services', function ($view) {
            $view->with('page' ,Page::findOrFail(1));
        });

        view()->composer('testimonial', function ($view) {
            $view->with('page' ,Page::findOrFail(2));
        });

        view()->composer('dashboard.page.index', function ($view) {
            $view->with('pages' ,Page::all());
        });

        view()->composer('dashboard.testimonial.index', function ($view) {
            $view->with('types' ,Type::all());
        });

    }
}
