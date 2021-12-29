<br><br>
<div class="card-content collapse show ">
    <a data-toggle="modal" data-target="#productAddModel" style="margin-right:15px"
            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة منتج</a>

</div><br><br>
<table class="table display nowrap table-striped table-bordered scroll-horizontal">
    <thead>
    <tr>
        <th>#</th>
        <th>الصورة</th>
        <th>أسم المنتج</th>
        <th> الوصف</th>
        <th> السعر</th>
        <th> السعر بعد الخصم</th>
        <th>  المشاهدات</th>
        <th> عدد المنتج </th>
        <th> وقت الأنشاء</th>

        <th>الإجراءات</th>
    </tr>
    </thead>
    <tbody>

    @isset($PlaceProducts)
        @foreach($PlaceProducts as $each)
            <tr>
                <td>{{$each->id}}</td>
                <td><img width="100px" src="{{url('uploads/products/'.$each->main_image)}}"/></td>
                <td>{{$each->name}}</td>
                <td  width="width: 200px;display: grid;">{{ substr($each->description,0,50) }}...</td>
                <td>{{$each->old_price}}</td>
                <td>{{$each->new_price}}</td>
                <td>{{$each->rate}}</td>
                <td>{{$each->Equip}}</td>
                <td>{{$each->created_at}}</td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic xexample">

                        <a href="{{route('admin.destroy.product', $each->id)}}"
                            class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>
                        @if ($each->is_active == 0)
                            <a href="{{route('admin.product.accept', $each->id)}}"
                            class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">تفعيل</a>
                        @else
                            <a href="{{route('admin.product.accept', $each->id)}}"
                            class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">إلغاء تفعيل المنتج</a>
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
