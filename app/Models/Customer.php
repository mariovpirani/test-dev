<?php
/**
 *
 * @package		Laravel
 * @subpackage	Customer
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

class Customer extends Model {
	protected $table = 'customer';
	protected $fillable = ['customerName', 'customerEmail', 'customerPass', 'customerToken', 'customerDate'];
	protected $guarded = ['id', 'created_at', 'update_at'];

	protected function customerAdd($request) {
		$data = [
			'customerName' => CUSTOMER_NAME,
			'customerEmail' => CUSTOMER_EMAIL,
			'customerPass' => Functions::geraPass(),
			'customerToken' => Functions::geraToken(CUSTOMER_EMAIL),
			'customerDate' => date('Y-m-d'),
		];
		$query = Customer::create($data);
		return $query->id;
	}

	protected static function getCustomerEmail($email) {
		$query = Customer::where('customerEmail', '=', $email)->get();
		return $query;
	}

}
