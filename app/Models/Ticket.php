<?php
/**
 *
 * @package		Laravel
 * @subpackage	Ticket
 * @category	Models
 * @version 	1.0.0.1
 * @author		Mario Veiga
 * @date(2019-05-01)
 * NOT CHANGE *
 *
 */
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model {
	protected $table = 'ticket';
	protected $fillable = ['customerName', 'customerEmail', 'customerId', 'ticketTitle', 'ticketStatusId', 'ticketContent', 'ticketDate', 'orderId', 'ticketToken'];
	protected $guarded = ['id', 'created_at', 'update_at'];

	protected static function getTicket($orderId, $customerId) {
		$query = Ticket::where([['orderId', '=', $orderId], ['customerId', '=', $customerId]])->first();
		return $query;
	}
	protected static function getTicketView($customerEmail, $ticketId) {
		$query = Ticket::where([['customerEmail', '=', $customerEmail], ['id', '=', $ticketId]])->first();
		return $query;
	}
	protected function TicketAdd($orderId, $customerId) {
		$data = [
			'customerName' => CUSTOMER_NAME,
			'customerEmail' => CUSTOMER_EMAIL,
			'ticketTitle' => TICKET_TITLE,
			'ticketStatusId' => '1',
			'ticketContent' => TICKET_CONTENT,
			'ticketDate' => date('Y-m-d'),
			'ticketToken' => md5(date('Y-m-d h:m:i') . TICKET_TITLE),
			'customerId' => $customerId,
			'orderId' => $orderId,
		];
		$query = Ticket::create($data);
		return $query->id;
	}

	protected function getTicketPaginate($limit) {
		$getTicket = Ticket::select('*')->simplePaginate($limit);
		return $getTicket;
	}

	protected function searchTicket($q, $limit) {
		$query = Ticket::where('orderId', 'LIKE', '%' . $q . '%')->orWhere('customerEmail', 'LIKE', '%' . $q . '%')->simplePaginate($limit);
		return $query;
	}
	protected static function getTicketToken($ticketToken) {
		$query = Ticket::where('ticketToken', '=', $ticketToken)->first();
		return $query;
	}
}
