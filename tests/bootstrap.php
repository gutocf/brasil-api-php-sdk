<?php

require dirname(__DIR__) . '/vendor/autoload.php';

function loadFixture(string $path): array
{
    $filename = __DIR__ . '/Fixture/' . $path;

    return json_decode(file_get_contents($filename), true);
}
