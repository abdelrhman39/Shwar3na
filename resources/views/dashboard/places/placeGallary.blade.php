<br><br>
<div class="card-content collapse show ">
    <a data-toggle="modal" data-target="#gallaryModel" style="margin-right:15px"
            class="btn btn-outline-primary btn-min-width box-shadow-3  mr-1 mb-1">أضافة صور</a>

</div><br><br>
<div class="  row">
    @isset($gallary)
        @foreach ( $gallary as $img )

            <figure class="col-md-3" >
                <a class="btn_delImg" href="{{route('admin.destroy.image' , $img->id)}} "><i class=" la la-trash-o" style=" font-size: x-large;color: red; " ></i></a>
                <a href="{{url('uploads/places/'.$img->uploads)}}" target="_blank">
                    <img class="img-thumbnail img-fluid" style="width: 250px;height:180px;" src="{{url('uploads/places/'.$img->uploads)}}"
                    alt="Image description" />
                </a>

            </figure>
        @endforeach
    @endisset



</div>
<!-- Modal -->
<div id="gallaryModel" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">أضافة صور جديد</h4>
                <button type="button" class="close" data-dismiss="modal" style="    margin-left: 10px;">&times;</button>
            </div>
            <form id="basic-form" method="post"action="{{route('admin.place.addImage', $place_id)}}" novalidate enctype="multipart/form-data" >
                {{ csrf_field() }}

                <div class="modal-body">
                    <input type="hidden" name="place_id" value="{{$place_id}}">

                        <div class="form-group ">
                            <label style="    font-size: arge;">أختر الصور </label>
                            <input type="file" name="uploads[]" multiple class="form-control" accept="image/*">

                        </div>


                </div>
                <button type="submit" name="Add_discound"class="btn btn-primary" style="margin-right: 380px;font-size: 22px; margin-left: 29px;">حفظ</button>
                <br><br>

            </form>
        </div>

    </div>
</div>
