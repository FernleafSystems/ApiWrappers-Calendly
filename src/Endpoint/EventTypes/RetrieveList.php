<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes;

class RetrieveList extends Base {

	/**
	 * @return EventTypeVO[]
	 */
	public function retrieve() :?array {
		$data = $this->req()->getCoreResponseData();
		if ( !empty( $data ) ) {
			$data = array_map(
				fn( $item ) => $this->getVO()->applyFromArray( $item ),
				$data
			);
		}
		return $data;
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