<?php namespace Carve\Validators;

use Illuminate\Support\ServiceProvider;

class ValidatorsServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('carve/validators');
		$this->app['validator']->extend('postcode', 'Carve\Validators\Address@postcode');
		$this->app['validator']->extend('sortcode', 'Carve\Validators\Bank@sortCode');
		$this->app['validator']->extend('bankaccount', 'Carve\Validators\Bank@accountNumber');
		$this->app['validator']->extend('utr', 'Carve\Validators\Person@utr');
		$this->app['validator']->extend('nationalinsurance', 'Carve\Validators\Person@nationalInsuranceNumber');

		$this->app['validator']->extend('phonenumber', 'Carve\Validators\Phone@phoneNumber');
		$this->app['validator']->extend('mobilenumber', 'Carve\Validators\Phone@mobileNumber');
		$this->app['validator']->extend('landlinenumber', 'Carve\Validators\Phone@landlineNumber');
		$this->app['validator']->extend('freefonenumber', 'Carve\Validators\Phone@freeNumber');
		$this->app['validator']->extend('businessphonenumber', 'Carve\Validators\Phone@businessNumber');
		$this->app['validator']->extend('premiumphonenumber', 'Carve\Validators\Phone@premiumNumber');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
