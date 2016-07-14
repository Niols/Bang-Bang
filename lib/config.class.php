<?php

class ConfigException extends Exception { }

class Config
{
    private static $config = [];

    public static function init ()
    {
	self::set(null, parse_ini_file(CFG_DIR . 'bang-bang.ini', true));
	
	$lang = self::get('system.lang');
	
	foreach (self::get('bangs') as $key => $value) {
	    self::set('bangs.' . str_replace('{lang}', $lang, $key),
		      str_replace('{lang}', $lang, $value));
	}
	
	foreach (self::get('aliases') as $key => $value) {
	    self::set('aliases.' . str_replace('{lang}', $lang, $key),
		      str_replace('{lang}', $lang, $value));
	}
    }

    private static function &resolve ($key)
    {
	$result = &self::$config;

	if (! $key) {
	    return $result;
	}

	foreach (explode('.', $key) as $subkey) {
	    if (isset ($result[$subkey])) {
		$result = &$result[$subkey];
	    } else {
		throw new ConfigException("key '$key' not found");
	    }
	}

	return $result;
    }

    public static function get ($key, $default = null)
    {
	try {
	    return self::resolve ($key);
	} catch (ConfigException $e) {
	    return $default;
	}
    }

    public static function set ($key, $value)
    {
	$result = &self::resolve($key);
	$result = $value;
    }
}
