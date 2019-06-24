<?php

namespace App\Listeners;

use App\Events\UserReferred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Reward;

class RewardUser
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UserReferred  $event
     * @return void
     */
    public function handle(UserReferred $event)
    {
        $referral = \App\ReferralLink::find($event->referralId);
        if (!is_null($referral)) {
            \App\ReferralRelationship::create(['referral_link_id' => $referral->id, 'user_id' => $event->user->id]);

            // dd($referral->program->name);

            if ($referral->program->name === 'Sign-Up Bonus') {
                // User who was sharing link
                $provider = $referral->user->id;
                Reward::create([
                    'user_id' => $provider,
                    'reward_points'=> 20
                ]);
            }
        }
    }
}
