<br><br>
<div class="card-content collapse show ">
    <a data-toggle="modal" data-target="#productAddModel" style="margin-right:15px"
            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة منتج</a>

</div><br><br>
<table class="table display nowrap table-striped table-bordered scroll-horizontal">
    <thead>
    <tr>
        <th>#</th>
        <th>رقم الطلب</th>
        <th>اسم المشتري</th>
        <th>صورة المنتج</th>
        <th>أسم المنتج</th>
        <th> العدد</th>
        <th> السعر</th>
        <th> السعر بعد الخصم</th>
        <th>عنوان الاوردر</th>
        <th> وقت الطلب</th>
        <th>الحاله</th>

        <th>الإجراءات</th>
    </tr>
    </thead>
    <tbody>



    @isset($PlaceOrders)
        @foreach($PlaceOrders as $each)
            <tr>
                <td>{{$each->id}}</td>
                <td>{{$each->order_number}}</td>
                <td>{{$each->name}}</td>
                <td><img width="100px" src="{{url('uploads/products/'.$each->main_image)}}"/></td>
                <td>{{$each->product_name}}</td>
                <td>{{ $each->quantity }}</td>
                <td>{{$each->old_price}}</td>
                <td>{{$each->new_price}}</td>
                <td>{{$each->address}}</td>
                <td>{{$each->created_at}}</td>
                <td>
                    @if ($each->state == 'cancel')
                            تم رفض الطلب
                    @elseif ($each->state == 'Accepted')
                        جاري تجهيز طلبك
                    @elseif ($each->state == 'Shipped')
                        تم الشحن
                    @elseif ($each->state == 'delivered')
                        تم التسليم
                    @elseif ($each->state == '')
                        لم يتم الرد من صاحب المحل
                    @endif
                </td>
                <td>
                    <div class="btn-group" role="group" aria-label="Basic xexample">


                        @if ($each->state == 'cancel')
                            <div class="dropdown">
                                <button class="dropbtn">تعديل الحاله </button>
                                <div class="dropdown-content">
                                  <a href="{{ url('admin/Places/Accepted_order/'.$each->id) }}">قبول وجاري التجهيز</a>
                                  <a href="{{ url('admin/Places/Shipped_order/'.$each->id) }}">قبول وتم الشحن </a>
                                  <a href="{{ url('admin/Places/delivered_order/'.$each->id) }}">تم التسيلم</a>
                                </div>
                            </div>

                        @elseif ($each->state == 'Accepted')
                            <div class="dropdown">
                                <button class="dropbtn">تعديل الحاله </button>
                                <div class="dropdown-content">
                                  {{-- <a href="{{ url('Accepted_order/'.$each->id) }}">جاري التجهيز</a> --}}
                                  <a href="{{ url('admin/Places/Shipped_order/'.$each->id) }}">تم الشحن </a>
                                  <a href="{{ url('admin/Places/delivered_order/'.$each->id) }}">تم التسيلم</a>
                                </div>
                            </div>

                            <a href="{{ url('admin/Places/cancel_order/'.$each->id) }}" class="btn btn-danger" > رفض الطلب</a>
                        @elseif ($each->state == 'Shipped')
                            <div class="dropdown">
                                <button class="dropbtn">تعديل الحاله </button>
                                <div class="dropdown-content">
                                  <a href="{{ url('admin/Places/Accepted_order/'.$each->id) }}">جاري التجهيز</a>
                                  {{-- <a href="{{ url('Shipped_order/'.$each->id) }}">تم الشحن </a> --}}
                                  <a href="{{ url('admin/Places/delivered_order/'.$each->id) }}">تم التسيلم</a>
                                </div>
                            </div>

                            <a href="{{ url('admin/Places/cancel_order/'.$each->id) }}" class="btn btn-danger" > رفض الطلب</a>
                        @elseif ($each->state == 'delivered')
                            تم التسليم
                        @else

                        <div class="dropdown">
                            <button class="dropbtn">تعديل الحاله </button>
                            <div class="dropdown-content">
                              <a href="{{ url('admin/Places/Accepted_order/'.$each->id) }}">جاري التجهيز</a>
                              <a href="{{ url('admin/Places/Shipped_order/'.$each->id) }}">تم الشحن </a>
                              <a href="{{ url('admin/Places/delivered_order/'.$each->id) }}">تم التسيلم</a>
                            </div>
                        </div>

                        <a href="{{ url('admin/Places/cancel_order/'.$each->id) }}" class="btn btn-danger" > رفض الطلب</a>
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
<style>
    .dropbtn {
        background-color: #04AA6D;
        color: white;
        padding: 16px;
        font-size: 16px;
        border: none;
    }

    .dropdown {
        position: relative;
        display: inline-block;
        width: 150px;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f1f1f1;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {background-color: #ddd;}

    .dropdown:hover .dropdown-content {display: block;}

    .dropdown:hover .dropbtn {background-color: #3e8e41;}

    .btn-group .cancel{
        color: #b1afaf;
    }
</style>
