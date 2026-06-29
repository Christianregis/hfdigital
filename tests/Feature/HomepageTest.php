<?php

namespace Tests\Feature;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_homme_page_return_200(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_login_credentials_return_200(): void
    {
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200);
    }
}
