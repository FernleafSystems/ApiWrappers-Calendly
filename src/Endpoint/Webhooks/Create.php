<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

class Create extends Base {

	const REQUEST_METHOD = 'post';

	public function create() :WebhookVO {
		return $this->sendRequestWithVoResponse();
	}

	public function setCallbackUrl( string $url ) :self {
		return $this->setRequestDataItem( 'url', $url );
	}

	public function setEvents( array $events = [ 'invitee.created', 'invitee.canceled' ] ) :self {
		return $this->setRequestDataItem( 'events', $events );
	}

	public function setScope( string $scope ) :self {
		return $this->setRequestDataItem( 'scope', $scope );
	}

	public function setOrg( string $orgURI ) :self {
		return $this->setRequestDataItem( self::SCOPE_ORGANIZATION, $orgURI )
					->setScope( self::SCOPE_ORGANIZATION );
	}

	public function setUser( string $userURI ) :self {
		return $this->setRequestDataItem( self::SCOPE_USER, $userURI )
					->setScope( self::SCOPE_USER );
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/%s', static::API_URL_STUB );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'resource';
	}

	/**
	 * @inheritDoc
	 */
	protected function getCriticalRequestItems() {
		return [ 'url', 'events', 'scope' ];
	}
}