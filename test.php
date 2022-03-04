<?php

header('Content-type:text/json');

$host = $_GET['host'];
$port = $_GET['port'];

require_once '/data/data.php';

$json = array(
        'status' => 'OnLine',
        'platform' => $platform,
        'gametype' => $Info['GameType'],
        'motd' => array(
            'ingame' => $InfoPing['description'],
            'clean' => $clean_motd,
            'html' => closeTags($hostNameHtml)
        ),
        'host' => array(
            'host' => $host,
            'hostip' => $Info['HostIp'],
            'port' => $Info['HostPort']
        ),
        'players' => array(
            'max' => $Info['MaxPlayers'],
            'online' => $Info['Players'],
            'list' => $playerList
        ),
        'version' => array(
            'version' => $Info['Version'],
            'software' => $Info['Software']
        ),
        'Plugins' => $pluginList,
        'queryinfo' => array(
            'agreement' => 'Query',
            'processed' => $Timer
        )
    );
    echo json_encode($json, JSON_UNESCAPED_UNICODE|JSON_PRETTY_PRINT);
    ?>