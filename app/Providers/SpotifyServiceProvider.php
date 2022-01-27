<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Spotify;

class SpotifyServiceProvider extends ServiceProvider
{

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Services\Spotify', function ($app) {
             return new Spotify(config('spotify.client_id'), config('spotify.client_secret'));
        });
    }
}
