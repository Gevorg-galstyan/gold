<?php

namespace App\Http\Middleware;

use App\Models\Guest;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class MyLocaleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        $ip = $request->ip();

        if (!$request->cookie('guest')){
            $guest_param = \Location::get();
            $guest = Guest::create([
                'ip' => $ip,
                'countryName' => $guest_param->countryName,
                'countryCode' => $guest_param->countryCode,
                'regionCode' => $guest_param->regionCode,
                'regionName' => $guest_param->regionName,
                'cityName' => $guest_param->cityName,
                'zipCode' => $guest_param->zipCode,
                'isoCode' => $guest_param->isoCode,
                'postalCode' => $guest_param->postalCode,
                'latitude' => $guest_param->latitude,
                'longitude' => $guest_param->longitude,
                'metroCode' => $guest_param->metroCode,
                'areaCode' => $guest_param->areaCode,
            ]);
            if ($guest){
                Cookie::queue('guest', $guest->id, 7200);
            }
        }



        if (!$request->cookie('loc')) {
            if (\Location::get()->countryCode == 'AM') {
                $locale = 'hy';
            } elseif (\Location::get()->countryCode == 'RU' ||
                \Location::get()->countryCode == 'UA' ||
                \Location::get()->countryCode == 'KZ' ||
                \Location::get()->countryCode == 'BY' ||
                \Location::get()->countryCode == 'TJ' ||
                \Location::get()->countryCode == 'UZ')
            {
                $locale = 'ru';
            } else {
                $locale = 'en';
            }
            Cookie::queue('loc', $locale);
            if (!Auth::guest()){
                $user = Auth::user();
                $user->locale = $locale;
                $user->save();
            }
            return redirect(\LaravelLocalization::getLocalizedURL($locale));
        } else {

            if (\LaravelLocalization::setLocale()) {
                $locale = \LaravelLocalization::setLocale();
            } else {
                $locale = config('app.locale');
            }
            $old_loc = $request->cookie('loc');
            if ($old_loc != $locale) {
                Cookie::queue('loc', $locale);
                if (!Auth::guest()){
                    $user = Auth::user();
                    $user->locale = $locale;
                    $user->save();
                }
            }

        }
        return $next($request);

    }
}
