<?php

namespace Tests\Feature;

use Tests\TestCase;

class UrlTest extends TestCase
{

    public function test_index()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
