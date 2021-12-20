<?php

namespace App\Providers;

use App\Models\City;
use App\Models\Topic;
use App\Models\Vehicle;
use Illuminate\Support\ServiceProvider;

class ViewShareProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if (!$this->app->runningInConsole()) {
            view()->share('a_topics', Topic::with('getLocationInfo', 'getDepartureRoute.getMainCity', 'getArrivalRoute.getMainCity', 'getUserInfo', 'getVehicleInfo')->where('status', 1)->orderBy('id', 'ASC')->paginate(4));
            view()->share('cities', City::where('parent_id', null)->orderBy('id', 'ASC')->get());
            view()->share('vehicles', Vehicle::orderBy('id', 'ASC')->get());
            view()->share('provinces', City::where('parent_id', '!=', null)->orderBy('id', 'ASC')->get());
        }
    }
}
