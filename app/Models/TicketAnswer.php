<?php
/**
 *
 * @package		Laravel
 * @subpackage	TicketAwnser
 * @category	Models
 * @version 	1.0.0.1
 * @author		Mario Veiga
 * @date(2019-05-01)
 * NOT CHANGE *
 *
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TicketAnswer extends Model {
	protected $table = 'ticket_answer';
	protected $fillable = ['ticketId', 'ticketAnswerTitle', 'ticketStatusId', 'ticketAnswerContent', 'ticketAnswerDate', 'userId', 'userName'];
	protected $guarded = ['id', 'created_at', 'update_at'];

	protected function ticketAnswerAdd($ticketId, $userid = NULL, $userName = NULL) {
		$data = [
			'ticketId' => $ticketId,
			'ticketAnswerTitle' => TICKET_TITLE,
			'ticketStatusId' => '3',
			'ticketAnswerContent' => TICKET_CONTENT,
			'ticketAnswerDate' => date('Y-m-d'),
			'userName' => $userName,
			'userId' => $userid,

		];
		$query = TicketAnswer::create($data);
		//return $query->id;
	}
	protected static function getTicketAnswerView($ticketId) {
		$query = TicketAnswer::where('ticketId', '=', $ticketId)->get();
		return $query;
	}
}
