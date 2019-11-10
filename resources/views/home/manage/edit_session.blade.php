
@extends('home.layouts.index_page')
@section('content')
        <div style ="width: 50%; margin-left:20px;color: #e63900" >
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

            <h4><b>Sửa tên phiên hỏi đáp</b></h4>
            <form method="post" action="{{$session->id}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <label>Tên phiên</label> 
                    <input type="text" name="session" 
                    class="form-control" placeholder="Nhập tên phiên" value="{{$session->name_session}}"  />
                    <label>Mật khẩu phiên</label>
                    <input type="password" name="password" 
                    class="form-control" placeholder="Nhập mật khẩu phiên" value="{{$session->password_session}}"  />
                </div>
                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" style="background-color: #e63900" />
            </form>
        </div>
    <div>

@endsection