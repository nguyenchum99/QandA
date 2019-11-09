
@extends('home.layouts.index_page')
@section('content')
        <div style ="width: 50%; margin-left:20px" >
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

            <h2>Sửa tên phiên hỏi đáp</h2>
            <form method="post" action="{{$session->id}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <input type="text" name="session" 
                    class="form-control" placeholder="Sửa phiên" value="{{$session->name_session}}"  />
                    <input type="password" name="password" 
                    class="form-control" placeholder="" value="{{$session->password_session}}"  />
                </div>
                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" />
            </form>
        </div>
    <div>

@endsection