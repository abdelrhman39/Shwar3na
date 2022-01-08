@extends('layouts.admin')

@section('title', "كل العمليات الماليه")
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
                                <li class="breadcrumb-item active"> كل العمليات المالية
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
                                    <h4 class="card-title" id="basic-layout-form"> كل العمليات المالية</h4>
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

                                        <ul class="nav nav-tabs nav-top-border no-hover-bg" role="tablist"  >
                                            <li class="nav-item">
                                              <a class="nav-link active" data-toggle="tab" href="#transfers" role="tab" >
                                              <i class="la la-play"></i> جميع التحويلات المالية</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link"  data-toggle="tab" href="#transactions_users" role="tab" >
                                                  <i class="la la-flag"></i>كل اكشن اليوزرز</a>
                                            </li>
                                            <li class="nav-item">
                                              <a class="nav-link"  data-toggle="tab" href="#transactions_admin" role="tab" >
                                                  <i class="la la-flag"></i> كل اكشن الادمين/شوارعنا</a>
                                            </li>
                                          </ul>
                                          <div class="tab-content px-1 pt-1" >
                                            <div  class="tab-pane active" id="transfers" role="tabpanel" style="overflow-x:scroll">
                                                <table class="scroll-horizontal table display nowrap table-striped  table-bordered scroll-horizontal" id="example">
                                                    <thead>
                                                      <tr>
                                                          <th>رقم العمليه (uuid)</th>
                                                          <th style="background-color: aquamarine;">من (الاسم)</th>
                                                          <th>من (الايميل)</th>
                                                          <th> نوع العمليه</th>
                                                          <th> القيمة</th>
                                                          <th style="background-color: aquamarine;"> الي (الاسم)</th>
                                                          <th> وقت الاكشن</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>

                                                    @isset($transfers)
                                                        @foreach($transfers as $transfer)
                                                            <tr>
                                                                <td>{{$transfer->uuid}}</td>
                                                                <td style="background-color: aquamarine;">{{$transfer->name}}</td>
                                                                <td>{{$transfer->email}}</td>
                                                                <td>{{$transfer->status}}</td>
                                                                <td>{{$transfer->amount}} ج</td>
                                                                <td style="background-color: aquamarine;">{{$transfer->admin_name}}</td>
                                                                <td>{{$transfer->created_at}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset


                                                    </tbody>
                                                  </table>

                                            </div>

                                            <div  class="tab-pane" id="transactions_users"  role="tabpanel">


                                              <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                  <thead>
                                                    <tr>
                                                        <th>الاسم</th>
                                                        <th>البريد الاكتروني</th>
                                                        <th> نوع العمليه</th>
                                                        <th> القيمة</th>
                                                        <th> وقت الاكشن</th>
                                                    </tr>
                                                  </thead>
                                                  <tbody>

                                                  @isset($transactions_users)
                                                      @foreach($transactions_users as $actionU)
                                                          <tr>
                                                              <td>{{$actionU->name}}</td>
                                                              <td>{{$actionU->email}}</td>
                                                              <td>{{$actionU->type}}</td>
                                                              <td>{{$actionU->amount}} ج</td>
                                                              <td>{{$actionU->created_at}}</td>
                                                          </tr>
                                                      @endforeach
                                                  @endisset


                                                  </tbody>
                                                </table>

                                            </div>

                                            <div  class="tab-pane" id="transactions_admin"  role="tabpanel">


                                                <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                                                    <thead>
                                                      <tr>
                                                          <th>الاسم</th>
                                                          <th>البريد الاكتروني</th>
                                                          <th> نوع العمليه</th>
                                                          <th> القيمة</th>
                                                          <th> وقت الاكشن</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>

                                                    @isset($transactions_admin)
                                                        @foreach($transactions_admin as $actionA)
                                                            <tr>
                                                                <td>{{$actionA->name}}</td>
                                                                <td>{{$actionA->email}}</td>
                                                                <td>{{$actionA->type}}</td>
                                                                <td>{{$actionA->amount}} ج</td>
                                                                <td>{{$actionA->created_at}}</td>
                                                            </tr>
                                                        @endforeach
                                                    @endisset


                                                    </tbody>
                                                  </table>

                                            </div>


                                          </div>

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




<script>
    $(document).ready(function () {
	//Only needed for the filename of export files.
	//Normally set in the title tag of your page.
	document.title = "Card View DataTable";
	// DataTable initialisation
	$("#example").DataTable({
		dom: '<"dt-buttons"Bf><"clear">lirtp',
		paging: true,
		autoWidth: true,
		buttons: [
			"colvis",
			"copyHtml5",
			"csvHtml5",
			"excelHtml5",
			"pdfHtml5",
			"print"
		],
		initComplete: function (settings, json) {

			$("#cv").on("click", function () {
				if ($("#example").hasClass("card")) {
					$(".colHeader").remove();
				} else {
					var labels = [];
					$("#example thead th").each(function () {
						labels.push($(this).text());
					});
					$("#example tbody tr").each(function () {
						$(this)
							.find("td")
							.each(function (column) {
								$("<span class='colHeader'>" + labels[column] + ":</span>").prependTo(
									$(this)
								);
							});
					});
				}
				$("#example").toggleClass("card");
			});
		}
	});
});

</script>
@endsection
