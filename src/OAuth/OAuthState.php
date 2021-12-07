<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\OAuth;

use FernleafSystems\Utilities\Data\Adapter\DynPropertiesClass;

/**
 * Useful for collecting all the necessary OAuth data point together into 1 VO.
 *
 * @property string $authorization_code
 * @property string $access_token
 * @property string $access_token_expires_at
 * @property string $refresh_token
 * @property string $client_id
 * @property string $client_secret
 * @property string $redirect_uri
 */
class OAuthState extends DynPropertiesClass {

}