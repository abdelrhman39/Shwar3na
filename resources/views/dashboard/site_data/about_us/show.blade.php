@extends('layouts.admin')

@section('title', "عن الشركة")
@section('admin_content')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}">الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> عن الشركة
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title" id="basic-layout-form"> بيانات عننا </h4>
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
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
                                    <div class="card-body">
                                        <form class="form" action="{{route('admin.aboutus.update')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="form-group">
                                                <label for="projectinput1">  البريد الألكترونى</label>
                                                <input type="text" id="email"  name="email" class="form-control" value="{{$data -> email}}">
                                                       
                                                @error("email")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div><br>

                                            <div class="form-group">
                                                <label for="projectinput1"> رقم الهاتف</label>
                                                <input type="text" id="phone"  name="phone" class="form-control" value="{{$data -> phone}}">
                                                       
                                                @error("phone")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div><br>

                                            <div class="form-group">
                                                <label for="projectinput1"> العنوان </label>
                                                <input type="text" id="address"  name="address" class="form-control" value="{{$data ->  address}}">
                                                       
                                                @error("address")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div><br>

                                            <div class="form-group">
                                                <label for="projectinput1"> فيسبوك </label>
                                                <input type="text" id="facbook"  name="facbook" class="form-control" value="{{$data -> facbook}}">
                                                       
                                                @error("facbook")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div> <br>                                       

                                            <div class="form-group">
                                                <label for="projectinput1"> انستجرام  </label>
                                                <input type="text" id="instgram"  name="instgram" class="form-control" value="{{$data -> instgram}}">
                                                       
                                                @error("instgram")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div> <br> 

                                            <div class="form-group">
                                                <label for="projectinput1"> رقم واتساب  </label>
                                                <input type="text" id="whatsApp"  name="whatsApp" class="form-control" value="{{$data -> whatsApp}}">
                                                       
                                                @error("whatsApp")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div> <br> 
                                            
                                            <div class="form-group">
                                                <label for="projectinput1"> من نحن  </label>
                                                <textarea rows="10" cols="10" id="about_data"  name="about_data" class="form-control"> {{$data -> about_data}}</textarea>

                                                       
                                                @error("about_data")
                                                <span class="text-danger"> {{$message}}</span>
                                                @enderror
                                            </div> <br> 

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> تحديث
                                                </button>
                                            </div>
                                        </form>

                                        
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

@endsection