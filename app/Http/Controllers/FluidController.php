<?php namespace App\Http\Controllers;

// use Guzzle\Http\Client;
// use Guzzle\Plugin\CurlAuth\CurlAuthPlugin;
// use Guzzle\Plugin\Oauth\OauthPlugin;

class FluidController extends Controller {

	public function index()
	{
		$client 		= new Client('http://ngage360.co/api/v3/');
		$authPlugin 	= new OauthPlugin(['username' => env('FLUID_USERNAME'), 'password' =>env('FLUID_PASSWORD')]);
		$response 		= $client->get('surveys/')->send();
		dd($response);
	}
}
