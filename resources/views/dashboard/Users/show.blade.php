@extends('layouts.admin')

@section('title', "المستخدمين")
@section('admin_content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> المستخدمين </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item active"> المستخدمين
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
                                    <h4 class="card-title">جميع المستخدمين</h4>
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

                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">

                                        <div class="row match-height">
                                            <div class="col-lg-12 col-xl-6">
                                              <div id="accordionWrap3" role="tablist" aria-multiselectable="true">
                                                <div class="card collapse-icon accordion-icon-rotate">
                                                  <div id="heading31" class="card-header bg-success">
                                                    <a data-toggle="collapse" data-parent="#accordionWrap3" href="#accordion31" aria-expanded="false"
                                                    aria-controls="accordion31" class="card-title lead white">Import/Export Users Data </a>
                                                  </div>
                                                  <div id="accordion31" role="tabpanel" aria-labelledby="heading31" class="card-collapse collapse "
                                                  aria-expanded="false">
                                                    <div class="card-content">
                                                      <div class="card-body">
                                                        <form action="{{ route('import_users') }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" name="file" class="form-control">
                                                            <br>
                                                            <button type="submit" class="btn btn-success">Import User Data</button>
                                                            <a class="btn btn-warning" href="{{ route('export_users') }}">Export User Data</a>
                                                        </form>
                                                      </div>
                                                    </div>
                                                  </div>
                                                </div>
                                              </div>
                                            </div>
                                        </div>

                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>الصورة</th>
                                                <th> الاسم</th>
                                                <th> التليفون</th>
                                                <th> البريد الألكترونى </th>
                                                <th> وقت الأنشاء</th>

                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($data)
                                                @foreach($data as $each)
                                                    <tr>
                                                        <td>{{$each -> id}}</td>
                                                        <td> <img class="rounded-circle " style="width: 70px; height: 70px;" src="{{ url('/uploads/users/'.$each->image)}}"></td>
                                                        <td>{{$each -> name}}</td>
                                                        <td>{{$each -> phone}}</td>
                                                        <td>{{$each -> email}}</td>
                                                        <td>{{$each -> created_at}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example">

                                                                {{--  <a href="{{route('admin.destroy.user', $each -> id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>  --}}
                                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addMoney{{$each->id}}" data-whatever="@mdo">اضافة رصيد</button>

                                                                    <div class="modal fade" id="addMoney{{$each->id}}" tabindex="-1" role="dialog" aria-labelledby="addMony" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="exampleModalLabel"> اضافة رصيد ل {{$each->name}}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <form action="{{route('admin.addMoney',$each->id)}}" method="POST">
                                                                            @csrf
                                                                            <div class="modal-body">

                                                                                <div class="form-group">
                                                                                    <label for="recipient-name" class="col-form-label">المال ( جنيه )</label>
                                                                                    <input type="number" class="form-control" name="money" id="recipient-name"  required>
                                                                                    <input type="hidden" name="user_email" value="{{ $each->email }}"/>
                                                                                </div>

                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">إلغاء</button>
                                                                                <button type="submit" class="btn btn-primary">شحن</button>
                                                                            </div>
                                                                        </form>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

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
