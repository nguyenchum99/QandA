

<form method = "get" action= "{{route('search')}}" id="searchForm" role="search" class ="navbar-formnavbar-left">
        <input type="hidden" name="_token" value ="{{csrf_token()}}";>
        <div class="input-group" style="margin: 10px 0 29px 0;"> 
            <input  type="text" class="form-control"  name="tukhoa" placeholder="Tìm kiếm..." >
            <span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
            
        </div>
</form>
    
    <ul class="list-group nav-bar">
        
        <li class="slide"><a href="{{url('admin/user/listuser')}}" class="list-group-item">User</a>
            <ul class="list-group" id="menu">
                <li class="list-group-item"><a href="{{url('admin/user/listuser')}}" >Danh sách</a></li>
                <li class="list-group-item"><a href="{{url('admin/user/adduser')}}" >Thêm mới</a></li>
            </ul>
        </li>

        <li class="slide"><a href="{{url('admin/session/list_session')}}" class="list-group-item">Phiên hỏi đáp</a>
          
            <ul class="list-group" id="menu">
                    <li class="list-group-item"><a href="{{url('/admin/session/list_session')}}" >Danh sách phiên</a></li>
                    <li class="list-group-item"><a href="{{url('/admin/session/add_session')}}" >Thêm phiên</a></li>
            </ul>
         
        </li>

        <li class="slide"><a href="{{url('admin/question/listquestion')}}" class="list-group-item ">Câu hỏi</a>
        </li>

        <li class="slide"><a href="{{url('admin/answer/listanswer')}}" class="list-group-item">Bình luận</a>
        </li>


    </ul>