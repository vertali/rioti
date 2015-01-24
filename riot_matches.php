<?php

include './riot_db.php';

$server = 'eune';
$summoner_id = '21620473';

$res = file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v2.2/matchhistory/' . rawurlencode($summoner_id) . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');
$object = json_decode($res, true);


foreach ($object['matches'] as $match) {
	echo 'Vrijeme početka: ' . date('d.m.Y', substr($match['matchCreation'], 0, -3)) . '<br/>';
	
	$participant = $match['participants'];
	$championId = intval($participant[0]['championId']);
        
        $check = checkChampion($championId);
        $champion = '';
        if ($check) {
            $champion = $check['name'];
        } else {
            $res = file_get_contents('https://eune.api.pvp.net/api/lol/static-data/' . $server . '/v1.2/champion/' . $championId . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');
            $object = json_decode($res, true);
            $championName = $object['name'];
            $championTtle = $object['title'];
            saveChampion($championId, $championName, $championTtle);
            
            $champion = $championName;
        }

	echo 'Junak: ' . $champion;
	
	echo '<br/>';
}

?>




