@extends('layouts.admin')

@section('title', "الأقسام الفرعية")
@section('admin_content')
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2">
                    <h3 class="content-header-title"> الاقسام الفرعية </h3>
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{route('dashboard.dashboard')}}">الرئيسية</a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{route('admin.Categories')}}">{{$category_name}}</a>
                                </li>
                                <li class="breadcrumb-item active"> الاقسام الفرعية
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- DOM - jQuery events table -->
                <section id="dom">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">جميع الاقسام الفرعية </h4>
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
                                    
                                    <a href="{{route('admin.subcategory.newsub',  $category_id)}}" style="margin-right:15px"
                                            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة قسم فرعى</a>

                                    <div class="card-body card-dashboard">    
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">    
                                            <thead class="">
                                            <tr>
                                                <th># </th>
                                                <th>  القسم الفرعى</th>
                                                <th>الإجراءات</th>
                                            </tr>
                                            </thead>
                                            <tbody>

                                            @isset($subcategories)
                                                @foreach($subcategories as $subcat)
                                                    <tr>
                                                        <td>{{$subcat -> id}}</td>
                                                        <td>{{$subcat -> name}}</td>
                                                        <td>
                                                            <div class="btn-group" role="group" aria-label="Basic example"> 
                                                                
                                                                <a href="{{route('admin.subcategory.edit',$subcat -> id)}}"
                                                                   class="btn btn-outline-primary btn-min-width box-shadow-3 mr-1 mb-1">تعديل</a>

                                                                <a href="{{route('admin.subcategory.destroy', $subcat -> id)}}"
                                                                    class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>


                                                            </div>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endisset


                                            </tbody>
                                        </table>
                                        <div class="justify-content-center d-flex">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@endsection