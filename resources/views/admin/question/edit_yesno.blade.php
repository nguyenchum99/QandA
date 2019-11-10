@extends('admin.layouts.index')

@section('content')

        <div style ="width: 50%">

            {{-- thông báo lỗi --}}

            <h2>Sửa nội dung câu hỏi</h2>
                @if(count($errors) > 0)
                <div class="alert alert-danger"  >
                
                    @foreach ($errors -> all() as $err)
                        {{$err}}<br>
                    @endforeach
                
                </div>
            @endif

            {{-- hiện thị sửa thành công --}}
            @if(session('thongbao'))

            <div class="alert alert-success"  style="width:50%">
                {{session('thongbao')}}
            </div>
            @endif

            <form method="post" action="{{$question->id}}">
                <div class="form-group">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>    
                    <input type="text" name="question" 
                    class="form-control" placeholder="Sửa câu hỏi" value="{{$question->question}}"  />
                </div>

                <input type="submit" name="submit" value="Sửa" class="btn btn-primary" style="background-color: #737373"/>
            </form>
        </div>
    <div>

@endsection