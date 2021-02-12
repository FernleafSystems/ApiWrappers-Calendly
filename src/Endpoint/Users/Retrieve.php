<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Users;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common\SingleResourceRetrieve;

class Retrieve extends \FernleafSystems\ApiWrappers\Calendly\Api {

	use SingleResourceRetrieve;

	protected function getVO() {
		return new UserVO();
	}

	public function retrieveMe() :UserVO {
		return $this->setUniqueID( 'me' )->sendRequestWithVoResponse();
	}

	public function retrieve() :UserVO {
		return $this->sendRequestWithVoResponse();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/users/%s', $this->getRequestDataItem( 'uuid' ) );
	}
}