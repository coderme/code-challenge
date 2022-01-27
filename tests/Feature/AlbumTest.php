<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlbumTest extends TestCase
{
    /**
     * Find an existing album by ID
     *
     * @return void
     */
    public function testAlbumFoundTest()
    {
        $response = $this->get('/albums/37oYuc9ZzeoQZT68RM082M');

        $response->assertStatus(200);
    }
    
    /**
     * Find non existing album by ID
     *
     * @return void
     */
    public function testAlbumNotFoundTest()
    {
        $response = $this->get('/albums/non-existing-id');
        
        $response->assertStatus(404);
    }
}
