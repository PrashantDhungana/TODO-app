@extends('NavbarTemplate')

@section('content')
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form method="post" action="{{url('all/addnew')}}">
				@csrf
				<div class="form-group @error('name')is-invalid @enderror">
					<label for="exampleInputEmail1">Name*</label>
					<input type="text" class="form-control" id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter Student's name" name="name" value="{{old('name')}}">
				</div>
				@error('name')
				<p class="alert-danger">{{$message}}</p>
				@enderror
				<div class="form-group @error('phone_no') is-invalid @enderror">
					<label for="exampleInputtext1">Phone Number*</label>
					<input type="text" class="form-control" id="exampleInputtext2" aria-describedby="textHelp" placeholder="Enter Student's Phone" name="phone_no" value="{{old('phone_no')}}">
				</div>
				@error('phone_no')
				<p class="alert-danger">{{$message}}</p>
				@enderror
				<div class="form-group @error('address') is-invalid @enderror">
					<label for="exampleInputtext1">Address*</label>
					<input type="text" class="form-control" id="exampleInputtext2" aria-describedby="textHelp" placeholder="Enter Student's Address" name="address" value="{{old('address')}}">
				</div>
				@error('address')
				<p class="alert-danger">{{$message}}</p>
				@enderror
				<button type="submit" class="btn btn-primary">Add Student</button>
			</form>
		</div>
		<div class="col-md-3"></div>

	</div>
	@endsection('content')