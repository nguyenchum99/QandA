



<ul class="list-group nav-bar">
    @if(Auth::check())

    <div class="w3-sidebar w3-light-grey w3-bar-block " style="width:23%">

            <h4 class="w3-bar-item">Thông tin tài khoản</h4>
            <a href="{{url('/user/page/info/'.Auth::user()->id)}}" class="w3-bar-item w3-button">Thông tin của tôi</a>
            <a href="{{url('/user/page/edit/'.Auth::user()->id)}}" class="w3-bar-item w3-button">Thay đổi thông tin</a>
            <h4 class="w3-bar-item">Quản lý</h4>
            <a href="{{url("user/manage/createsession")}}" class="w3-bar-item w3-button">Tạo phiên Hỏi-đáp</a>
            <a href="{{url("user/manage/display_session")}}" class="w3-bar-item w3-button">Tạo câu hỏi</a> 
            <h4 class="w3-bar-item">Phiên hỏi dáp</h4>  
            <a href="{{url("user/session/list_session_active")}}" class="w3-bar-item w3-button">Phiên hỏi đáp hoạt động</a>
            <a href="{{url("user/session/list_session_close")}}" class="w3-bar-item w3-button">Phiên hỏi đáp đã đóng</a> 
            <a href="{{url("user/page/listquestion")}}" class="w3-bar-item w3-button">Tất cả câu hỏi</a>

            
    </div>


    @endif

</ul>