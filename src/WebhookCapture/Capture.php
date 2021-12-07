<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\WebhookCapture;

class Capture {

	private string $signKey;

	private int $allowedVariance;

	public function __construct( string $webhookSigningKey = '', int $allowedTimestampVariance = 0 ) {
		$this->signKey = $webhookSigningKey;
		$this->allowedVariance = $allowedTimestampVariance;
	}

	/**
	 * @throws \Exception
	 */
	public function run( string $rawContent, string $rawHeader, ?int $now = null ) :WebhookCaptureVO {

		if ( empty( $now ) ) {
			$now = time();
		}

		$rawHeader = trim( $rawHeader );
		if ( !preg_match( '#^t=(\d+),v\d+=([a-z0-9]{64})$#i', $rawHeader, $matches ) ) {
			throw new \Exception( "Header isn't of the expected format." );
		}
		$ts = (int)$matches[ 1 ];
		$signature = $matches[ 2 ];

		if ( $this->allowedVariance > 0 && ( abs( $now - $ts ) > $this->allowedVariance ) ) {
			throw new \Exception( sprintf( 'The timestamp in the header (%s) was too old.', $ts ) );
		}

		if ( !empty( $this->signKey ) ) {
			if ( !hash_equals( $signature, hash_hmac( 'sha256', $ts.'.'.$rawContent, $this->signKey ) ) ) {
				throw new \Exception( 'Calendly webhook failed HMAC hash verification.' );
			}
		}

		return ( new WebhookCaptureVO() )->applyFromArray( json_decode( $rawContent, true ) );
	}
}
