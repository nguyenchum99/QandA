


    {{-- <ul class="list-group nav-bar">
        
        <li class="slide"><a href="{{url('admin/user/listuser')}}" class="list-group-item">Quản lý người dùng</a>
            <ul class="list-group" id="menu">
                <li class="list-group-item"><a href="{{url('admin/user/listuser')}}" style="text-decoration: none;">Danh sách người dùng</a></li>
                <li class="list-group-item"><a href="{{url('admin/user/adduser')}}" style="text-decoration: none;">Thêm tài khoản mới</a></li>
            </ul>
        </li>

        <li class="slide"><a href="{{url('admin/session/list_session')}}" class="list-group-item">Phiên hỏi đáp</a>
          
            <ul class="list-group" id="menu">
                    <li class="list-group-item"><a href="{{url('/admin/session/list_session')}}" style="text-decoration: none;">Danh sách phiên</a></li>
                    <li class="list-group-item"><a href="{{url('/admin/session/add_session')}}" style="text-decoration: none;">Thêm phiên hỏi đáp mới</a></li>
            </ul>
         
        </li>

        <li class="slide"><a href="{{url('admin/question/listquestion')}}" class="list-group-item ">Quản lý câu hỏi</a>
        </li>

        <li class="slide"><a href="{{url('admin/answer/listanswer')}}" class="list-group-item">Quản lý câu trả lời</a>
        </li>


    </ul> --}}

    <div class="bg-light border-right" id="sidebar-wrapper" style="margin-left:70px">
        <div class="list-group list-group-flush">
          <a href="{{url('admin/user/listuser')}}" class="list-group-item list-group-item-action bg-light">Danh sách người dùng</a>
          <a href="{{url('admin/user/adduser')}}" class="list-group-item list-group-item-action bg-light">Thêm tài khoản mới</a>
          <a href="{{url('admin/session/list_session')}}" class="list-group-item list-group-item-action bg-light">Danh sách phiên</a>
          <a href="{{url('/admin/session/add_session')}}" class="list-group-item list-group-item-action bg-light">Thêm phiên hỏi đáp mới</a>
          <a href="{{url('admin/question/listquestion')}}" class="list-group-item list-group-item-action bg-light">Quản lý câu hỏi</a>
          <a href="{{url('admin/answer/listanswer')}}" class="list-group-item list-group-item-action bg-light">Quản lý câu trả lời</a>
        </div>
      </div>