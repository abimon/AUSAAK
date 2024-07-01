@extends('layouts.app')
@section('content')
<div class="">
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div class="owl-carousel header-carousel position-relative">
            <div class="owl-carousel-item position-relative h-100">
                <img class="img-fluid" src="{{asset('storage/images/img1.jpeg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Inreach</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">AUSAA Kenya Family</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">With associates, students and families to associates, AUSAA Kenya forms a joyful family to belong. Our activities aim at meeting members' social, spiritual and physical needs.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contact</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="owl-carousel-item position-relative h-100">
                <img class="img-fluid" src="{{asset('storage/images/img2.jpeg')}}" alt="">
                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center" style="background: rgba(0, 0, 0, .4);">
                    <div class="container">
                        <div class="row justify-content-start">
                            <div class="col-10 col-lg-8">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Outreach Work</h5>
                                <h1 class="display-3 text-white animated slideInDown mb-4">Ripe Fields</h1>
                                <p class="fs-5 fw-medium text-white mb-4 pb-2">We are a society that is reaching out to areas that have not known the truth as is said in the word of God, the Bible. We meet in these events both spiritual and physical needs.</p>
                                <a href="" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Contact</a>
                                <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Service Start -->
    <div class="container-xxl py-5" id="activities">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.1s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{asset('storage/images/mission.jpeg')}}" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        <h5 class="text-truncate me-3 mb-0">Mission</h5>
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.3s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{asset('storage/images/weekend.jpeg')}}" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        <h5 class="text-truncate me-3 mb-0">Social Weekends</h5>
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 service-item-top wow fadeInUp" data-wow-delay="0.5s">
                    <div class="overflow-hidden">
                        <img class="img-fluid w-100 h-100" src="{{asset('storage/images/img1.jpeg')}}" alt="">
                    </div>
                    <div class="d-flex align-items-center justify-content-between bg-light p-4">
                        <h5 class="text-truncate me-3 mb-0">Bible Conferences</h5>
                        <a class="btn btn-square btn-outline-primary border-2 border-white flex-shrink-0" href=""><i class="fa fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
     <!--Service End -->

    <!-- About Start -->
    <div class="container-xxl py-5" id="about">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                    <h6 class="text-secondary text-uppercase">About Us</h6>
                    <h1 class="mb-4">A Mission Oriented Organization Since 1998</h1>
                    <p class="mb-4">Since its foundation, AUSAA Kenya Society has grown to meet various needs in the society. To some it has been where they have met God, to others a place of hope. Yet to others it is home away frrom home. AUSAA Kenya Society takes pride in various activities such as:</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Bible Studies</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Health Sessions</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Home Visits</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Fun Activities</p>
                    <p class="fw-medium text-primary"><i class="fa fa-check text-success me-3"></i>Community Projects</p>
                    <div class="bg-primary d-flex align-items-center p-4 mt-5">
                        <div class="d-flex flex-shrink-0 align-items-center justify-content-center bg-white" style="width: 60px; height: 60px;">
                            <i class="fa fa-phone-alt fa-2x text-primary"></i>
                        </div>
                        <div class="ms-3">
                            <p class="fs-5 fw-medium mb-2 text-white">Reach Out</p>
                            <h3 class="m-0 text-warning">+254 723 987039</h3>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 pt-4" style="min-height: 500px;">
                    <div class="position-relative h-100 wow fadeInUp" data-wow-delay="0.5s">
                        <img class="position-absolute img-fluid w-100 h-100" src="{{asset('storage/images/img3.jpeg')}}" style="object-fit: cover; padding: 0 0 50px 100px;" alt="">
                        <img class="position-absolute start-0 bottom-0 img-fluid bg-white pt-2 pe-2 w-50 h-50" src="{{asset('storage/images/img4.jpeg')}}" style="object-fit: cover;" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Fact Start -->
    <div class="container-fluid fact bg-dark my-5 py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.1s">
                    <i class="fa fa-check fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{date('Y')-1998}}</h2>
                    <p class="text-white mb-0">Years Existence</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.3s">
                    <i class="fa fa-users-cog fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{$missions}}</h2>
                    <p class="text-white mb-0">Missions</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.5s">
                    <i class="fa fa-users fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{$members}}</h2>
                    <p class="text-white mb-0">Members</p>
                </div>
                <div class="col-md-6 col-lg-3 text-center wow fadeIn" data-wow-delay="0.7s">
                    <i class="fa fa-wrench fa-2x text-white mb-3"></i>
                    <h2 class="text-white mb-2" data-toggle="counter-up">{{$projects}}</h2>
                    <p class="text-white mb-0">Current Projects</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Fact End -->


    <!-- Service Start -->
    <!-- <div class="container-fluid py-5 px-4 px-lg-0">
        <div class="row g-0">
            <div class="col-lg-3 d-none d-lg-flex">
                <div class="d-flex align-items-center justify-content-center bg-primary w-100 h-100">
                    <h1 class="display-3 text-white m-0" style="transform: rotate(-90deg);">{{date('Y')-1998}} Years Excistance</h1>
                </div>
            </div>
            <div class="col-md-12 col-lg-9">
                <div class="ms-lg-5 ps-lg-5">
                    <div class="text-center text-lg-start wow fadeInUp" data-wow-delay="0.1s">
                        <h6 class="text-secondary text-uppercase">Our Activities</h6>
                        <h1 class="mb-5">Explore Our Activities</h1>
                    </div>
                    <div class="owl-carousel service-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-water fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Drain Repair</h4>
                            <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-toilet fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Toilet Pipe Repair</h4>
                            <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-shower fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Sewer Line Repair</h4>
                            <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                        <div class="bg-light p-4">
                            <div class="d-flex align-items-center justify-content-center border border-5 border-white mb-4" style="width: 75px; height: 75px;">
                                <i class="fa fa-tint fa-2x text-primary"></i>
                            </div>
                            <h4 class="mb-3">Water Heater Repair</h4>
                            <p>Stet stet justo dolor sed duo. Ut clita sea sit ipsum diam lorem diam justo.</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Quality Service</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Customer Satisfaction</p>
                            <p class="text-primary fw-medium"><i class="fa fa-check text-success me-2"></i>Support 24/7</p>
                            <a href="" class="btn bg-white text-primary w-100 mt-2">Read More<i class="fa fa-arrow-right text-secondary ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Service End -->


    <!-- Booking Start -->
    <div class="container-fluid my-5 px-0">
        <?php 
        $image =asset('storage/images/prison.jpeg'); 
        ?>
        <div class="video wow fadeInUp" data-wow-delay="0.1s" style="background: linear-gradient(rgba(0, 0, 0, .4), rgba(0, 0, 0, .4)), url({{$image}}) center center no-repeat;">
            <button type="button" class="btn-play" data-bs-toggle="modal" data-src="https://www.youtube.com/watch?v=SZF_jWeE8Y4&ab_channel=SDACHURCH%2CJKUAT" data-bs-target="#videoModal">
                <span></span>
            </button>

            <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content rounded-0">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- 16:9 aspect ratio -->
                            <div class="ratio ratio-16x9">
                                <iframe width="695" height="391" src="https://www.youtube.com/embed/SZF_jWeE8Y4" title="JKUSDA CHURCH | 2021 Kamwangi Mission Reflections" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h3 class="text-white mb-0">100%</h3>
            <h1 class="text-white mb-4">Community Impact Desire</h1>
        </div>
        <div class="container position-relative wow fadeInUp" data-wow-delay="0.1s" style="margin-top: -6rem;">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="bg-light text-center p-5">
                        @if(date('m')==5)
                        <h1 class="mb-4">Apply for Mission</h1>
                        <form action="{{route('m_application.store')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="name" placeholder=" " value="{{Auth()->user()?(Auth()->user()->fname).' '.(Auth()->user()->lname):''}}" required id="" class="form-control">
                                    <label for="">Your Full Name</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="email" name="email" placeholder=" " value="{{Auth()->user()?Auth()->user()->email:''}}" required id="" class="form-control">
                                    <label for="">Your Email</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="contact" placeholder=" " value="{{Auth()->user()?Auth()->user()->contact:''}}" required id="" class="form-control">
                                    <label for="">Your Phone Number</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="church" placeholder=" " required id="" class="form-control">
                                    <label for="">Local Church</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="district" placeholder=" " required id="" class="form-control">
                                    <label for="">District</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="field" placeholder=" " required id="" class="form-control">
                                    <label for="">Conference/Field</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <select name="county" id="" class="form-select">
                                        <option selected disabled>Select County</option>
                                        @foreach ($counties as $county)
                                        <option value="{{$county}}">{{$county}}</option>
                                        @endforeach
                                    </select>
                                    <label for="">County</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="subcounty" placeholder=" " required id="" class="form-control">
                                    <label for="">Sub-county</label>
                                </div>
                                <div class="col-md-6 p-2 form-floating">
                                    <input type="text" name="area" placeholder=" " required id="" class="form-control">
                                    <label for="">Local Area/Ward</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-upload"></i> Save & Continue
                                </button>
                            </div>
                        </form>
                        @else
                        <h3 class="mb-4">We are currently planning for our next mission work. Pray with us and support via <b>Paybill 522533 Acc. 1279252944 </b></h3>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Booking End -->


    <!-- Team Start -->
    <div class="container-xxl py-5" id="leadership">
        <div class="container">
            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                <h6 class="text-secondary text-uppercase">Our Leaders</h6>
                <h1 class="mb-5">Our Hard-working Team</h1>
            </div>
            <div class="row g-4">
                @foreach ($leaders as $leader)
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative overflow-hidden">
                            <img class="img-fluid" src="{{asset('storage/avatars/'.($leader->avatar))}}" alt="">
                        </div>
                        <div class="team-text">
                            <div class="bg-light">
                                <h5 class="fw-bold mb-0">{{$leader->fname}} {{$leader->lname}}</h5>
                                <small>{{$leader->role}}</small>
                            </div>
                            <div class="bg-primary">
                                <!-- <a class="btn btn-square mx-1" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-square mx-1" href=""><i class="fab fa-twitter"></i></a> -->
                                <a class="btn btn-square mx-1" href="https://wa.me/{{$leader->contact}}"><i class="fab fa-whatsapp"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Testimonial Start 
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h6 class="text-secondary text-uppercase">Testimonial</h6>
                <h1 class="mb-5">Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel position-relative wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center">
                    <div class="testimonial-text bg-light text-center p-4 mb-4">
                        <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit diam amet diam et eos. Clita erat ipsum et lorem et sit.</p>
                    </div>
                    <img class="bg-light rounded-circle p-2 mx-auto mb-2" src="img/testimonial-1.jpg" style="width: 80px; height: 80px;">
                    <div class="mb-2">
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                        <small class="fa fa-star text-secondary"></small>
                    </div>
                    <h5 class="mb-1">Client Name</h5>
                    <p class="m-0">Profession</p>
                </div>
            </div>
        </div>
    </div>
     Testimonial End -->

</div>
@endsection