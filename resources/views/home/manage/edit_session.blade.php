
@extends('home.layouts.index_page')
@section('content')
        <div style ="width: 50%; margin-left:20px;color: #000000;" >
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
                <div class="form-group" style="margin-top: 10px">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>  
                    <label style="margin-top: 10px">Tên phiên</label> 
                    <input type="text" name="session" style="margin-top: 10px"
                    class="form-control" placeholder="Nhập tên phiên" value="{{$session->name_session}}"  />
                    <label style="margin-top: 10px">Mật khẩu phiên</label>
                    <input type="password" name="password" style="margin-top: 10px"
                    class="form-control" placeholder="Nhập mật khẩu phiên" value="{{$session->password_session}}"  />
                </div>
                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" 
                style="background-color:#a6a6a6; color:#000000" />
            </form>
        </div>
    <div>

@endsection