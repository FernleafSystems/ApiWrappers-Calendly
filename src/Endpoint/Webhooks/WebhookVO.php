<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks;

/**
 * Class WebhookVO
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoint\Webhooks
 * @property string   $uri
 * @property string   $callback_url
 * @property string   $state
 * @property string[] $events
 * @property string   $organization
 * @property string   $user
 * @property string   $scope            - organization / user
 * @property string   $creator          - user URI
 * @property string   $retry_started_at - e.g 2021-02-09T14:51:54.130105Z
 * @property string   $created_at       - e.g 2021-02-09T14:51:54.130105Z
 * @property string   $updated_at-      - e.g 2021-02-09T14:51:54.130105Z
 */
class WebhookVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

}