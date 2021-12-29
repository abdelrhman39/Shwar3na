@extends('website.profile.main')

@section('content_profile')

    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>الطلبات التي تم تأكيدها</h3>
        </div>
        <!-- dashboard-list end-->
    </div>




    <table class="table">
        <caption style="margin: 30px"> طلبات المنتجات التي تم تأكيدها</caption>
        <thead>
            <tr>
                <th>رقم التعريف الخاص بالطلب</th>
                <th>اسم المنتج</th>
                <th>سعر المنتج</th>
                <th>العدد </th>
                <th>الاجمالي </th>
                <th>تاريخ الشراء </th>
                <th>الحاله</th>
            </tr>
        </thead>
        <tbody>

            <?php $total=0; ?>
            @foreach ($count_order as $order)

                @if ($order->order_don == 1)
                    <tr>
                        <td>{{ $order->order_number }}</td>
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

                            @if ($order->state == 'cancel')
                                تم رفض الطلب
                            @elseif ($order->state == 'Accepted')
                                جاري تجهيز طلبك
                            @elseif ($order->state == 'Shipped')
                                تم الشحن
                            @elseif ($order->state == 'delivered')
                                تم التسليم
                            @else
                                بإنتظار موافقه صاحب المحل
                            @endif

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








@endsection
