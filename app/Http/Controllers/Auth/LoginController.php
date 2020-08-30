<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\CandidatesCurrentLocation as CandidatesCurrentLocationModel;
use Carbon\Carbon;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    function authenticated(Request $request, $user)
    {
        $user->update([
            'last_login_at' => Carbon::now()->toDateTimeString(),
            'last_login_ip' => $request->getClientIp(),
            'longitude'     => $data->longitude,
            'latitude'      => $data->latitude,
            'country_name'  => $data->countryName,
            'city_name'     => $data->cityName,
        ]);


        // CandidatesCurrentLocationModel::create(array(
        //     'candidate_id'  => auth()->user()->id,
        //     'longitude'     => $data->longitude,
        //     'latitude'      => $data->latitude,
        //     'last_login_at' => Carbon::now()->toDateTimeString(),
        //     'last_login_ip' => $request->getClientIp(),
        //     'country_code'  => $data->countryCode,
        //     'region_name'   => $data->regionName,
        //     'zip_code'      => $data->zipCode,
        //     'iso_code'      => $data->isoCode,
        //     'postal_code'   => $data->postalCode,
        //     'metro_code'    => $data->metroCode,
        //     'area_code'     => $data->areaCode
        // )->except('startPoint'));
    }
}
