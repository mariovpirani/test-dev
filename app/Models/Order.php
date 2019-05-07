<?php
/**
 *
 * @package		Laravel
 * @subpackage	Order
 * @category	Models
 * @version 	1.0.0.1
 * @author		Mario Veiga
 * @date(2019-05-01)
 * NOT CHANGE *
 *
 */
namespace App\Models;
use App\Helpers\Functions;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
	protected $table = 'order_ticket';
	protected $fillable = ['orderId', 'customerId', 'orderToken', 'orderDate'];

	protected function orderVerify($orderId) {
		$query = Order::where('orderId', '=', $orderId)->first();
		return $query;
	}
	protected function orderAdd($customerId) {
		$data = [
			'orderId' => ORDER_ID,
			'customerId' => $customerId,
			'orderToken' => Functions::geraToken(CUSTOMER_EMAIL . date("Y-m-d H:i:s")),
			'orderDate' => date('Y-m-d'),
		];
		$query = Order::create($data);
		return ORDER_ID;
	}

}
