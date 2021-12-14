@extends('layouts.admin')

@section('title', "بيانات المحل")
@section('admin_content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> بيانات المحل </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> بيانات  {{ $place_name}}
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->

                <section id="dom">
                    <div class="row">
                        <div class="col-12">



                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">بيانات {{$place_name}}</h4>
                                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                      <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"  onclick="location.reload();"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                        <li><a data-action="close"><i class="ft-x"></i></a></li>
                                      </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.errors')
                                @include('dashboard.includes.alerts.success')

                                <div class="card-content">
                                  <div class="card-body card-dashboard">
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist"  >
                                      <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#details" role="tab" style="color: #ff7e39" >
                                        <i class="la la-info"></i> البيانات الأضافية</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#workingHours" role="tab" style="color: #ff7e39" >
                                            <i class="la la-clock-o"></i> أوقات العمل</a>
                                      </li>

                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#discound" role="tab" style="color: #ff7e39" >
                                            <i class=" ft-percent"></i> العروض</a>
                                      </li>

                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#gallary" role="tab" style="color: #ff7e39" >
                                            <i class="la la-image"></i> مجلد الصور</a>
                                      </li>

                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#products" role="tab" style="color: #ff7e39" >
                                            <i class="icon-handbag"></i> المنتجات</a>
                                      </li>

                                    </ul>
                                    <div class="tab-content px-1 pt-1" >
                                      <div  class="tab-pane active" id="details"  role="tabpanel">

                                        @include('dashboard.places.placeVideo')
                                      </div>
                                      <div  class="tab-pane" id="workingHours"  role="tabpanel">

                                        @include('dashboard.places.workDays')
                                      </div>
                                      <div  class="tab-pane" id="discound"  role="tabpanel">

                                        @include('dashboard.places.placeDiscount')
                                      </div>
                                      <div  class="tab-pane" id="gallary"  role="tabpanel">
                                        @include('dashboard.places.placeGallary')
                                      </div>
                                      <div  class="tab-pane" id="products"  role="tabpanel">

                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
