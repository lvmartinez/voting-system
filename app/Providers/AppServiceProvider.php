<?php

namespace App\Providers;

use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $currentTime = Carbon::now();
        $setting = Setting::first();

        if( $currentTime->gt($setting->nomination_start_date) && $currentTime->lt($setting->nomination_end_date) ){
            View::share('isNominationPeriod','yes');
            View::share('isVotingPeriod','no');
        }else{
            View::share('isNominationPeriod','no');
            if( $currentTime->gt($setting->voting_start_date) && $currentTime->lt($setting->voting_end_date) ) {
                View::share('isVotingPeriod', 'yes');
            }else{
                View::share('isVotingPeriod','no');
                View::share('isNominationPeriod','no');
            }
        }




    }
}
