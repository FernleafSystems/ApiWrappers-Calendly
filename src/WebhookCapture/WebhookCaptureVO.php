<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\WebhookCapture;

use FernleafSystems\Utilities\Data\Adapter\DynPropertiesClass;

/**
 * @property string           $event
 * @property WebhookPayloadVO $payload
 * @property string           $retry_started_at - e.g 2021-02-09T14:51:54.130105Z
 * @property string           $created_at       - e.g 2021-02-09T14:51:54.130105Z
 * @property string           $updated_at-      - e.g 2021-02-09T14:51:54.130105Z
 */
class WebhookCaptureVO extends DynPropertiesClass {

	/**
	 * @param string $key
	 * @return mixed
	 */
	public function __get( string $key ) {
		$value = parent::__get( $key );
		if ( $key === 'payload' ) {
			$value = ( new WebhookPayloadVO() )->applyFromArray( $value );
		}
		return $value;
	}
}