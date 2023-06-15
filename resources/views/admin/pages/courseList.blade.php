@extends('admin.layouts.default')

@section('content')
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                <h2 class="mt-3 auth-heading text-center mb-4">Course List</h2>

                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <!-- <th class="cell">Session </th> -->
                                <th class="cell">Course Title</th>
                                <th class="cell">Course Code</th>
                                <th class="cell">Credit</th>
                                <th class="cell">Semester</th>
                                <th class="cell"  >Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($course as $s)
                            <tr>
                                
                                <td class="cell">{{$s->ctitle}}</td>
                                <td class="cell">{{$s->ccode}}</td>
                                <td class="cell">{{number_format($s->credit,2)}}</td>
                                 @if($s->semester==1)
                                 <td class="cell"> {{$s->semester}}st Semester</td>
                                    @elseif($s->semester==2)
                                    <td class="cell"> {{$s->semester}}nd Semester</td>
                                    @elseif($s->semester==3)
                                    <td class="cell"> {{$s->semester}}rd Semester</td>
                                    @else
                                    <td class="cell"> {{$s->semester}}th Semester</td>
                                @endif
                                <td class="cell"><a class="btn-sm app-btn-secondary"data-bs-toggle="modal" data-bs-target="#myModal{{$s->id}}" href="#">Delete</a> <a class="btn-sm app-btn-secondary"  href="{{url('edit-course/'.$s->id)}}">Update</a></td>
                               
                            </tr>
                            <div class="modal" id="myModal{{$s->id}}">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                    <!-- Modal Header -->
                                    <div class="modal-header">
                                        <h4 class="modal-title text-danger">Warrning!!</h4>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                    </div>

                                    <!-- Modal body -->
                                    <div class="modal-body">
                                        Are you sure you want to delete <b>{{$s->ctitle}}</b>?
                                    </div>

                                    <!-- Modal footer -->
                                    <div class="modal-footer">
                                        <a class="btn btn-danger" href="{{url('delete-course/'.$s->id)}}">Yes</a>
                                        <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                                    </div>

                                    </div>
                                </div>
                            </div>
                            
                            @endforeach
                          
                        </tbody>
                    </table>
                </div>
                <!--//table-responsive-->

            </div>
            <!--//app-card-body-->
        </div>

    </div>

</div>
<!--//tab-content-->

@endSection

@section('script')

@endSection