<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Users;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common\SingleResourceUuid;

class Retrieve extends \FernleafSystems\ApiWrappers\Calendly\Api {

	use SingleResourceUuid;

	protected function getVO() :UserVO {
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