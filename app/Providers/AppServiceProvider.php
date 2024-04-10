<?php

namespace App\Providers;

use App\Models\Blog;
use App\Models\Contact;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Blade::directive('themeSettings', function ($key) {
            return "<?php echo \App\Helpers\AdminHelper::getValueByKey($key); ?>";
        });

        View::composer(['frontend::layouts.*', 'frontend::frontend.contact', 'frontend::emails.enquiry'], function ($view) {
            $contact = Contact::latest()->first();
            $view->with([
                'registered_address' => $contact->registered_address,
                'registered_address_map_link' => $contact->registered_address_map_link ?? null,
                'head_office_address' => $contact->head_office_address,
                'head_office_address_map_link' => $contact->head_office_address_map_link ?? null,
                'phone' => $contact->phone,
                'email' => $contact->email,
                'facebook_link' => $contact->facebook_link ?? null,
                'instagram_link' => $contact->instagram_link ?? null,
                'twitter_link' => $contact->twitter_link ?? null,
                'linkedin_link' => $contact->linkedin_link ?? null,
                'pinterest_link' => $contact->pinterest_link ?? null,
                'youtube_link' => $contact->youtube_link ?? null,
                'map_link' => $contact->map_link ?? null,
            ]);
        });
        View::composer(['frontend::layouts.*'], function ($view) {
            $blog_exists = Blog::where('status', 1)->exists();
            $view->with([
                'blog_exists' => $blog_exists
            ]);
        });
    }
}
