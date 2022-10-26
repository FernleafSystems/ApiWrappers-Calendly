<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\OAuth\Provider;

use League\OAuth2\Client\Provider\ResourceOwnerInterface;

/**
 * Represents a generic resource owner for use with the GenericProvider.
 */
class CalendlyResourceOwner implements ResourceOwnerInterface {

	protected array $response;

	/**
	 * @var string
	 */
	protected $resourceOwnerId;

	/**
	 * @param array  $response
	 * @param string $resourceOwnerId
	 */
	public function __construct( array $response, $resourceOwnerId ) {
		$this->response = $response;
		$this->resourceOwnerId = $resourceOwnerId;
	}

	/**
	 * Returns the identifier of the authorized resource owner.
	 *
	 * @return mixed
	 */
	public function getId() {
		return $this->response[ $this->resourceOwnerId ];
	}

	/**
	 * Returns the raw resource owner response.
	 *
	 * @return array
	 */
	public function toArray() {
		return $this->response;
	}
}
