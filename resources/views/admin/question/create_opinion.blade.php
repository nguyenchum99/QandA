
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
                    <label>Chủ đề</label>
                    <textarea type="text" rows="2" name="question" class="form-control" placeholder="..." ></textarea>
                    {{-- <br><input type="text" name="choice1" class="form-control" placeholder="Nội dung 1">
                    <br><input type="text" name="choice2" class="form-control" placeholder="Nội dung 2">
                    <br><input type="text" name="choice3" class="form-control" placeholder="Nội dung 3">
                    <br><input type="text" name="choice4" class="form-control" placeholder="Nội dung 4">  --}}
                    <table class="table">
                        <thead>
                            <tr>
                                <th><a href="#" class="btn btn-info addRow">Thêm dòng</a></th>
                            </tr>
                        </thead> 
                        <tbody>
                            <tr>
                                <td><input type="text" name="choice[]" class="form-control" placeholder="Nội dung..."></td>
                                <td><a href="#" class="btn btn-danger remove">-</a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <input type="submit" name="submit" value="Tạo" class="btn btn-primary" style="background-color: #737373"/>
            </form>

        </div> 

       
   <script type="text/javascript">

        $('.addRow').on('click',function(){
            addRow();
        });

        function addRow(){
            var tr = '<tr>'+
                        '<td><input type="text" name="choice[]" class="form-control"></td>'+
                         '<td><a href="" class="btn btn-danger remove">-</a></td>'+
                    '</tr>';

            $('tbody').append(tr);
        };

        $('tbody').on('click','.remove',function(){
            $(this).parent().parent().remove();
        });

    </script>
   
   
@endsection

