
@extends('admin.layouts.index')

@section('content')

        <div style ="width: 40%">
            <h3>Tạo câu hỏi của người dùng</h3>
            <h4>Phiên hỏi đáp:  {{$session->name_session}}<h4>
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

         <form method="post" action="{{$session->id}}">
             <div class="form-group">
                 <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                 <textarea type="text" name="question" rows="3"
                 class="form-control" placeholder="Nội dung câu hỏi" ></textarea>
             </div>

             <input type="submit" name="submit" value="Thêm câu hỏi trong phiên" class="btn btn-primary" />
         </form>
        </div>
    <div>

@endsection

