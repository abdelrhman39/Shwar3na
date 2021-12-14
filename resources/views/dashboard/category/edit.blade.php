@extends('layouts.admin')

@section('title', "تعديل القسم")
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
                                <li class="breadcrumb-item"><a href="{{route('admin.Categories')}}"> الاقسام الرئيسية </a>
                                </li>
                                <li class="breadcrumb-item active"> تعديل - {{$mainCategory -> name}}
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
                                    <h4 class="card-title" id="basic-layout-form"> تعديل قسم رئيسي </h4>
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
                                        <form class="form" action="{{route('admin.Categories.update',$mainCategory -> id)}}" method="POST" enctype="multipart/form-data">
                                            @csrf

                                            <input name="category_id" value="{{$mainCategory -> id}}" type="hidden">
                                            <div class="form-group">
                                                <label for="projectinput1"> اسم القسم </label>
                                                <input type="text" id="name"  name="name" class="form-control" value="{{$mainCategory -> name}}">
                                                       
                                                @error("name")
                                                <span class="text-danger"> هذا الحقل مطلوب</span>
                                                @enderror
                                            </div>

                                            <div class="form-group">
                                                <div class="text-center">
                                                    <img
                                                        src="/uploads/category/{{$mainCategory -> image}}"
                                                        class="rounded-circle  height-150" alt="صورة القسم  ">
                                                </div>
                                            </div>


                                            <div class="form-group">
                                                <label> صوره القسم </label>
                                                <label id="projectinput7" class="file center-block">
                                                    <input type="file" id="file" name="image">
                                                    <span class="file-custom"></span>
                                                </label>
                                                
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

@endsection