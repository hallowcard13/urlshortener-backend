<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class URLShortenerTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testDB()
    {
        $url = factory(\App\URLShortener::class)->create(); 

        $this->assertDatabaseHas('u_r_l_shorteners', [
            'long_url' => $url->long_url
        ]);
    }

    public function testCreateUrl()
    {
        $response = $this->postJson('/createurl',['url'=> $this->faker->url]);
        $response->assertStatus(201)->assertJson([
            'created' => true,
        ]);
    }
}
