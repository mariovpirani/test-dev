<section class="container ticketView">
	<div  class="text-left textTicket">.:: Ticket {{$ticketView->id}}
		<span class="float-right">
			<button class="btn btn-dark" data-toggle="modal" data-target="#exampleModalCenter">Interagir Chamado
			</button>
		</span>
	</div>
	@if(isset($success))
	<div class="alert alert-success" role="alert">
		{{$success}}
	</div>
	@endif
	<div class="card text-white bg-secondary">
		<div class="card-header">
			<i class="fas fa-user"></i> {{$ticketView->customerName}}
			<span class="float-right"> {{inverteData($ticketView->ticketDate)}} - {{geraHora($ticketView->created_at)}}
			</span>
		</div>
		<div class="card-body">
			<h5 class="card-title">{{$ticketView->ticketTitle}}</h5>
			<p class="card-text">{{$ticketView->ticketContent}}</p>

		</div>
	</div>

	@if(isset($TicketAnswer))
	<hr>
	@foreach($TicketAnswer as $ReturnAnswer)

	@if(empty($ReturnAnswer->userId))
	<div  class="text-left textTicket"> .:: Interação Cliente</div>
	<div class="card  bg-light ">

	@else
		<div  class="text-left textUser"> .:: Resposta Suporte</div>
		<div class="card text-white bg-dark">
	@endif
			<div class="card-header">
				@if(empty($ReturnAnswer->userId))
				<i class="fas fa-user"></i> {{$ticketView->customerName}}
				@else
				<i class="fas fa-users"></i> {{$ReturnAnswer->userName}}
				@endif
				<span class="float-right"> {{inverteData($ReturnAnswer->ticketAnswerDate)}} - {{geraHora($ReturnAnswer->created_at)}}</span>
			</div>
			<div class="card-body">
				<h5 class="card-title">{{$ReturnAnswer->ticketAnswerTitle}}</h5>
				<p class="card-text">{{$ReturnAnswer->ticketAnswerContent}}</p>

			</div>
		</div>
		<hr>
		@endforeach
		@endif

		<!-- Modal -->
		<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLongTitle">Interagir no Ticket</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-12">
								<form class="form" method="post" action="{{url('/admin/add')}}">
									{{ csrf_field() }}
									<input type="hidden" name="customerName" placeholder="" class="form-control"  value="{{$ticketView->customerName}}">
									<input type="hidden" name="orderId" placeholder="" class="form-control"  value="{{$ticketView->orderId}}">
									<input type="hidden" name="customerEmail" placeholder="" class="form-control"value="{{$ticketView->customerEmail}}">
									<input type="hidden" name="ticketId" placeholder="" class="form-control"value="{{$ticketView->id}}">
									<input type="hidden" name="ticketToken" placeholder="" class="form-control"value="{{$ticketView->ticketToken}}">

									<div class="form-group" >
										<label>
											Título do Ticket
										</label>
										<input type="text" name="ticketTitle" placeholder="" class="form-control" required="">
									</div>

									<div class="form-group" >
										<label>
											Conteúdo do Ticket
										</label>
										<textarea class="form-control" name="ticketContent" required=""></textarea>
									</div>

									<button class="btn btn-system btn-submit form-control">Novo Ticket</button>
								</form>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>

	</section>