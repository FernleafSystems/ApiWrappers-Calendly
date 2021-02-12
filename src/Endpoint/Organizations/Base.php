<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Organizations;

class Base extends \FernleafSystems\ApiWrappers\Calendly\Api {

	protected const API_URL_STUB = 'organization_memberships';

	protected function getVO() {
		return new OrganizationVO();
	}
}