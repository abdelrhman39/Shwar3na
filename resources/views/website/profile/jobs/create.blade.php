
@extends('website.profile.main')

@section('content_profile')

    <div class="app-content content">
        <div class="content-wrapper">
            <div class="profile-edit-wrap">
                <div class="profile-edit-page-header">

                    <div class="breadcrumbs">
                        <span> اضافة وظيفة </span>
                        <a href=""> الوظائف </a>
                        <a href="{{ url('home') }}">الرئيسية </a>
                    </div>
                    <h2>اضافة وظيفة</h2>
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
                                        <form class="form custom-form" action="{{ url('add-job/') }}" method="POST" enctype="multipart/form-data" style="text-align: right!important">
                                            @csrf
                                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}"/>
                                            <div class="row">

                                                <div class="form-group col-md-6">
                                                    <label> صوره الوظيفة </label>
                                                    <input type="file" id="file" name="image"  class="form-control">
                                                    @error('image')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>

                                            <div class="row" dir="">
                                                <div class="form-group col-md-6 ">
                                                    <label for="projectinput1"> عنوان الوظيفة   </label>
                                                    <input type="text" id="name"  name="title" value="{{ old('title', false) }}" class="form-control">

                                                    @error('title')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <label for="projectinput1"> وصف الوظيفة  </label>
                                                    <textarea cols="6" rows="6" id="description"  name="description" class="form-control">{{ old('description', false) }}</textarea>

                                                    @error('description')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                            </div>


                                            <div class=" row">
                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  البريد الالكتروني </label>
                                                    <input type="email" name="email" id="email" value="{{ old('email', false)  }}" class="form-control">

                                                    @error('email')
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  تاريخ الإنتهاء   </label>
                                                    <input type="date" name="end_date" id="end_date" value="{{ old('end_date', false)  }}" class="form-control">

                                                    @error('end_date')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  العدد  </label>
                                                    <input type="number" min="1" name="count" id="count" value="{{ old('count', false)  }}" class="form-control">

                                                    @error('count')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> نوع الوظيفة </label>
                                                    <select class="form-control" name="type" id="type" >
                                                            <option>دوام كامل</option>
                                                            <option>دوام جزئي </option>
                                                            <option>فري لانسر </option>
                                                            <option>تطوعي</option>
                                                            <option>تدريب</option>
                                                    </select>
                                                    @error('type')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                                <div class="form-group col-md-12">
                                                    <label for="projectinput1"> مطالب الوظيفة </label>
                                                    <textarea cols="6" rows="6" id="requirment_job"  name="requirment_job" class="form-control">{{ old('requirment_job', false) }}</textarea>

                                                    @error('requirment_job')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1">  المرتب </label>
                                                    <input type="text" name="sallary" id="sallary" value="{{ old('sallary', false)  }}" class="form-control">

                                                    @error('sallary')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="projectinput1"> قسم الوظيفة</label>
                                                    <select class="form-control" name="jobCat_id" id="jobCat_id" >
                                                        @foreach ($JobCategory as $cat )

                                                        <option value="{{ $cat->id }}">{{ $cat->name }} </option>

                                                        @endforeach
                                                    </select>
                                                    @error('jobCat_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>

                                                <div class="form-group col-md-6" >
                                                    <label for="projectinput1"> المحل صاحب الوظيفة </label>
                                                    <select class="form-control" name="place_id" id="jobCat_id">
                                                        <option value=""> اختر المحل </option>
                                                        @foreach ($all_places as $place )

                                                        <option value="{{ $place->id }}">{{ $place->name_ar }} </option>

                                                        @endforeach

                                                    </select>
                                                    @error('place_id')
                                                        <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>


                                            </div>
                                            <input type="hidden" value="wait" name="is_active"/>

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
