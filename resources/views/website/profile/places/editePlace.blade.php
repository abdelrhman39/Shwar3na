
@extends('website.profile.main')


@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
{{-- {{ dd($myPlaces) }} --}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">
                    <div class="breadcrumbs">
                        <span> {{ $myPlaces[0]->name_ar }} </span>
                        <a href="{{route('admin.places')}}"> المحلات </a>
                        <a href="{{route('dashboard.dashboard')}}">الرئيسية </a>
                    </div>
                    <h2>تعديل محل</h2>
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
                                        <form class="form custom-form" action="{{ url('UpdatePlace/'.$myPlaces[0]->id) }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-4">
                                                    <label> صوره اللوجو </label>
                                                    <img src="{{ url('uploads/places/'.$myPlaces[0]->logo) }}" width="200px">
                                                    <input type="file" id="file" name="logo" value="{{ $myPlaces[0]->logo }}" class="form-control">
                                                    @error('logo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label> صوره الخلفية </label>
                                                    <img src="{{ url('uploads/places/'.$myPlaces[0]->cover) }}" width="200px">
                                                    <input type="file" id="file" name="cover" value="{{ $myPlaces[0]->cover }}" class="form-control">
                                                    @error('cover')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> الأسم بالعربى </label>
                                                    <input type="text" id="name"  name="name_ar" value="{{ $myPlaces[0]->name_ar }}" class="form-control">

                                                    @error('name_ar')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأسم بالانجليزى </label>
                                                    <input type="text" id="name" value="{{ $myPlaces[0]->name_en }}"  name="name_en" class="form-control">

                                                    @error('name_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الهاتف </label>
                                                    <input type="text" id="phone" value="{{ $myPlaces[0]->phone }}"  name="phone" class="form-control">

                                                    @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الواتس </label>
                                                    <input type="text" id="WhatsApp" value="{{ $myPlaces[0]->WhatsApp }}" name="WhatsApp" class="form-control">

                                                    @error('WhatsApp')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> البريد الألكترونى </label>
                                                    <input type="email" id="email" value="{{ $myPlaces[0]->email }}" name="email" class="form-control">

                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="projectinput1"> وصف المحل </label>
                                                <textarea cols="6" rows="6" id="description"  name="description" class="form-control">{{ $myPlaces[0]->description }}</textarea>

                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> العنوان </label>
                                                    <input type="text" id="address" value="{{ $myPlaces[0]->address }}" name="address" class="form-control">

                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> أسعار المحل </label>
                                                    <input type="text" id="price_range" value="{{ $myPlaces[0]->price_range }}" name="price_range" class="form-control">

                                                    @error('price_range')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  لينك موقع المحل </label>
                                                    <input type="text" id="website" value="{{ $myPlaces[0]->website }}" name="website" class="form-control">

                                                    @error('website')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> القسم الرئيسى </label>
                                                    <select class="form-control" name="Category_id" id="category" >
                                                        @foreach ( $category as $cat )

                                                            <option @if ($myPlaces[0]->Category_id == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('Category_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأقسام الفرعية </label>
                                                    <select class="form-control" multiple name="subCategory_ids" id="subcategory" placeholder="أختر القسم الفرعى">
                                                        @foreach ( $subcategory as $subCat )

                                                            <option selected value="{{$subCat->id}}">{{$subCat->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('subCategory_ids')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> فيسبوك </label>
                                                    <input type="text" id="Facebook" value="{{ $myPlaces[0]->Facebook }}" name="Facebook" class="form-control">

                                                    @error('Facebook')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> تويتر </label>
                                                    <input type="text" id="Twitter" value="{{ $myPlaces[0]->Twitter }}" name="Twitter" class="form-control">

                                                    @error('Twitter')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> أنستجرام </label>
                                                    <input type="text" id="Instagram" value="{{ $myPlaces[0]->Instagram }}" name="Instagram" class="form-control">

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
                                                            <option @if ($eachCity->id == $city[0]->id) selected @endif value="{{$eachCity->id}}">{{$eachCity->name}}</option>
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
                                                        @foreach ( $SubCity as $eachSubCity )
                                                            <option @if ($eachSubCity->id == $subCity[0]->id) selected @endif value="{{$eachSubCity->id}}">{{$eachSubCity->name}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('subCity')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> المناطق </label>
                                                    <select name="location_id" class="form-control"  id="location_id" >
                                                        <option style="display:none" value="" >أختر المنطقة</option>
                                                        @foreach ( $Location as $eachLocation )
                                                            <option @if ($eachLocation->id == $location[0]->id) selected @endif value="{{$eachLocation->id}}">{{$eachLocation->name}}</option>
                                                        @endforeach

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

@endsection
