<?php
namespace apify\Utils;

function _fetch_and_parse_env_var($env_var, $default=null) {
	## env_var_name = str(maybe_extract_enum_member_value(env_var))

	$val = getenv($env_var); # will result FALSE or a String
	
	if ($val === false) if (isset($default)) return $default;

	if (in_array($env_var, \apify\BOOL_ENV_VARS, true))  	return $val ? (strtolower($val) === 'true' || $val === '1') : false;
	if (in_array($env_var, \apify\FLOAT_ENV_VARS, true)) 	return $val ? (float) $val : 0;
	if (in_array($env_var, \apify\INTEGER_ENV_VARS, true)) 	return $val ? (int) $val : 0.0;
	#if (in_array($env_var, apify\DATETIME_ENV_VARS, true)) 	return $val ? 
	
	return $val ? (string) $val : "";
}