<?php declare( strict_types=1 );

namespace FernleafSystems\ApiWrappers\Calendly\WebhookCapture;

/**
 * Class WebhookPayloadVO
 * @package FernleafSystems\ApiWrappers\Calendly\WebhookCapture
 * @property string  $uri
 * @property string  $cancel_url
 * @property string  $created_at
 * @property string  $email
 * @property string  $event                 - Scheduled Event URI
 * @property string  $name
 * @property array[] $questions_and_answers - keys: question/answer/position
 * @property string  $reschedule_url
 * @property bool    $rescheduled
 * @property string  $status
 * @property string  $text_reminder_number
 * @property string  $timezone
 * @property array   $tracking              - utms.
 * @property string  $payment
 * @property string  $new_invitee
 * @property string  $old_invitee
 * @property string  $updated_at
 */
class WebhookPayloadVO extends \FernleafSystems\ApiWrappers\Base\BaseVO {

}