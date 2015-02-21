<?php

$test = '';
$server = 'eune';
$summoner = 'Helvetesvind';

$res = file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v1.4/summoner/by-name/' . rawurlencode($summoner) . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');
$object = json_decode($res, true);
//print_r($object);

$key = strtolower(str_replace(' ', '', $summoner));
$summonerId = $object[$key]['id'];

echo 'Šifra: ' . $summonerId;
echo '<br/>Ime: ' . $object[$key]['name'];
echo '<br/>Razina: ' . $object[$key]['summonerLevel'];


$res = file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v2.2/matchhistory/' . $summonerId . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');
$object = json_decode($res, true);
//print_r($object);

echo '<br/>';
$wins = 0;
foreach($object['matches'] as $match) {
	echo 'Šifra: ' . $match['matchId'] . '<br/>';
	$win = intval($match['participants'][0]['stats']['winner']);
	echo 'Pobjeda: ' . $win . '<br/>';
	if ($win) $wins++;
}

echo 'Postotak pobjeda: ' . intval(($wins / 10)*100);

?>