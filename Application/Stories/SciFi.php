<?php

namespace App\Stories;

class SciFi extends StoryTemplate
{
    function category(): string
    {
        return 'Ciencia ficción';
    }

    function options(): array
    {
        return [
            1 => 'Extraterrestres',
            2 => 'Mundos misteriosos',
            3 => 'Magia',
            4 => 'Viajes en el tiempo',
        ];
    }

    function process(): void
    {

    }
}
