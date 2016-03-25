<?php

namespace subzeta\Glosbe\Test;

use subzeta\Glosbe\Translator;

class TranslatorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var Translator
     */
    private $translator;

    /**
     * @inheritdoc
     */
    public function setUp()
    {
        $this->translator = new Translator();
    }

    /**
     * @test
     */
    public function translateShouldReturnAnInstanceOfGetTranslationRequest()
    {
        $this->assertInstanceOf(
            'subzeta\Glosbe\Message\GetTranslationRequest',
            $this->translator->translate('translate this', 'en', 'es')
        );
    }

    /**
     * @test
     */
    public function translateShouldReturnAResponseInstanceIfISendIt()
    {
        $this->assertInstanceOf(
            'subzeta\Glosbe\Message\GetTranslationResponse',
            $this->translator->translate('translate this', 'en', 'es')->send()
        );
    }

    /**
     * @test
     */
    public function translationsShouldReturnAnEmptyArrayOfTranslationsForAnUntranslatableWord()
    {
        $this->assertEmpty($this->translator->translate('thisisuntranslatable', 'en', 'es')->send()->translations());
    }

    /**
     * @test
     */
    public function hasTranslationsShouldReturnFalseWhenItHasntTranslations()
    {
        $this->assertFalse($this->translator->translate('thisisuntranslatable', 'en', 'es')->send()->hasTranslations());
    }

    /**
     * @test
     */
    public function meaningsShouldReturnAnEmptyArrayOfMeaningsForAnUntranslatableWord()
    {
        $this->assertEmpty($this->translator->translate('thisisuntranslatable', 'en', 'es')->send()->meanings());
    }

    /**
     * @test
     */
    public function hasMeaningsShouldReturnFalseWhenItHasntMeanings()
    {
        $this->assertFalse($this->translator->translate('thisisuntranslatable', 'en', 'es')->send()->hasMeanings());
    }

    /**
     * @test
     */
    public function examplesShouldReturnAnEmptyArrayOfExamplesIfIRequestItAndItHasntExamples()
    {
        $this->assertEmpty(
            $this->translator->translate('thisisuntranslatable', 'en', 'es')->includingExamples()->send()->examples()
        );
    }

    /**
     * @test
     */
    public function hasExamplesShouldReturnFalseIfIRequestItAndItHasntExamples()
    {
        $this->assertFalse(
            $this->translator->translate('thisisuntranslatable', 'en', 'es')->includingExamples()->send()->hasExamples()
        );
    }

    /**
     * @test
     */
    public function translationsShouldReturnAnArrayOfTranslationsForATranslatableWord()
    {
        $this->assertNotEmpty($this->translator->translate('how are you', 'en', 'es')->send()->translations());
    }

    /**
     * @test
     */
    public function hasTranslationsShouldReturnTrueWhenItHasTranslations()
    {
        $this->assertTrue($this->translator->translate('how are you', 'en', 'es')->send()->hasTranslations());
    }

    /**
     * @test
     */
    public function meaningsShouldReturnAnArrayOfMeaningsForATranslatableWord()
    {
        $this->assertNotEmpty($this->translator->translate('how are you', 'en', 'es')->send()->meanings());
    }

    /**
     * @test
     */
    public function hasMeaningsShouldReturnTrueForATranslatableWordWhenItHasMeanings()
    {
        $this->assertTrue($this->translator->translate('how are you', 'en', 'es')->send()->hasMeanings());
    }

    /**
     * @test
     */
    public function examplesShouldReturnAnArrayOfExamplesIfIRequestItAndItHasExamples()
    {
        $this->assertNotEmpty(
            $this->translator->translate('how are you', 'en', 'es')->includingExamples()->send()->examples()
        );
    }

    /**
     * @test
     */
    public function hasExamplesShouldReturnTrueIfIRequestItAndItHasExamples()
    {
        $this->assertTrue(
            $this->translator->translate('how are you', 'en', 'es')->includingExamples()->send()->hasExamples()
        );
    }

    /**
     * @test
     */
    public function examplesShouldReturnAnEmptyArrayIfIDontRequestIt()
    {
        $this->assertEmpty($this->translator->translate('how are you', 'en', 'es')->send()->examples());
    }

    /**
     * @test
     */
    public function hasExamplesShouldReturnFalseIfIDontRequestIt()
    {
        $this->assertFalse($this->translator->translate('how are you', 'en', 'es')->send()->hasExamples());
    }
}