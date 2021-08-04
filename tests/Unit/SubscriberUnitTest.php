<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class SubscriberUnitTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_a_new_subscriber_can_be_added()
    {
        $this->withOutExceptionHandling();
        $response = $this->post('api/subscribers', $this->data());
        $response->assertOk();
        $response->assertStatus(200);
    }

    public function data()
    {
        return [
            'email' => rand(1000, 9000)."info@l2w.com",
            'fields' => [
                'name' => 'Schneider',
                'country' => 'Nigeria'
            ]
        ];
    }
}
