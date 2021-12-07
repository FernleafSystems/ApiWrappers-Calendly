<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Users;

use FernleafSystems\ApiWrappers\Base\BaseVO;

/**
 * @property string $uri
 * @property string $email
 * @property string $name
 * @property string $slug
 * @property string $avatar_url
 * @property string $scheduling_url
 * @property string $timezone - e.g. Europe/London
 * @property string $created_at - e.g 2021-02-09T14:51:54.130105Z
 * @property string $updated_at
 */
class UserVO extends BaseVO {

}