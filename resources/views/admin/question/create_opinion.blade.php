
@extends('admin.layouts.index')

@section('content')

        
        <div style ="width: 40%">
            <h3>Tạo phiếu lấy ý kiến phản hồi </h3>
            @if(session('thongbao'))

            <div class="alert alert-success">
                {{session('thongbao')}}
            </div>

            @endif

            @if(count($errors) > 0)
                <div class="alert alert-danger">
                
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                
                </div>
            @endif

            <form method="post" action="{{url("admin/question/create_opinion")}}">
          
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <textarea type="text" rows="2" name="question" class="form-control" placeholder="Chủ đề" ></textarea>
                    <br><input type="text" name="choice1" class="form-control" placeholder="Nội dung  1">
                    <br><input type="text" name="choice2" class="form-control" placeholder="Nội dung 2">
                    <br><input type="text" name="choice3" class="form-control" placeholder="Nội dung 3">
                    <br><input type="text" name="choice4" class="form-control" placeholder="Nội dung 4">
                </div>
                <input type="submit" name="submit" value="Tạo" class="btn btn-primary" style="background-color: #737373"/>
            </form>

        </div>

   
   
@endsection

