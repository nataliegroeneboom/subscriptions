<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class UpdateSubscriptionsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function it_can_update_subscriptions()
    {
        $user = factory('App\User')->create();
        $this->be($user);
        $subscription = factory('App\Subscription')->create(['user_id' => $user->id]);
        $newSubscription = factory('App\Subscription')->make(['user_id' => $user->id]);
        $this->put("subscriptions/{$subscription->id}", $newSubscription->toArray())
        ->assertRedirect('/subscriptions');
        $this->get('/subscriptions')
        ->assertSee($newSubscription->company);

   
    }
}
