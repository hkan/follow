<?php namespace Hkan\Follow\Facades;

use Illuminate\Support\Facades\Facade;

class Follow extends Facade {

	/**
	 * Get the registered name of the component.
	 *
	 * @return string
	 */
	protected static function getFacadeAccessor() { return 'follow'; }

}
