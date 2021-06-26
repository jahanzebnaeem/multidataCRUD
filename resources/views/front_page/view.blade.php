@extends('layouts.master')
@section('title','view orders')
@section('content')
	<table class="table table-bordered">
			<thead>
					<tr>
						<th>SL</th>
						<th>Customer Name</th>
						<th>View Items</th>
						<th></th>
					</tr>
			</thead>
			<tbody>
				@foreach($orders as $key=>$data)
					<tr>
						<td><a href="/Orders/{{$data->id}}">{{++$key}}</a></td>
						<td>{{$data->customer_name}} </td>
						<td><a href="/items/{{$data->id}}">{{$data->id}} </a></td>
					</tr>
					@endforeach
			</tbody>
	</table>
@endsection