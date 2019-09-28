
@extends('admin.layouts.index')

@section('content')

        <div style ="width: 40%">
            <h2>Thêm thông tin người dùng</h2>
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

            <form method="post" action="{{url("admin/user/adduser")}}">

                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                <div class="form-group">
                	<label>Tên đăng nhập</label>
                    <input type="text" name="name" class="form-control" placeholder="Tên đăng nhập"  />
                </div>

                <div class="form-group">
                	<label>Mật khẩu</label>
                    <input type="password" name="password" class="form-control" placeholder="Mật khẩu"  />
                </div>

                <div class="form-group">
                	<label>Nhập lại mật khẩu</label>
                    <input type="password" name="passAgain" class="form-control" placeholder="Mật khẩu" />
                </div>

                <div class="form-group">
                	<label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="Email" />
                </div>

                <div class="form-group">
                    <label>Quyền người dùng</label>
                    <label class="radio-inline">
                        <input name="level" value="0" checked="" type="radio"> Người dùng
                    </label>

                    <label class="radio-inline">
                        <input name="level" value="1" type="radio">Admin
                    </label>
                    {{-- <select name="level" class="form-control">
                    	<option value="1" >Admin</option>
                        <option value="0" selected="selected">User</option>
                    </select> --}}
                </div>

                <input type="submit" name="submit" value="Thêm mới" class="btn btn-primary" />
            </form>
        </div>
    <div>

@endsection

