@extends('admin.layouts.default')
@section('styles')
<style>
    .size{
        font-size: 15px;
        position: relative;
        top:15px;
        left:10px;
    }
    .accordion-button:focus {
        box-shadow: none;
        border-color: rgba(0,0,0,.125);
    }
    .accordion-button:not(.collapsed) {
        
        background-color: transparent;
    }
</style>
@endSection
@section('content')
<div class="row g-0 app-auth-wrapper">
    <div class="col-12 col-md-12 col-lg-12 auth-main-col text-center p-5">
        <div class="d-flex w-100 flex-column align-content-end">
            <div class="app-auth-body w-100 ">
                <div class="auth-form-container text-start w-100 ">
                    <form class="auth-form login-form w-100" method="post" action="{{ url('addsession-courses/'.$id) }} "
                        enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="accordion w-100 " id="accordionPanelsStayOpenExample">
                            @foreach ($semester as $s)
                            <div class="accordion-item w-100 ">
                                
                                <h2 class="accordion-header w-100 d-flex " id="{{$s->semester}}">
                                    <input class="size checkAll form-check-input me-3" title="select all" type="checkbox" value=""
                                    aria-label="...">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#panelsStayOpen-collapse{{$s->semester}}" aria-expanded="false"
                                        aria-controls="panelsStayOpen-collapse{{$s->semester}}">
                                        

                                        @if($s->semester==1)
                                        <td class="cell"> {{$s->semester}}st Semester</td>
                                        @elseif($s->semester==2)
                                        <td class="cell"> {{$s->semester}}nd Semester</td>
                                        @elseif($s->semester==3)
                                        <td class="cell"> {{$s->semester}}rd Semester</td>
                                        @else
                                        <td class="cell"> {{$s->semester}}th Semester</td>
                                        @endif
                                       

                                       
                                    </button>
                                </h2>
                                <div id="panelsStayOpen-collapse{{$s->semester}}" class="accordion-collapse collapse w-100 "
                                    aria-labelledby="{{$s->semester}}">
                                    <div class="accordion-body">
                                        <ul class="list-group">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach


                        </div>



                        <!--//nav-item-->

                        <div class="text-center mt-5">
                            <button type="submit" class="btn app-btn-primary  theme-btn mx-auto">submit</button>
                        </div>
                    </form>


                </div>
                <!--//auth-form-container-->

            </div>
            <!--//auth-body-->


            <!--//app-auth-footer-->
        </div>
        <!--//flex-column-->
    </div>

    <!--//auth-background-col-->

</div>
@endSection

@section('script')
<script>
    $(document).ready(function(){
        $(".checkAll").click(function () {
            $(this).parent().siblings('.accordion-collapse').find('input:checkbox').not(this).prop('checked', this.checked);
        });

        
        $('.accordion-button').one('click', function(){
            $obj=$(this).parent().siblings('.accordion-collapse').find('.list-group');
            console.log($obj);
            $id=$(this).parent().attr("id");
            $s='';
            $.ajax({
            url: "http://127.0.0.1:8000/api/semester-subjects/"+$id,
            type: 'GET',
            dataType: 'json', // added data type
            success: function(res) {
                $.each(res.data, function(index, value) {
                    
                    $s+=`<li class="list-group-item">
                                <input class="form-check-input me-1" value="${value.id}" type="checkbox" name="course_id[]"
                                    aria-label="...">
                                ${value.ctitle}
                          </li>`;
                });
                
                $obj.append($s);
                

            }
        });
        });
        
    });
</script>

@endSection