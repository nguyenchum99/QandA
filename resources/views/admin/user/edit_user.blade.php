
@extends('admin.layouts.index')

@section('content')

        <div style ="width: 45%">

            <h2>Sửa thông tin người dùng</h2>
            @if(count($errors) > 0)
            <div class="alert alert-danger">
            
                @foreach ($errors -> all() as $err)
                    {{$err}}<br>
                @endforeach
            
            </div>
         @endif

            <form method="post" action="{{$user->id}}">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                	<label>Tên đăng nhập</label>
                    <input type="text" name="name" class="form-control" value="{{$user->name}}"/>
                </div>

                <div class="form-group">
                	<label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" value="{{$user->password}}"  />
                </div>

                <div class="form-group">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{$user->email}}" readonly="" />
                </div>

                <div class="form-group">
                    <label>Quyền người dùng</label>
                    <label class="radio-inline">
                        <input name="level" value="0" 
                        @if($user->level == 0)
                            {{"checked"}}
                        @endif
                        type="radio"> Người dùng
                    </label>

                    <label class="radio-inline">
                        <input name="level" value="1" 
                            @if($user->level == 1)
                                {{"checked"}}
                            @endif
                        type="radio">Quản trị viên
                    </label>
                    
                </div>

                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" style="background-color: #737373"/>
            </form>
        </div>
    <div>

@endsection

