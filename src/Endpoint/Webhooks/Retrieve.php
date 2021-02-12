<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

use FernleafSystems\ApiWrappers\Calendly\Endpoint\Common;

class Retrieve extends Base {

	use Common\SingleResourceUuid;

	public function retrieve() :WebhookSubscriptionVO {
		return $this->sendRequestWithVoResponse();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/%s/%s', static::API_URL_STUB, $this->getUUID() );
	}
}