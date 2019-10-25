
@extends('admin.layouts.index')

@section('content')

        <div style ="width: 40%">
            <h2>Tạo câu trả lời</h2>
            <h3>{{$question ->question}}</h3>
        	 {{-- thông báo lỗi --}}
             @if(count($errors) > 0)
             <div class="alert alert-danger">
             
                 @foreach ($errors -> all() as $err)
                     {{$err}}<br>
                 @endforeach
             
             </div>
          @endif

         <form method="post" action="{{$question->id}}">
             <div class="form-group">
                 <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                 <textarea type="text" name="answer" 
                  class="form-control" placeholder="Nội dung câu trả lời"></textarea>
             </div>

             <input type="submit" name="submit" value="Thêm câu trả lời" class="btn btn-primary" />
         </form>
        </div>
    <div>

@endsection

