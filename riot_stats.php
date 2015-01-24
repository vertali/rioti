<?php

$server = 'eune';
$summoner_id = '22995437';
$season = 'SEASON2014';

$res = file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v1.3/stats/by-summoner/' . rawurlencode($summoner_id) . '/summary?season=' . $season . '&api_key=19b900e1-ac45-40da-b253-119914b5c112');
$object = json_decode($res, true);

foreach ($object['playerStatSummaries'] as $stat) {
	echo $stat['playerStatSummaryType'] . ': ' . $stat['wins'];
	if (isset($stat['losses'])) {
		echo '/' . $stat['losses'];
	}

	echo '<br/>';
}

?>