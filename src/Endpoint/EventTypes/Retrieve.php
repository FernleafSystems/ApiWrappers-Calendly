<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoing\Users
 */
class Retrieve extends \FernleafSystems\ApiWrappers\Calendly\Api {

	public function retrieve() :EventTypeVO {
		return $this->sendRequestWithVoResponse();
	}

	public function setEventTypeID( string $ID ) :self {
		return $this->setRequestQueryDataItem( 'uuid', $ID );
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/event_types/%s', $this->getRequestDataItem( 'uuid' ) );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'resource';
	}

	/**
	 * @inheritDoc
	 */
	protected function getCriticalRequestItems() {
		return [ 'uuid' ];
	}
}