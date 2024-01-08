<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseYaml($fileName)
{
    $value = Yaml::parseFile(__DIR__ . "tests/fixtures/" . $fileName);
    return $value;
}






