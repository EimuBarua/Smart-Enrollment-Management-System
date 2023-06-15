@extends('admin.layouts.default')

@section('content')
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-12 auth-main-col text-center p-5">


        <!-- <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div> -->
        <h2 class="auth-heading text-center mb-4">Create a Course</h2>

        <div class="auth-form-container text-start mx-auto">
            <form class="auth-form auth-signup-form" method="post" action="{{ url('add-course') }} "
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                   
                  
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Course Title</label>
                        <br>
                        <input type="text" class="form-control" id="exampleInputEmail1" name='ctitle' placeholder="Enter Course Title">
                    </div>
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Course Code</label>
                        <br>
                        <input type="text" class="form-control" id="exampleInputEmail1" name='ccode' placeholder="Enter Course Code">
                    </div>
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Credit </label>
                        <br>
                        <input type="float" class="form-control" id="exampleInputEmail1" name='credit' placeholder="Enter Credit">
                    </div>
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Semester</label>
                        <br>
                        <select class="form-control" name="semester" data-component="date">
                            <option>Select Semester</option>
                            @for($i=1;$i<=8;$i++)
                                    @if($i==1)
                                    <option value="{{$i}}">{{$i}}st Semester</option>
                                    @elseif($i==2)
                                    <option value="{{$i}}">{{$i}}nd Semester</option>
                                    @elseif($i==3)
                                    <option value="{{$i}}">{{$i}}rd Semester</option>
                                    @else
                                    <option value="{{$i}}">{{$i}}th Semester</option>
                                    @endif
                         
                            @endfor
                        </select>
                    </div>
                  
                </div>
                <div class="col-lg-2 col-md-12  col-sm-12 email mb-3">
                    <label class="" for="fname"></label>
                    <div class="email mb-3 ">
                        <div class="text-center">
                            <button type="submit"
                                class="btn app-btn-primary w-100 theme-btn mx-auto">Create</button>
                        </div>
                    </div>
                </div>


                <br><br><br><br><br>


            </form>
            <br>




        </div>
    </div>

</div>
<!--//row-->

@endSection

@section('script')

@endSection