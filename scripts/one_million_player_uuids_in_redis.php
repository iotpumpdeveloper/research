<?php
$redis = new \Redis();
$redis->connect('127.0.0.1',6379);

for ($i = 1; $i <= 1000000; $i++) {
    $uuid = uuid_create();
    $key = "player.$uuid.data";
    $value = "1";
    $redis->set($key, $value);
}
