<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Users;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * Class Retrieve
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoing\Users
 */
class Retrieve extends \FernleafSystems\ApiWrappers\Calendly\Api {

	public function retrieveMe() :BaseVO {
		return $this->setUserID( 'me' )->sendRequestWithVoResponse();
	}

	public function retrieve() :BaseVO {
		return $this->sendRequestWithVoResponse();
	}

	public function setUserID( string $ID ) :self {
		return $this->setRequestDataItem( 'uuid', $ID );
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/users/%s', $this->getRequestDataItem( 'uuid' ) );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'resource';
	}

	/**
	 * @return string[]
	 */
	protected function getCriticalRequestItems() {
		return [ 'uuid' ];
	}
}