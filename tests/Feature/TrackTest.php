<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TrackTest extends TestCase
{
    /**
     * Find an existing track by ID
     *
     * @return void
     */
    public function testTrackFoundTest()
    {
        $response = $this->get('/tracks/6fVCBBlHif6zfqXAEHKJy8');

        $response->assertStatus(200);
    }
    
    /**
     * Find non existing track by ID
     *
     * @return void
     */
    public function testTrackNotFoundTest()
    {
        $response = $this->get('/tracks/non-exsisting-id');
        
        $response->assertStatus(404);
    }
}
