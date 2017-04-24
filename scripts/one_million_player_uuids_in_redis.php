<?php
$redis = new \Redis();
$redis->connect('127.0.0.1',6379);
$redis->flushAll();

for ($i = 1; $i <= 1000000; $i++) {
    $uuid = uuid_create();
    $key = "player.$uuid.data";
    $value = "1";
    $redis->set($key, $value);
}

$keysPlayerData = [];

$keysPlayerData = $redis->keys('player.*.data');

foreach($keysPlayerData as $key => $val) {
    echo (crc32($val) % 256)."\n";
}
