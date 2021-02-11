<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\OAuth;

use Carbon\Carbon;
use FernleafSystems\ApiWrappers\Calendly\OAuth\Provider\Calendly;
use League\OAuth2\Client\Provider\Exception\IdentityProviderException;
use League\OAuth2\Client\Token\AccessToken;

class RetrieveAccessToken {

	use OAuthStateConsumer;

	public function retrieve() :bool {
		$success = false;

		$state = $this->getOAuthState();

		if ( empty( $state->authorization_code ) ) {
			throw new \LogicException( 'Attempting to retrieve an OAuth Access Code without an existing Authorization Code' );
		}

		if ( empty( $state->access_token ) || empty( $state->refresh_token ) ) { // Need a brand new token.

			try {
				$this->storeAccessToken(
					$this->getOAuthProvider()->getAccessToken( 'authorization_code', [
						'code'          => $state->authorization_code,
						'client_id'     => $state->client_id,
						'client_secret' => $state->client_secret,
						'redirect_uri'  => $state->redirect_uri,
					] )
				);
				$success = true;
			}
			catch ( IdentityProviderException $e ) {
				error_log( 'Failed To Obtain New Access Token: '.$e->getMessage() );
			}
		}
		elseif ( Carbon::now()->timestamp > $state->access_token_expires_at ) {  // Need to refresh an existing token.

			try {
				$this->storeAccessToken(
					$this->getOAuthProvider()->getAccessToken( 'refresh_token', [
						'client_id'     => $state->client_id,
						'client_secret' => $state->client_secret,
						'refresh_token' => $state->refresh_token,
					] )
				);
				$success = true;
			}
			catch ( IdentityProviderException $e ) {
				error_log( 'Failed To Refresh Access Token: '.$e->getMessage() );
			}
		}
		else {
			$success = true;
		}

		return $success;
	}

	protected function getOAuthProvider() :Calendly {
		return new Calendly();
	}

	private function storeAccessToken( AccessToken $token ) :self {
		$state = $this->getOAuthState();
		$state->access_token = $token->getToken();
		$state->refresh_token = $token->getRefreshToken();
		$state->access_token_expires_at = $token->getExpires();
		return $this;
	}
}