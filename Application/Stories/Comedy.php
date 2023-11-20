<?php

namespace App\Stories;

class Comedy extends StoryTemplate
{
    function category(): string
    {
        return "Comedia";
    }

    function options(): array
    {
        return [
        ];
    }

    function process(): void
    {
        // TODO: Implement process() method.
    }
}
