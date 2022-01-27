<?php
namespace App\Http\Controllers;

use App\Services\Spotify;

abstract class SpotifyController extends Controller
{
    
    protected $spotify;
    
    public function __construct(Spotify $spotify)
    {
        $this->spotify = $spotify;
    } 
}
