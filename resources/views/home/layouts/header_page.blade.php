

<nav class="navbar navbar-inverse" style="background-color: #365899" >
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">Trang chủ</a>
      </div>
      <div class="collapse navbar-collapse">
        <ul class="nav navbar-nav navbar-right">
          {{-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Đăng xuất</a></li> --}}
  
          <li class="dropdown">
  
            <a class="dropdown-toggle" data-toggle="dropdown" href="# ">
              <i class="fa fa-user fa-fw"></i> 
              <i class="fa fa-caret-down"></i>
              
              <ul class="dropdown-menu dropdown-user">
                
                  {{-- @if(isset($user_login)) --}}

                    <li><a href="#"><i class="fa fa-user fa-fw" ></i></a>
                    </li>
                    <li><a href="#"><i class="fa fa-gear fa-fw" ></i> Cài đặt</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="{{url("user/logout")}}"><i class="fa fa-sign-out fa-fw" ></i>Đăng xuất</a>
                    </li>
                    
                  {{-- @endif --}}

              </ul>
          </li>
        </ul>
      </div>
    </div>
  
  </nav>
    