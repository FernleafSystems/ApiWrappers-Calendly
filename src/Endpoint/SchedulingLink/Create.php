<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\SchedulingLink;

class Create extends \FernleafSystems\ApiWrappers\Calendly\Api {

	const REQUEST_METHOD = 'post';

	public function create() :SchedulingLinkVO {
		return $this->sendRequestWithVoResponse();
	}

	protected function getVO() {
		return new SchedulingLinkVO();
	}

	public function setOwner( string $uri, string $type = 'EventType' ) :self {
		return $this->setRequestDataItem( 'owner', $uri )
					->setOwnerType( $type );
	}

	public function setMaxEvents( int $max = 1 ) :self {
		return $this->setRequestDataItem( 'max_event_count', $max );
	}

	public function setOwnerType( string $type = 'EventType' ) :self {
		return $this->setRequestDataItem( 'owner_type', $type );
	}

	protected function getUrlEndpoint() :string {
		return '/scheduling_links';
	}

	protected function getResponseDataPayloadKey() :string {
		return 'resource';
	}

	/**
	 * @inheritDoc
	 */
	protected function getCriticalRequestItems() {
		return [ 'owner', 'owner_type', 'max_event_count' ];
	}
}