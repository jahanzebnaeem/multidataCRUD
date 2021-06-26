@extends('layouts.master')
@section('title','add order')
@section('content')
	<div class="container">
		@if(Session::has('success'))
			<div class="alert alert-success">
					{{Session::get('success')}}
			</div>
		@endif
		<form action="/orders/{{$order->id}}" method="post">
			@method('patch')
			@csrf
			<section>
				<div class="row">
					<div class="col-md-6">
						<div class="panel panel-heading">
							<div class="form-group">
								<input type="text" name="customer_name" class="form-control" placeholder="Please enter your name" value="{{$order->customer_name}}" />
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="panel panel-heading">
							<div class="form-group">
								<input type="text" name="customer_address" class="form-control" placeholder="Please enter your address" value="{{$order->customer_address}}"/>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-footer">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>Product Name</th>
								<th>Brand</th>
								<th>Quantity</th>
								<th>Budget</th>
								<th>Amount</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($items as $key=>$item)
								<input type="hidden" name="id[]" value={{$item->id}}>
								<tr>
									<td><input type="text" name="product_name[]" class="form-control" value="{{$item->product_name}}" required /></td>
									<td><input type="text" name="brand[]" class="form-control" value="{{$item->brand}}" /></td>
									<td><input type="text" name="quantity[]" class="form-control quantity" value="{{$item->quantity}}" required /></td>
									<td><input type="text" name="budget[]" class="form-control budget" value="{{$item->budget}}" /></td>
									<td><input type="text" name="amount[]" class="form-control amount" value="{{$item->amount}}" /></td>
								</tr>
							@endforeach
						</tbody>
						<tfoot>
							<tr>
									<td style="border: none"></td>
									<td style="border: none"></td>
									<td style="border: none"></td>
									<td>Total</td>
									<td><b class="total"></b> </td>
									<td><input type="submit" name="" value="Submit" class="btn btn-success"></td>
							</tr>
						</tfoot>
					</table>
				</div>
			</section>
		</form>
	</div>
	<script type="text/javascript">
		$('tbody').delegate('.quantity,.budget','keyup',function(){
			var tr=$(this).parent().parent();
			var quantity=tr.find('.quantity').val();
			var budget=tr.find('.budget').val();
			var amount=(quantity*budget);
			tr.find('.amount').val(amount);
			total();
		});
		function total(){
			var total=0;
			$('.amount').each(function(i,e){
				var amount=$(this).val()-0;
				total +=amount;
			});
			$('.total').html(total+".00 PKR");    
		};
	</script>
@endsection