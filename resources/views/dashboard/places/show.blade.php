@extends('layouts.admin')

@section('title', "المحلات")
@section('admin_content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المحلات </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> جميع المحلات
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
                                    <h4 class="card-title">جميع المحلات</h4>
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
                                    <div class="row match-height">
                                        <div class="col-lg-12 col-xl-6">
                                          <div id="accordionWrap3" role="tablist" aria-multiselectable="true">
                                            <div class="card collapse-icon accordion-icon-rotate">
                                              <div id="heading31" class="card-header bg-success">
                                                <a data-toggle="collapse" data-parent="#accordionWrap3" href="#accordion31" aria-expanded="false"
                                                aria-controls="accordion31" class="card-title lead white">Import/Export Places Data </a>
                                              </div>
                                              <div id="accordion31" role="tabpanel" aria-labelledby="heading31" class="card-collapse collapse "
                                              aria-expanded="false">
                                                <div class="card-content">
                                                  <div class="card-body">
                                                    <form action="{{ route('import_places') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" name="file" class="form-control">
                                                        <br>
                                                        <button type="submit" class="btn btn-success">Import Places Data</button>
                                                        <a class="btn btn-warning" href="{{ route('export_places') }}">Export Places Data</a>
                                                    </form>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                    </div>
                                    <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist"  >
                                      <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#allPlaces" role="tab" >
                                        <i class="la la-play"></i> جميع المحلات</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#WaitPlaces" role="tab" >
                                            <i class="la la-flag"></i> المحلات المنتظرة</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link"  data-toggle="tab" href="#non_active_places" role="tab" >
                                            <i class="la la-flag"></i> محلات قام العميل بإلغاء تفعيلها</a>
                                      </li>
                                    </ul>
                                    <div class="tab-content px-1 pt-1" >
                                      <div  class="tab-pane active" id="allPlaces" role="tabpanel">
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

                                          @isset($data)
                                              @foreach($data as $each)
                                                    <tr>
                                                      <td>{{$each -> id}}</td>
                                                      <td> <img class="rounded-circle " style="width: 70px; height: 70px;" src="{{url('uploads/places/'.$each->logo)}}"></td>
                                                      <td>{{$each -> name_ar}} - {{$each -> name_en}}</td>
                                                      <td>{{$each -> phone}}</td>
                                                      <td>{{$each -> email}}</td>
                                                      <td>{{$each -> price_range}}</td>
                                                      <td>{{$each -> views}}</td>
                                                      <td>{{$each -> created_at}}</td>
                                                      {{--  <td>
                                                        <form id="featureForm_{{$each->id}}">

                                                            <input type="hidden" name="place_id_{{$each->id}}" value="{{$each->id}}">
                                                            <?php
                                                                if( $each->is_feature == 1){
                                                            ?>
                                                            <label class="switch" style="display: block" id="show_button_{{$each->id}}" >
                                                                <input type="checkbox" checked   class="save_like_{{$each->id}}">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <label class="switch" style="display: none"   id="hide_button_{{$each->id}}">
                                                                <input type="checkbox"  class="save_like_{{$each->id}}" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <?php
                                                                }else{
                                                            ?>
                                                            <label class="switch" style="display: block" id="show_button_{{$each->id}}">
                                                                <input type="checkbox"  class="save_like_{{$each->id}}" >
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <label class="switch" style="display: none"  id="hide_button_{{$each->id}}" >
                                                                <input type="checkbox" checked  class="save_like_{{$each->id}}">
                                                                <span class="slider round"></span>
                                                            </label>
                                                            <?php } ?>
                                                        </form>

                                                      </td>

                                                      <script>
                                                        $(".save_active_{{$each->id}}").click(function(event){
                                                          event.preventDefault();

                                                          let place_id = $("input[name=place_id_{{$each->id}}]").val();

                                                          let _token   = $('meta[name="csrf-token"]').attr('content');
                                                          $.ajax({
                                                          url: "/place_features",
                                                          type:"get",
                                                          data:{
                                                              place_id:place_id,
                                                          },
                                                          success: function(response){
                                                              console.log(place_id);
                                                              $('.success').text(response.success);
                                                              $("#activeForm_{{$each->id}}")[0].reset();
                                                          },
                                                          });
                                                        });

                                                        $(document).ready(function() {
                                                          $("#show_button1_{{$each->id}}").click(function () {
                                                          $("#hide_button1_{{$each->id}}").show()
                                                          $("#show_button1_{{$each->id}}").hide()
                                                          });
                                                          $("#hide_button1_{{$each->id}}").click(function () {
                                                          $("#show_button1_{{$each->id}}").show()
                                                          $("#hide_button1_{{$each->id}}").hide()
                                                          });
                                                      });

                                                      </script>  --}}

                                                      <td>
                                                          <div class="btn-group" role="group" aria-label="Basic example">

                                                            @if ($each->state == 'accept')

                                                            <a href="{{route('admin.place.accept', $each->id)}}"
                                                                class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">وضع المحل علي الانتظار</a>
                                                            @else
                                                                <a href="{{route('admin.place.accept', $each->id)}}"
                                                                    class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">قبول</a>

                                                            @endif
                                                            <a href="{{route('admin.place.details', $each->id)}}"
                                                                class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">التفاصيل</a>


                                                          </div>
                                                      </td>
                                                    </tr>
                                              @endforeach
                                          @endisset


                                          </tbody>
                                        </table>

                                      </div>

                                      <div  class="tab-pane" id="WaitPlaces"  role="tabpanel">


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

                                            @isset($waiting_places)
                                                @foreach($waiting_places as $eachWait)
                                                    <tr>
                                                        <td>{{$eachWait -> id}}</td>
                                                        <td> <img class="rounded-circle " style="width: 70px; height: 70px;" src="{{url('uploads/places/'.$eachWait->logo)}}"></td>
                                                        <td>{{$eachWait -> name_ar}} - {{$eachWait -> name_en}}</td>
                                                        <td>{{$eachWait -> phone}}</td>
                                                        <td>{{$eachWait -> email}}</td>
                                                        <td>{{$eachWait -> price_range}}</td>
                                                        <td>{{$eachWait -> views}}</td>
                                                        <td>{{$eachWait -> created_at}}</td>


                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                              <a href="{{route('admin.place.accept', $eachWait -> id)}}"
                                                                class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">قبول</a>

                                                                <a href="{{route('admin.place.details', $eachWait -> id)}}"
                                                                  class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">التفاصيل</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                          </table>
                                      </div>

                                      <div  class="tab-pane" id="non_active_places"  role="tabpanel">


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

                                            @isset($non_active_places)
                                                @foreach($non_active_places as $eachWait)
                                                    <tr>
                                                        <td>{{$eachWait -> id}}</td>
                                                        <td> <img class="rounded-circle " style="width: 70px; height: 70px;" src="{{url('uploads/places/'.$eachWait->logo)}}"></td>
                                                        <td>{{$eachWait -> name_ar}} - {{$eachWait -> name_en}}</td>
                                                        <td>{{$eachWait -> phone}}</td>
                                                        <td>{{$eachWait -> email}}</td>
                                                        <td>{{$eachWait -> price_range}}</td>
                                                        <td>{{$eachWait -> views}}</td>
                                                        <td>{{$eachWait -> created_at}}</td>


                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                              <a href="{{route('admin.place.accept', $eachWait->id)}}"
                                                                class="btn btn-outline-success btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">تفعيل</a>

                                                                <a href="{{route('admin.place.details', $eachWait -> id)}}"
                                                                  class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1" style="height: 40px;">التفاصيل</a>


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
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection
