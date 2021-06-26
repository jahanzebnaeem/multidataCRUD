<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<title>Multiple CRUD</title>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
	</head>
	<body>
		<br>
		<div class="container">
			<table class="table table-bordered">
					<thead>
							<tr>
								<th>SL</th>
								<th>Customer Name</th>
								<th>Order Id</th>
							</tr>
					</thead>
					<tbody>
					 @foreach($orders as $key=>$data)
							<tr>
								<td>{{++$key}} </td>
								<td>{{$data->customer_name}} </td>
								<td><a href="/items/{{$data->id}}">{{$data->id}} </a></td>
							</tr>
							@endforeach
					</tbody>
			</table>
		</div>
	</body>
</html>