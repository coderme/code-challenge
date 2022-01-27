<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ArtistTest extends TestCase
{
    
    /**
     * Find an existing artist by ID
     *
     * @return void
     */
    public function testAlbumFoundTest()
    {
        $response = $this->get('/artists/57LYzLEk2LcFghVwuWbcuS');
        
        $response->assertStatus(200);
    }
    
    /**
     * Find non existing artist by ID
     *
     * @return void
     */
    public function testAlbumNotFoundTest()
    {
        $response = $this->get('/artists/non-existing-id');
        
        $response->assertStatus(404);
    }
}
