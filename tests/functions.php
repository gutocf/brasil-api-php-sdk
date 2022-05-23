<?php

/**
 * @return array<mixed>
 */
function loadFixture(string $path): array
{
    $filename = __DIR__ . '/Fixture/' . $path . '.json';
    $contents = file_get_contents($filename);
    if ($contents === false) {
        return [];
    }
    $data = json_decode($contents, true);

    return $data;
}
function pr(mixed $var): void
{
    print_r($var);
    echo "\n";
}

function prd(mixed $var): void
{
    print_r($var);
    die();
}
