
@extends('home.layouts.index_page')
@section('content')

	<div class="container" style="width: 90%">
		<div class="row">
			<div style="width: 60%">
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
			</div>
			<div class="col-sm-9 right ">
				<img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" 
				style="width:160px; height: 160px; float: left; border-radius:50%; margin-right:25px;">
				<form enctype="multipart/form-data" action="" method="post">
					<input type="file" name="avatar" id="avatar" value="Tải ảnh lên">
					<input type="hidden" name="_token" value="{{csrf_token()}}"></br>
					<input type="submit" class="btn btn-primary" value="Lưu" style="background-color: #737373">
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
