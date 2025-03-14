<?php

namespace Neoncitylights\DataUrl;

use Neoncitylights\MediaType\MediaType;
use function base64_decode;
use function sprintf;

/**
 * @see https://tools.ietf.org/html/rfc2397
 * @license MIT
 */
class DataUrl {
	private MediaType $mediaType;
	private string $data;

	public function __construct( MediaType $mediaType, string $data ) {
		$this->mediaType = $mediaType;
		$this->data = $data;
	}

	/**
	 * Gets the media type of the encoded base64 string.
	 */
	public function getMediaType(): MediaType {
		return $this->mediaType;
	}

	/**
	 * Gets the original, encoded base64 string.
	 */
	public function getData(): string {
		return $this->data;
	}

	/**
	 * Gets a decoded value of the base64 string.
	 */
	public function getDecodedValue(): string {
		return base64_decode( $this->data );
	}

	/**
	 * Returns a data URL compliant with RFC 2397.
	 */
	public function __toString(): string {
		return sprintf(
			'%s%s%s%s%s',
			Token::UriScheme->value,
			(string)$this->mediaType,
			Token::Base64Ext->value,
			Token::Comma->value,
			$this->data
		);
	}
}
