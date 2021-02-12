<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

class Base extends \FernleafSystems\ApiWrappers\Calendly\Api {

	protected const API_URL_STUB = 'webhook_subscriptions';

	protected function getVO() {
		return new WebhookVO();
	}
}