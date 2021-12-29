
@extends('website.profile.main')

@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="app-content content">
        <div class="content-wrapper">

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
                                    <div class="card-body">
                                        <form action="{{ route('update_myProfile') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <!-- profile-edit-container-->
                                                    <div class="profile-edit-container">

                                                        <div class="custom-form">
                                                            <label> الاسم <i class="fa fa-user-o"></i></label>
                                                            <input type="text" name="name" placeholder="{{ $userDetails[0]->name }}" value="{{ $userDetails[0]->name }}" />
                                                            <label>البريد الالكتروني <i class="fa fa-envelope-o"></i> </label>
                                                            <input type="text" name="email" placeholder="{{ $userDetails[0]->email }}" value="{{ $userDetails[0]->email }}" />
                                                            <label>رقم الهاتف<i class="fa fa-phone"></i> </label>
                                                            <input type="text" name="phone" placeholder="{{ $userDetails[0]->phone }}" value="{{ $userDetails[0]->phone }}" />

                                                            <div class=" row">
                                                                <div class="form-group col-md-6">
                                                                    <label for="projectinput1"> المحافظة </label>
                                                                    <select class="form-control chosen-select" name="City" id="City" >
                                                                        <option style="display:none" value="">أختر المحافظة</option>
                                                                        @foreach ( $City as $eachCity )
                                                                            <option  value="{{$eachCity->id}}">{{$eachCity->name}}</option>
                                                                        @endforeach

                                                                    </select>
                                                                    @error('City')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>

                                                                <div class="form-group col-md-6">
                                                                    <label for="projectinput1"> البلاد </label>
                                                                    <select class="form-control" name="subCity" id="subCity">
                                                                        @foreach ( $SubCity as $eachSubCity )
                                                                            <option @if ($eachSubCity->id == $userDetails[0]->subCity) selected @endif value="{{$eachSubCity->id}}">{{$eachSubCity->name}}</option>
                                                                        @endforeach
                                                                    </select>
                                                                    @error('subCity')
                                                                    <span class="text-danger">{{$message}}</span>
                                                                    @enderror
                                                                </div>

                                                            </div>

                                                            <label> العنوان ( تفصيلي ) <i class="fa fa-map-marker"></i> </label>
                                                            <input type="text" name="address" placeholder="{{ $userDetails[0]->address }}" value="{{ $userDetails[0]->address }}" />

                                                        </div>
                                                    </div>
                                                    <!-- profile-edit-container end-->

                                                    <!-- profile-edit-container-->
                                                    <div class="profile-edit-container">
                                                        <div class="custom-form">
                                                            <button class="btn  big-btn  color-bg flat-btn">Save Changes<i
                                                                    class="fa fa-angle-right"></i></button>
                                                        </div>
                                                    </div>
                                                    <!-- profile-edit-container end-->
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="edit-profile-photo fl-wrap">
                                                        <img src="{{ url('uploads/users/'.$userDetails[0]->image) }}" class="respimg" alt="">
                                                        <div class="change-photo-btn">
                                                            <div class="photoUpload">
                                                                <span><i class="fa fa-upload"></i> Upload Photo</span>
                                                                <input type="file" name="image" value="{{ $userDetails[0]->image }}" class="upload">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
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
