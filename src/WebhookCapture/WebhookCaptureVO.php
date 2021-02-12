<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\WebhookCapture;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks
 * @property string           $event
 * @property WebhookPayloadVO $payload
 * @property string           $retry_started_at - e.g 2021-02-09T14:51:54.130105Z
 * @property string           $created_at       - e.g 2021-02-09T14:51:54.130105Z
 * @property string           $updated_at-      - e.g 2021-02-09T14:51:54.130105Z
 */
class WebhookCaptureVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

	/**
	 * @param string $sProperty
	 * @return mixed
	 */
	public function __get( $sProperty ) {
		$value = parent::__get( $sProperty );
		if ( $sProperty === 'payload' ) {
			$value = ( new WebhookPayloadVO() )->applyFromArray( $value );
		}
		return $value;
	}
}