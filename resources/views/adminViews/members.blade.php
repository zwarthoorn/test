@extends('master')


@section('content')
	 <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>E-mail</th>
                                            <th>Online</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($users as $value)
                                         <tr class="odd gradeX">
                                            <td>{{$value['name']}}</td>
                                            <td><a href="/admin/members/{{$value['email']}}">{{$value['email']}}</a></td>
                                            @if($value['online'] == 1)
                                            <td>online</td>
                                            @else
                                            <td>offline</td>
                                            @endif
                                            <td class="center"><a href="/admin/members/edit/{{$value['id']}}">edit</a></td>
                                            <td class="center"><a href="/admin/members/delete/{{$value['id']}}">delete</a></td>
                                        </tr>
                                        @endforeach
                                       
                                       
                                    </tbody>
                                </table>
                            </div>

@stop