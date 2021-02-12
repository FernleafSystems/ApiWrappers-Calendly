<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common;

class Delete extends Base {

	const REQUEST_METHOD = 'delete';
	use Common\SingleResourceUuid;

	public function delete() :bool {
		return $this->req()->isLastRequestSuccess();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/%s/%s', static::API_URL_STUB, $this->getUUID() );
	}
}