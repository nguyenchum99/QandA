
@extends('home.layouts.index_page')

@section('content')

        <div style ="width: 50%; padding-left: 30px">
            <h3 style="color:#0059b3">Tạo phiên hỏi đáp</h3>
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
                	<h5>Tên phiên</h5>
                    <input type="text" name="name" class="form-control" placeholder="..."  />
                </div>

                <div class="form-group">
                    <h5>Mật khẩu phiên</h5>
                    <input type="password" name="password" class="form-control" placeholder="..."  />
                </div>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" 
               />
            </form>
        </div>
    <div>

@endsection

