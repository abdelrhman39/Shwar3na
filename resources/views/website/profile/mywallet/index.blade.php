
@extends('website.profile.main')

@section('content_profile')
<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@300;400&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">

    <div class="app-content content">
        <div class="content-wrapper">

            <div class="content-body">
                <!-- Basic form layout section start -->
                <section id="basic-form-layouts">
                    <div class="row match-height">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <a class="heading-elements-toggle"><i
                                            class="la la-ellipsis-v font-medium-3"></i></a>
                                    <div class="heading-elements">
                                        <ul class="list-inline mb-0">
                                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                            <li><a data-action="reload"  onclick="location.reload();"><i class="ft-rotate-cw"></i></a></li>
                                            <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                @include('dashboard.includes.alerts.errors')
                                @include('dashboard.includes.alerts.success')

                                @if (count($errors) > 0)

                                    @foreach ($errors->all() as $error)
                                    <div class="row card-alert card red lighten-5">
                                        <div class="col-10 card-content red-text">
                                            <strong>Oh snap!</strong> {{ $error }}.
                                        </div>
                                        <button type="button" class="col-2 close red-text" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>

                                    @endforeach

                                @endif

                                <div class="card-content collapse show">
                                    <div class="card-body">

                                        <div class="circles">
                                            <div class="circle circle-1"></div>
                                            <div class="circle circle-2"></div>
                                        </div>

                                        <div class="card-group">
                                            <div class="card">
                                                <div class="logo"><img src="http://localhost/shwar3na_laravel/uploads/Logo(light).png" alt="Visa"></div>
                                                <div class="chip"><img src="https://raw.githubusercontent.com/dasShounak/freeUseImages/main/chip.png" alt="chip"></div>
                                                <div class="number">Card Number {{ Auth::user()->id }}</div>
                                                <div class="name">{{ Auth::user()->name }}</div>
                                                <div class="to">{{ $user_balance }} L.E </div>
                                                <div class="ring"></div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>

                                </div>
                            </div>
                            <div class="container">
                                <h2>لشحن رصيدك </h2>
                                <p>يرجي التواصل مع شركه شوارعنا عبر رسائل الموقع او قم بالحضور الي مقر الشركه لشحن بطاقتك علي الموقع .. شكراً لاستخدامك شوارعنا</p>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic form layout section end -->
            </div>
        </div>
    </div>

<style>
@import url('https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap');
/* Background circles start */
.circle {
  position: absolute;
  border-radius: 50%;
  background: radial-gradient(#006db3, #29b6f6);
}
.circles {
  position: absolute;
  height: 270px;
  width: 450px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.circle-1 {
  height: 180px;
  width: 180px;
  top: -50px;
  left: -60px;
}
.circle-2 {
  height: 200px;
  width: 200px;
  bottom: -90px;
  right: -90px;
  opacity: 0.8;
}
/* Background circles end */

.card-group {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.card {
  position: relative;
  height: 270px;
  width: 450px;
  border-radius: 25px;
  background: rgb(47 59 89);
  backdrop-filter: blur(30px);
  border: 2px solid rgba(255, 255, 255, 0.1);
  box-shadow: 0 0 80px rgba(0, 0, 0, 0.2);
  overflow: hidden;
  margin: auto;
}

.logo img,
.chip img,
.number,
.name,
.from,
.to,
.ring {
  position: absolute; /* All items inside card should have absolute position */
}

.logo img {
  top: 35px;
  right: 40px;
  width: 80px;
  height: auto;
  opacity: 0.8;
}

.chip img {
  top: 120px;
  left: 40px;
  width: 50px;
  height: auto;
  opacity: 0.8;
}

.number,
.name,
.from,
.to {
  color: rgba(255, 255, 255, 0.8);
  font-weight: 400;
  letter-spacing: 2px;
  text-shadow: 0 0 2px rgba(0, 0, 0, 0.6);
}

.number {
  left: 40px;
  bottom: 65px;
  font-family: "Nunito", sans-serif;
}

.name {
  font-size: 1em;
  left: 40px;
  bottom: 35px;
}

.from {
  font-size: 0.5rem;
  bottom: 35px;
  right: 110px;
}

.to {
  font-size: 1.5rem;
  bottom: 110px;
  right: 40px;

}

/* The two rings on the card background */
.ring {
  height: 500px;
  width: 500px;
  border-radius: 50%;
  background: transparent;
  border: 50px solid rgba(255, 255, 255, 0.1);
  bottom: -250px;
  right: -250px;
  box-sizing: border-box;
}

.ring::after {
  content: "";
  position: absolute;
  height: 600px;
  width: 600px;
  border-radius: 50%;
  background: transparent;
  border: 30px solid rgba(255, 255, 255, 0.1);
  bottom: -80px;
  right: -110px;
  box-sizing: border-box;
}
.clearfix{
    clear: both;
}
.container h2,.container p{
    font-family: 'Tajawal', sans-serif;;
    font-size: 2em;
    line-height: 1.5em;
}
</style>
@endsection
