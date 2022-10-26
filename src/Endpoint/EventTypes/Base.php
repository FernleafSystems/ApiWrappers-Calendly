<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\EventTypes;

class Base extends \FernleafSystems\ApiWrappers\Calendly\Api {

	protected function getVO() :EventTypeVO {
		return new EventTypeVO();
	}
}