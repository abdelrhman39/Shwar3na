@extends('website.profile.main')

@section('content_profile')

    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>محلاتى</h3>
        </div>
        <!-- dashboard-list end-->
        @if (count($myPlaces) == 0)
        <a class="btn btn-info" style="margin-top: 10px;" href="{{ url('new/') }}"> اضف محل  <i class="fas fa-shopping-basket"></i></a>
        @endif

            @foreach($myPlaces as $place)

                <div class="dashboard-list">
                    <div class="dashboard-message">
                        {{--  <span class="new-dashboard-item">New</span>  --}}
                        <div class="dashboard-listing-table-image">
                            <a href="{{ url('places/'.$place->id) }}">
                                <img src="uploads/places/{{$place->logo}}"alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <h4><a href="{{ url('places/'.$place->id) }}">{{$place->name_ar}} - {{$place->name_en}}</a></h4>
                            <span class="dashboard-listing-table-address"><i class="fa fa-map-marker" style="float: right;margin-left:10px; margin-right: -10px"></i>
                                        <a href="#">{{$place->address}}</a></span>
                            <div class="listing-rating card-popup-rainingvis fl-wrap"
                                data-starrating2="{{$place->rate}}">
                                <span>(2 reviews)</span>
                            </div>
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{ url('editePlace/'.$place->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a>
                                </li>
                                <li>
                                    <form action="{{ url('deletePlace/'.$place->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('يرجي العلم انه سيتم حذف الكوبونات والخصومات ايضا مع حذف المحل.. هل انت متأكد من الحذف؟');" type="submit" class="del-btn">Delete <i class="fa fa-trash-o"></i></button>
                                    </form>

                                </li>
                                <li><a href="{{ url('user-coupouns/'.$place->id) }}">عروض هذا المحل <i class="fas fa-bomb"></i></a>
                                </li>

                                <li><a class="del-btn" href="{{ url('place-products/'.$place->id) }}">منتجات هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a class="del-btn" style="margin-top: 10px;" href="{{ url('place-job/'.$place->id) }}">وظائف هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a style="margin-top: 10px;" href="{{ url('#demo-modal'.$place->id) }}">اضافة مواعيد لهذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a class="del-btn" style="margin-top: 10px;" href="{{ url('#showTime-modal'.$place->id) }}"> مواعيد هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a style="margin-top: 10px;" href="{{ url('#placeImg-modal'.$place->id) }}"> صور المعرض <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <?php $placeOrder=0; ?>
                                @foreach ($order_don as $order)
                                    @if ($order->place_id == $place->id)
                                        <?php $placeOrder++; ?>
                                    @endif
                                @endforeach

                                @if ($placeOrder > 0)
                                    <li><a style="margin-top: 10px;" href="{{ url('#placeOrder-modal'.$place->id) }}"> تم طلب منتجات من هذا المحال<span class="order_don">{{ $placeOrder }}</span> <i class="fas fa-shopping-basket"></i></a>
                                    </li>
                                @endif



                                {{--  <li><a href="#" class="del-btn">Delete <i
                                            class="fa fa-trash-o"></i></a></li>  --}}
                            </ul>
                        </div>


                            @if ($place->state == 'accept')
                                <span class="accept accept-active"> Active</span>
                            @else
                                <span class="accept">Not Active</span>
                            @endif

                    </div>
                </div>

                <div id="demo-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">اضفة مواعيد ل  :  {{ $place->name_ar }}</h1><hr><br>
                        <form id="basic-form" method="post"action="{{route('user.place.addDay' , $place->id)}}" novalidate enctype="multipart/form-data" >
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <input type="hidden" name="place_id" value="{{$place->id}}">

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
                                        <label style="    font-size: 1.5em;">أختار يوم </label>
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


                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>

                <div id="showTime-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">مواعيد :  {{ $place->name_ar }}</h1><hr><br>


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
                                    @if ($each->place_id == $place->id)
                                        <tr>
                                            <td>{{$each -> id}}</td>
                                            <td>{{$each -> date_ar}} - {{$each -> date_en}}</td>
                                            <td>{{$each -> timeFrom}}</td>
                                            <td>{{$each -> timeTo}}</td>
                                            <td>{{$each -> created_at}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic xexample">

                                                    <a href="{{route('user.destroy.day', $each -> id)}}"
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>


                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endisset


                            </tbody>
                        </table>


                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>


                <div id="placeImg-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content row">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">صور :  {{ $place->name_ar }}</h1><hr>
                        <br>

                        <?php $i=0; ?>
                        @isset($PlaceGallary)
                            @foreach ( $PlaceGallary as $img )

                                @if ($img->place_id == $place->id)
                                <?php $i++; ?>

                                    <figure class="col-md-3" style="margin-top: 10px;position: relative;">
                                        <a class="btn_delImg" href="{{route('user.destroy.image' , $img->id)}}">
                                            <i class="fas fa-trash-alt" style=" font-size: x-large; " ></i>
                                        </a>
                                        <a href="{{ url('/uploads/places/'.$img->uploads)}}" target="_blank">
                                            <img class="img-thumbnail" style="height:180px;width: 100%" src="{{ url('/uploads/places/'.$img->uploads)}}"
                                            alt="Image description" />
                                        </a>
                                    </figure>
                                @endif
                            @endforeach
                        @endisset
                        <div style="clear: both"></div>
                        @if ($i < 10)
                            <br><br>
                            <h3><a class="btn_addImg" href="#addImage-modal{{ $place->id }}" style="margin-top: 10px;" href="{{ url('#showTime-modal'.$place->id) }}">اضفة صور لهذا المحل</a> اقصي عدد 10 صور ..</h3>
                            <br>
                        @endif

                        <a href="#" class="modal__close">&times;</a>

                    </div>
                </div>



                <div id="addImage-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">مواعيد :  {{ $place->name_ar }}</h1><hr><br>

                            <form id="basic-form" method="post"action="{{route('user.place.addImage', $place->id)}}" novalidate enctype="multipart/form-data" >
                                {{ csrf_field() }}

                                <div class="modal-body">
                                    <input type="hidden" name="place_id" value="{{$place->id}}">

                                        <div class="form-group ">
                                            <label style="font-size: arge;">أختر الصور </label>
                                            <input type="file" name="uploads[]" multiple class="form-control" accept="image/*">

                                        </div>


                                </div>
                                <button type="submit" name="Add_discound"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                                <br><br>

                            </form>

                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>


                <div id="placeOrder-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">طلبات  :  {{ $place->name_ar }}</h1><hr><br>

                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                            <thead>
                            <tr>
                                <th>رقم الطلب</th>
                                <th> صوره المنتج</th>
                                <th>اسم المنتج</th>
                                <th>العدد</th>
                                <th> وقت الأنشاء</th>

                                <th>الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>



                                    @foreach ($order_don as $don)
                                        @if ( $don->place_id == $place->id )
                                        @foreach ($product as $pro )
                                            @if ($pro->place_id == $place->id)



                                            <tr>
                                                <td>{{$don->order_number}}</td>
                                                <td><img width="100xp" src="{{ url('uploads/products/'.$pro->main_image) }}"></td>

                                                <td>{{$pro->name}}</td>
                                                <td>{{$don->quantity}}</td>
                                                <td>{{$don->created_at}}</td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic xexample">


                                                        @if ($don->state == 'cancel')
                                                            تم رفض الطلب
                                                            <div class="dropdown">
                                                                <button class="dropbtn">تعديل الحاله </button>
                                                                <div class="dropdown-content">
                                                                  <a href="{{ url('Accepted_order/'.$don->id) }}">قبول وجاري التجهيز</a>
                                                                  <a href="{{ url('Shipped_order/'.$don->id) }}">قبول وتم الشحن </a>
                                                                  {{-- <a href="delivered_order/{{ $don->id }}">تم التسيلم</a> --}}
                                                                </div>
                                                            </div>

                                                        @elseif ($don->state == 'Accepted')
                                                            جاري تجهيز طلبك
                                                            <div class="dropdown">
                                                                <button class="dropbtn">تعديل الحاله </button>
                                                                <div class="dropdown-content">
                                                                  {{-- <a href="{{ url('Accepted_order/'.$don->id) }}">جاري التجهيز</a> --}}
                                                                  <a href="{{ url('Shipped_order/'.$don->id) }}">تم الشحن </a>
                                                                  {{-- <a href="delivered_order/{{ $don->id }}">تم التسيلم</a> --}}
                                                                </div>
                                                            </div>

                                                            <a href="{{ url('cancel_order/'.$don->id) }}" class="cancel" > رفض الطلب</a>
                                                        @elseif ($don->state == 'Shipped')
                                                            تم الشحن
                                                            <div class="dropdown">
                                                                <button class="dropbtn">تعديل الحاله </button>
                                                                <div class="dropdown-content">
                                                                  <a href="{{ url('Accepted_order/'.$don->id) }}">جاري التجهيز</a>
                                                                  {{-- <a href="{{ url('Shipped_order/'.$don->id) }}">تم الشحن </a> --}}
                                                                  {{-- <a href="delivered_order/{{ $don->id }}">تم التسيلم</a> --}}
                                                                </div>
                                                            </div>

                                                            <a href="{{ url('cancel_order/'.$don->id) }}" class="cancel" > رفض الطلب</a>
                                                        @elseif ($don->state == 'delivered')
                                                            تم التسليم
                                                        @else

                                                        <div class="dropdown">
                                                            <button class="dropbtn">تعديل الحاله </button>
                                                            <div class="dropdown-content">
                                                              <a href="{{ url('Accepted_order/'.$don->id) }}">جاري التجهيز</a>
                                                              <a href="{{ url('Shipped_order/'.$don->id) }}">تم الشحن </a>
                                                              {{-- <a href="delivered_order/{{ $don->id }}">تم التسيلم</a> --}}
                                                            </div>
                                                        </div>

                                                        <a href="{{ url('cancel_order/'.$don->id) }}" class="cancel" > رفض الطلب</a>
                                                        @endif



                                                    </div>
                                                </td>
                                            </tr>

                                            @endif

                                        @endforeach
                                        @endif
                                    @endforeach

                            </tbody>


                        </table>



                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>




            @endforeach


        <!-- dashboard-list end-->

    </div>
    <!-- pagination-->
    {{ $myPlaces->links('vendor.pagination.new_pagi') }}



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



@endsection
