
@extends('website.profile.main')

@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">

                    <div class="breadcrumbs">
                        <span> {{ $data_products[0]->name }} </span>
                        <a href=""> المنتجات </a>
                        <a href="">الرئيسية </a>
                    </div>
                    <h2>تعديل منتج</h2>
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
                                        <form class="form custom-form" action="{{ url('Update-products/'.$data_products[0]->id) }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label> صوره العرض </label>
                                                    <img src="{{ url('uploads/products/'.$data_products[0]->main_image) }}" width="200px">
                                                    <input type="file" id="file" name="main_image" value="{{ $data_products[0]->main_image }}" class="form-control">
                                                    @error('main_image')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> أسم المنتج  </label>
                                                    <input type="text" id="name"  name="name" value="{{ $data_products[0]->name }}" class="form-control">

                                                    @error('name')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="projectinput1"> وصف المنتج  </label>
                                                    <textarea cols="6" rows="6" id="description"  name="description" class="form-control">{{ $data_products[0]->name }}</textarea>

                                                    @error('description')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر </label>
                                                    <input type="text" name="old_price" id="old_price" value="{{ $data_products[0]->old_price }}" class="form-control">

                                                    @error('old_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر بعد الخصم</label>
                                                    <input type="text" name="new_price" id="new_price" value="{{ $data_products[0]->new_price }}" class="form-control">

                                                    @error('new_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> القسم الرئيسى </label>
                                                    <select class="form-control" name="place_id" id="category" >
                                                        <option style="display:none" value="">أختر المحل صاحب العرض </option>
                                                        @foreach ( $all_places  as $place )

                                                            <option @if ($data_products[0]->place_id == $place->id) selected @endif value="{{$place->id}}">{{$place->name_ar}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('place_id')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  يتم تجهيز المنتج </label>
                                                    <select class="form-control" name="Equip" id="category" >

                                                            <option @if ($data_products[0]->Equip == 0) selected @endif value="0">بنفس اليوم </option>
                                                            <option @if ($data_products[0]->Equip == 1) selected @endif value="1">خلال يوم</option>
                                                            <option @if ($data_products[0]->Equip == 2) selected @endif value="2">خلال يومين</option>
                                                            <option @if ($data_products[0]->Equip == 3) selected @endif value="3">خلال 3 ايام</option>
                                                            <option @if ($data_products[0]->Equip == 4) selected @endif value="4">خلال 4 ايام</option>
                                                            <option @if ($data_products[0]->Equip == 5) selected @endif value="5">خلال 5 ايام</option>
                                                            <option @if ($data_products[0]->Equip == 7) selected @endif value="7">خلال 7 ايام</option>


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
