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
                                     
                                         <tr class="odd gradeX">
                                            <td>test</td>
                                            <td>test</td>

                                            <td>
                                                {!! Form::open(['method'=>"DELETE", 'url'=>'admin/brand/']) !!}
                                                <button>delete</button>
                                                {!! Form::close()!!}
                                            </td>    
                                            <td>
                                                <form action="/admin/catagory" method="get">
                                                    <button>edit</button>
                                                 </form>
                                            </td>
                                        </tr>
                                
                                      
                                       
                                    </tbody>
                                </table>
                            </div>
                            {!! Form::open(['url'=>'admin/product/create','method'=>'GET'])!!}
                            <button>New Product</button>
                            {!! Form::close()!!}
                            
    </div>

@stop