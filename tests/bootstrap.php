<?php

require dirname(__DIR__) . '/vendor/autoload.php';

function loadFixture(string $path): array
{
    $filename = __DIR__ . '/Fixture/' . $path . '.json';

    return json_decode(file_get_contents($filename), true);
}

function pr($var)
{
    print_r($var);
    echo "\n";
}

function prd($var)
{
    print_r($var);
    die();
}
