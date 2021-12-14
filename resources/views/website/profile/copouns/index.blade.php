@extends('website.profile.main')

@section('content_profile')
    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>كوبوناتي</h3>
        </div>
        <!-- dashboard-list end-->
        @if (count($MyCopouns) == 0)
            <h1>لا يوجد عروض</h1>
                <a class="btn btn-info" style="margin-top: 10px;" href="{{ url('add-coupoun/') }}"> اضف عرض  <i class="fas fa-shopping-basket"></i></a>

        @endif

            @foreach($MyCopouns as $copoun)

                <div class="dashboard-list">
                    <div class="dashboard-message">
                        {{--  <span class="new-dashboard-item">New</span>  --}}
                        <div class="dashboard-listing-table-image">
                            <a href="{{ url('copoun/'.$copoun->id) }}">
                                <img src="{{ url('uploads/places/'.$copoun->image) }}"alt="{{$copoun->title}}"></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <h4><a href="{{ url('copoun/'.$copoun->id) }}">{{$copoun->title}}</a></h4>
                            <span class="dashboard-listing-table-address"><i class="fa fa-map-marker" style="float: right;margin-left:10px; margin-right: -10px"></i>
                                        <a href="#">{{$copoun->text}}</a></span>
                            <div class="listing-rating card-popup-rainingvis fl-wrap"
                                data-starrating2="{{$copoun->used}}">
                                <span>(2 reviews)</span>
                            </div>
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{ url('editeCopouns/'.$copoun->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a>
                                </li>
                                <li>
                                    <form action="{{ url('deleteCopoun/'.$copoun->place_id.'/'.$copoun->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('يرجي العلم انه سيتم حذف الكوبون اوالخصوم .. هل انت متأكد من الحذف؟');" type="submit" class="del-btn">Delete <i class="fa fa-trash-o"></i></button>
                                    </form>

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
    {{ $MyCopouns->links('vendor.pagination.new_pagi') }}


@endsection

