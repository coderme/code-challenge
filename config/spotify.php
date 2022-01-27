<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Spotify client id
    |--------------------------------------------------------------------------
    |
    | This value is obtained from Spotify, you need to register for an account
    | account in order to be able to use Spotify API.
    | See: https://developer.spotify.com/dashboard/
    |
    */

    'client_id' => env('SPOTIFY_CLIENT_ID'),

    /*
    |--------------------------------------------------------------------------
    | Spotify client secret
    |--------------------------------------------------------------------------
    |
    | This value is also obtained from Spotify,
    | Storing API secrets in a source code is **not** a great idea
    |
    */

    'client_secret' => env('SPOTIFY_CLIENT_SECRET'),

];
