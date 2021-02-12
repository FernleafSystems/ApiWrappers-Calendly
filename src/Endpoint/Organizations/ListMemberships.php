<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Organizations;

use FernleafSystems\ApiWrappers\Base\BaseVO;

class ListMemberships extends Base {

	/**
	 * @return BaseVO[]
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
		return $this->setRequestQueryDataItem( self::SCOPE_ORGANIZATION, $orgURI );
	}

	public function setUser( string $userURI ) :self {
		return $this->setRequestQueryDataItem( self::SCOPE_USER, $userURI );
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/%s', static::API_URL_STUB );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'collection';
	}
}