<html>
    <head>
        <title>طلباتك من شوارعنا</title>
        <link rel="stylesheet" href="style.css">
        <style>
            body{
                padding: 0;
                margin: 0;
                font-family: serif;
            }
            .container-fluid{
                width: 100%;
                background-color: #f8f9fb;
            }
            .img_top{
                width: 200px;
            }
            .img_top .img_top_info{
                width: 100%;
                padding: 50px;
            }
            .container-info{
                background-color: #f8f9fb;
                overflow: auto;
            }
            .container-info .img_logo{
                width: 200px;
            }

            .content-info{
                width: 50%;
                float: left;
                text-align: center;
                box-sizing: border-box;
                line-height: 150px;
            }
            .content-info h2{
                font-size: 3em;
                font-family: serif;
            }

        /*Start Info*/
            .pers_info{
                background-color: #fff;
                box-sizing: border-box;
                width: 100%;
                padding: 20px;
            }
            .cycle1,.cycle2,.cycle3,.cycle4{
                border-bottom: 10px solid #e2e5f1;
                display: inline-block;
                box-sizing: border-box;
            }
            .cycle1{
                border-bottom: 10px solid #7ed321;
                width: 10%;
            }
            .cycle2{
                border-bottom: 10px solid #7ed321;
                width: 20%;
            }
            .cycle3{
                border-bottom: 10px solid #e2e5f1;
                width: 40%;
            }
            .cycle4{
                border-bottom: 10px solid #e2e5f1;
                width: 20%;
            }
        /*End Info*/

        /*Start Order Details*/
            .container-order{
                width: 100%;
                box-sizing: border-box;
                margin: auto;
                text-align: center;
                display: flex;
                justify-content: center;
            }
            .container-order .order_info{
                box-sizing: border-box;
                width: 50%;
                float: right;
                text-align: center;
                background-color: aliceblue;
                height: 200px;
                margin: 0px 5px;
                padding: 0px 3px;
            }
            .container-order .order_info1{
                background-color: aliceblue;
            }
        /*End Order Details*/

            .order_don{
                border-bottom: 2px solid #919191;
                border-top: 2px solid #919191;
                padding: 10px;
                widows: 90%;
                color: #464646;
            }
            .product{
                background-color: #fff;
                width: 100%;
                overflow: auto;
            }
            .product .order_pro{
                width: 50%;
                float: right;
            }
            .product .order_img{
                width: 30%;
            }
            .product .order_img img{
                width: 70%;
                float: right;
                padding-left: 15px;
            }

            .order_pro{
                position: relative;
            }


            .product_de{
                background-color: #fff;
                width: 100%;
                box-sizing: border-box;
                padding: 0px 20px;
                overflow: auto;
            }
            .order_pric{
                background-color: blue;
            }
            table{
                float: left;
                margin-left: 100px;
            }
            table td{
                padding: 10px;
            }
            .clear{
                clear: both;
            }
        </style>
    </head>
    <body dir="rtl">
<!--  Start Header -->
        <div class="container-fluid">
            <div class="img_top">
                <img class="img_top_info" src="https://new.shwar3na.com/uploads/5f47fd3891024vsdv-02.jpg"/>
            </div>
            <div class="container-info">
                <div class="content-info">
                    <img class="img_logo" src="https://new.shwar3na.com/uploads/5f2f213acd826logo.png"/>
                </div>
                <div class="content-info">
                    <h2>إشطا كدة!</h2>
                </div>
            </div>
        </div>
<!--   End Header  -->

<!--Start Info Personal -->
        <div class="pers_info">
            <h2>أهلا يا {{ $data_order[0]->user_name }}</h2>
            <h2>حبينا نقولك إن ذوقك حلو! ومبسوطين انك اخترت شوارعنا</h2>
            <h2>استلمنا طلبيّتك رقم {{ $data_order[0]->order_number }} وفريقنا بيجهّزلك الطلب في أسرع وقت.</h2>

            <div class="cycle">
                <div class="cycle1"></div>
                <div class="cycle2"></div>
                <div class="cycle3"></div>
                <div class="cycle4"></div>
                <h3>تم الطلب: {{ $data_order[0]->created_at }}</h3>
            </div>
        </div>

<!--End Info Personal -->
<!-- Start Order Details -->
        <div class="container-order">
            <div class="order_info order_info1">
                <h2>ملخص الطلبية</h2>
                <table>
                    <tr>
                        <td>رقم الطلبية:</td>
                        <td>{{ $data_order[0]->order_number }}</td>
                    </tr>
                    <tr>
                        <td>إجمالي الطلبية:</td>
                        <td>{{ $total }} ج.م</td>
                    </tr>
                    <tr>
                        <td>طريقة الدفع:</td>
                        <td> {{ $method }} </td>
                    </tr>
                </table>
            </div>
            <div class="order_info order_info2">
                <h2>عنوان الشحن</h2>
                <h3>{{ $data_order[0]->address }}</h3>
            </div>
        </div>

        <div class="clear"></div>
        <div class="product_de">
            <h2 class="order_don">المنتجات المؤكدة</h2>
            <h2>البائع محل {{ $data_order[0]->name_ar }} من خلال موقع شوارعنا</h2>


            @foreach ($data_order as $product )
                <div class="product">
                    <div class="order_img">
                        <img src="{{ url('uploads/products/'.$product->main_image) }}">
                    </div>
                    <div class="order_pro">
                        <h3>{{ $product->products_name }}</h3>
                        <p>{{ $product->description }}</p>
                        <p>الكمية: {{ $product->quantity }}</p>
                    </div>
                    <span class="order_pric">
                        @if ($product->new_price)
                            {{ $product->new_price }}
                        @else
                            {{ $product->old_price }}
                        @endif
                        ج.م
                </h2></span>
                </div>
            @endforeach

            {{-- <h4 style="text-align: right;padding-right: 100px">استلمها بين Nov 11 - Nov 13, 2021</h4> --}}

            <table>
                <tr>
                    <td colspan="2">رسوم الشحن</td>
                    <td>10 ج.م</td>
                </tr>
                <tr>
                    <td colspan="2">المجموع الكلي</td>
                    <td>ج.م {{ $total }}</td>
                </tr>

                <tr>
                    <td colspan="2" style="border-top: 1px solid #333;">المجموع (شامل ضريبة القيمة المضافة)	</td>
                    <td style="border-top: 1px solid #333;">ج.م {{ $total }}</td>
                </tr>

            </table>
            <div class="clear"></div>
            <h2>هنبلغك لما تكون الطلبية في طريقها ليك عشان تستعد.</h2>
            <p>لسلامتك وعشان توصلك طلبيتك بشكل سليم اتبعنا كل الإجراءات الصحية:</p>
            <ol>
                <li>منشآتنا معقمة</li>
                <li> متابعة النظافة على مدار الساعة</li>
                <li> الدفع الإلكتروني</li>
            </ol>

            <h4>لحد ما توصلك الطلبية، خلّي بالك من صحتك والتزم بالبيت!</h4>
            <h2>شكرًا،</h2>
            <h2>شركه شوارعنا </h2>
        </div>


<!-- End Order Details -->
    </body>
</html>
