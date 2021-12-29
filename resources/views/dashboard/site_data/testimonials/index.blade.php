@extends('layouts.admin')

@section('title', "أراء العملاء في شوارعنا ")
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
                                <li class="breadcrumb-item active"> أراء العملاء في شوارعنا
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
                                    <h4 class="card-title" id="basic-layout-form"> أراء العملاء في شوارعنا</h4>
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
                                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                            <thead>
                                              <tr>
                                                <th>الصورة</th>
                                                <th>الاسم</th>
                                                <th>رأي العميل</th>
                                                <th>تم انشاءة في</th>
                                                <th>الاجراء</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                            @foreach ($testimonials as $one)
                                              <tr>
                                                <td><img src="{{ url('uploads/users/'.$one->image) }}" width="100px" height="100px"/></td>
                                                <td>{{ $one->name }}</td>
                                                <td>{{ $one->comment}}</td>
                                                <td>{{ $one->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('admin.delete-testimonials',$one->id) }}" class="btn btn-danger">حذف</a>
                                                    @if ($one->is_active == 0)
                                                        <a href="{{ route('admin.approv-testimonials',$one->id) }}" class="btn btn-success">قبول</a>
                                                    @else
                                                        <a href="{{ route('admin.approv-testimonials',$one->id) }}" class="btn btn-danger">رفض</a>
                                                    @endif
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
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الوظيفة:</label>
            <input type="text" name="title" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الصورة:</label>
            <input type="file" name="image" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">الفيس بوك:</label>
            <input type="text" name="facebook" class="form-control" id="recipient-name">
          </div>

          <div class="form-group">
            <label for="message-text" class="col-form-label">تويتر :</label>
            <input type="text" name="twitter" class="form-control" id="recipient-name">
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
