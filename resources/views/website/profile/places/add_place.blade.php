
@extends('website.profile.main')


@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<link rel="stylesheet" href="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.css">

{{-- {{ dd($myPlaces) }} --}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">

                    <div class="breadcrumbs">

                        <a href="{{route('admin.places')}}"> المحلات </a>
                        <a href="{{route('dashboard.dashboard')}}">الرئيسية </a>
                    </div>
                    <h2>إضافة محل</h2>
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
                                        <form class="form custom-form" action="{{ route('user.place.add') }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label> صوره اللوجو </label>
                                                    <br><br><br>
                                                    <input type="file" id="file" name="logo"  class="form-control ">
                                                    @error('logo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> صوره الخلفية </label>
                                                    <br><br><br>
                                                    <input type="file" multiple id="file" name="cover"  class="form-control">
                                                    @error('cover')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label>  صور المحل  </label>
                                                    ( !.. قم بتحديد صور المنتج ولا تزيد عن 10 صور .. لن يتم رفع اكثر من 10 صور )
                                                    <input type="file" multiple id="file" name="images[]"  class="form-control">
                                                    @error('images')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> الأسم بالعربى </label>
                                                    <input type="text" id="name"  name="name_ar" value="{{ old('name_ar', false) }}" class="form-control">

                                                    @error('name_ar')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأسم بالانجليزى </label>
                                                    <input type="text" id="name" value="{{ old('name_en', false) }}"  name="name_en" class="form-control">

                                                    @error('name_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الهاتف </label>
                                                    <input type="text" id="phone" value="{{ old('phone', false) }}"  name="phone" class="form-control">

                                                    @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الواتس </label>
                                                    <input type="text" id="WhatsApp" value="{{ old('WhatsApp', false) }}" name="WhatsApp" class="form-control">

                                                    @error('WhatsApp')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> البريد الألكترونى </label>
                                                    <input type="email" id="email" value="{{ old('email', false) }}" name="email" class="form-control">

                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="projectinput1"> وصف المحل </label>
                                                <textarea cols="6" rows="6" id="description"  name="description" class="form-control">{{ old('description', false) }}</textarea>

                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> العنوان </label>
                                                    <input type="text" id="address" value="{{ old('address', false) }}" name="address" class="form-control">

                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> أسعار المحل </label>
                                                    <input type="text" id="price_range" value="{{ old('price_range', false) }}" name="price_range" class="form-control">

                                                    @error('price_range')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  لينك موقع المحل </label>
                                                    <input type="text" id="website" value="{{ old('website', false) }}" name="website" class="form-control">

                                                    @error('website')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> القسم الرئيسى </label>
                                                    <select class="form-control" name="Category_id" id="category" >
                                                        <option style="display:none" value="">أختر القسم الرئيسى</option>
                                                        @foreach ( $all_category  as $cat )

                                                            <option value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('Category_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأقسام الفرعية </label>
                                                    <select class="select2 form-control" multiple="multiple" name="subCategory_ids[]" id="subcategory" placeholder="أختر القسم الفرعى">

                                                    </select>
                                                    @error('subCategory_ids')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> فيسبوك </label>
                                                    <input type="text" id="Facebook" value="{{ old('Facebook', false) }}" name="Facebook" class="form-control">

                                                    @error('Facebook')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> تويتر </label>
                                                    <input type="text" id="Twitter" value="{{ old('Twitter', false) }}" name="Twitter" class="form-control">

                                                    @error('Twitter')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> أنستجرام </label>
                                                    <input type="text" id="Instagram" value="{{ old('Instagram', false) }}" name="Instagram" class="form-control">

                                                    @error('Instagram')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> المحافظة </label>
                                                    <select class="form-control chosen-select" name="City" id="City" >
                                                        <option style="display:none" value="">أختر المحافظة</option>
                                                        @foreach ( $City as $eachCity )

                                                            <option value="{{$eachCity->id}}">{{$eachCity->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('City')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> البلاد </label>
                                                    <select class="form-control" name="subCity" id="subCity" >
                                                        <option style="display:none" value="">أختر البلد</option>


                                                    </select>
                                                    @error('subCity')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> المناطق </label>
                                                    <select name="location_id" class="form-control"  id="location_id" >
                                                        <option style="display:none" value="" >أختر المنطقة</option>

                                                    </select>
                                                    @error('location_id')
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


    <script type="text/javascript">


        $(document).ready(function (){
            $('#City').on('change',function(){
                var CityId = $(this).val();

                if( CityId){
                    $.ajax({
                        url: '/shwar3na_laravel/get_subCity' + CityId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                        if(data){
                            $('#subCity').empty();
                            $('#subCity').append('<option value="">-- البلاد --</option>');

                            $.each(data, function(key, value){
                                console.log(value.id);

                                $('#subCity').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        }else{
                            $('#subCity').empty();
                            }
                        }
                    });
                }else{
                    console.log("not working");
                    $('#subCity').empty();
                  }
            })
        });

        $(document).ready(function (){
            $('#subCity').on('change',function(){

                var subCityId = $(this).val();
                if( subCityId){
                    $.ajax({
                        url: '/shwar3na_laravel/get_locations' + subCityId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                        if(data){
                            $('#location_id').empty();
                            $('#location_id').append('<option value="">-- المناطق --</option>');

                            $.each(data, function(key, value){
                                console.log(value.id);

                                $('#location_id').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        }else{
                            $('#location_id').empty();
                            }
                        }
                    });
                }else{
                    console.log("not working");
                    $('#location_id').empty();
                  }
            })
        });

        $(document).ready(function (){
            $('#category').on('change',function(){

                var categoryId = $(this).val();
                if( categoryId){
                    $.ajax({
                        url: '/shwar3na_laravel/get_SubCategory' + categoryId,
                        type: "GET",
                        data : {"_token":"{{ csrf_token() }}"},
                        dataType: "json",
                        success:function(data) {
                            console.log(data);
                        if(data){
                            $('#subcategory').empty();
                            $('#subcategory').append('');

                            $.each(data, function(key, value){
                                console.log(value.id);

                                $('#subcategory').append('<option value="'+ value.id +'">' + value.name + '</option>');
                            });
                        }else{
                            $('#subcategory').empty();
                            }
                        }
                    });
                }else{
                    console.log("not working");
                    $('#subcategory').empty();
                  }
            })
        });



    </script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery/dist/jquery.min.js"></script>
    <script src="https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js"></script>
    <script>
      $(function () {
        $('select').multipleSelect()
      })
    </script>
@endsection
