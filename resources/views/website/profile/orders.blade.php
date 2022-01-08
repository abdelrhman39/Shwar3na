@extends('website.profile.main')

@section('content_profile')

    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>طلباتي</h3>
        </div>
        <!-- dashboard-list end-->
    </div>




    <table class="table">
        <caption style="margin: 30px"> عربه الطلبات</caption>
        <thead>
            <tr>
                <th>رقم التعريف الخاص بالطلب</th>
                <th>اسم المنتج</th>
                <th>سعر المنتج</th>
                <th>العدد </th>
                <th>الاجمالي </th>
                <th>تاريخ الشراء </th>
                <th>الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            <?php $total=0; ?>
            @foreach ($count_order as $order)

                @if ($order->order_don == 0)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->name }}</td>
                        <td>@if ($order->new_price != null)
                            {{ $price = $order->new_price }}
                        @else
                            {{ $price =  $order->old_price }}
                        @endif</td>
                        <td>{{ $order->quantity }}</td>
                        <td>{{ $order->quantity * $price}}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>
                            <form action="{{ url('/order/delete/'.$order->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn_del"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>


                <?php $total += $order->quantity * $price;?>
                @endif
            @endforeach

            <tfoot>
                @if ($total > 0)

                    <tr>
                        <td colspan="4">مصاريف الشحن</td>
                        <td colspan="4">{{ $shipping=10 }}جنيه</td>
                    </tr>
                @endif
                <tr>
                    <td colspan="4">الاجمالي</td>
                    <td colspan="4"> @if ($total > 0) {{ $total + $shipping}} @else 0 @endif جنيه</td>
                </tr>
            </tfoot>
        </tbody>
    </table>



    @if ($total > 0)

    <a onclick="BtnCollapseExample()" class="btn btn_info big-btn circle-btn  dec-btn color-bg flat-btn"> الدفع عند الاستلام<i class="fas fa-plus"></i></a>
    <a onclick="BtnCollapseWallet()" class="btn btn_info big-btn circle-btn  dec-btn color-bg flat-btn"> الدفع من خلال محفظتك علي شوارعنا <i class="fas fa-plus"></i></a>
    <br><br><br>
      <div class="collapse" id="collapseExample">
        <div class="card card-body">
            <div class="form-group" style="width: 50%;margin: auto">
                <form action="{{ url('order_don') }}" method="POST" style="padding-top:20px; ">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="total" value="{{ $total + $shipping }}"/>
                    <input type="hidden" name="order_id" value="@foreach($count_order as $val)@if($val->id){{$val->id.','}}@endif @endforeach" />
                    {{-- @foreach($count_order as $val)@if($val->id)<input type="hidden" name="place_id[]" value="{{$val->place_id}}" />@endif @endforeach --}}
                    <input type="hidden" name="type" value="product"/>
                    <input type="hidden" name="order_number" value="{{ uniqid().rand() }}"/>
                    الدفع عند تسليم المنتج
                    <div style="width: 100%;float:right;" >
                        <label>( تفصيلي ) ادخل عنوان الاوردر ليصلك لباب البيت</label>
                        <input type="text" name="address" class="form-control" required>
                    </div>
                    <div style="clear: both"></div>
                    <br>
                    <button class="btn del-btn" type="submit">تأكيد شراء المنتجات</button>
                </form>
            </div>
        </div>
      </div>

      <div class="collapse" id="collapseWallet">
        <div class="card card-body">
            <div class="form-group" style="width: 50%;margin: auto">
                <form action="{{ url('order_don') }}" method="POST" style="padding-top:20px; ">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                    <input type="hidden" name="total" value="{{ $total + $shipping }}"/>
                    <input type="hidden" name="order_id" value="@foreach($count_order as $val)@if($val->id){{$val->id.','}}@endif @endforeach" />
                    {{-- @foreach($count_order as $val)@if($val->id)<input type="hidden" name="place_id[]" value="{{$val->place_id}}" />@endif @endforeach --}}
                    <input type="hidden" name="type" value="product"/>
                    <input type="hidden" name="order_number" value="{{ uniqid().rand() }}"/>
                    الدفع من خلال المحفظة
                    <div style="width: 100%;float:right;" >
                        <label>( تفصيلي ) ادخل عنوان الاوردر ليصلك لباب البيت</label>
                        <input type="text" name="address" class="form-control" required>
                        <input type="hidden" name="wallet" value="1"/>
                    </div>
                    <div style="clear: both"></div>
                    <br>
                    <button class="btn del-btn" type="submit">تأكيد شراء المنتجات</button>
                </form>
            </div>
        </div>
      </div>


    @endif

    <!-- pagination-->
    {{ $count_order->links('vendor.pagination.new_pagi') }}



    <table class="table">
        <caption style="margin: 30px">  الكوبونات التي تم حجزها</caption>
        <thead>
            <tr>
                <th>كود الخصم</th>
                <th>الصوره</th>
                <th>الخصم</th>
                <th>سعر العرض </th>
                <th>تاريخ انتهاء الخصم </th>
                <th>الاعدادات</th>
            </tr>
        </thead>
        <tbody>
            <?php $total_cou =0; ?>
            @foreach ($orders_coupons as $coupons)
                @if ($coupons->order_don == 0 )
                    <tr>
                        <td>{{ $coupons->code }}</td>
                        <td><img src="{{ url('uploads/places/'.$coupons->image) }}" width="100px" height="100px"></td>
                        <td>{{ $coupons->title }}</td>
                        <td>@if ($coupons->new_price != null)
                            {{ $price_coup = $coupons->new_price }}
                        @else
                            {{ $price_coup =  $coupons->old_price }}
                        @endif</td>
                        <td>{{ $coupons->expired_date }}</td>
                        <td>
                            <form action="{{ url('/coupon/delete/'.$coupons->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit"  class="btn_del"><i class="far fa-trash-alt"></i></button>
                            </form>

                        </td>
                    </tr>


                    <?php $total_cou += $price_coup;?>
                @endif
            @endforeach

            <tfoot>

                    <td class="total">الاجمالي</td>
                    <td class="total"></td class="total"><td></td>
                    <td class="total">{{ $total_cou }}جنيه</td>
                    <td class="total"></td>
                    <td class="total"></td><td class="total"></td>

            </tfoot>
        </tbody>
    </table>










    <!-- pagination-->
    {{ $count_order->links('vendor.pagination.new_pagi') }}
    <style>
        #collapseExample ,#collapseWallet{
            display: none;
        }
        .btn_info{
            cursor: pointer;
            margin-top: 10px;
        }
    </style>
    <script>
        function BtnCollapseExample(){
            document.getElementById('collapseWallet').style.display ="none";
            if(document.getElementById('collapseExample').style.display == "block"){
              document.getElementById('collapseExample').style.display ="none";
            }else{
              document.getElementById('collapseExample').style.display ="block";
            }
        }

        function BtnCollapseWallet(){
            document.getElementById('collapseExample').style.display ="none"
            if(document.getElementById('collapseWallet').style.display == "block"){
              document.getElementById('collapseWallet').style.display ="none";
            }else{
              document.getElementById('collapseWallet').style.display ="block";
            }
        }
    </script>

@endsection
