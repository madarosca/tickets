<?php

namespace App;

class Util
{

	public static function activateTab($route) {

	    $current_route = Route::getCurrentRoute()->uri();

	    $active = 'class="active"';

	    if ($current_route == $route) {
	        return $active;
	    }

	    return '';
	    
	}
}
