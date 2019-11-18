


<div class="bg-light border-right" style="margin-left: 80px;">
<ul class="list-group nav-bar">
    @if(Auth::check())

    <div class="w3-sidebar w3-light-grey w3-bar-block " style="width:18%">

            <h4 class="w3-bar-item" style="color:#000000"><b>Thông tin tài khoản</b></h4>
            <a href="{{url('/user/page/info/'.Auth::user()->id)}}" 
                class="w3-bar-item w3-button"  style="text-decoration: none;">Thông tin của tôi</a>
            <a href="{{url('/user/page/edit/'.Auth::user()->id)}}" 
                class="w3-bar-item w3-button" style="text-decoration: none;">Thay đổi thông tin</a>
            <h4 class="w3-bar-item" style="color:#000000"><b>Quản lý</b></h4>
            <a href="{{url("user/manage/createsession")}}"
             class="w3-bar-item w3-button" style="text-decoration: none;">Tạo phiên Hỏi-đáp</a> 
            <a href="{{url('user/manage/list/'.Auth::user()->id)}}" 
                class="w3-bar-item w3-button"  style="text-decoration: none;">Phiên hỏi đáp của tôi</a>
            <h4 class="w3-bar-item" style="color:#000000"><b>Phiên hỏi đáp</b></h4> 
            <a href="{{url("user/survey/survey_page")}}" 
            class="w3-bar-item w3-button" style="text-decoration: none;">Làm khảo sát</a> 
            <a href="{{url("user/session/list_session_active")}}" 
            class="w3-bar-item w3-button" style="text-decoration: none;">Phiên hỏi đáp hoạt động</a>
            <a href="{{url("user/session/list_session_close")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Phiên hỏi đáp đã đóng</a> 
            {{-- <a href="{{url("user/page/listquestion")}}" class="w3-bar-item w3-button" style="text-decoration: none;">Tất cả câu hỏi</a> --}}

            
    </div>
    @endif
</ul>
</div>
