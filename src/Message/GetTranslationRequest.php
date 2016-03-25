<?php

namespace subzeta\Glosbe\Message;

class GetTranslationRequest extends Request
{
    /**
     * @var string
     */
    private $text;

    /**
     * @var string
     */
    private $from;

    /**
     * @var string|string[]
     */
    private $to;

    /**
     * @var bool
     */
    private $includeExamples = false;

    /**
     * @param string $text
     * @param string $from
     * @param string $to
     */
    public function __construct($text, $from, $to)
    {
        $this->text = $text;
        $this->from = $from;
        $this->to = $to;
    }

    /**
     * @inheritdoc
     */
    protected function build()
    {
        return sprintf('%s/translate?from=%s&dest=%s&phrase=%s&format=%s&tm=%s',
            $this->endpoint,
            $this->from,
            $this->to,
            urlencode(trim($this->text)),
            'json',
            $this->includeExamples
        );
    }

    /**
     * @inheritdoc
     */
    protected function response($output)
    {
        return new GetTranslationResponse($output);
    }

    /**
     * @return self
     */
    public function includingExamples()
    {
        $this->includeExamples = true;

        return $this;
    }
}