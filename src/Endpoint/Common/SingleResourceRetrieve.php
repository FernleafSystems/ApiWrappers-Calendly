<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Common;

trait SingleResourceRetrieve {

	public function setUniqueID( string $ID ) :self {
		return $this->setRequestDataItem( 'uuid', $ID );
	}

	protected function getResponseDataPayloadKey() :string {
		return 'resource';
	}

	protected function getUUID() :string {
		return $this->getRequestDataItem( 'uuid' );
	}

	/**
	 * @inheritDoc
	 */
	protected function getCriticalRequestItems() {
		return [ 'uuid' ];
	}
}