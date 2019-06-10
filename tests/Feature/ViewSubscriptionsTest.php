<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ViewSubscriptionsTest extends TestCase
{
    use RefreshDatabase;
    /**
     * @test
     */
    public function it_can_display_all_subscriptions()
    {
        $user = factory('App\User')->create();
        $this->be($user);
        $subscription = factory('App\Subscription')->create(['user_id' => $user->id]);
        $this->get('/subscriptions')
        ->assertSee($subscription->company)
        ->assertSee($subscription->frequency)
        ->assertSee($subscription->subscription_date)
        ->assertSee($subscription->nextPayment());

    }

    /**
     * @test
     */

     public function it_cannot_visit_subscriptions_page_when_not_logged_in()
     {
        $this->withExceptionHandling();
         $this->get('/subscriptions')
         ->assertRedirect('/login');
     }

     /**
      * @test
      */

      public function it_can_only_display_subscriptions_that_belong_to_logged_in_user()
      {
         $this->withExceptionHandling();
         $user = factory('App\User')->create();
        $otherUser = factory('App\User')->create();
        $subscription = factory('App\Subscription')->create( ['user_id' => $otherUser->id]);
        $this->be($user);
        $loggedInSubscription = factory('App\Subscription')->create(['user_id' => $user->id]);
        $this->get('/subscriptions')
        ->assertSee($loggedInSubscription->company)
        ->assertDontSee($subscription->company);
      }

     /**
      * @test
      */
      public function it_can_display_a_single_subscription(){
        $this->withoutExceptionHandling();  
        $user = factory('App\User')->create();
        $this->be($user);
        $subscription = factory('App\Subscription')->create(['user_id' => $user->id]);
        $this->get('/subscriptions/' . $subscription->id)
        ->assertSee($subscription->company);
      }

      /**
       * @test
       */
      public function guest_cannot_view_a_single_subscription(){
          $this->be(factory('App\User')->create());
          $subscription = factory('App\Subscription')->create();
          $this->get('/subscriptions/' . $subscription->id)
          ->assertStatus(403);
      }

      /**
       * @test
       */
      public function an_authenticated_user_can_visit_create_page(){
        $this->be(factory('App\User')->create());
        $this->get('/subscriptions/create')->assertStatus(200);
      }
      

      
}
