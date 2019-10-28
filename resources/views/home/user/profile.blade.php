
@extends('home.layouts.index_page')
@section('content')

	<div class="container">
		<div class="row">
			<div class="col-sm-9 right ">
				<img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" style="width:150px; height: 150px; float: left; border-radius:50%; margin-right:25px;">
				<h2>{{ $user->name }}'s Profile </h2>
				{{-- thông báo lỗi --}}
	             @if(count($errors) > 0)
	             <div class="alert alert-danger">
	             
	                 @foreach ($errors -> all() as $err)
	                     {{$err}}<br>
	                 @endforeach
	             
	             </div>
          		@endif

				{{-- hiện thị sửa thành công --}}
				@if(session('thongbao'))

					<div class="alert alert-success">
					    {{session('thongbao')}}
					</div>

				@endif
				<form enctype="multipart/form-data" action="" method="post">
					<label>Update Profile Image</label>
					<input type="file" name="avatar" id="avatar">
					<input type="hidden" name="_token" value="{{csrf_token()}}">
					<input type="submit" class="pull-right btn btn-sm btn-primary" value="Save">
				</form>
			</div>
		</div>
	</div>

@endsection
