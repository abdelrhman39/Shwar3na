
@extends('website.profile.main')


@section('content_profile')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">

                    <div class="breadcrumbs">

                        <a href="{{route('admin.places')}}"> المحلات </a>
                        <a href="{{route('dashboard.dashboard')}}">الرئيسية </a>
                    </div>
                    <h2>إضافة عرض</h2>
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
                                        <form class="form custom-form" action="{{ route('user.SaveCoupons.add') }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label> صوره العرض </label>
                                                    <input type="file" id="file" name="image"  class="form-control">
                                                    @error('image')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> أسم العرض  </label>
                                                    <input type="text" id="name"  name="text" value="{{ old('text', false) }}" class="form-control">

                                                    @error('text')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> العنوان  </label>
                                                    <input type="text" name="title" id="name" value="{{ old('title', false) }}" class="form-control">

                                                    @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> الرمز / كود الخصم  </label>
                                                    <input type="text" name="code" id="phone" value="{{ old('code', false) }}" class="form-control">

                                                    @error('code')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> تاريخ الانتهاء  </label>
                                                    <input type="date" name="expired_date" id="WhatsApp" value="{{ old('expired_date', false) }}" class="form-control">

                                                    @error('expired_date')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                            </div>

                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر بعد الخصم</label>
                                                    <input type="text" name="new_price" id="email" value="{{ old('new_price', false) }}" class="form-control">

                                                    @error('new_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  السعر </label>
                                                    <input type="text" name="old_price" id="email" value="{{ old('old_price', false) }}" class="form-control">

                                                    @error('old_price')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> القسم الرئيسى </label>
                                                    <select class="form-control" name="place_id" id="category" >
                                                        <option style="display:none" value="">أختر المحل صاحب العرض </option>
                                                        @foreach ( $all_places  as $place )

                                                            <option value="{{$place->id}}">{{$place->name_ar}}</option>
                                                        @endforeach

                                                    </select>
                                                    @error('place_id')
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
