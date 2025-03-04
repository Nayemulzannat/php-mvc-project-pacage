<?php

namespace App\Core;

class Controller
{
    protected $blade;

    public function __construct()
    {
        $this->blade = require __DIR__ . '/../../config/blade.php'; // Blade লোড করা
    }

    protected function render(string $view, array $data = [])
    {
          // FIX: Remove the slash or dot from the beginning of $view
        //   $view = ltrim($view, '/.'); 
        echo $this->blade->make($view, $data)->render();
    }
}
