
@extends('admin.layouts.index')

@section('content')

        <div style ="width: 40%">
            <h2>Tạo phiên hỏi đáp</h2>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif

         {{-- hiện thị thành công --}}
         @if(session('thongbao'))

             <div class="alert alert-success">
                 {{session('thongbao')}}
             </div>

         @endif


            <form method="post" action="{{url("admin/session/add_session")}}">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                	<label>Tên phiên</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên phiên"  />
                </div>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
    <div>

@endsection

