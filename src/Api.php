<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly;

use FernleafSystems\ApiWrappers\Base\BaseApi;
use FernleafSystems\ApiWrappers\Base\BaseVO;

class Api extends BaseApi {

	const REQUEST_METHOD = 'get';
	const SCOPE_USER = 'user';
	const SCOPE_ORGANIZATION = 'organisation';

	protected function preFlight() {
		/** @var Connection $conn */
		$conn = $this->getConnection();
		$this->setRequestHeader( 'Authorization', sprintf( 'Bearer %s', $conn->getAccessToken() ) );
	}

	/**
	 * @return array|null
	 */
	public function getCoreResponseData() {
		$aData = null;
		if ( $this->isLastRequestSuccess() ) {
			$sKey = $this->getResponseDataPayloadKey();
			$aDecoded = $this->getDecodedResponseBody();
			$aData = empty( $sKey ) ? $aDecoded : $aDecoded[ $sKey ];
		}
		return $aData;
	}

	protected function getResponseDataPayloadKey() :string {
		return '';
	}

	/**
	 * @return BaseVO|mixed|null
	 */
	public function sendRequestWithVoResponse() {
		$data = $this->req()->getCoreResponseData();

		$new = null;
		if ( !empty( $data ) ) {
			$new = $this->getVO()->applyFromArray( $data );
		}
		return $new;
	}
}