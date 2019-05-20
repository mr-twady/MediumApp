<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Response;

class ResponseMacroServiceProvider extends ServiceProvider
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
     * Custom and constant json response for all my API requests
     * {'has_error':boolean, 'status_code':integer 'message':string, 'data':json} 
     * 
     * @return void
     */
    public function boot()
    {
    
        Response::macro('success', function ($data, $message, $statusCode) 
        {
            return Response::json([
              'has_error'  => false,
              'status_code' => $statusCode, //http status code
              'message' => $message,  //success message 
              'data' => $data //null or application-specific data would go here
            ], $statusCode);
        });

        Response::macro('error', function ($data, $message, $statusCode) 
        {
            return Response::json([
              'has_error'  => true,
              'status_code' => $statusCode, //http status code
              'message' => $message, //error message 
              'data' => $data //null or optional error payload
            ], $statusCode);
        });

    }
}
