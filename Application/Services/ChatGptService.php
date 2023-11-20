<?php

namespace App\Services;

use Application\Http\Client;
use Exception;

final class ChatGptService
{
    private static ?ChatGptService $instance = null;
    private const ENDPOINT = 'https://api.openai.com/v1/chat/completions';

    private array $conversation = [];

    /**
     * Create a new ChatGptService instance.
     *
     * @return ChatGptService
     */
    public static function getInstance(): ChatGptService
    {
        if (! self::$instance instanceof self) {
            self::$instance = new self();
            self::$instance->train();
        }

        return self::$instance;
    }

    /**
     * Send conversation to ChatGPT and get the last item of the conversation array.
     * @throws Exception
     * @return string
     */
    public function sendConversation(): string
    {
        $this->getResponse();
        return $this->conversation[array_key_last($this->conversation)]['content'];
    }

    /**
     * Setup the model.
     *
     * @return void
     */
    private function train(): void
    {
        $data = [
            [
                'role'    => 'system',
                'content' => 'Eres un asistente que tiene que ayudar a la idealización de cuentos de vacilación'
            ],
        ];

        $this->conversation = $data;
    }

    /**
     * Get the current conversation.
     *
     * @return array
     */
    public function getConversation(): array
    {
        return $this->conversation;
    }

    public function printConversation(): void
    {
        foreach ($this->conversation as $key => $conversation) {
            echo "\n".$conversation['content']."\n";
        }
    }

    /**
     * Add message to conversation.
     *
     * @param  string  $message
     * @param  string  $role
     */
    public function addMessageToConversation(string $message, string $role = 'user')
    {
        $this->conversation[] = ['role' => $role, 'content' => $message];
    }

    /**
     * Send the conversation to ChatGPT api and get the response.
     *
     * @throws Exception
     * @return array
     */
    private function getResponse(): array
    {
        $yourApiKey = 'your-api-key';
        $client = new Client();
        $headers = [
            'Content-Type: application/json',
            'Authorization: Bearer '.$yourApiKey,
        ];
        $response = $client->post(self::ENDPOINT, ['model' => 'gpt-3.5-turbo', 'messages' => $this->conversation],
            $headers);

        $choices = $response['choices'] ?? [];

        foreach ($choices as $choice) {
            $this->addMessageToConversation($choice['message']['content'], $choice['message']['role']);
        }

        return $response;
    }
}
