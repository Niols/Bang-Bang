<?php

class Bang
{
    private static $bangs = [];
    private static $aliases = [];
    
    public static function init ()
    {
	self::$bangs = Config::get('bangs');
	self::$aliases = Config::get('aliases');
    }

    public static function resolve ($key)
    {
	if (isset (self::$bangs[$key])) {
	    return self::$bangs[$key];
	} else if (isset (self::$aliases[$key])) {
	    return self::resolve (self::$aliases[$key]);
	} else {
	    return null;
	}
    }

    public static function cut ($search)
    {
	$search_gen = ' ' . $search . ' ';

	$i = strrpos ($search_gen, ' ' . Config::get('system.symbol'));
    
	if ($i === false) {
	    return ['default', $search];
	}
	else {
	    $i += 2;
	    $j = strpos ($search_gen, ' ', $i);
	    
	    $key = strtolower (substr ($search_gen, $i, $j - $i));
	    $search_clean = substr ($search_gen, 1, $i - 2)
			  . substr ($search_gen, $j + 1, strlen($search_gen) - 2 - $j);
	    return [$key, $search_clean];
	}
    }
}
