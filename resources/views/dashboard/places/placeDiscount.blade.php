<br><br>
<div class="card-content collapse show ">
    <a data-toggle="modal" data-target="#discountAddModel" style="margin-right:15px"
            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة عرض</a>

</div><br><br>
<table class="table display nowrap table-striped table-bordered scroll-horizontal">
    <thead>
    <tr>
        <th>#</th>
        <th>أسم العرض</th>
        <th> عنوان</th>
        <th> الرمز</th>
        <th> السعر</th>
        <th> السعر بعد الخصم</th>
        <th> وقت الأنتهاء</th>
        <th> عدد الاستخدام</th>
        <th> وقت الأنشاء</th>

        <th>الإجراءات</th>
    </tr>
    </thead>
    <tbody>

    @isset($discounds)
        @foreach($discounds as $each)
            <tr>
                <td>{{$each -> id}}</td>
                <td>{{$each -> title}}</td>
                <td>{{$each -> text}}</td>
                <td>{{$each -> code}}</td>
                <td>{{$each -> old_price}}</td>
                <td>{{$each -> new_price}}</td>
                <td>{{$each -> expired_date}}</td>
                <td>{{$each -> used}}</td>
                <td>{{$each -> created_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic xexample">

                        <a href="{{route('admin.destroy.copoun', $each -> id)}}"
                            class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>

                        @if ($each->is_active == 0)
                            <a href="{{route('admin.Copouns.accept', $each->id)}}"
                            class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">تفعيل</a>
                        @else
                            <a href="{{route('admin.Copouns.accept', $each->id)}}"
                            class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">إلغاء تفعيل العرض</a>
                        @endif

                    </div>
                </td>
            </tr>
        @endforeach
    @endisset


    </tbody>
</table>


    <!-- Modal -->
<div id="discountAddModel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة كوبون جديد</h4>
                <button type="button" class="close" data-dismiss="modal" style="    margin-left: 10px;">&times;</button>
            </div>
            <form id="basic-form" method="post"action="{{route('admin.place.addCopoun', $place_id)}}" novalidate enctype="multipart/form-data" >
                {{ csrf_field() }}

                <div class="modal-body">
                    <input type="hidden" name="place_id" value="{{$place_id}}">

                        <div class="form-group ">
                            <label style="    font-size: arge;">أسم العرض </label>
                            <input type="text" id="title" name='title' class="form-control"  required>

                        </div>
                        <div class="form-group ">
                            <label for="name" style="font-size: large;">العنوان</label>
                            <input type="text" id="text" name='text' class="form-control"  required>
                        </div>
                        <div class="form-group ">
                            <label for="name" style="font-size: large;">الرمز</label>
                            <input type="text" id="code" name='code' class="form-control"  required>
                        </div>
                        <div class="form-group ">
                            <label for="date" style="font-size: large;">تاريخ الانتهاء</label>
                            <input type="date" id="expired_date" name='expired_date' class="form-control"  required>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for="name" style="font-size: large;">السعر</label>
                                <input type="text" id="old_price" name='old_price' class="form-control"  required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="name" style="font-size: large;">السعر بعد الخصم</label>
                                <input type="text" id="new_price" name='new_price' class="form-control"  required>
                            </div>
                        </div>

                </div>
                <button type="submit" name="Add_discound"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                <br><br>

            </form>
        </div>

    </div>
</div>
