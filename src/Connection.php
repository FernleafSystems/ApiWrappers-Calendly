<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly;

use FernleafSystems\ApiWrappers\Calendly\OAuth\OAuthState;
use FernleafSystems\ApiWrappers\Calendly\OAuth\OAuthStateConsumer;
use FernleafSystems\ApiWrappers\Calendly\OAuth\RetrieveAccessToken;

/**
 * Class Connection
 * @package FernleafSystems\ApiWrappers\Freeagent
 * @property string $access_token
 * @property string $base_url_override
 * @property string $client_id
 * @property string $uri_auth
 * @property string $uri_redirect
 * @property string $uri_resource
 * @property int    $expiration
 * @property bool   $sandbox
 */
class Connection extends \FernleafSystems\ApiWrappers\Base\Connection {

	use OAuthStateConsumer;

	/**
	 * At the time of writing the authorization code had to be supplied "manually" to the application
	 * by way of a browser load, which redirected to supply the authorization code.
	 *
	 * This current OAuth implementation assumes that the OAuthState supplied to the Connection (perhaps stored in DB)
	 * already has the authorization code attached to it.
	 * @return bool
	 */
	public function isReady() :bool {
		$state = $this->getOAuthState();
		return $state instanceof OAuthState && !empty( $state->authorization_code );
	}

	public function getAccessToken() :string {
		( new RetrieveAccessToken() )
			->setOAuthState( $this->getOAuthState() )
			->retrieve();
		return $this->getOAuthState()->access_token;
	}
}