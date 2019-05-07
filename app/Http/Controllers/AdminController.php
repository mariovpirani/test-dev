<?php
/**
 *
 * @package     Laravel - MEU PRIMEIRO PROJETO EM LARAVEL
 * @subpackage  Admin
 * @category    Controllers
 * @version     1.0.0.1
 * @author      Mario Veiga
 * @date(2019-05-01)
 * NOT CHANGE *
 *
 */

namespace App\Http\Controllers;
use App\Models\Ticket;
use App\Models\TicketAnswer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller {
	//SESSAO USUARIO - SERIA CRIADO UM LOGIN E SENHA PARA USUARIOS (APENAS TESTE)
	public function __construct() {
		session()->put('userId', '1');
		session()->put('userName', 'Mario Luiz');
	}

	public function index() {
		$ticketReturn = Ticket::getTicketPaginate(5);

		return view('admin', [
			'titlePage' => 'Administrador',
			'error' => 'Ambiente Teste',
			'ticketReturn' => $ticketReturn,
		]);
	}
	public function search() {
		$q = Input::get('q');
		$ticketSearch = Ticket::searchTicket($q, 5);
		//print_r($ticketSearch);
		return view('admin', [
			'titlePage' => 'Administrador',
			'error' => 'Ambiente Teste',
			'ticketSearch' => $ticketSearch,
		]);
	}

	public function view($ticketToken) {

		$ticketVerify = Ticket::getTicketToken($ticketToken);
		if ($ticketVerify) {
			$ticketId = $ticketVerify->id;
			$TicketAnswer = TicketAnswer::getTicketAnswerView($ticketId);

			return view('admin', ['titlePage' => 'Suporte', 'ticketView' => $ticketVerify, 'TicketAnswer' => $TicketAnswer]);
		} else {
			return view('admin', [
				'titlePage' => 'Suporte',
				'errorView' => 'Erro nos dados de Acesso',
			]);
		}

	}

	public function add(Request $request) {
		//POST REQUEST
		DEFINE('CUSTOMER_EMAIL', $request->input('customerEmail'));
		DEFINE('ORDER_ID', $request->input('orderId'));
		DEFINE('CUSTOMER_NAME', $request->input('customerName'));
		DEFINE('TICKET_CONTENT', $request->input('ticketContent'));
		DEFINE('TICKET_TITLE', $request->input('ticketTitle'));
		DEFINE('TICKET_ID', $request->input('ticketId'));
		DEFINE('TICKET_TOKEN', $request->input('ticketToken'));

		$userId = session('userId');
		$userName = session('userName');
		//SESSAO USUARIO DO SUPORTE

		//INSERE COMO INTERAÇÃO NO TICKET COMO RESPOSTA DO CLIENTE
		$ticketAnswerAdd = TicketAnswer::ticketAnswerAdd(TICKET_ID, $userId, $userName);
		//CRIA SESSAO CLIENTE E TICKET

		//REDIRECT VIEW CLIENTE TICKET SUPPORT
		return redirect('admin/view/' . TICKET_TOKEN);

	}
}
