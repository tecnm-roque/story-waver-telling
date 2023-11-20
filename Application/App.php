<?php

namespace App;

use App\Stories\Adventure;
use App\Stories\Comedy;
use App\Stories\Fantasy;
use App\Stories\History;
use App\Stories\Horror;
use App\Stories\Mystery;
use App\Stories\Parody;
use App\Stories\Realistic;
use App\Stories\Romance;
use App\Stories\SciFi;
use App\Stories\Western;

class App
{

    private const AVAILABLE_STORIES = [
        1  => Adventure::class,
        2  => Comedy::class,
        3  => Fantasy::class,
        4  => History::class,
        5  => Horror::class,
        6  => Mystery::class,
        7  => Parody::class,
        8  => Realistic::class,
        9  => Romance::class,
        10 => SciFi::class,
        11 => Western::class,
    ];

    public function run(): void
    {
        echo "_____________________________________________________________________________\n";
        echo "Historias disponibles\n";
        foreach (self::AVAILABLE_STORIES as $key => $storyClass) {
            $instance = new $storyClass();
            echo $key.": ".$instance->category();
            echo "\n";
        }
        echo "\n";
        $input = readline("Selecciona el tipo de historia que quieres crear: ");
        if (! array_key_exists($input, self::AVAILABLE_STORIES)) {
            echo "Opción inválida\n\n\n";
            $this->run();
        }

        $storyType = self::AVAILABLE_STORIES[$input];
        $storyInstance = new $storyType();
        $storyInstance->process();
    }

}
