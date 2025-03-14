# DataUrl
[![Packagist][packagist-badge]][packagist-url]
[![License][license-badge]][license-url]
[![Docs][docs-badge]][docs-url]
[![CI][ci-badge]][ci-url]
[![Code coverage][codecov-badge]][codecov-url]

[packagist-badge]: https://img.shields.io/packagist/v/neoncitylights/data-url?style=flat-square
[packagist-url]: https://packagist.org/packages/neoncitylights/data-url
[license-badge]: https://img.shields.io/badge/License-MIT-blue?style=flat-square
[license-url]: #license
[docs-badge]: https://img.shields.io/github/deployments/php-lights/data-url/github-pages?label=docs&style=flat-square
[docs-url]: https://php-lights.github.io/data-url/
[ci-badge]: https://img.shields.io/github/actions/workflow/status/php-lights/php-data-url/.github/workflows/php.yml?style=flat-square
[ci-url]: https://github.com/php-lights/php-data-url/actions/workflows/php.yml
[codecov-badge]: https://img.shields.io/codecov/c/github/php-lights/data-url?style=flat-square
[codecov-url]: https://app.codecov.io/gh/php-lights/data-url

A small PHP library for dealing with data URLs, which contain a media type and an encoded base64 string.

This library fully conforms to [RFC 2397](https://datatracker.ietf.org/doc/html/rfc2397).

## Install
This requires a minimum PHP version of v8.2.

```
composer require neoncitylights/data-url
```

## Usage
```php
<?php

use Neoncitylights\DataUrl\DataUrlParser;
use Neoncitylights\MediaType\MediaTypeParser;

$dataUrlParser = new DataUrlParser( new MediaTypeParser() );
$dataUrl = $dataUrlParser->parseOrNull( 'data:text/plain;base64,VGhlIGZpdmUgYm94aW5nIHdpemFyZHMganVtcCBxdWlja2x5Lg==' );

print( $dataUrl->getMediaType()->getEssence() );
// 'text/plain'

print( $dataUrl->getData() );
// `VGhlIGZpdmUgYm94aW5nIHdpemFyZHMganVtcCBxdWlja2x5Lg==`

print( $dataUrl->getDecodedValue() );
// 'The five boxing wizards jump quickly.'
```

## License
This software is licensed under the MIT license ([`LICENSE`](./LICENSE) or
<https://opensource.org/license/mit/>).

### Contribution
Unless you explicitly state otherwise, any contribution intentionally submitted
for inclusion in the work by you, as defined in the MIT license, shall be
licensed as above, without any additional terms or conditions.
