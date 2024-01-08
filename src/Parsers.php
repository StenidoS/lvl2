<?php

namespace Differ\Parsers;

use Symfony\Component\Yaml\Yaml;

function parseYaml($fileName)
{
    $value = Yaml::parseFile("/home/stenido/MyProjects/lvl2.2/tests/fixtures/" . $fileName);
    return $value;
}






