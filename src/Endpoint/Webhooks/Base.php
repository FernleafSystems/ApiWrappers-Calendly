<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

class Base extends \FernleafSystems\ApiWrappers\Calendly\Api {

	protected const API_URL_STUB = 'webhook_subscriptions';

	protected function getVO() {
		return new WebhookSubscriptionVO();
	}

	protected function getUrlEndpoint() :string {
		return sprintf( '/%s', static::API_URL_STUB );
	}
}