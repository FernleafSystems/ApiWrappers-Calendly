<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\OAuth\Provider;

use FernleafSystems\ApiWrappers\Calendly\OAuth\Provider\Exception\CalendlyProviderException;
use League\OAuth2\Client\Provider\AbstractProvider;
use League\OAuth2\Client\Token\AccessToken;
use League\OAuth2\Client\Tool\BearerAuthorizationTrait;
use Psr\Http\Message\ResponseInterface;

class Calendly extends AbstractProvider {

	use BearerAuthorizationTrait;

	public const BASE_CALENDLY_URL = 'https://auth.calendly.com';
	public const BASE_CALENDLY_API_URL = 'https://api.calendly.com';
	public const CALENDLY_API_VERSION = 2;

	/**
	 * @inheritdoc
	 */
	public function getBaseAuthorizationUrl() {
		return static::BASE_CALENDLY_URL.'/oauth/authorize';
	}

	/**
	 * @inheritdoc
	 */
	public function getBaseAccessTokenUrl( array $params ) {
		return self::BASE_CALENDLY_URL.'/oauth/token';
	}

	/**
	 * @inheritdoc
	 */
	public function getResourceOwnerDetailsUrl( AccessToken $token ) {
		return $this->getApiUrl().'/users/me';
	}

	public function getApiUrl() :string {
		return static::BASE_CALENDLY_API_URL;
	}

	/**
	 * @inheritdoc
	 */
	protected function getDefaultScopes() {
		return [];
	}

	protected function getDefaultHeaders() {
		return [
			'content-type' => 'application/x-www-form-urlencoded'
		];
	}

	/**
	 * @inheritdoc
	 */
	protected function checkResponse( ResponseInterface $response, $data ) {
		if ( $response->getStatusCode() >= 400 ) {
			throw new CalendlyProviderException(
				$data[ 'error' ],
				isset( $data[ 'code' ] ) ? (int)$data[ 'code' ] : $response->getStatusCode(),
				$response
			);
		}
	}

	/**
	 * @inheritdoc
	 */
	protected function createResourceOwner( array $response, AccessToken $token ) {
		return new CalendlyResourceOwner( $response, 'uri' );
	}
}
