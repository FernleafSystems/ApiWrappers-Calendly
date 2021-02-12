<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\ScheduledEvents;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common;

class Retrieve extends \FernleafSystems\ApiWrappers\Calendly\Api {

	use Common\SingleResourceUuid;

	public function retrieve() :ScheduledEventVO {
		return $this->sendRequestWithVoResponse();
	}

	protected function getVO() {
		return new ScheduledEventVO;
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/scheduled_events/%s', $this->getUUID() );
	}
}