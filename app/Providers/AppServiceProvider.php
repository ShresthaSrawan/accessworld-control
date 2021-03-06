<?php

namespace App\Providers;

use App\Models\Certificate;
use App\Models\Client;
use App\Models\Country;
use App\Models\Customer;
use App\Models\EsewaDeposit;
use App\Models\ManualDeposit;
use App\Models\Menu;
use App\Models\OperatingSystem;
use App\Models\Page;
use App\Models\Service;
use App\Models\Setting;
use App\Models\Staff;
use App\Models\User;
use App\Models\VpsProvision;
use DB;
use Hash;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Validator;

class AppServiceProvider extends ServiceProvider
{

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'user'             => User::class,
            'service'          => Service::class,
            'page'             => Page::class,
            'menu'             => Menu::class,
            'client'           => Client::class,
            'customer'         => Customer::class,
            'certificate'      => Certificate::class,
            'operating_system' => OperatingSystem::class,
            'staff'            => Staff::class,
            'vps_provision'    => VpsProvision::class,
            'setting'          => Setting::class,
            'esewa_deposit'    => EsewaDeposit::class,
            'manual_deposit'   => ManualDeposit::class,
            'country'          => Country::class,
        ]);

        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator)
        {
            $table          = $parameters[0];
            $id             = $parameters[1];
            $inputPassword  = $value;
            $hashedPassword = DB::table($table)->find($id)->password;
            if (Hash::check($inputPassword, $hashedPassword))
            {
                return true;
            }

            return false;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
