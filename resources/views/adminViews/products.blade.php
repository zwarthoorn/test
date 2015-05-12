@extends('master')


@section('content')
	 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>discription</th>
                                            <th>foto</th>
                                            <th>delete</th>
                                            <th>edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                     @foreach($products as $product)
                                         <tr class="odd gradeX">
                                            <td>{{$product['name']}}</td>
                                            <td>{!! $product['discription'] !!}</td>
                                             <td><img src="/{{$product['imgpath']}}" alt="" height="42" width="42"></td>
                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'url'=>'admin/product/'.$product['id']]) !!}
                                                <button>delete</button>
                                                {!! Form::close()!!}
                                            </td>    
                                            <td>
                                                <form action="/admin/catagory" method="get">
                                                    <button>edit</button>
                                                 </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                            {!! Form::open(['url'=>'admin/product/create','method'=>'GET'])!!}
                            <button>New Product</button>
                            {!! Form::close()!!}
                            
    </div>

@stop