<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

class RetrieveList extends Base {

	/**
	 * @return WebhookSubscriptionVO[]
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

	public function setScope( string $scope ) :self {
		return $this->setRequestQueryDataItem( 'scope', $scope );
	}

	public function setUser( string $userURI ) :self {
		return $this->setRequestQueryDataItem( self::SCOPE_USER, $userURI );
	}

	public function setOrg( string $orgURI ) :self {
		return $this->setRequestQueryDataItem( self::SCOPE_ORGANIZATION, $orgURI );
	}

	public function setSortBy( string $sortBy ) :self {
		return $this->setRequestQueryDataItem( 'sort', $sortBy );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'collection';
	}
}