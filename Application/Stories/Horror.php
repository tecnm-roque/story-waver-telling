<?php

namespace App\Stories;

class Horror extends StoryTemplate
{
    function category(): string
    {
        return "Terror";
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
