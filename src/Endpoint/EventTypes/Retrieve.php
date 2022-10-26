<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common;

class Retrieve extends Base {

	use Common\SingleResourceUuid;

	public function retrieve() :EventTypeVO {
		return $this->sendRequestWithVoResponse();
	}

	protected function getVO() :EventTypeVO {
		return new EventTypeVO();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/event_types/%s', $this->getUUID() );
	}
}