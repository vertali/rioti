<?php
include './riot_db.php';

if (!isset($_POST['name'])) {
    echo "Niste unijeli naziv summonera!";
    exit;
}

$server = strtolower($_POST['server']);
$summoner = $_POST['name'];

$checkSummoner = DB::checkSummoner($summoner, $server);
if (!$checkSummoner) {
    $res = @file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v1.4/summoner/by-name/' . rawurlencode($summoner) . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');

    if ($res === false) {
        echo 'Nepoznati summoner!';
        exit;
    }

    $object = json_decode($res, true);
    //print_r($object);

    $key = strtolower(str_replace(' ', '', $summoner));
    $summonerId = $object[$key]['id'];
    $summonerName = $object[$key]['name'];
    $summonerLevel = $object[$key]['summonerLevel'];

    DB::saveSummoner($summonerId, $summonerName, $summonerLevel, $server);
} else {
    $summonerId = $checkSummoner['id'];
    $summonerName = $checkSummoner['name'];
    $summonerLevel = $checkSummoner['level'];
}

echo 'Šifra: ' . $summonerId;
echo '<br/>Ime: ' . $summonerName;
echo '<br/>Razina: ' . $summonerLevel;

$res = file_get_contents('https://eune.api.pvp.net/api/lol/' . $server . '/v2.2/matchhistory/' . $summonerId . '?api_key=19b900e1-ac45-40da-b253-119914b5c112');
$object = json_decode($res, true);
//print_r($object);

echo '<br/>';
$wins = 0;
foreach ($object['matches'] as $match) {
    echo 'Šifra: ' . $match['matchId'] . '<br/>';
    $win = intval($match['participants'][0]['stats']['winner']);
    echo 'Pobjeda: ' . $win . '<br/>';
    if ($win)
        $wins++;
}

echo 'Postotak pobjeda: ' . intval(($wins / 10) * 100);
?>