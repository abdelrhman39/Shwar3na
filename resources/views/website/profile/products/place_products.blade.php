@extends('website.profile.main')

@section('content_profile')
    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>منتجاتي</h3>
        </div>
        {{-- {{ dd($data_products[0]) }} --}}
        <!-- dashboard-list end-->
        @if (count($data_products) == 0)
            <a class="btn btn-info" style="margin-top: 10px;" href="{{ url('add-product/') }}"> اضف منتج  <i class="fas fa-shopping-basket"></i></a>
        @endif

            @foreach($data_products as $product)
            <div class="dashboard-list">
                <div class="dashboard-message">
                    {{--  <span class="new-dashboard-item">New</span>  --}}
                    <div class="dashboard-listing-table-image">
                        <a href="{{ url('products/'.$product->id) }}">
                            <img src="{{url('uploads/products/'.$product->main_image) }}"alt="{{$product->name}}"></a>
                    </div>
                    <div class="dashboard-listing-table-text">
                        <h4><a href="{{ url('products/'.$product->id) }}">{{$product->name}}</a></h4>
                        <span class="dashboard-listing-table-address"><i class="fa fa-map-marker" style="float: right;margin-left:10px; margin-right: -10px"></i>
                                    <a href="{{ url('products/'.$product->id) }}">{{ substr($product->description,0, 50) }}</a></span>
                        <div class="listing-rating card-popup-rainingvis fl-wrap"
                            data-starrating2="{{$product->rate}}">
                            <span>(2 reviews)</span>
                        </div>
                        <ul class="dashboard-listing-table-opt  fl-wrap">
                            <li><a href="{{ url('edit-products/'.$product->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a>
                            </li>
                            <li>
                                <form action="{{ url('delete-product/'.$product->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button onclick="confirm('يرجي العلم انه سيتم حذف المنتج .. هل انت متأكد من الحذف؟');" type="submit" class="del-btn">Delete <i class="fa fa-trash-o"></i></button>
                                </form>

                            </li>


                            <li><a class="del-btn" href="{{ url('products/'.$product->id) }}"> عرض المنتج  <i class="far fa-eye"></i></a>
                            </li>


                            {{--  <li><a href="#" class="del-btn">Delete <i
                                        class="fa fa-trash-o"></i></a></li>  --}}
                        </ul>
                    </div>



                    @if ($product->is_active == 1)
                        <span class="accept accept-active"> Active </span>
                    @else
                        <span class="accept">Not Active</span>
                    @endif


                </div>
            </div>





            @endforeach

        <!-- dashboard-list end-->


    </div>
    <!-- pagination-->
    {{-- {{ $data_products->links('vendor.pagination.new_pagi') }} --}}


@endsection

