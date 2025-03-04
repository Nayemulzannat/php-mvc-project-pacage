<?php

use Illuminate\Filesystem\Filesystem;
use Illuminate\Events\Dispatcher;
use Illuminate\View\FileViewFinder;
use Illuminate\View\Factory;
use Illuminate\View\Engines\EngineResolver;
use Illuminate\View\Engines\CompilerEngine;
use Illuminate\View\Compilers\BladeCompiler;

$viewsPath = __DIR__ . '/../resources/views'; 
$cachePath = __DIR__ . '/../storage/cache';

### Create Filesystem instance
$filesystem = new Filesystem();

### Blade Compiler
$bladeCompiler = new BladeCompiler($filesystem, $cachePath);

### Engine Resolver
$resolver = new EngineResolver();
$resolver->register('blade', function () use ($bladeCompiler) {
    return new CompilerEngine($bladeCompiler);
});

### View Finder
$viewFinder = new FileViewFinder($filesystem, [$viewsPath]);

### View Factory
$blade = new Factory($resolver, $viewFinder, new Dispatcher());

return $blade;
