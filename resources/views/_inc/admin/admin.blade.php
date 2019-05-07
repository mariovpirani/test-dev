<section class="container ticketView">
	<form class="form" method="get" action="{{url('/admin/search')}}">

		<div class="row">

			<div class="col-sm-6">
				<h2>Tickets</h2>
			</div>

			<div class="col-sm-3 text-right">
				<input type="text" name="q" class="form-control" placeholder="Pedido / E-mail" required="">
			</div>
			<div class="col-sm-3 text-right">
				<button class="form-control btn btn-search">Buscar</button>
			</div>
		</div>
	</form>

</div>

<div class="table-responsive">
	<table class="table">

		<thead>
			<tr>
				<th><span span="sr-only">Ticket</span></th>
				<th>Pedido</th>
				<th>Título</th>
				<th>E-mail</th>
				<th>Data</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($ticketReturn as $ReturnAnswer)
			<tr>
				<td>{{$ReturnAnswer->id}}</td>
				<td>{{$ReturnAnswer->orderId}}</td>
				<td>{{$ReturnAnswer->ticketTitle}}</td>
				<td>{{$ReturnAnswer->customerEmail}}</td>
				<td>{{inverteData($ReturnAnswer->ticketDate)}}</td>
				<td><a href="admin/view/{{$ReturnAnswer->ticketToken}}" class="btn btn-dark"><i class="fa fa-edit"></i></a></td>
			</tr>
		</tbody>
		@endforeach

	</table>

</div>
<div class="row">
	<div class="col-sm-12 ">
		<span class="float-right">{{ $ticketReturn->links() }}</span>
	</div>
</div>
</section>