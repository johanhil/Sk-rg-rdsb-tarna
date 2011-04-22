<?php
/** Some simple functions relating to the boats, their names and their MMSI:s */
$boats = array( 
'265547840' => 'Dalarö'
,'265649360' => 'Nämdö'
,'265522460' => 'Ramsö' 
,'265547830' => 'Sandhamn'                                                          
,'265522470' => 'Skarpö'
,'265522530' => 'Solöga'
,'265538450' => 'Söderarm'  
,'265522500' => 'Waxholm I' 
,'265522520' => 'Vindöga'
,'265522490' => 'Roslagen'
,'265512110' => 'Saxaren'
,'265522480' => 'Skärgården'
,'265520430' => 'Vaxö'
,'265520410' => 'Viberö'
,'265520400' => 'Vånö'
,'265520420' => 'Väddö' 
,'265520390' => 'Värmdö'
);

function getBoat($mmsi)
{
	global $boats;

	return $boats[$mmsi];
}

function getMMSI($boat)
{
	global $boats;

	return array_search($boat, $boats);
}

function getMMSIs()
{
	global $boats;

	return array_keys($boats);
}

function getBoats()
{
	global $boats;

	return array_values($boats);
}
