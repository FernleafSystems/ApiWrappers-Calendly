<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\Endpoint\ScheduledEvents;

/**
 * Class ScheduledEventVO
 * @package FernleafSystems\ApiWrappers\Calendly\Endpoint\ScheduledEvents
 * @property string  $uri
 * @property string  $name
 * @property string  $status
 * @property string  $start_time
 * @property string  $end_time
 * @property string  $event_type
 * @property array   $location
 * @property array   $invitees          - total/active/limit
 * @property string  $created_at
 * @property string  $updated_at
 * @property array[] $event_memberships (user uris)
 * @property array[] $event_guests      (email, created_at, updated_at)
 */
class ScheduledEventVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

}