<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\WebhookCapture;

use FernleafSystems\Utilities\Data\Adapter\DynPropertiesClass;

/**
 * @property string     $event                 - Scheduled Event URI
 * @property string     $uri                   - invitee URI
 * @property string     $cancel_url
 * @property array|null $cancellation          - [canceled_by=>'name', 'reason'=> '']
 * @property string     $created_at
 * @property string     $email
 * @property string     $name
 * @property array[]    $questions_and_answers - keys: question/answer/position
 * @property string     $reschedule_url
 * @property bool       $rescheduled           - true when cancellation and is rescheduled
 * @property string     $status                - active, canceled
 * @property string     $text_reminder_number
 * @property string     $timezone
 * @property array      $tracking              - utms.
 * @property string     $payment
 * @property string     $new_invitee           - uri
 * @property string     $old_invitee           - uri available when is a reschedule
 * @property string     $updated_at
 */
class WebhookPayloadVO extends DynPropertiesClass {

}