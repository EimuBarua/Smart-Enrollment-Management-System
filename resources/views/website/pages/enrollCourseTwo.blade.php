@extends('admin.layouts.default')
@section('styles')
<style>
    /* myAccordion */
    .myaccordion,
    .myaccordion * {
        box-sizing: border-box;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
    }

    .myaccordion {
        overflow: hidden;
        border-radius: 3px;
        background: #FFFFFF;
    }

    /* Section Title */
    .section-title {
        display: inline-block;
        width: 100%;
        padding: 15px;
        transition: all linear 0.15s;
        font-size: 18px;
        text-shadow: 0px 1px 0px #1b1b1b;
    }

    .section-title.myactive,
    .section-title:hover {
        color: #51B37F;
    }

    .section:last-child .section-title {
        border-bottom: none;
    }

    .section-title:after {
        /* Unicode character for "plus" sign (+) */
        content: '\02795';
        font-size: 13px;
        color: #831616;
        float: right;
        margin-left: 5px;
    }

    .section-title.myactive:after {
        /* Unicode character for "minus" sign (-) */
        content: "\2796";
    }

    /* Section Content */
    .section-content {
        display: none;
        padding: 20px;
    }

    a {
        color: black;
    }
</style>
@endSection
@section('content')
<h3>Create an myAccordion with HTML, CSS and jQuery</h3>
<form class="auth-form login-form w-100" method="post" action="{{ url('addenroll/'.Session::get('userid').'/'.$id) }} "
    enctype="multipart/form-data">
    {{ csrf_field() }}

    <div class="myaccordion">
        @foreach ($semester as $s)
        <div class="section">
            <a class="section-title" id="{{$s->semester}}" href="#myaccordion-{{$s->semester}}">
                @if($s->semester==1)
                <td class="cell"> {{$s->semester}}st Semester</td>
                @elseif($s->semester==2)
                <td class="cell"> {{$s->semester}}nd Semester</td>
                @elseif($s->semester==3)
                <td class="cell"> {{$s->semester}}rd Semester</td>
                @else
                <td class="cell"> {{$s->semester}}th Semester</td>
                @endif
            </a>
            <div id="myaccordion-{{$s->semester}}" class="section-content list-group">
            </div><!-- section-content end -->
        </div><!-- section end -->
        @endforeach
    </div><!-- myaccordion end -->
    <div class="text-center mt-5">
        <button type="submit" class="btn app-btn-primary  theme-btn mx-auto">submit</button>
    </div>
</form>



@endSection

@section('script')
<script>
    $(document).ready(function () {
        $('.section-title').click(function (e) {
            // Get current link value
            var currentLink = $(this).attr('href');
            if ($(e.target).is('.myactive')) {
                close_section();
            } else {
                // close_section();
                // Add myactive class to section title
                $(this).addClass('myactive');
                // Display the hidden content
                $('.myaccordion ' + currentLink).slideDown(350).addClass('open');
            }
            // $(this).toggleClass("myactive");
            // $('.myaccordion ' + currentLink).slideDown(350).toggleClass("open"); 
            // e.preventDefault();



        });

        function close_section() {
            $('.myaccordion .section-title').removeClass('myactive');
            $('.myaccordion .section-content').removeClass('open').slideUp(350);
        }
        $('.section-title').one('click', function () {
            $id = $(this).attr("id");
            // console.log($id);
            $obj = $(this).siblings('.list-group');
            $s = '';
            $.ajax({
                url: "http://127.0.0.1:8000/api/semester-subjects/" + $id,
                type: 'GET',
                dataType: 'json', // added data type
                success: function (res) {
                    $.each(res.data, function (index, value) {

                        $s += `<li class="list-group-item d-flex justify-content-between">
                                <div>
                                    <input class="form-check-input me-1" value="${value.id}" type="checkbox" name="course_id[]"
                                    aria-label="...">
                                    <span>${value.ctitle}</span>
                                </div>
                                <div>
                                    <select name="type[]" class="form-select form-select-sm">
                                        <option disabled hidden selected>Select Type</option>
                                        <option value="regular">Regular</option>
                                        <option value="recourse">Recourse</option>
                                        <option vlaue="retake">Retake</option>
                                    </select>
                                </div>
                                
                          </li>`;
                    });
                    console.log($s);
                    $obj.append($s);
                }
            });
        });
    });
</script>

@endSection