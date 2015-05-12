@extends('master')


@section('content')
	 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Slug</th>
                                            <th>delete</th>
                                            <th>edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($cat as $value)
                                         <tr class="odd gradeX">
                                            <td>{{$value['name']}}</td>
                                            <td>{{$value['slug']}}</td>

                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'url'=>'admin/catagory/'.$value['id']]) !!}
                                                <button>delete</button>
                                                {!! Form::close()!!}
                                            </td>    
                                            <td>
                                                <form action="/admin/catagory/{{$value['id']}}" method="get">
                                                    <button>edit</button>
                                                 </form>
                                            </td>
                                        </tr>
                                
                                       @endforeach
                                       
                                    </tbody>
                                </table>
                            </div>
                            
    </div>
     <div class="panel-body">
    <script src="//tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <form action="/admin/catagory" method='post'>   
    <div class='form-group'>
        <input class="form-control" id="name" name='name' type="text" placeholder="catagory name">
        
    </div>
    
    <div class='form-group'>
        <input class="form-control" id="slug" name='slug' type="text" placeholder='slug' >
    </div>


    
    

    
    <input type="hidden" name="_token" value='{{ csrf_token() }}' />
    <button>send</button>
  </form>
  <script>
  var typeover = document.getElementById('name')
  var slug = document.getElementById('slug')

  typeover.onkeyup = function () {
    if(typeover.value.length < 5){
        slug.value = typeover.value;
    }
  }
</script>
</div>

@stop