



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

    {{-- <li class="slide"><a href="" class="list-group-item ">Thông tin tài khoản</a>
        <ul class="list-group" id="menu">
                <li class="list-group-item"><a href="{{url('/user/info/'.Auth::user()->id)}}" >Thông tin của tôi</a></li>
                <li class="list-group-item"><a href="{{url('/user/edit/'.Auth::user()->id)}}" >Thay đổi thông tin</a></li>
                
        </ul>
    </li>

    <li class="slide"><a href="" class="list-group-item ">Quản lý</a>

        <ul class="list-group" id="menu">
            <li class="list-group-item"><a href="#" >Câu hỏi của tôi</a></li>
            <li class="list-group-item"><a href="#" >Câu trả lời của tôi</a></li>
            
        </ul>
    </li>

    <li class="slide"><a href="" class="list-group-item">Phiên hỏi dáp</a>
        <ul class="list-group" id="menu">
                <li class="list-group-item"><a href="#" >Phiên hỏi đáp hoạt động</a></li>
                <li class="list-group-item"><a href="#" >Phiên hỏi đáp đã đóng</a></li>
                <li class="list-group-item"><a href="{{url("user/allquestion")}}" >Tất cả câu hỏi</a></li>
                
        </ul>
    </li> --}}

    @endif

</ul>