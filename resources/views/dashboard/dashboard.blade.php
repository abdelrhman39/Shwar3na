@extends('layouts.admin')

@section('title', 'لوحه التحكم')
@section('admin_content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="info">{{ count($Order_don) }}</h3>
                            <h6> الطلبات</h6>
                          </div>
                          <div>
                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                          aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="warning">{{ count($places) }}</h3>
                            <h6>المحلات</h6>
                          </div>
                          <div>
                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                          aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="success">{{App\Models\UserRole::where('type', 2)->count()}}</h3>
                            <h6>المستخدمين</h6>
                          </div>
                          <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                          aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger">{{ count($Product) }}</h3>
                            <h6>المنتجات</h6>
                          </div>
                          <div>
                            <i class="icon-heart danger font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                          aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-12">
                    <div class="card pull-up">
                      <div class="card-content">
                        <div class="card-body">
                          <div class="media d-flex">
                            <div class="media-body text-left">
                              <h3 class="danger">{{ $money_shwar3na }} $</h3>
                              <h6>فلوس شوارعنا</h6>
                            </div>
                            <div>
                              <i class="icon-heart danger font-large-2 float-right"></i>
                              <i class="fas fa-dollar-sign"></i>
                            </div>
                          </div>
                          <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                            <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                            aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

              </div>
            <!-- Candlestick Multi Level Control Chart -->

            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">منتجات قيد الانتظار</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total BTC available: 6542.56585</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصوره</th>
                                        <th>الاسم</th>
                                        <th>السعر</th>
                                        <th>السعر بعد الخصم</th>
                                        <th>المشاهدات</th>
                                        <th>العدد</th>
                                        <th>تاريخ الانشاء</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @isset($Product)
                                            @foreach($Product as $each)
                                                @if ($each->is_active ==0)
                                                    <tr>
                                                        <td>{{ $each->id }}</td>
                                                        <td><img src="{{ url('uploads/products/'.$each->main_image) }}" width="150px"/></td>
                                                        <td>{{ $each->name }}</td>
                                                        <td>{{ $each->old_price }}</td>
                                                        <td>{{ $each->new_price }}</td>
                                                        <td>{{ $each->rate }}</td>
                                                        <td>{{ $each->Equip }}</td>
                                                        <td>{{ $each->created_at }}</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title"> محلات قيد الانتظار</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total USD available: 9065930.43</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th> الأسم</th>
                                        <th> التليفون</th>
                                        <th> البريد الألكترونى </th>
                                        <th>أسعار المحل</th>
                                        <th>عدد الزيارات</th>
                                        <th> وقت الأنشاء</th>

                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @isset($places)
                                            @foreach($places as $eachWait)
                                                @if ($eachWait->state == 'wait')
                                                    <tr>
                                                        <td>{{$eachWait->id}}</td>
                                                        <td> <img class="rounded-circle " style="width: 70px; height: 70px;" src="{{url('uploads/places/'.$eachWait->logo)}}"></td>
                                                        <td>{{$eachWait->name_ar}}</td>
                                                        <td>{{$eachWait->phone}}</td>
                                                        <td>{{$eachWait->email}}</td>
                                                        <td>{{$eachWait->price_range}}</td>
                                                        <td>{{$eachWait->views}}</td>
                                                        <td>{{$eachWait->created_at}}</td>


                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                <a href="{{route('admin.place.accept', $eachWait->id)}}"
                                                                class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">قبول</a>

                                                                <a href="{{route('admin.place.details', $eachWait->id)}}"
                                                                    class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">التفاصيل</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endisset
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            <!-- Active Orders -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Active Orders</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>

                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0 table display nowrap table-striped table-bordered scroll-horizontal">
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
                                        <th>مكان الاوردر</th>
                                        <th> وقت الطلب</th>
                                        <th>الحاله</th>
                                        <th>الإجراءات</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                        @isset($Order_don)
                                        @foreach($Order_don as $each)
                                            <tr>
                                                <td>{{$each->id}}</td>
                                                <td>{{$each->order_number}}</td>
                                                <td>{{$each->name}}</td>
                                                <td><img width="100px" src="{{url('uploads/products/'.$each->main_image)}}"/></td>
                                                <td>{{$each->product_name}}</td>
                                                <td>{{ $each->quantity }}</td>
                                                <td>{{$each->old_price}}</td>
                                                <td>{{$each->new_price}}</td>
                                                <td>{{ $each->address }}</td>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Orders -->
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
@endsection


