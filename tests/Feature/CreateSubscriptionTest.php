<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CreateSubscriptionTest extends TestCase
{
    use RefreshDatabase;
    /** 
     * @test
     */
    public function it_can_create_subscriptions()
    {
        $this->withoutExceptionHandling();
        $user = factory('App\User')->create();
        $this->actingAs($user);
        $subscription = factory('App\Subscription')->make();
        $this->post('/subscriptions', $subscription->toArray())
        ->assertRedirect('/subscriptions');
        $this->get('/subscriptions')
        ->assertSee($subscription->company);
    }
}
