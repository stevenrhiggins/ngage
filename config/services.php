<?php

return [

	/*
	|--------------------------------------------------------------------------
	| Third Party Services
	|--------------------------------------------------------------------------
	|
	| This file is for storing the credentials for third party services such
	| as Stripe, Mailgun, Mandrill, and others. This file provides a sane
	| default location for this type of information, allowing packages
	| to have a conventional place to find your various credentials.
	|
	*/

	'mailgun' => [
		'domain' => 'sandboxe50e7ccab0e74d8d87df2cec05ca2e54.mailgun.org',
		'secret' => 'key-92bf5b9de1a7e383ec60f2b36cc059e5',
	],

	'mandrill' => [
		'secret' => 'zjF-lK995O9atVfrgbS8dw',
	],

	'ses' => [
		'key' => '',
		'secret' => '',
		'region' => 'us-east-1',
	],

	'stripe' => [
		'model'  => 'App\User',
		'secret' => '',
	],

];
