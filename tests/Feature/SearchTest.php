<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SearchTest extends TestCase
{
    /**
     * A basic test search.
     *
     * @return void
     */
    public function testBasicTest()
    {
        $response = $this->get('/search');
        
        $response->assertStatus(200);
    }
    
    /**
     * A term search test
     *
     * @return void
     */
    public function testTermSearchTest()
    {
        $response = $this->call('GET', '/search', ['q' => 'summer'], [], [], []);
        
        $response->assertStatus(200);
    }
    
    
    /**
     * A search view bindings test
     *
     * @return void
     */
    public function testSearchBindingsTest()
    {
        $response = $this->call('GET', '/search', ['q' => 'summer'], [], [], []);
        
        $response->assertViewHasAll(['artists', 'albums', 'tracks']);
    }
    
}
