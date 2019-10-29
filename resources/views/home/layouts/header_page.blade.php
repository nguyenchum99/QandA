

<nav class="navbar navbar-inverse" style="background-color: #365899" >
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#" style="margin-left: 70px">Trang chủ</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right" style="margin-right: 140px">

          @if (Auth::check())
            <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown" 
              role="button" aria-expanded="false" style="position: relative; padding-left: 50px;
              " >
                <img src="{{URL::asset('/img/avatars/'.Auth::user()->avatar)}}" 
                style="width:32px; height:32px; position: absolute; top:10px;left:10px; border-radius: 50%">
                {{Auth::user()->name}} <span class="caret"></span>
              </a>

              <ul class="dropdown-menu" role="menu">
                
                <li><a href="{{url('/user/page/edit/'.Auth::user()->id)}}">
                <i class="fa fa-gear fa-fw" ></i> Cập nhật thông tin</a>
                </li>


                <li class="divider"></li>
                <li><a href="{{url("user/logout")}}"><i class="fa fa-sign-out fa-fw" ></i>Đăng xuất</a>
                </li>
                
              </ul>
            </li>
          @endif
          
        </ul>
      </div>
    </div>
  
  </nav>
    