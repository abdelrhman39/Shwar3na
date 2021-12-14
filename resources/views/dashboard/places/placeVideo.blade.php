

<br><br>
<div class="card-content collapse show">
    <div class="card-body">
        <form class="form" action="{{route('admin.place.updateVideo' , $place_id)}}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-md-3">
                    <label for="projectinput1">  الفديو</label>
                    <input type="file" id="video"  name="video" class="form-control">

                    @error("video")
                    <span class="text-danger"> {{$message}}</span>
                    @enderror
                </div><br>

                {{-- {{ dd($details) }} --}}

                <div class="form-group col-md-9">
                    @if ($details->video)
                        <iframe  width="400" height=" 200" src="/uploads/places/{{$details->video}}" volume="0"></iframe>
                    @endif

                </div>
            </div>
            <br>

            <div class="form-group col-md-12">
                <label for="projectinput1"> صوره 360</label>
                <input type="text" id="image360"  name="image360" class="form-control" value="{{$details->image360}}" >

                @error("image360")
                <span class="text-danger"> {{$message}}</span>
                @enderror
            </div><br>

            <div class="form-group col-md-12">
                @if ($details->image360){

                    <iframe width="500" height=" 300" frameboarder="0" src="{{$details->image360}}"></iframe>

                @endif
            </div>



            <div class="form-actions">
                <button type="button" class="btn btn-warning mr-1"
                        onclick="history.back();">
                    <i class="ft-x"></i> تراجع
                </button>
                <button type="submit" class="btn btn-primary">
                    <i class="la la-check-square-o"></i> تحديث
                </button>
            </div>
        </form>



    </div>
</div>
