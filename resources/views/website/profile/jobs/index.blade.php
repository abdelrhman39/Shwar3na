@extends('website.profile.main')

@section('content_profile')
    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>وظائفي</h3>
        </div>
        {{-- {{ dd($data_jobs[0]) }} --}}
        <!-- dashboard-list end-->
        @if (count($all_MyJobs) == 0)
            <a class="btn btn-info" style="margin-top: 10px;" href="{{ url('add-job/') }}"> اضف وظيفة  <i class="fas fa-shopping-basket"></i></a>
        @endif

            @foreach($all_MyJobs as $job)

                <div class="dashboard-list">
                    <div class="dashboard-message">
                        {{--  <span class="new-dashboard-item">New</span>  --}}
                        <div class="dashboard-listing-table-image">
                            <a href="{{ url('jobs/'.$job->id) }}">
                                <img src="{{ url('uploads/jobs/'.$job->image) }}"alt="{{$job->title}}"></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <h4><a href="{{ url('jobs/'.$job->id) }}">{{$job->title}}</a></h4>
                            <span class="dashboard-listing-table-address"><i class="fa fa-map-marker" style="float: right;margin-left:10px; margin-right: -10px"></i>
                                        <a href="{{ url('jobs/'.$job->id) }}">{{ substr($job->description,0, 50) }}</a></span>
                            <div class="listing-rating card-popup-rainingvis fl-wrap"
                                data-starrating2="{{$job->type}}">
                            </div>
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{ url('edit-jobs/'.$job->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a>
                                </li>
                                <li>
                                    <form action="{{ url('delete-job/'.$job->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('يرجي العلم انه سيتم حذف الوظيفة .. هل انت متأكد من الحذف؟');" type="submit" class="del-btn">Delete <i class="fa fa-trash-o"></i></button>
                                    </form>

                                </li>


                                <li><a class="del-btn" href="{{ url('jobs/'.$job->id) }}"> عرض الوظيفة  <i class="far fa-eye"></i></a>
                                </li>
                                {{--  <li><a href="#" class="del-btn">Delete <i
                                            class="fa fa-trash-o"></i></a></li>  --}}
                            </ul>
                        </div>
                    </div>
                </div>

            @endforeach

        <!-- dashboard-list end-->


    </div>
    <!-- pagination-->
    {{-- {{ $data_jobs->links('vendor.pagination.new_pagi') }} --}}


@endsection

