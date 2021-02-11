<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\OAuth;

trait OAuthStateConsumer {

	private ?OAuthState $oauthState;

	public function setOAuthState( OAuthState $state ) :self {
		$this->oauthState = $state;
		return $this;
	}

	public function getOAuthState() :OAuthState {
		return $this->oauthState;
	}
}