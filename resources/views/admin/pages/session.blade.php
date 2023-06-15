@extends('admin.layouts.default')

@section('content')
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-7 col-lg-12 auth-main-col text-center p-5">


        <!-- <div class="app-auth-branding mb-4"><a class="app-logo" href="index.html"><img class="logo-icon me-2" src="assets/images/app-logo.svg" alt="logo"></a></div> -->
        <h2 class="auth-heading text-center mb-4">Create a Session</h2>

        <div class="auth-form-container text-start mx-auto">
            <form class="auth-form auth-signup-form" method="post" action="{{ url('add-session') }} "
                enctype="multipart/form-data">
                {{ csrf_field() }}

                <div class="row">
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Select Year</label>
                        <br>
                        <select class="form-control" name="session_year" data-component="date">
                            <option value=>Select an year</option>
                            @for($year=1900; $year<=date('Y'); $year++) <option value="{{$year}}">{{$year}}</option>
                                @endfor
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname">Select Session Type</label>
                        <br>
                        <select class="form-control" name="session_type" data-component="date">
                            <option>Select Type</option>
                            <option value="fall">Fall</option>
                            <option value="spring">Spring</option>
                        </select>

                    </div>
                    <div class="col-lg-2 col-md-12  col-sm-12 email mb-3">
                        <label class="" for="fname"></label>
                        <div class="email mb-3">
                            <div class="text-center">
                                <button type="submit"
                                    class="btn app-btn-primary w-100 theme-btn mx-auto">Create</button>
                            </div>
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