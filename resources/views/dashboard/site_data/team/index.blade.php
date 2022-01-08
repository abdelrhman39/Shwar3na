@extends('layouts.admin')

@section('title', "فريق العمل")
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
                                <li class="breadcrumb-item active"> عن الفريق
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
                                    <h4 class="card-title" id="basic-layout-form"> بيانات عن التيم </h4>
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
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">اضافة </button>

                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                              <tr>
                                                <th>الصورة</th>
                                                <th>الاسم</th>
                                                <th>الوظيفة</th>
                                                <th>الوصف</th>
                                                <th>الفيس بوك</th>
                                                <th>التويتر</th>
                                                <th>تم انشاءة في</th>
                                                <th>الاجراء</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($team as $one)
                                              <tr>
                                                <td><img src="{{ url('uploads/team/'.$one->image) }}" width="150px" height="150px"/></td>
                                                <td>{{ $one->name }}</td>
                                                <td>{{ $one->title}}</td>
                                                <td data-toggle="tooltip" data-placement="bottom" title="{{ $one->description }}">{{ substr($one->description,0,30) }}....</td>
                                                <td>{{ $one->facebook }}</td>
                                                <td>{{ $one->twitter }}</td>
                                                <td>{{ $one->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.delete-team',$one->id) }}" class="btn btn-danger">حذف</a>
                                                </td>
                                              </tr>
                                              @endforeach

                                            </tbody>
                                          </table>


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


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> فريق العمل</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('admin.add_team') }}" method="POST" enctype="multipart/form-data">
        @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">الاسم:</label>
            <input type="text" name="name" class="form-control" id="recipient-name">
            @error("name")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الوظيفة:</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
            @error("title")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الصورة:</label>
            <input type="file" name="image" class="form-control" id="recipient-name">
            @error("image")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الوصف:</label>
            <textarea class="form-control" rows="6" name="description" ></textarea>
            @error("description")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الفيس بوك:</label>
            <input type="text" name="facebook" class="form-control" id="recipient-name">
            @error("facebook")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">تويتر :</label>
            <input type="text" name="twitter" class="form-control" id="recipient-name">
            @error("twitter")
                <span class="text-danger"> {{$message}}</span>
            @enderror
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-primary"> حفظ</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
