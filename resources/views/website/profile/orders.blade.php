@extends('website.profile.main')

@section('content_profile')

    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>طلباتي</h3>
        </div>
        <!-- dashboard-list end-->
    </div>




    <table class="table">
        <caption style="margin: 30px">طلبات المنتجات</caption>
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
            @endforeach

            <tfoot>

                    <td class="total">الاجمالي</td>
                    <td class="total"></td class="total"><td></td>
                    <td class="total">{{ $total }}جنيه</td>
                    <td class="total"></td>
                    <td class="total"></td><td class="total"></td>

            </tfoot>
        </tbody>
    </table>

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


@endsection
