@extends('website.profile.main')

@section('content_profile')

    <div class="dashboard-list-box fl-wrap">
        <div class="dashboard-header fl-wrap">
            <h3>محلاتى</h3>
        </div>
        <!-- dashboard-list end-->
        @if (count($myPlaces) == 0)
        <a class="btn btn-info" style="margin-top: 10px;" href="{{ url('new/') }}"> اضف محل  <i class="fas fa-shopping-basket"></i></a>
        @endif

            @foreach($myPlaces as $place)

                <div class="dashboard-list">
                    <div class="dashboard-message">
                        {{--  <span class="new-dashboard-item">New</span>  --}}
                        <div class="dashboard-listing-table-image">
                            <a href="{{ url('places/'.$place->id) }}">
                                <img src="uploads/places/{{$place->logo}}"alt=""></a>
                        </div>
                        <div class="dashboard-listing-table-text">
                            <h4><a href="{{ url('places/'.$place->id) }}">{{$place->name_ar}} - {{$place->name_en}}</a></h4>
                            <span class="dashboard-listing-table-address"><i class="fa fa-map-marker" style="float: right;margin-left:10px; margin-right: -10px"></i>
                                        <a href="#">{{$place->address}}</a></span>
                            <div class="listing-rating card-popup-rainingvis fl-wrap"
                                data-starrating2="{{$place->rate}}">
                                <span>(2 reviews)</span>
                            </div>
                            <ul class="dashboard-listing-table-opt  fl-wrap">
                                <li><a href="{{ url('editePlace/'.$place->id) }}">Edit <i class="fa fa-pencil-square-o"></i></a>
                                </li>
                                <li>
                                    <form action="{{ url('deletePlace/'.$place->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button onclick="confirm('يرجي العلم انه سيتم حذف الكوبونات والخصومات ايضا مع حذف المحل.. هل انت متأكد من الحذف؟');" type="submit" class="del-btn">Delete <i class="fa fa-trash-o"></i></button>
                                    </form>

                                </li>
                                <li><a href="{{ url('user-coupouns/'.$place->id) }}">عروض هذا المحل <i class="fas fa-bomb"></i></a>
                                </li>

                                <li><a class="del-btn" href="{{ url('place-products/'.$place->id) }}">منتجات هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a class="del-btn" style="margin-top: 10px;" href="{{ url('place-job/'.$place->id) }}">وظائف هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a style="margin-top: 10px;" href="{{ url('#demo-modal'.$place->id) }}">اضافة مواعيد لهذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a class="del-btn" style="margin-top: 10px;" href="{{ url('#showTime-modal'.$place->id) }}"> مواعيد هذا المحل <i class="fas fa-shopping-basket"></i></a>
                                </li>

                                <li><a style="margin-top: 10px;" href="{{ url('#placeImg-modal'.$place->id) }}"> صور المعرض<i class="fas fa-shopping-basket"></i></a>
                                </li>
                                {{--  <li><a href="#" class="del-btn">Delete <i
                                            class="fa fa-trash-o"></i></a></li>  --}}
                            </ul>
                        </div>

                        <span class="accept">
                            @if ($place->state == 'accept')
                                Active
                            @else
                            Not Active
                            @endif
                        </span>
                    </div>
                </div>

                <div id="demo-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">اضفة مواعيد ل  :  {{ $place->name_ar }}</h1><hr><br>
                        <form id="basic-form" method="post"action="{{route('user.place.addDay' , $place->id)}}" novalidate enctype="multipart/form-data" >
                            {{ csrf_field() }}

                            <div class="modal-body">
                                <input type="hidden" name="place_id" value="{{$place->id}}">

                                    <?php
                                        $Sat = "السبت";
                                        $Sun = "الأحد";
                                        $Mon = "الإثنين";
                                        $Tue = "الثلاثاء";
                                        $Wed = "الأربعاء";
                                        $Thu = "الخميس";
                                        $Fri = "الجمعة";
                                    ?>
                                    <div class="form-group ">
                                        <label style="    font-size: 1.5em;">أختار يوم </label>
                                        <select class="form-control "  name="day" style="direction: rtl" >
                                            <option value="" style="display: none;" >أختر يوم</option>
                                            <option value="1">{{$Sat}}</option>
                                            <option value="2">{{$Sun}}</option>
                                            <option value="3">{{$Mon}}</option>
                                            <option value="4">{{$Tue}}</option>
                                            <option value="5">{{$Wed}}</option>
                                            <option value="6">{{$Thu}}</option>
                                            <option value="7">{{$Fri}}</option>

                                    </select>
                                    </div>
                                    <div class="form-group ">
                                        <label for="name" style="font-size: large;">من الساعه</label>
                                        <input type="time" id="timeFrom" name='timeFrom' class="form-control"  required>
                                    </div>
                                    <div class="form-group ">
                                        <label for="name" style="font-size: large;">الى الساعه</label>
                                        <input type="time" id="name" name='timeTo' class="form-control"  required>
                                    </div>


                            </div>
                            <button type="submit" name="Add_category"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                            <br><br>

                        </form>


                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>

                <div id="showTime-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">مواعيد :  {{ $place->name_ar }}</h1><hr><br>


                        <table class="table display nowrap table-striped table-bordered scroll-horizontal">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>اليوم</th>
                                <th> من</th>
                                <th> الى</th>
                                <th> وقت الأنشاء</th>

                                <th>الإجراءات</th>
                            </tr>
                            </thead>
                            <tbody>

                            @isset($data)
                                @foreach($data as $each)
                                    @if ($each->place_id == $place->id)
                                        <tr>
                                            <td>{{$each -> id}}</td>
                                            <td>{{$each -> date_ar}} - {{$each -> date_en}}</td>
                                            <td>{{$each -> timeFrom}}</td>
                                            <td>{{$each -> timeTo}}</td>
                                            <td>{{$each -> created_at}}</td>
                                            <td>
                                                <div class="btn-group" role="group" aria-label="Basic xexample">

                                                    <a href="{{route('user.destroy.day', $each -> id)}}"
                                                        class="btn btn-outline-danger btn-min-width box-shadow-3  mr-1 mb-1">حذف</a>


                                                </div>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            @endisset


                            </tbody>
                        </table>


                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>


                <div id="placeImg-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content row">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">صور :  {{ $place->name_ar }}</h1><hr>
                        <br>

                        <?php $i=0; ?>
                        @isset($PlaceGallary)
                            @foreach ( $PlaceGallary as $img )

                                @if ($img->place_id == $place->id)
                                <?php $i++; ?>

                                    <figure class="col-md-3" style="margin-top: 10px;position: relative;">
                                        <a class="btn_delImg" href="{{route('user.destroy.image' , $img->id)}}">
                                            <i class="fas fa-trash-alt" style=" font-size: x-large; " ></i>
                                        </a>
                                        <a href="{{ url('/uploads/places/'.$img->uploads)}}" target="_blank">
                                            <img class="img-thumbnail" style="height:180px;width: 100%" src="{{ url('/uploads/places/'.$img->uploads)}}"
                                            alt="Image description" />
                                        </a>
                                    </figure>
                                @endif
                            @endforeach
                        @endisset
                        <div style="clear: both"></div>
                        @if ($i < 10)
                            <br><br>
                            <h3><a class="btn_addImg" href="#addImage-modal{{ $place->id }}" style="margin-top: 10px;" href="{{ url('#showTime-modal'.$place->id) }}">اضفة صور لهذا المحل</a> اقصي عدد 10 صور ..</h3>
                            <br>
                        @endif

                        <a href="#" class="modal__close">&times;</a>

                    </div>
                </div>



                <div id="addImage-modal{{ $place->id }}" class="modal" dir="rtl" style="text-align: right">
                    <div class="modal__content">
                        <h1 style="font-size: 1.5em;text-align:center;padding:20px 0px">مواعيد :  {{ $place->name_ar }}</h1><hr><br>

                            <form id="basic-form" method="post"action="{{route('user.place.addImage', $place->id)}}" novalidate enctype="multipart/form-data" >
                                {{ csrf_field() }}

                                <div class="modal-body">
                                    <input type="hidden" name="place_id" value="{{$place->id}}">

                                        <div class="form-group ">
                                            <label style="font-size: arge;">أختر الصور </label>
                                            <input type="file" name="uploads[]" multiple class="form-control" accept="image/*">

                                        </div>


                                </div>
                                <button type="submit" name="Add_discound"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                                <br><br>

                            </form>

                        <a href="#" class="modal__close">&times;</a>
                    </div>
                </div>


            @endforeach


        <!-- dashboard-list end-->

    </div>
    <!-- pagination-->
    {{ $myPlaces->links('vendor.pagination.new_pagi') }}





<style>
    .btn_delImg{
        position: absolute;
        top:0;
        z-index: 199;
        background-color: #333;
        padding: 10px;
        border-radius: 10px 0px;
        color: #fff;
    }
    .btn_addImg{
        background-color: #333;
        padding: 10px;
        border-radius: 10px 0px;
        color: #fff;
    }
        /* If you like this, be sure to ❤️ it. */
        .wrapper {
        height: 100vh;
        /* This part is important for centering the content */
        display: flex;
        align-items: center;
        justify-content: center;
        /* End center */
        background: -webkit-linear-gradient(to right, #834d9b, #d04ed6);
        background: linear-gradient(to right, #834d9b, #d04ed6);
        }

        .wrapper a {
        display: inline-block;
        text-decoration: none;
        padding: 15px;
        background-color: #fff;
        border-radius: 3px;
        text-transform: uppercase;
        color: #585858;
        font-family: 'Roboto', sans-serif;
        }

        .modal {
        visibility: hidden;
        opacity: 0;
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(77, 77, 77, .7);
        transition: all .4s;
        z-index: 99999999999;
        }

        .modal:target {
        visibility: visible;
        opacity: 1;
        }

        .modal__content {
        border-radius: 4px;
        position: relative;
        width: 100%;
        max-width: 90%;
        background: #fff;
        padding: 1em 2em;
        overflow-y: auto;
        }

        .modal__footer {
        text-align: right;
        a {
            color: #585858;
        }
        i {
            color: #d02d2c;
        }
        }
        .modal__close {
        position: absolute;
        top: 10px;
        right: 10px;
        color: #585858;
        text-decoration: none;
        font-size: 2.5em
        }

        span.accept {
            background-color: #f86420;
            padding: 20px;
            position: absolute;
            border-radius: 0px 15px;
            color: #fff;
            font-size: 1.2em;
            box-shadow: 0px 0px 0px 7px rgb(180 177 177 / 20%);
        }
</style>

@endsection
