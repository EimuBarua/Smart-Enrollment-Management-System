@extends('admin.layouts.default')

@section('content')
<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                <h3 class="mt-3 auth-heading text-center mb-4">On <span class="text-success">{{$s}}</span> Session's Offered Courses List</h2>

                    <table class="table app-table-hover mb-0 text-left">
                        <thead>
                            <tr>
                                <!-- <th class="cell">Session </th> -->
                                <th class="cell">Course Title</th>
                                <th class="cell">Course Code</th>
                                <th class="cell">Semester</th>
                                <th class="cell"  >Credit</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($oSub as $s)
                            <tr>
                                
                                <td class="cell">{{$s->course_title}}</td>
                                <td class="cell">{{$s->course_code}}</td>
                                 @if($s->semester==1)
                                 <td class="cell"> {{$s->semester}}st Semester</td>
                                    @elseif($s->semester==2)
                                    <td class="cell"> {{$s->semester}}nd Semester</td>
                                    @elseif($s->semester==3)
                                    <td class="cell"> {{$s->semester}}rd Semester</td>
                                    @else
                                    <td class="cell"> {{$s->semester}}th Semester</td>
                                @endif
                                <td class="cell">{{number_format($s->credit,2)}}</td>
                               
                            </tr>
                            
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