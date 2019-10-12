



<ul class="list-group nav-bar">
    @if(Auth::check())

    <li class="slide"><a href="" class="list-group-item ">Thông tin tài khoản</a>
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
                <li class="list-group-item"><a href="#" >Tất cả câu hỏi</a></li>
                
        </ul>
    </li>

    @endif

</ul>