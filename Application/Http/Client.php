<?php

namespace Application\Http;

class Client
{
    /**
     * Send GET request.
     *
     * @param  string  $url
     * @throws \Exception
     * @return array
     */
    public function get(string $url): array
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        if ($response === false) {
            throw new \Exception("Error sending GET request to ".$url);
        }

        curl_close($ch);
        return json_decode($response, true);
    }

    /**
     * Send post request.
     *
     * @param  string  $url
     * @param  array  $body
     * @param  array  $headers
     * @throws \Exception
     * @return mixed
     */
    public function post(string $url, array $body = [], array $headers = [])
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($body));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $response = curl_exec($ch);
        if ($response === false) {
            $error = curl_error($ch);
            curl_close($ch);
            throw new \Exception("Error sending POST request to ".$url);
        }
        curl_close($ch);
        return json_decode($response, true);
    }
}
