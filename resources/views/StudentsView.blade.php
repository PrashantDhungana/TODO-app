
@extends('NavbarTemplate')
@section('title')
StudentsView
@endsection
@section('content')
	<script>
		function newFunction(source){
			checkboxes=document.getElementsByName('del[]');
			for(var i=0, n=checkboxes.length;i<n;i++) {
				checkboxes[i].checked = source.checked;
			}
		}
	</script>
	<style>
		.pagination > li > a:focus,
		.pagination > li > a:hover,
		.pagination > li > span:focus,
		.pagination > li > span:hover,
		.pagination > li > span:active,

		 {
		    z-index: 3;
		    color: #fff;
		    background-color: #454d55;
		    border-color: #ddd;
		}
		.check{
			margin-left: 88px;
		}
		.inline{
			display: block;
		}
	</style>
	<div class="row" style="width:100%">
		<div class="col-md-3">

		</div>
		<div class="col-md-6">
			@if (session()->has('status'))
			<div class="alert {{ session()->get('status')[0] }}">
				{{ session()->get('status')[1]}}
			</div>
			@endif
			<a href="{{url('all/add')}}" role="button" class="btn btn-primary">Add new Detail</a>
			<form action="del" method="POST">
				@csrf
				@method('DELETE')
				<table class="table table-dark" border="1px solid #fff">
					<thead>
						<tr>
							<th><input type="checkbox" name="all" onclick="newFunction(this)"></th>
							<th scope="col">#</th>
							<th scope="col">Name</th>
							<th scope="col">Phone Number</th>
							<th scope="col">Address</th>

							<th colspan="2" scope="col">
								<center>Actions 
								</center></th>
							</tr>

						</thead>
						<tbody>
							<?php foreach ($details as $detail) {
								?>
								<tr>
									<td><input type="checkbox" name="del[]" value="{{$detail->id}}"></td>
									<td><?php echo $detail->id?></td>
									<td><?php echo $detail->name?></td>
									<td><?php echo $detail->phone_no?></td>
									<td><?php echo $detail->address?></td>
									<td><a href="edit/<?php echo $detail->id?>" role="button" class="btn btn-success">Edit</a></td>
									<td><a href="delete/<?php echo $detail->id?>" role="button" class="btn btn-danger">Delete</a></td>

								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<input type="submit" class="btn btn-danger" value="Delete Selected">
				</form>
		{{ $details->links() }}
			</div>
			<div class="col-md-3">

			</div>
		</div>
		<tr>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
			<td></td>
		</tr>
		@endsection