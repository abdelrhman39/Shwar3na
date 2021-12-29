
@extends('website.profile.main')

@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">

                    <div class="breadcrumbs">
                        <span> اضافة منتج </span>
                        <a href=""> المنتجات </a>
                        <a href="">الرئيسية </a>
                    </div>
                    <h2>اضافة منتج</h2>
                </div>
            </div>



            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
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

                                @if (count($errors) > 0)

                                    @foreach ($errors->all() as $error)
                                    <div class="row card-alert card red lighten-5">
                                        <div class="col-10 card-content red-text">
                                            <strong>Oh snap!</strong> {{ $error }}.
                                        </div>
                                        <button type="button" class="col-2 close red-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    @endforeach

                                @endif

                                <div class="card-content collapse show">
                                    <div class="card-body " >
                                        <form class="form custom-form" action="{{ url('add-product/') }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label> صوره العرض </label>
                                                    <input type="file" id="file" name="main_image"  class="form-control">
                                                    @error('main_image')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label> صور المنتج (اختر 6 صور فقط لن يتم رفع اكثر من 6 صور فقط! ) </label>
                                                    <input type="file" multiple id="file" name="images[]"  class="form-control">
                                                    @error('images')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> أسم المنتج  </label>
                                                    <input type="text" id="name"  name="name" value="{{ old('name', false) }}" class="form-control">

                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="projectinput1"> وصف المنتج  </label>
                                                    <textarea cols="6" rows="6" id="description"  name="description" class="form-control">{{ old('description', false) }}</textarea>

                                                    @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر </label>
                                                    <input type="text" name="old_price" id="old_price" value="{{ old('old_price', false)  }}" class="form-control">

                                                    @error('old_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر بعد الخصم</label>
                                                    <input type="text" name="new_price" id="new_price" value="{{ old('new_price', false)  }}" class="form-control">

                                                    @error('new_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> المحل المالك  </label>
                                                    <select class="form-control" name="place_id" id="category" >
                                                        <option style="display:none" value="">أختر المحل صاحب المنتج </option>
                                                        @foreach ( $all_places  as $place )

                                                            <option value="{{$place->id}}">{{$place->name_ar}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('place_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  يتم تجهيز المنتج </label>
                                                    <select class="form-control" name="Equip" id="category" >
                                                        <option selected value="0">بنفس اليوم </option>
                                                        <option value="1">خلال يوم</option>
                                                        <option value="2">خلال يومين</option>
                                                        <option value="3">خلال 3ايام</option>
                                                        <option value="4">خلال 4ايام</option>
                                                        <option value="5">خلال 5ايام</option>
                                                        <option value="7">خلال 7ايام</option>
                                                    </select>
                                                    @error('Equip')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="form-actions">
                                                <button type="button" class="btn btn-warning mr-1"
                                                        onclick="history.back();">
                                                    <i class="ft-x"></i> تراجع
                                                </button>
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="la la-check-square-o"></i> حفظ
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
