<?php

namespace subzeta\Glosbe\Message;

class Response
{
    /**
     * @var Response
     */
    protected $response;

    /**
     * @desc constructor
     * @param string $response
     */
    public function __construct($response)
    {
        $this->response = $response;
    }
}