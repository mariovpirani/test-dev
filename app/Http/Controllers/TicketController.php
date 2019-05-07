<?php
/**
 *
 * @package		Laravel - MEU PRIMEIRO PROJETO EM LARAVEL
 * @subpackage	Ticket
 * @category	Controllers
 * @version 	1.0.0.1
 * @author		Mario Veiga
 * @date(2019-05-01)
 * NOT CHANGE *
 *
 */

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\TicketAnswer;
use Illuminate\Http\Request;

class TicketController extends Controller {

	public function index() {

	}

	public function add(Request $request) {
		//POST REQUEST
		DEFINE('CUSTOMER_EMAIL', $request->input('customerEmail'));
		DEFINE('ORDER_ID', $request->input('orderId'));
		DEFINE('CUSTOMER_NAME', $request->input('customerName'));
		DEFINE('TICKET_CONTENT', $request->input('ticketContent'));
		DEFINE('TICKET_TITLE', $request->input('ticketTitle'));

		//VERIFICA SE O CLIENTE TEM CADASTRO
		//Deverá existir uma validação pelo e-mail informado no formulário:
		$customer = Customer::where('customerEmail', '=', CUSTOMER_EMAIL)->exists();

		if (empty($customer)) {
			//Cadastrar cliente
			$customerId = Customer::customerAdd($request);
		} else {
			//Aproveitar cliente já existente
			$customers = Customer::getCustomerEmail(CUSTOMER_EMAIL);
			$customerId = $customers[0]->id;
		}

		//Deverá existir uma validação por número do pedido informado no formulário
		$orders = Order::orderVerify(ORDER_ID);
		if ($orders) {

			$orderCustomerId = $orders->customerId;
			if ($orderCustomerId != $customerId) {

				//	print_r(response()->json(['error' => true, 'error_messages' => 'Esse Pedido ' . ORDER_ID . ' pertence a Outro Cliente']));
				//Exibir uma mensagem de erro e não realizar o cadastro
				return view('index', [
					'titlePage' => 'Suporte',
					'error' => 'Esse Pedido ' . ORDER_ID . ' pertence a Outro Cliente',
				]);

			} else {

				//VERIFICA SE POSSUI TICKET NO SISTEMA PARA ESSE PEDIDO E CLIENTE
				$tickets = Ticket::getTicket(ORDER_ID, $customerId);
				if ($tickets) {

					$ticketId = $tickets->id;
					//INSERE COMO INTERAÇÃO NO TICKET COMO RESPOSTA DO CLIENTE
					$ticketAnswerAdd = TicketAnswer::ticketAnswerAdd($ticketId);
					//CRIA SESSAO CLIENTE E TICKET
					$request->session()->put('customerEmail', CUSTOMER_EMAIL);
					$request->session()->put('ticketId', $ticketId);
					//REDIRECT VIEW CLIENTE TICKET SUPPORT
					return redirect('ticket/view');

				} else {
					//CRIA TICKET REFERENTE AO PEDIDO E CLIENTE
					$ticketAdd = Ticket::ticketAdd(ORDER_ID, $customerId);
					//CRIA SESSAO CLIENTE E TICKET
					$request->session()->put('customerEmail', CUSTOMER_EMAIL);
					$request->session()->put('ticketId', $ticketAdd);
					//REDIRECT VIEW CLIENTE TICKET SUPPORT
					return redirect('ticket/view');
				}
			}
		} else {
			//INSERE PEDIDO NO SISTEMA
			$orderId = Order::orderAdd($customerId);
			//CRIA TICKET REFERENTE AO PEDIDO E CLIENTE
			$ticketAdd = Ticket::ticketAdd(ORDER_ID, $customerId);
			//CRIA SESSAO CLIENTE E TICKET
			$request->session()->put('customerEmail', CUSTOMER_EMAIL);
			$request->session()->put('ticketId', $ticketAdd);
			//REDIRECT VIEW CLIENTE TICKET SUPPORT
			return redirect('ticket/view');

		}
	}

	public function view() {

		if (!empty(session('customerEmail'))) {
			$customerEmail = session('customerEmail');
			$ticketId = session('ticketId');

		} else {
			$customerEmail = '';
			$ticketId = '';
		}
		$ticketVerify = Ticket::getTicketView($customerEmail, $ticketId);
		if ($ticketVerify) {

			$TicketAnswer = TicketAnswer::getTicketAnswerView($ticketId);

			return view('ticket', ['titlePage' => 'Suporte', 'ticketView' => $ticketVerify, 'TicketAnswer' => $TicketAnswer]);
		} else {
			return view('index', [
				'titlePage' => 'Suporte',
				'errorView' => 'Erro nos dados de Acesso',
			]);
		}

	}

	public function login(Request $request) {

		if (!empty($request->input('customerEmail'))) {
			$customerEmail = $request->input('customerEmail');
			$ticketId = $request->input('ticketId');
			$ticketVerify = Ticket::getTicketView($customerEmail, $ticketId);
			if ($ticketVerify) {
				$request->session()->put('customerEmail', $customerEmail);
				$request->session()->put('ticketId', $ticketId);
				//REDIRECT VIEW CLIENTE TICKET SUPPORT
				return redirect('ticket/view');
			} else {
				return view('index', [
					'titlePage' => 'Suporte',
					'errorView' => 'Erro nos dados de Acesso',
				]);

			}
		}

	}

}
