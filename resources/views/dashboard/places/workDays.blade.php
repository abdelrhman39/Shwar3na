<br><br>
<div class="card-content collapse show">
    <a data-toggle="modal" data-target="#myModal" style="margin-right:15px"
            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة مواعبد</a>

</div><br><br>
<table class="table display nowrap table-striped table-bordered scroll-horizontal">
    <thead>
    <tr>
        <th>#</th>
        <th>اليوم</th>
        <th> من</th>
        <th> الى</th>
        <th> وقت الأنشاء</th>

        <th>الإجراءات</th>
    </tr>
    </thead>
    <tbody>

    @isset($data)
        @foreach($data as $each)
            <tr>
                <td>{{$each -> id}}</td>
                <td>{{$each -> date_ar}} - {{$each -> date_en}}</td>
                <td>{{$each -> timeFrom}}</td>
                <td>{{$each -> timeTo}}</td>
                <td>{{$each -> created_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic xexample"> 
                        
                        <a href="{{route('admin.destroy.day', $each -> id)}}"
                            class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>


                    </div>
                </td>
            </tr>
        @endforeach
    @endisset


    </tbody>
</table>


    <!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافه مواعيد عمل</h4>
                <button type="button" class="close" data-dismiss="modal" style="    margin-left: 10px;">&times;</button>
            </div>
            <form id="basic-form" method="post"action="{{route('admin.place.addDay' , $place_id)}}" novalidate enctype="multipart/form-data" >
                {{ csrf_field() }}
                
                <div class="modal-body">
                    <input type="hidden" name="place_id" value="{{$place_id}}">
                    
                        <?php 
                            $Sat = "السبت";
                            $Sun = "الأحد";
                            $Mon = "الإثنين";
                            $Tue = "الثلاثاء";
                            $Wed = "الأربعاء";
                            $Thu = "الخميس";
                            $Fri = "الجمعة";
                        ?>
                        <div class="form-group ">
                            <label style="    font-size: arge;">أختار يوم </label>
                            <select class="form-control "  name="day" style="direction: rtl" >
                                <option value="" style="display: none;" >أختر يوم</option>
                                <option value="1">{{$Sat}}</option>
                                <option value="2">{{$Sun}}</option>
                                <option value="3">{{$Mon}}</option>
                                <option value="4">{{$Tue}}</option>
                                <option value="5">{{$Wed}}</option>
                                <option value="6">{{$Thu}}</option>
                                <option value="7">{{$Fri}}</option>

                        </select>
                        </div>
                        <div class="form-group ">
                            <label for="name" style="font-size: large;">من الساعه</label>
                            <input type="time" id="timeFrom" name='timeFrom' class="form-control"  required>
                        </div>
                        <div class="form-group ">
                            <label for="name" style="font-size: large;">الى الساعه</label>
                            <input type="time" id="name" name='timeTo' class="form-control"  required>
                        </div>


                </div>
                <button type="submit" name="Add_category"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                <br><br>

            </form>
        </div>

    </div>
</div>
