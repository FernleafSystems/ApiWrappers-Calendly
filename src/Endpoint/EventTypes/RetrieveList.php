<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * TODO
 * Class RetrieveList
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes
 */
class RetrieveList extends \FernleafSystems\ApiWrappers\Calendly\Api {

	public function retrieve() :BaseVO {
		return $this->sendRequestWithVoResponse();
	}

	public function setCount( int $count ) :self {
		return $this->setRequestQueryDataItem( 'count', $count );
	}

	public function setOrg( string $orgURI ) :self {
		return $this->setRequestQueryDataItem( 'origanization', $orgURI );
	}

	public function setSortBy( string $sortBy ) :self {
		return $this->setRequestQueryDataItem( 'sort', $sortBy );
	}

	public function setUser( string $userURI ) :self {
		return $this->setRequestQueryDataItem( 'user', $userURI );
	}

	protected function getUrlEndpoint() :string {
		return '/event_types';
	}

	protected function getResponseDataPayloadKey() :string {
		return 'collection';
	}
}