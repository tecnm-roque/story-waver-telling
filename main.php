<?php
include_once 'Application/App.php';
include_once 'Application/Http/Client.php';
include_once 'Application/Services/ChatGptService.php';
include_once 'Application/Stories/StoryTemplate.php';
include_once 'Application/Stories/Adventure.php';
include_once 'Application/Stories/Comedy.php';
include_once 'Application/Stories/Fantasy.php';
include_once 'Application/Stories/History.php';
include_once 'Application/Stories/Horror.php';
include_once 'Application/Stories/Realistic.php';
include_once 'Application/Stories/Romance.php';
include_once 'Application/Stories/SciFi.php';
include_once 'Application/Stories/Western.php';
include_once 'Application/Stories/Mystery.php';
include_once 'Application/Stories/Parody.php';


$instance = new \App\App();
$instance->run();
