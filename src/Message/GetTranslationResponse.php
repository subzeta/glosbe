<?php

namespace subzeta\Glosbe\Message;

class GetTranslationResponse extends Response
{
    /**
     * @var string[]
     */
    private $translations = [];

    /**
     * @var string[]
     */
    private $meanings = [];

    /**
     * @var string[]
     */
    private $examples = [];

    /**
     * @param string $response
     */
    public function __construct($response)
    {
        parent::__construct($response);

        $this->response = json_decode($this->response);
        $this->build();
    }

    /**
     * @return bool
     */
    public function hasTranslations()
    {
        return count($this->translations) > 0;
    }

    /**
     * @return string[]
     */
    public function translations()
    {
        return $this->translations;
    }

    /**
     * @return bool
     */
    public function hasMeanings()
    {
        return count($this->meanings) > 0;
    }

    /**
     * @return string[]
     */
    public function meanings()
    {
        return $this->meanings;
    }

    /**
     * @return bool
     */
    public function hasExamples()
    {
        return count($this->examples) > 0;
    }

    /**
     * @return string[]
     */
    public function examples()
    {
        return $this->examples;
    }

    /**
     * @desc builds the response
     */
    private function build()
    {
        if (isset($this->response->tuc)) {
            foreach ($this->response->tuc as $translation) {
                if (isset($translation->phrase)) {
                    $this->translations[] = $this->sanitize($translation->phrase->text);
                }
                if (isset($translation->meanings)) {
                    foreach ($translation->meanings as $meaning) {
                        $this->meanings[] = $this->sanitize($meaning->text);
                    }
                }
            }
        }

        if (isset($this->response->examples)) {
            foreach ($this->response->examples as $example) {
                $this->examples[] = $this->sanitize($example->second);
            }
        }
    }

    /**
     * @param string $text
     *
     * @return string
     */
    private function sanitize($text)
    {
        return strip_tags(utf8_decode($text));
    }
}