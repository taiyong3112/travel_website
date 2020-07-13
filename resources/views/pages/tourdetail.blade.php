@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="{{url('public/css')}}/jsRapStar.css">
@endsection

@section('main')
<!-- tour-banner start-->
<section id="tour-packes-deatils">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="common-banner-text  wow zoomIn text-center" data-wow-duration="2s">
                    <div class="common-heading">
                        <h1>Tour Details</h1>
                    </div>
                    <div class="commom-sub-heading">
                        <h6>
                            <a href="index.html">Home</a>
                            <span>/</span>
                            <a href="#!">Tour Details</a>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tour-banner end-->

<!-- tour-details info-->
<section id="tour-detailes-main">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12">
                <div class="all-details-tour">
                    <div class="all-price">
                        <div class="tour-heading-detailse">
                            <h2>{{$tour->name}}</h2>
                            <div class="start-text-details">
                                <div class="start-icon-deta">
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                    <a href="#"><i class="fas fa-star"></i></a>
                                </div>
                                <div class="revews">
                                    <h6>21 Review</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- <div class="tour-main-informa">
                        <h6>5 Day <span>|</span></h6>
                        <h6>18+ <span>|</span></h6>
                        <h6>20 People <span>|</span></h6>
                        <h6>Adventure <span>|</span></h6>
                        <h6>25 September</h6>
                    </div> -->
                    <div class="det-asor-img">
                        <img src="{{url('public/images/uploads')}}/{{$tour->image}}" alt="img">
                    </div>
                    <div class="rweal-reat">
                        <h5>Giới thiệu về Tour</h5>
                        <p>{{$tour->content}}</p>
                    </div>
                    <div class="packages-includ">
                        <h5>Package Included / Excluded</h5>
                        <div class="all-ul-includ">
                            <div class="right-includ">
                                <ul>
                                    <li>
                                        <i class="far fa-check-circle"></i> Pick and Drop Service
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i> Car rental Service
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i> Party and Music Event
                                    </li>
                                    <li>
                                        <i class="far fa-check-circle"></i> Visit Most Best Palces
                                    </li>
                                </ul>
                            </div>
                            <div class="right-includ left-includ">
                                <ul>
                                    <li>
                                        <i class="fas fa-times-circle"></i> Insurance Service
                                    </li>
                                    <li>
                                        <i class="fas fa-times-circle"></i>Drinks
                                    </li>
                                    <li>
                                        <i class="fas fa-times-circle"></i>Mountaining
                                    </li>
                                    <li>
                                        <i class="fas fa-times-circle"></i> Race or any Sports Event
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="map-inclid">
                        <h5>Tour Location</h5>
                        <iframe
                            src="{{$tour->location}}"
                            width="600" height="450" allowfullscreen=""></iframe>
                    </div>
                    <div class="client-revews">
                        <h5>Our Clients Review</h5>
                        <div class="client-info-rev">
                            <div class="cliennt-img">
                                <img src="{{url('public')}}/images/client/replay.png" alt="img">
                            </div>
                            <div class="clients-desnigation">
                                <h5>Jessica Ana</h5>
                                <p>Ut accumsan lorem scelerisque mauris congue posuere. Aliquam elementum fermentum
                                    accumsan. Mauris id blandit eros. Nullam in convallis dui. Nunc sit amet justo
                                    porta, euismod nisi at, vehicula ligula. Pellentesque ante orci, </p>
                            </div>
                        </div>
                        <div class="client-info-rev">
                            <div class="cliennt-img">
                                <img src="{{url('public')}}/images/client/replay-1.png" alt="img">
                            </div>
                            <div class="clients-desnigation">
                                <h5>Marry Smith</h5>
                                <p>Ut accumsan lorem scelerisque mauris congue posuere. Aliquam elementum fermentum
                                    accumsan. Mauris id blandit eros. Nullam in convallis dui. Nunc sit amet justo
                                    porta, euismod nisi at, vehicula ligula. Pellentesque ante orci, </p>
                            </div>
                        </div>
                    </div>
                    <div class="client-start-comment">
                        <div class="all-women-heading">
                            <h3>Write a Review</h3>
                        </div>
                        @if(auth()->check())
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="dtart-one">
                                    <div class="start-one-ras">
                                        <h6 style="padding-top: 7px">Rate Us</h6>
                                        <div id="star-rating" start="0" name="rating"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="revs-form">
                            <form action="{{route('rating.store')}}">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group nessage-text">
                                            <textarea name="comment" id="message" rows="6" class="form-control"
                                                placeholder="Enter Your Message:" required=""></textarea>
                                        </div>
                                        <div class="contact-sub-btn">
                                            <a href="#!" class="btn submit">Submit</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        @else
                            <div class="login-required">
                                <h6>Please Login to Review</h6>
                                <a href="{{route('login')}}" class="btn btn-2">Login</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="bookoing-secrty">
                    <div class="all-pacj-dfgh">
                        <h6>Package Details</h6>
                    </div>
                    <div class="bookk0-natd-form">
                        <form action="#">
                            <div class="form-group">
                                <label for="name">First name</label>
                                <input type="text" class="form-control" placeholder="First Name" id="name">
                            </div>
                            <div class="form-group">
                                <label for="last-name">Last Name</label>
                                <input type="text" class="form-control" placeholder="Last Name" id="last-name">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" name="date" class="form-control" placeholder="Email Address" id="email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Phone</label>
                                <input type="text" name="date" class="form-control" placeholder="Phone Number" id="phone">
                            </div>

                            <div class="form-group mainm-sel">
                                <label for="text" id="form-control">Guest:</label>
                                <div class="select-box">
                                    <span class="sec-po"></span>
                                    <select id="text">
                                        <option value="0">Number of Guest</option>
                                        <option value="1">2</option>
                                        <option value="2">3</option>
                                        <option value="3">4</option>
                                    </select>
                                </div>
                            </div>
                            <div class="travel-tyepe">
                                <div class="flex-type">
                                    <label for="text">Total Price:</label>
                                </div>
                                <div class="check-box-many">
                                    <div class="total-price">
                                        <h3>$150</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="sunb-btn-naple">
                                <a href="#!" class="btn submit widet">Submit</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- tour-details end-->
@endsection

@section('js')

<script type="text/javascript" src="{{url('public/js')}}/jsRapStar.js"></script>
<script type="text/javascript">
    $('#star-rating').jsRapStar({
        length: 5,
        star:'★',
        colorBack: '#014073',
        colorFront: 'white',
        starHeight: 20,
        step:true,
        onClick:function(score){
            $(this)[0].StarF.css({color:'white'});
            console.log(score);
        },
    });

    
</script>
@stop