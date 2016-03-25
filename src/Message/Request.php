<?php

namespace subzeta\Glosbe\Message;

abstract class Request
{
    /**
     * @var string
     */
    protected $endpoint = 'https://glosbe.com/gapi';

    /**
     * @return string
     */
    abstract protected function build();

    /**
     * @param string $response
     *
     * @return Response|GetTranslationResponse
     */
    abstract protected function response($response);

    /**
     * @return Response|GetTranslationResponse
     */
    public function send()
    {
        $curl = curl_init($this->build());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($curl);

        return $this->response($response);
    }
}