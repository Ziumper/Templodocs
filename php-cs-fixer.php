<?php

use PhpCsFixer\Config;
use PhpCsFixer\Finder;

$finder = Finder::create();
$finder->exclude('*');

return (new Config())
    ->setRules([
        '@PSR12' => true,          
        'array_syntax' => ['syntax' => 'short'],
        'no_unused_imports' => true, 
        'ordered_imports' => true,
    ])
    ->setFinder($finder);
