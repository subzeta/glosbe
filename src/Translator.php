<?php

namespace subzeta\Glosbe;

use subzeta\Glosbe\Message\GetTranslationRequest;

class Translator
{
	/**
	 * @param string $text
     * @param string $from
     * @param string $to
     *
	 * @return GetTranslationRequest
	 */
	public function translate($text, $from, $to)
    {
        return new GetTranslationRequest($text, $from, $to);
	}
}
