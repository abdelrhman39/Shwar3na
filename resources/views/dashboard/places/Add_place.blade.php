@extends('layouts.admin')

@section('title', " أضافة محل جديد")
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
                                <li class="breadcrumb-item"><a href="{{route('admin.places')}}"> المحلات </a>
                                </li>
                                <li class="breadcrumb-item active">محل جديد
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
                                    <h4 class="card-title" id="basic-layout-form"> إضافة محل جديد </h4>
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
                                        <form class="form" action="{{route('admin.place.add')}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <div class="row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> صاحب المحل </label>
                                    
                                                    <select data-placeholder="أختار صاحب المحل" class="form-control" name="user_id" id="user_id" >
                                                        <option style="display:none" value="">صاحب المحل</option>
                                                        @foreach ( $user as $each )
                                                                
                                                            <option value="{{$each->id}}">{{$each->id}}-{{$each->name}}</option>
                                                        @endforeach
                                                        
                                                    </select>
                                                    @error('user_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> صوره اللوجو </label>
                                                    <input type="file" id="file" name="logo"class="form-control">
                                                    @error('logo')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label> صوره الخلفية </label>
                                                    <input type="file" id="file" name="cover"class="form-control">
                                                    @error('cover')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأسم بالعربى </label>
                                                    <input type="text" id="name"  name="name_ar" class="form-control">
                                                        
                                                    @error('name_ar')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الأسم بالانجليزى </label>
                                                    <input type="text" id="name"  name="name_en" class="form-control">
                                                        
                                                    @error('name_en')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الهاتف </label>
                                                    <input type="text" id="phone"  name="phone" class="form-control">
                                                        
                                                    @error('phone')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> رقم الواتس </label>
                                                    <input type="text" id="WhatsApp"  name="WhatsApp" class="form-control">
                                                        
                                                    @error('WhatsApp')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> البريد الألكترونى </label>
                                                    <input type="email" id="email"  name="email" class="form-control">
                                                        
                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class="form-group ">
                                                <label for="projectinput1"> وصف المحل </label>
                                                <textarea cols="6" rows="6" id="description"  name="description" class="form-control"></textarea>
                                                       
                                                @error('description')
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </div>
                                            
                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> العنوان </label>
                                                    <input type="text" id="address"  name="address" class="form-control">
                                                        
                                                    @error('address')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> أسعار المحل </label>
                                                    <input type="text" id="price_range"  name="price_range" class="form-control">
                                                        
                                                    @error('price_range')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> القسم الرئيسى </label>
                                                    <select class="form-control" name="Category_id" id="category" >
                                                        <option style="display:none" >أختر القسم الرئيسى</option>
                                                        @foreach ( $category as $cat )
                                                                
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
                                                    <input type="text" id="Facebook"  name="Facebook" class="form-control">
                                                        
                                                    @error('Facebook')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> تويتر </label>
                                                    <input type="text" id="Twitter"  name="Twitter" class="form-control">
                                                        
                                                    @error('Twitter')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> أنستجرام </label>
                                                    <input type="text" id="Instagram"  name="Instagram" class="form-control">
                                                        
                                                    @error('Instagram')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            
                                            <div class=" row">
                                                <div class="form-group col-md-4">
                                                    <label for="projectinput1"> المحافظة </label>
                                                    <select class="form-control" name="City" id="City" >
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
                                                    <select class="form-control" name="location_id" id="location_id" >
                                                        <option style="display:none" value="">أختر المنطقة</option>
                                                        
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function (){
            $('#City').on('change',function(){
                
                var CityId = $(this).val();
                if( CityId){
                    $.ajax({
                        url: 'get_subCity' + CityId,
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
                        url: 'get_locations' + subCityId,
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
                        url: 'get_SubCategory' + categoryId,
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
@endsection