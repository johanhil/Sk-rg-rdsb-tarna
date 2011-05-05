<?php
require('boats.php');

$api_key = '13196.xVQDadefpMD2f';
$cache = '/tmp/waxholmsbatarna.json';

# strips the dots from aao and uppercases it to produce
# the "callsign" of the boat
function format_boatname($boat)
{
	return strtoupper(strtr($boat, "едц", "aao"));
}

function update_cache()
{
	global $boats, $api_key, $cache;
	$url = "http://aprs.fi/api/get?what=loc&apikey=$api_key&format=json&name=";

	foreach (getMMSIs() as $boat)
	{
		$url .= format_boatname($boat) . ',';
	}

	# strip the last ,
	$url = substr($url, 0, -1);

	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_USERAGENT, "experimentation by johanhil@kth.se");
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$json = curl_exec($ch);
	curl_close($ch);
	$ok = file_put_contents($cache, $json, LOCK_EX);
}

function get_cache_contents()
{
	global $cache;
	return file_get_contents($cache);
}

# --- MAIN ---

# cache for 5 minutes. do we need to update?
if (! file_exists($cache))
{
	update_cache();
}
else
{
	$now = time();
	$cache_mtime = filemtime($cache);
	
	if (($now - $cache_mtime) > 5*60)
	{
		update_cache();
	}
}

// stop cacheing from occuring (seems to affect FF, but not Chrome). weird.
// TODO maybe we should cache for 2-3 minutes instead of not cacheing at all.
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 2010 05:00:00 GMT"); 
echo get_cache_contents();
?>
