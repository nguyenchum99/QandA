
@extends('home.layouts.index_page')

@section('content')

        <div style ="width: 40%; padding-left: 30px;color:#e63900">
            <h3><b>Tạo phiên hỏi đáp</b></h3>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif



            <form method="post" action="{{url("user/manage/createsession")}}">
                
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                	<label>Tên phiên</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên phiên"  />
                </div>

                <div class="form-group">
                    <label>Mật khẩu phiên</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu"  />
                </div>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" 
                style="background-color: #e63900;color:white"/>
            </form>
        </div>
    <div>

@endsection

