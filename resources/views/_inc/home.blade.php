<section class="container ticketHome">

	<div class="row">
		<div class="col-sm-6">
			<form class="form" method="post" action="{{url('/ticket/add')}}">
				{{ csrf_field() }}
				<div class="form-group">
					<h2>Abrir Ticket Suporte</h2>
				</div>

				@if(isset($error))
				<div class="alert alert-danger" role="alert">
					{{$error}}
				</div>

				@endif
				<div class="form-group" >
					<label>
						Nome do Cliente
					</label>
					<input type="text" name="customerName" placeholder="" class="form-control" required="">
				</div>
				<div class="form-group" >
					<label>
						Número Pedido
					</label>
					<input type="text" name="orderId" placeholder="" class="form-control" required="">
				</div>
				<div class="form-group" >
					<label>
						E-mail do Cliente
					</label>
					<input type="text" name="customerEmail" placeholder="" class="form-control" required="">
				</div>

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
		<div class="col-sm-6">
			<form class="form" method="post" action="{{url('/ticket/login')}}">
				{{ csrf_field() }}
				<div class="form-group">
					<h2>Verificar Ticket Suporte</h2>
				</div>

				@if(isset($errorView))
				<div class="alert alert-danger" role="alert">
					{{$errorView}}
				</div>

				@endif
				<div class="form-group" >
					<label>
						E-mail do Cliente
					</label>
					<input type="text" name="customerEmail" placeholder="" class="form-control" required="">
				</div>

				<div class="form-group" >
					<label>
						ID do Ticket
					</label>
					<input type="text" name="ticketId" placeholder="" class="form-control" required="">
				</div>


				<button class="btn btn-system form-control">Visualizar Ticket</button>
			</form>
		</div>
	</div>
</section>