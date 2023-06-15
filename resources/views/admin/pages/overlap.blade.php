@extends('admin.layouts.default')

@section('content')

<div class="tab-content" id="orders-table-tab-content">
    <div class="tab-pane fade show active" id="orders-all" role="tabpanel" aria-labelledby="orders-all-tab">
        <div class="app-card app-card-orders-table shadow-sm mb-5">
            <div class="app-card-body">
                <div class="table-responsive">
                <h2 class="mt-3 auth-heading text-center mb-4">Overlapping Subjects</h2>

                <div class="px-3 col-lg-4 col-md-12  col-sm-12 email  mb-3"  >
                        <label class="" for="fname">Session</label>
                        <br>
                        <select class="form-control" name="session" data-component="date" id="session">
                            <option value='0' >Select Session</option>
                            @foreach($session as $s)
                            <option value="{{$s->id}}">{{$s->session}}</option>
                            @endforeach
                           
                        </select>
                    </div>
                    <div class="sem">

                       
                               
                              
                           
                    </div>
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

<script>
    $(document).ready(function(){
        $("#session").on("keyup change", function(e) {
            var id = $("#session").val();
              //  console.log(id);
            $( ".sem" ).empty();
            $.ajax({
            url: "http://127.0.0.1:8000/api/overlap/"+id,
            type: 'GET',
            async: true,
            dataType: 'json', // added data type
            success: function(res) {
                if(id==0)
                id=0;
               else if(res.data.length==1)
                {
                     $s=`<p class="d-flex justify-content-center">No Overlapping Found!!!</p>`;
                     $(".sem").append($s);
                }
                else
                {

                    // res.data.reverse();
                        //console.log(res.data);
                     //  console.log(res.data);
                    
                      $s=` <table class="table app-table-hover mb-0 text-left">
                                    <thead>
                                        <tr>
                                            <!-- <th class="cell">Session </th> -->
                                            <th class="cell">Semester</th>
                                            <th class="cell">Course Title</th>
                                            <th class="cell">Course Code</th>
                                            <th class="cell">Credit</th>
                                            <th class="cell">Students</th>
                                        </tr>
                                    </thead>
                                    <tbody>`;
                                var element=[];
                                $.each(res.data, function(stu, ss) {
                                    element.push(stu);
                                });
                                element.reverse();
                                  // console.log(element);
                          $.each(element, function(index, ss) {
                            $.each(res.data[ss],function(sub,cc){
                                var ok=cc;
                                $.each(ok,function(sem,co){
                                  //  console.log(sem);
                                    var c=sub;
                                    var ctitle='';
                                    var ccode='';
                                    while(c[0]!='#')
                                    {
                                        ctitle+=c[0];
                                        c = c.slice(1);
                                    }
                                    //   console.log(c);
                                    c = c.slice(1);
                                    while(c[0]!='#')
                                    {
                                        ccode+=c[0];
                                        c = c.slice(1);
                                    }
                                    c = c.slice(1);
                                  //  console.log(sem,' ',ctitle,' ',ccode);
                                $s+=`<tr>
                                        
                                        <td class="cell">${sem}</td>
                                        <td class="cell">${ctitle}</td>
                                        <td class="cell">${ccode}</td>
                                        <td class="cell">${c}</td>
                                        <td class="cell">${ss}</td>
                                    </tr>`;
                                
                          });
                        });
                        });
                        $s+=`</tbody>
                            </table>`;
                            $(".sem").append($s);
                      
                }
                        }//
                    });//
                })//

                            
       
        
    });
</script>

@endSection