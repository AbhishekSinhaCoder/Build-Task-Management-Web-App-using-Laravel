@extends('layouts.main')

@section('content')



 <!-- Content -->
 <div class="content">
            <!-- Animated -->
            <div class="animated fadeIn">
           
               
                <div class="clearfix"></div>
                <!-- Orders -->
                <div class="orders">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="box-title">Tasks </h4>
                                </div>
                                <div class="card-body--">
                                    <div class="table-stats order-table ov-h">
                                        <table class="table ">
                                            <thead>
                                                <tr>
                                                    <th class="serial">#</th>
                                                   
                                                    <th>Title</th>
                                                    <th>Description</th>
                                                    <th>Progress</th>
                                                    <th>Status</th>
                                                    <th>Edit</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                               @foreach($tasks as $task) 
                                                <tr>
                                                    <td class="serial">{{$task->id}}</td>
                                                   
                                                    <td>  <span class="name">{{$task->title}}</span> </td>
                                                    <td> <span class="product">{{$task->description}}</span> </td>
                                                    <td><span class="count">{{$task->progress}}</span></td>
                                                    <td>
                                                        @if($task->status == 'complete')
                                                        <span class="badge badge-pending" style="background:blue">{{$task->status}}</span>
                                                        @else
                                                        <span class="badge badge-pending" style="background:brown">{{$task->status}}</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-complete"><a style="color:white" href="{{route('editTaskForm',['id'=>$task->id])}}"> Edit </a></span>
                                                    </td>

                                                    <td>
                                                        <span style="background:red" class="badge badge-complete"><a style="color:white" onclick="return confirm('are you sure?')" href="{{route('deleteTask',['id'=>$task->id])}}"> Delete </a></span>
                                                    </td>
                                            
                                                </tr>
                                              @endforeach
                                                
                                               
                                            </tbody>
                                        </table>
                                    </div> <!-- /.table-stats -->
                                </div>
                            </div> <!-- /.card -->
                        </div>  <!-- /.col-lg-8 -->

                </div>
                <!-- /.orders -->
            

        

            </div>
            <!-- .animated -->
        </div>
        <!-- /.content -->
        <div class="clearfix"></div>





@endsection