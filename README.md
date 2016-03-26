Glosbe API wrapper
====================

Translate from any language to any language using the free and awesome Glosbe API service.
See: https://glosbe.com/

## Usage

### Installation 

```
composer require subzeta/glosbe
```

### Translate

```php 
<?php 

use subzeta\Glosbe\Translator;

$response = (new Translator())->translate('music', 'eng', 'spa')->send();
var_dump($response->translations());
var_dump($response->meanings());
```

## Options

### Including examples in the response

Looking for examples? Just request it before sending the request.

```php
<?php 

use subzeta\Glosbe\Translator;

$response = (new Translator())->translate('music', 'eng', 'spa')->includingExamples()->send();
var_dump($response->translations());
var_dump($response->meanings());
var_dump($response->examples());
```

## Notes

* Languages should be provided in the ISO 639-3 code format. See: https://en.wikipedia.org/wiki/List_of_ISO_639-3_codes
* Library works internally with json for the output format.

## To do

* Detect a bad formatted language ISO code (specially ISO 639-1) and translate to its 639-3 equivalent. As Glosbe points out, the API may understand a two letter code but it's better to provide it as the API expects it.  
* Support for multi-translations (more than one text) and more than one translatable-language (more than one "to"). By now Glosbe doesn't support it.
* Add the addTranslation method, request and response.
* Limit the number of translations on response build (an option for that would be nice).
 
## License

MIT