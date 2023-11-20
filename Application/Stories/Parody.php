<?php

namespace App\Stories;

use App\Services\ChatGptService;

class Parody extends StoryTemplate
{
    function category(): string
    {
        return "Pariodia";
    }

    function options(): array
    {
        return [
            1 => "Rey león",
            2 => "Buscando a Nemo",
            3 => "Aladdin",
            4 => "Blanca Nieves",
            5 => "Toy story",
        ];
    }

    function process(): void
    {
        $service = ChatGptService::getInstance();
        echo "¿De qué quieres crear una parodia?: \n";
        foreach ($this->options() as $key => $option) {
            echo $key." -> ".$option."\n";
        }

        $option = readline('Selecciona una opción: ');

        if (! array_key_exists($option, $this->options(),)) {
            echo "Opción inválida\n\n\n";
            $this->process();
        }

        $service->addMessageToConversation('Crea la introducción para una parodia del cuento '.self::options()[$option]);

        $storyStructure = [
            1 => 'Conflicto',
            2 => 'Giro dramático',
            3 => 'Climax',
            4 => 'Midpoint'
        ];
        echo "Selecciona un giro para añadir a la historia  \n";
        foreach ($storyStructure as $key => $option) {
            echo $key." -> ".$option."\n";
        }

        $option = readline('Selecciona una opción: ');
        $service->addMessageToConversation('Añade un '.$storyStructure[$option].' a la historia');


        $storyEnd = [
            1 => 'Feliz',
            2 => 'Infeliz',
            3 => 'Confuso',
            4 => 'Dramático'
        ];
        echo "Tipo de final:  \n";
        foreach ($storyEnd as $key => $option) {
            echo $key." -> ".$option."\n";
        }

        $option = readline('Selecciona una opción: ');
        $service->addMessageToConversation('Termina la historia con un final '.$storyEnd[$option].'.');

        echo "Esta es tu historia: \n\n\n".$service->sendConversation();
    }
}
