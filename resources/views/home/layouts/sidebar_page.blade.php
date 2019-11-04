



<ul class="list-group nav-bar">
    @if(Auth::user())

    <div class="w3-sidebar w3-light-grey w3-bar-block " style="width:18%">

            <h5 class="w3-bar-item" >Thông tin tài khoản</h5>
            <a href="{{url('/user/page/info/'.Auth::user()->id)}}" class="w3-bar-item w3-button"  style="text-decoration: none;">Thông tin của tôi</a>
            <a href="{{url('/user/page/edit/'.Auth::user()->id)}}" class="w3-bar-item w3-button" style="text-decoration: none;">Thay đổi thông tin</a>
            <h5 class="w3-bar-item">Quản lý</h5>
            <a href="{{url("user/manage/createsession")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Tạo phiên Hỏi-đáp</a> 
            <a href="{{url('user/manage/list/'.Auth::user()->id)}}" class="w3-bar-item w3-button"  style="text-decoration: none;">Phiên hỏi đáp của tôi</a>
            <h5 class="w3-bar-item">Phiên hỏi đáp</h5>  
            <a href="{{url("user/session/list_session_active")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Phiên hỏi đáp hoạt động</a>
            <a href="{{url("user/session/list_session_close")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Phiên hỏi đáp đã đóng</a> 
            <a href="{{url("user/page/listquestion")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Tất cả câu hỏi</a>

            
    </div>


    @endif

</ul>