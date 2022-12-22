<?php

include 'autoloader.php';

function classDoesNotEndsWithPrefixTest($file)
{
    return substr($file->getFilename(), -8) !== 'Test.php';
}

function methodDoesNotEndsWithPrefixTest($method)
{
    return substr($method, -4) !== 'Test';
}

function executeAllPublicMethods($file)
{
    $className = substr($file->getFilename(), 0, -4);
    $testClass = new $className();
    $classMethods = get_class_methods($testClass);

    foreach ($classMethods as $method) {

        if (methodDoesNotEndsWithPrefixTest($method)) {
            continue;
        }

        $testClass->$method();
    }
}

foreach (new DirectoryIterator(__DIR__) as $file) {

    if (classDoesNotEndsWithPrefixTest($file)) {
        continue;
    }

    executeAllPublicMethods($file);
}
