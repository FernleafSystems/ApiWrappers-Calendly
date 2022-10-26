<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly;

use FernleafSystems\ApiWrappers\Calendly\OAuth\OAuthStateConsumer;
use FernleafSystems\ApiWrappers\Calendly\OAuth\Provider\Calendly;
use FernleafSystems\ApiWrappers\Calendly\OAuth\RetrieveAccessToken;

class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use OAuthStateConsumer;

	/**
	 * At the time of writing the authorization code had to be supplied "manually" to the application
	 * by way of a browser load, which redirected to supply the authorization code.
	 *
	 * This current OAuth implementation assumes that the OAuthState supplied to the Connection (perhaps stored in DB)
	 * already has the authorization code attached to it.
	 */
	public function isReady() :bool {
		return !empty( $this->getOAuthState()->authorization_code );
	}

	public function getAccessToken() :string {
		( new RetrieveAccessToken() )
			->setOAuthState( $this->getOAuthState() )
			->retrieve();
		return $this->getOAuthState()->access_token;
	}

	public function getBaseUrl() :string {
		return $this->getOAuthProvider()->getApiUrl();
	}

	public function getOAuthProvider() :Calendly {
		return new Calendly();
	}
}