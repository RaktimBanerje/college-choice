@extends('layouts.app')

@section('content')
<main>
    <section class="col-single-section">
        <header class="col-single-section__top position-relative bg--dark bg--center bg--cover bg--no-repeat d-md-block d-none" style="margin-top: 135px; background-image: url('{{ asset(Storage::url($college->cover_image)) }}')">
            <div class="container-fluid position-relative">
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-between">
                    <div class="d-sm-flex content-col">
                        <a href="#" class="bg--body py-1 px-2 me-3 d-inline-block rounded-2 flex-shrink-0 lh-1 col-single__logo mb-3 mb-sm-0">
                            <img src="{{ asset(Storage::url($college->logo)) }}" alt="" />
                        </a>
                        <div class="ps-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Colleges</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{ $college->name ?? '' }} </a></li>
                                </ol>
                            </nav>
                            <h1 class="text-white fw-semibold mb-2">{{ $college->title }}</h1>

                            <ul class="meta-info d-flex flex-wrap text-white">
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="ms-1">{{ $college->location }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="review-col text-lg-end d-none">
                        <div class="d-inline-flex align-items-center rev-box">
                            <button class="btn--shortlist" title="Add To Shortlist" data-bs-toggle="modal" data-bs-target="#applyModal">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                            <h2 class="fw-bold mb-0">7.7</h2>
                            <div>
                                <div class="rev-box__stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p class="mb-0 text-white lh-1 text--xs">144 Reviews</p>
                            </div>
                        </div>

                        <div class="review-col__cta">
                            <a href="#" class="btn btn--white-outline me-2">Will You Get In</a>
                            <a href="#" class="btn btn--white-outline">Get Contact Details</a>
                        </div>

                        <p class="mb-0 text-white tooltip-text position-relative"><a href="#" class="text-white link-hover--underline text--xs">Claim This College</a></p>
                    </div>
                </div>
            </div>
        </header>
        
        
         <header class="col-single-section__top position-relative bg--dark bg--center bg--cover bg--no-repeat d-block d-md-none" style="background-image: url('{{ asset(Storage::url($college->cover_image)) }}')">
            <div class="container-fluid position-relative">
                <div class="d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-between">
                    <div class="d-sm-flex content-col">
                        <a href="#" class="bg--body py-1 px-2 me-3 d-inline-block rounded-2 flex-shrink-0 lh-1 col-single__logo mb-3 mb-sm-0">
                            <img src="{{ asset(Storage::url($college->logo)) }}" alt="" />
                        </a>
                        <div class="ps-1">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-1">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item"><a href="#">Colleges</a></li>
                                    <li class="breadcrumb-item"><a href="#">{{ $college->name ?? '' }} </a></li>
                                </ol>
                            </nav>
                            <h1 class="text-white fw-semibold mb-2">{{ $college->title }}</h1>

                            <ul class="meta-info d-flex flex-wrap text-white">
                                <li>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <span class="ms-1">{{ $college->location }}</span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="review-col text-lg-end d-none">
                        <div class="d-inline-flex align-items-center rev-box">
                            <button class="btn--shortlist" title="Add To Shortlist" data-bs-toggle="modal" data-bs-target="#applyModal">
                                <i class="fa-solid fa-heart"></i>
                            </button>
                            <h2 class="fw-bold mb-0">7.7</h2>
                            <div>
                                <div class="rev-box__stars">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <p class="mb-0 text-white lh-1 text--xs">144 Reviews</p>
                            </div>
                        </div>

                        <div class="review-col__cta">
                            <a href="#" class="btn btn--white-outline me-2">Will You Get In</a>
                            <a href="#" class="btn btn--white-outline">Get Contact Details</a>
                        </div>

                        <p class="mb-0 text-white tooltip-text position-relative"><a href="#" class="text-white link-hover--underline text--xs">Claim This College</a></p>
                    </div>
                </div>
            </div>
        </header>

        <div class="col-single-section__bottom bg--light">
            <!-- Col Single Main tabs -->
            <ul class="nav nav-tabs bg--body" id="colSingleTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#info" type="button" role="tab" aria-controls="info" aria-selected="true">info</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="courses-tab" data-bs-toggle="tab" data-bs-target="#courses" type="button" role="tab" aria-controls="courses" aria-selected="false">Course & Fees</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="admission-tab" data-bs-toggle="tab" data-bs-target="#admission" type="button" role="tab" aria-controls="admission" aria-selected="false">admission</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="reviews-tab" data-bs-toggle="tab" data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews" aria-selected="false">reviews</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="placement-tab" data-bs-toggle="tab" data-bs-target="#placement" type="button" role="tab" aria-controls="placement" aria-selected="false">placement</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="ranking-tab" data-bs-toggle="tab" data-bs-target="#ranking" type="button" role="tab" aria-controls="ranking" aria-selected="false">ranking</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="gallery-tab" data-bs-toggle="tab" data-bs-target="#gallery" type="button" role="tab" aria-controls="gallery" aria-selected="false">gallery</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="scholarship-tab" data-bs-toggle="tab" data-bs-target="#scholarship" type="button" role="tab" aria-controls="scholarship" aria-selected="false">scholarship</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faculty-tab" data-bs-toggle="tab" data-bs-target="#faculty" type="button" role="tab" aria-controls="faculty" aria-selected="false">faculty</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="news-tab" data-bs-toggle="tab" data-bs-target="#news" type="button" role="tab" aria-controls="news" aria-selected="false">news</button>
                </li>
                <li class="nav-item d-none" role="presentation">
                    <button class="nav-link" id="hostel-tab" data-bs-toggle="tab" data-bs-target="#hostel" type="button" role="tab" aria-controls="hostel" aria-selected="false">hostel</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="faq-tab" data-bs-toggle="tab" data-bs-target="#faq" type="button" role="tab" aria-controls="faq" aria-selected="false">FAQ</button>
                </li>
            </ul>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12 col-xl-9 mb-4 mb-xl-0">
                        <!-- Tab panes -->
                        <div class="tab-content mb-3">
                            <div class="tab-pane active" id="info" role="tabpanel" aria-labelledby="info-tab">
                                @isset($college_details->info)
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__body p-3">
                                        <div class="content-box content-box--prose">
                                            {!! $college_details->info !!}
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>

                            <div class="tab-pane" id="courses" role="tabpanel" aria-labelledby="courses-tab">
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Fees & Eligibility</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <div class="table-responsive-sm">
                                            <table class="table table-bordered table--course-fees text-center">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Course</th>
                                                        <th scope="col">Fees</th>
                                                        <th scope="col">Eligibility</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @isset($college_details->course)
                                                    @foreach(json_decode($college_details->course) as $course)
                                                    <tr>
                                                        <td><a href="#">{{ $course->course }}</a></td>
                                                        <td>{{ $course->fees ?? '' }}</td>
                                                        <td>{{ $course->eligibility ?? '' }}</td>
                                                    </tr>
                                                    @endforeach
                                                    @endisset
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="admission" role="tabpanel" aria-labelledby="admission-tab">
                                <div class="info-block bg--body shadow--base rounded-2">
                                    @isset($college_details->admission)
                                    <div class="info-block__body p-3">
                                        <div class="content-box content-box--prose">
                                            {!! $college_details->admission !!}
                                        </div>
                                    </div>
                                    @endisset
                                </div>
                            </div>

                            <div class="tab-pane" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                                <div class="info-block bg--body shadow--base rounded-2 mb-3">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Reviews</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <div class="row">
                                            <div class="col-12 col-md-3 mb-4 mb-lg-0">
                                                <h2 class="text--dark fw-semibold mb-2">7.7 <small>out of 10</small></h2>
                                                <div class="rev-box__stars text--secondary">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="col-12 col-lg-9">
                                                <div class="grid grid-cols-1 grid-cols-sm-2 grid-cols-md-3 gap-y-5 gap-sm-5 gap-lg-6 rev-icon-boxes">
                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/certificate.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Academic</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/home.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Accommodation</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/people.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Faculty</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/college.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Infrastructure</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/suitcase.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Placement</p>
                                                        </div>
                                                    </div>

                                                    <div class="d-flex align-items-center icon-box">
                                                        <figure class="mb-0 flex-shrink-0">
                                                            <img src="{{ asset('assets/images/networking.png') }}" alt="" width="64" height="64" />
                                                        </figure>
                                                        <div class="ps-3">
                                                            <p class="mb-1 fw-semibold text--dark">8.1/10</p>
                                                            <p class="mb-0 text--dark fw-semibold">Social Life</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__body p-3">
                                        <p class="fw-semibold mb-0 text--dark">What students say about {{ $college->name ?? '' }} </p>
                                        <hr />
                                        <div class="mt-2 mb-4">
                                            <p class="mb-2 fw-semibold text--dark"><i class="fa-solid fa-thumbs-up me-2 text--green"></i>Likes</p>
                                            <div class="content-box ps-3 ms-1">
                                                <ul>
                                                    <li>The course curriculum is great and the faculty members are very friendly they help a lot and guide us in a very good manner.</li>
                                                    <li>Placements from our college is average.almost 55% students get placements in campus interview.others do not qualify in the campus.some of our college teachers are the members of our college placement cell.they try their best for every student's placements.</li>
                                                    <li>My faculty right from the first semester took us for plenty of visits to various hotels as well as to a food truck factory.</li>
                                                    <li>Well experienced and talented faculties are there in our college.their way of teaching and devotion to study is commendable.they want to give every student propers training and teaching so that after passing out they can easily get their desired job.</li>
                                                    <li>No i am not residing in the hostel, but the hostel here is awesome , the rooms are provided on sharing basis and the rooms are air-conditioned ,food provided in hostel is also very good.</li>
                                                    <li>{{ $college->name ?? '' }}  ,kolkata is a good institute for engineering.i got admitted in the college this year ,the college is having well equipped labs.</li>
                                                </ul>
                                                <p><small>These insights are automatically extracted from student reviews.</small></p>
                                            </div>
                                        </div>

                                        <p class="fw-semibold mb-0 text--dark">146 Reviews Found</p>
                                        <hr />
                                        <ul class="rev-list">
                                            <li class="rev-list__item py-3">
                                                <div class="item position-relative">
                                                    <div class="item__header d-flex flex-wrap justify-content-between mb-3">
                                                        <div class="d-flex align-items-sm-center">
                                                            <figure class="flex-shrink-0 bg--primary text-white fw-semibold text-uppercase d-inline-flex align-items-center justify-content-center rounded-circle overflow-hidden mb-0 me-3">
                                                                <span>DB</span>
                                                                <img src="{{ asset('assets/images/client-1.jpg') }}" alt="" width="40" height="40" class="w-100 h-100 object-fit-cover d-none" />
                                                            </figure>
                                                            <div>
                                                                <p class="mb-1 fw-semibold text--dark text-uppercase"><a href="#" class="text--dark">DEBAYAN BISWAS</a></p>
                                                                <ul class="text--xs d-flex flex-wrap">
                                                                    <li>Enrolled 2021</li>
                                                                    <li><a href="#">B.Com {Hons.}, General</a></li>
                                                                    <li>July 30, 2023</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <h2 class="fw-semibold mb-0"><span class="text--dark">7</span><small>/10</small></h2>
                                                    </div>

                                                    <div class="item__body mb-3">
                                                        <h6 class="text--primary fw-semibold mb-2">{{ $college->name ?? '' }}  Review</h6>
                                                        <p class="mb-2"><span class="text--dark fw-semibold me-1">Likes :</span>Infrastructure of the class rooms and buildings, Friendliness of the faculty members in the college, Scholarship program offered by the college</p>
                                                        <p><span class="text--dark fw-semibold me-1">Dislikes :</span>The exams are very hard to crack for the students</p>

                                                        <p><span class="text--dark fw-semibold me-1">Placement Experience :</span>From the sixth sem students starts getting placement offers. Companies visited like Wipro, Infosys etc. The highest Package offered was around 12 lakhs per annum. Around 1 out of 10 get placements here. My plan is to get a job here after getting the degree.</p>
                                                        <ul class="d-flex flex-wrap gap-x-4 gap-x-xl-6 gap-x-xxl-8 gap-y-3 text--dark fw-medium">
                                                            <li>Placement: 5/10</li>
                                                            <li>College: 5/10</li>
                                                            <li>Course: 5/10</li>
                                                            <li>Internship: 5/10</li>
                                                            <li>Campus Life: 5/10</li>
                                                        </ul>
                                                    </div>

                                                    <div class="item__footer row align-items-center pt-1">
                                                        <div class="col-12 col-md-8 left-col mb-3 mb-md-0 d-flex">
                                                            <button class="me-2 text--green"><i class="fa-solid fa-thumbs-up me-1"></i>0</button>

                                                            <button class="me-2 me-sm-3 text-danger"><i class="fa-solid fa-thumbs-down me-1"></i>0</button>

                                                            <button class="ms-sm-1 text--dark text-uppercase"><i class="fa-solid fa-flag me-1"></i> Report</button>

                                                            <button class="fw-medium">
                                                                <i class="fa-solid fa-reply me-1 text--orange"></i>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <div class="col-12 col-md-4 text-md-end">
                                                            <a href="#" class="btn btn--secondary rounded-pill">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>

                                            <li class="rev-list__item py-3">
                                                <div class="item position-relative">
                                                    <div class="item__header d-flex flex-wrap justify-content-between mb-3">
                                                        <div class="d-flex align-items-sm-center">
                                                            <figure class="flex-shrink-0 bg--primary text-white fw-semibold text-uppercase d-inline-flex align-items-center justify-content-center rounded-circle overflow-hidden mb-0 me-3">
                                                                <span>DB</span>
                                                                <img src="{{ asset('assets/images/client-1.jpg') }}" alt="" width="40" height="40" class="w-100 h-100 object-fit-cover d-none" />
                                                            </figure>
                                                            <div>
                                                                <p class="mb-1 fw-semibold text--dark text-uppercase"><a href="#" class="text--dark">DEBAYAN BISWAS</a></p>
                                                                <ul class="text--xs d-flex flex-wrap">
                                                                    <li>Enrolled 2021</li>
                                                                    <li><a href="#">B.Com {Hons.}, General</a></li>
                                                                    <li>July 30, 2023</li>
                                                                </ul>
                                                            </div>
                                                        </div>

                                                        <h2 class="fw-semibold mb-0"><span class="text--dark">7</span><small>/10</small></h2>
                                                    </div>

                                                    <div class="item__body mb-3">
                                                        <h6 class="text--primary fw-semibold mb-2">{{ $college->name ?? '' }}  Review</h6>
                                                        <p class="mb-2"><span class="text--dark fw-semibold me-1">Likes :</span>Infrastructure of the class rooms and buildings, Friendliness of the faculty members in the college, Scholarship program offered by the college</p>
                                                        <p><span class="text--dark fw-semibold me-1">Dislikes :</span>The exams are very hard to crack for the students</p>

                                                        <p><span class="text--dark fw-semibold me-1">Placement Experience :</span>From the sixth sem students starts getting placement offers. Companies visited like Wipro, Infosys etc. The highest Package offered was around 12 lakhs per annum. Around 1 out of 10 get placements here. My plan is to get a job here after getting the degree.</p>
                                                        <ul class="d-flex flex-wrap gap-x-4 gap-x-xl-6 gap-x-xxl-8 gap-y-3 text--dark fw-medium">
                                                            <li>Placement: 5/10</li>
                                                            <li>College: 5/10</li>
                                                            <li>Course: 5/10</li>
                                                            <li>Internship: 5/10</li>
                                                            <li>Campus Life: 5/10</li>
                                                        </ul>
                                                    </div>

                                                    <div class="item__footer row align-items-center pt-1">
                                                        <div class="col-12 col-md-8 left-col mb-3 mb-md-0 d-flex">
                                                            <button class="me-2 text--green"><i class="fa-solid fa-thumbs-up me-1"></i>0</button>

                                                            <button class="me-2 me-sm-3 text-danger"><i class="fa-solid fa-thumbs-down me-1"></i>0</button>

                                                            <button class="ms-sm-1 text--dark text-uppercase"><i class="fa-solid fa-flag me-1"></i> Report</button>

                                                            <button class="fw-medium">
                                                                <i class="fa-solid fa-reply me-1 text--orange"></i>
                                                                Reply
                                                            </button>
                                                        </div>
                                                        <div class="col-12 col-md-4 text-md-end">
                                                            <a href="#" class="btn btn--secondary rounded-pill">Read More</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>

                                        <nav aria-label="Page navigation" class="mt-3 d-flex justify-content-center">
                                            <ul class="pagination">
                                                <li class="page-item disabled">
                                                    <a class="page-link" href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
                                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                                <li class="page-item">
                                                    <a class="page-link" href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="gallery" role="tabpanel" aria-labelledby="gallery-tab">
                                @isset($college_details->images)
                                <div class="info-block bg--body shadow--base rounded-2 mb-3">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Images</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <div class="grid grid-cols-2 grid-cols-sm-3 grid-cols-lg-4 gap-3 gap-lg-4 gallery">
                                            @foreach(json_decode($college_details->images) as $image)
                                                <a href="{{ asset(Storage::url($image)) }}">
                                                    <img src="{{ asset(Storage::url($image)) }}" alt="" />
                                                </a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endisset

                                @isset($college_details->videos)
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Videos</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <ul class="grid grid-cols-1 grid-cols-sm-2 grid-cols-lg-3 gap-3 gap-lg-4">
                                            @foreach(json_decode($college_details->videos) as $video)
                                            <li class="video-container">
                                                <iframe width="100%" height="auto" src="{{ $video->link ?? '#' }}"  title="{{ $video->title ?? '#' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen=""></iframe>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endisset
                            </div>

                            <div class="tab-pane" id="scholarship" role="tabpanel" aria-labelledby="scholarship-tab">
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">Scholarship</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <p>Content Coming Soon</p>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane" id="faculty" role="tabpanel" aria-labelledby="faculty-tab">
                                @isset($college_details->faculty)
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Faculty Details</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        
                                        <h4 class="text--secondary fw-semibold mb-2 d-none">Prof. (Dr.) Samit Ray</h4>
                                        <p class="text--xs fw-semibold mb-4 d-none">Chancellor</p>
                                        <p class="text--xs text--dark fw-semibold mb-4 d-none">Other Faculty Details</p>
                                        
                                        <ul class="faculty-list">
                                            @foreach(json_decode($college_details->faculty) as $teacher)
                                            <li>
                                                <div class="row align-items-center">
                                                    <div class="col-12 col-lg-7">
                                                        <h4 class="text--green fw-semibold mb-1">{{ $teacher->name  ?? '' }}</h4>
                                                        <p class="text--xs text--secondary fw-medium mb-1">{{ $teacher->designation  ?? '' }}</p>
                                                        <p class="text--xs fw-medium mb-0"><span class="fw-semibold">Qualification</span> - {{ $teacher->qualification ?? '' }}</p>
                                                    </div>
                                                    <div class="col-12 col-lg-5">
                                                        <p class="text--dark mb-1">Contact this faculty</p>
                                                        <p class="text--xs mb-0"><i class="fa-solid fa-paper-plane me-2"></i><span class="ms-1 fw-medium text--dark">Email - </span>{{ $teacher->email ?? '' }}</p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endisset
                            </div>

                            <div class="tab-pane" id="news" role="tabpanel" aria-labelledby="news-tab">
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  News and Article</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <ul class="nav nav-tabs news-tabs mb-1" id="newsTab" role="tablist">
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link active" id="all-tab" data-bs-toggle="tab" data-bs-target="#all" type="button" role="tab" aria-controls="all" aria-selected="true">All</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="exam-tab" data-bs-toggle="tab" data-bs-target="#exam" type="button" role="tab" aria-controls="exam" aria-selected="false">Exam</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="college-tab" data-bs-toggle="tab" data-bs-target="#college" type="button" role="tab" aria-controls="college" aria-selected="false">College</button>
                                            </li>
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link" id="interview-tab" data-bs-toggle="tab" data-bs-target="#interview" type="button" role="tab" aria-controls="interview" aria-selected="false">interview</button>
                                            </li>
                                        </ul>

                                        <div class="tab-content">
                                            <div class="tab-pane p-0 active" id="all" role="tabpanel" aria-labelledby="all-tab">
                                                <ul class="news-list grid grid-cols-1 grid-cols-md-2 gap-x-4 gap-x-lg-6">
                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>

                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>

                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>

                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane p-0" id="exam" role="tabpanel" aria-labelledby="exam-tab">
                                                <ul class="news-list grid grid-cols-1 grid-cols-md-2 gap-x-4 gap-x-lg-6">
                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>

                                                    <li class="py-3 news-item">
                                                        <div class="d-flex position-relative">
                                                            <figure class="mb-0 flex-shrink-0 me-2 me-sm-3">
                                                                <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="" height="" class="w-100 h-100 object-fit-cover rounded-2" />
                                                            </figure>

                                                            <div>
                                                                <p class="news-item__title lh-1 fw-semibold mb-2"><a href="#" class="link--dark line-clamp" title="CAT Exam: Evolution Over the Years">CAT Exam: Evolution Over the Years</a></p>
                                                                <p class="mb-0 line-clamp line-clamp--2">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Rem eveniet non, magnam debitis possimus itaque ratione nobis reiciendis tenetur consequatur!</p>
                                                                <a href="#" class="news-item__btn--read-more">Read More</a>
                                                            </div>
                                                        </div>
                                                        <p class="text--xs date mt-2 mb-0"><i class="fa-solid fa-calendar-days me-1"></i><span class="me-3">August 3, 2023</span>|<span class="ms-3">Exam</span></p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="tab-pane p-0" id="college" role="tabpanel" aria-labelledby="college-tab">College</div>
                                            <div class="tab-pane p-0" id="interview" role="tabpanel" aria-labelledby="interview-tab">Interview</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="tab-pane" id="faq" role="tabpanel" aria-labelledby="faq-tab">
                                @isset($college_details->faq)
                                <div class="info-block bg--body shadow--base rounded-2">
                                    <div class="info-block__header p-3">
                                        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }} FAQ</h5>
                                    </div>
                                    <div class="info-block__body p-3">
                                        <div class="accordion-container">
                                            @foreach(json_decode($college_details->faq) as $faq)
                                            <div class="set">
                                              <a href="#" class="">
                                                <span>{{ $faq->question ?? '' }}</span>
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                              </a>
                                              <div class="content content-box" style="display: none">
                                                <p>{{ $faq->answer ?? '' }}</p>
                                              </div>
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                                @endisset
                            </div>
                        </div>

                        <!--@isset($college_details->course)-->
                        <!--<div class="info-block table-wrapper bg--body shadow--base rounded-2">-->
                        <!--    <div class="info-block__header table__header mb-0">-->
                        <!--        <h5 class="text--dark fw-semibold mb-0">{{ $college->name ?? '' }}  Fees & Eligibility</h5>-->
                        <!--    </div>-->

                        <!--    <div class="info-block__body">-->
                        <!--        <div class="table-responsive-sm">-->
                        <!--            <table class="table table-bordered table--course-fees text-center">-->
                        <!--                <thead>-->
                        <!--                    <tr>-->
                        <!--                        <th scope="col">Course</th>-->
                        <!--                        <th scope="col">Fees</th>-->
                        <!--                        <th scope="col">Eligibility</th>-->
                        <!--                    </tr>-->
                        <!--                </thead>-->
                        <!--                <tbody>-->
                        <!--                    @foreach(json_decode($college_details->course) as $course)-->
                        <!--                    <tr>-->
                        <!--                        <td><a href="#">{{ $course->course ?? '' }}</a></td>-->
                        <!--                        <td>{{ $course->fees ?? '' }}</td>-->
                        <!--                        <td>{{ $course->eligibility ?? '' }}</td>-->
                        <!--                    </tr>-->
                        <!--                    @endforeach-->
                        <!--                </tbody>-->
                        <!--            </table>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                        <!--@endisset-->

                        <div class="info-block bg--body shadow--base rounded-2 d-none">
                            <div class="info-block__header">
                                <h5 class="text--dark fw-semibold mb-0">Courses Offered By {{ $college->name ?? '' }} , Kolkata</h5>
                            </div>
                            <div class="info-block__body">
                                <ul class="courses-list">
                                    <li class="course-item position-relative">
                                        <h5 class="text--dark fw-semibold mb-2"><a href="#" class="link--dark">Bachelor of Technology [B.Tech]</a></h5>

                                        <ul class="course-item__icon-info d-flex flex-wrap pt-1 mb-2">
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                <span class="ms-1">4 Years</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-book-open"></i>
                                                <span class="ms-1">Degree</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-building-columns"></i>
                                                <span class="ms-1">On Campus</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <span class="ms-1">Graduation</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-equals"></i>
                                                <span class="ms-1">Full Time</span>
                                            </li>
                                        </ul>

                                        <p class="course-item__rev-info mb-2 pt-1">
                                            <span class="me-1 fw-semibold">8.2/10</span>
                                            <span class="me-1 text--secondary">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <a href="#" class="me-1 link--primary fw-medium link-hover--underline">20 Reviews</a>|
                                            <span>Rated #86 out of 166 by</span>
                                            <a href="#" class="fw-medium link-hover--underline">IIRF in Engineering</a>
                                        </p>

                                        <div class="mb-2">
                                            <span class="text--sm">Specialization</span>
                                            <ul class="course-item__spec d-inline-flex flex-wrap flex-column flex-sm-row">
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Civil Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Biotechnology</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electronics & Communication Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electrical Engineering</a></li>
                                            </ul>
                                            <a href="#" class="fw-semibold text--sm">+6 More</a>
                                        </div>

                                        <p class="mb-2"><span>Cutoff:</span><span class="fw-semibold ms-2">B.Tech Civil Engineering WBJEE 2022 Cut off: 51034</span></p>

                                        <p class="mb-2"><span>Application Date:</span><span class="fw-semibold ms-2">23 Dec - 30 Apr 2023</span></p>

                                        <ul class="course-item__cta d-flex flex-wrap mb-3">
                                            <li>
                                                <a href="#" class="text--sm fw-medium">Apply Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                            </li>
                                            
                                            @isset($college_details->brochure)
                                            <li>
                                                <a target="_blank" href="{{asset(Storage::url($college_details->brochure))}}" class="text--sm fw-medium">Download Brochure <i class="fa-solid fa-download ms-1"></i></a>
                                            </li>
                                            @endisset
                                                
                                            <li>
                                                <a href="#" class="text--sm fw-medium">Compare <i class="fa-solid fa-arrow-right-arrow-left ms-1"></i></a>
                                            </li>
                                        </ul>

                                        <div class="course-item__pricing">
                                            <h5 class="mb-2 lh-1 fw-semibold">₹ 1,90,000 <small class="fw-normal">1st Yr Fees</small></h5>
                                            <p class="mb-0 text--sm fw-medium"><a href="#" class="link-hover--underline">Check Details Fees</a></p>
                                        </div>
                                    </li>

                                    <li class="course-item position-relative">
                                        <h5 class="text--dark fw-semibold mb-2"><a href="#" class="link--dark">Bachelor of Technology [B.Tech]</a></h5>

                                        <ul class="course-item__icon-info d-flex flex-wrap pt-1 mb-2">
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                <span class="ms-1">4 Years</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-book-open"></i>
                                                <span class="ms-1">Degree</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-building-columns"></i>
                                                <span class="ms-1">On Campus</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <span class="ms-1">Graduation</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-equals"></i>
                                                <span class="ms-1">Full Time</span>
                                            </li>
                                        </ul>

                                        <p class="course-item__rev-info mb-2 pt-1">
                                            <span class="me-1 fw-semibold">8.2/10</span>
                                            <span class="me-1 text--secondary">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <a href="#" class="me-1 link--primary fw-medium link-hover--underline">20 Reviews</a>|
                                            <span>Rated #86 out of 166 by</span>
                                            <a href="#" class="fw-medium link-hover--underline">IIRF in Engineering</a>
                                        </p>

                                        <div class="mb-2">
                                            <span class="text--sm">Specialization</span>
                                            <ul class="course-item__spec d-inline-flex flex-wrap flex-column flex-sm-row">
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Civil Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Biotechnology</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electronics & Communication Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electrical Engineering</a></li>
                                            </ul>
                                            <a href="#" class="fw-semibold text--sm">+6 More</a>
                                        </div>

                                        <p class="mb-2"><span>Cutoff:</span><span class="fw-semibold ms-2">B.Tech Civil Engineering WBJEE 2022 Cut off: 51034</span></p>

                                        <p class="mb-2"><span>Application Date:</span><span class="fw-semibold ms-2">23 Dec - 30 Apr 2023</span></p>

                                        <ul class="course-item__cta d-flex flex-wrap mb-3">
                                            <li>
                                                <a href="#" class="text--sm fw-medium">Apply Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                            </li>
                                            
                                            @isset($college_details->brochure)
                                            <li>
                                                <a target="_blank" href="{{asset(Storage::url($college_details->brochure))}}" class="text--sm fw-medium">Download Brochure <i class="fa-solid fa-download ms-1"></i></a>
                                            </li>
                                            @endisset

                                            <li>
                                                <a href="#" class="text--sm fw-medium">Compare <i class="fa-solid fa-arrow-right-arrow-left ms-1"></i></a>
                                            </li>
                                        </ul>

                                        <div class="course-item__pricing">
                                            <h5 class="mb-2 lh-1 fw-semibold">₹ 1,90,000 <small class="fw-normal">1st Yr Fees</small></h5>
                                            <p class="mb-0 text--sm fw-medium"><a href="#" class="link-hover--underline">Check Details Fees</a></p>
                                        </div>
                                    </li>

                                    <li class="course-item position-relative">
                                        <h5 class="text--dark fw-semibold mb-2"><a href="#" class="link--dark">Bachelor of Technology [B.Tech]</a></h5>

                                        <ul class="course-item__icon-info d-flex flex-wrap pt-1 mb-2">
                                            <li>
                                                <i class="fa-solid fa-clock"></i>
                                                <span class="ms-1">4 Years</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-book-open"></i>
                                                <span class="ms-1">Degree</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-building-columns"></i>
                                                <span class="ms-1">On Campus</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-graduation-cap"></i>
                                                <span class="ms-1">Graduation</span>
                                            </li>

                                            <li>
                                                <i class="fa-solid fa-equals"></i>
                                                <span class="ms-1">Full Time</span>
                                            </li>
                                        </ul>

                                        <p class="course-item__rev-info mb-2 pt-1">
                                            <span class="me-1 fw-semibold">8.2/10</span>
                                            <span class="me-1 text--secondary">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                            </span>
                                            <a href="#" class="me-1 link--primary fw-medium link-hover--underline">20 Reviews</a>|
                                            <span>Rated #86 out of 166 by</span>
                                            <a href="#" class="fw-medium link-hover--underline">IIRF in Engineering</a>
                                        </p>

                                        <div class="mb-2">
                                            <span class="text--sm">Specialization</span>
                                            <ul class="course-item__spec d-inline-flex flex-wrap flex-column flex-sm-row">
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Civil Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Biotechnology</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electronics & Communication Engineering</a></li>
                                                <li><a href="#" class="link--dark link-hover--underline text--sm fw-medium">Electrical Engineering</a></li>
                                            </ul>
                                            <a href="#" class="fw-semibold text--sm">+6 More</a>
                                        </div>

                                        <p class="mb-2"><span>Cutoff:</span><span class="fw-semibold ms-2">B.Tech Civil Engineering WBJEE 2022 Cut off: 51034</span></p>

                                        <p class="mb-2"><span>Application Date:</span><span class="fw-semibold ms-2">23 Dec - 30 Apr 2023</span></p>

                                        <ul class="course-item__cta d-flex flex-wrap mb-3">
                                            <li>
                                                <a href="#" class="text--sm fw-medium">Apply Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                            </li>
                                            
                                            @isset($college_details->brochure)
                                            <li>
                                                <a target="_blank" href="{{asset(Storage::url($college_details->brochure))}}" class="text--sm fw-medium">Download Brochure <i class="fa-solid fa-download ms-1"></i></a>
                                            </li>
                                            @endisset
                                            
                                            <li>
                                                <a href="#" class="text--sm fw-medium">Compare <i class="fa-solid fa-arrow-right-arrow-left ms-1"></i></a>
                                            </li>
                                        </ul>

                                        <div class="course-item__pricing">
                                            <h5 class="mb-2 lh-1 fw-semibold">₹ 1,90,000 <small class="fw-normal">1st Yr Fees</small></h5>
                                            <p class="mb-0 text--sm fw-medium"><a href="#" class="link-hover--underline">Check Details Fees</a></p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-xl-3">
                        <aside>
                            <button class="btn btn--secondary btn--apply-now text-center mb-3" data-bs-toggle="modal" data-bs-target="#applyModal"><span>Apply Now</span><i class="lni lni-arrow-right"></i></button>
                            
                            @isset($college_details->brochure)    
                            <a target="_blank" href="{{asset(Storage::url($college_details->brochure))}}" class="btn btn--white btn--download-brochure"><span>Download Brochure</span><i class="lni lni-download"></i></a>
                            @endisset
                            
                            <div class="rev-container bg--gradient-1 text-white my-3 rounded-2 text-center">
                                <img src="{{ asset('assets/images/college-singe-pagetitle.webp') }}" alt="" />
                                <p class="text--sm mb-2">{{ $college->name ?? '' }} , Kolkata</p>

                                <div class="rev-container__stars mb-2">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>

                                <p class="fw-semibold mb-3">
                                    "Write a Review & Earn Upto <span class="highlighted-text">₹100*</span> "<br />
                                    *Approval in 15 Min"
                                </p>

                                <p class="mb-3"><a href="#" class="btn btn--secondary">Start Writing</a></p>

                                <p class="text--xs mb-0">*Only For the First 20 Reviews this Month</p>
                            </div>
                            
                            @isset($college_details->videos)
                            <div class="info-block info-block--video bg--body shadow--base rounded-2">
                                <div class="info-block__header">
                                    <h6 class="text--dark fw-semibold mb-0">Videos</h6>
                                </div>
                                <div class="info-block__body">
                                    <ul>
                                        @foreach(array_slice(json_decode($college_details->videos), 0, 2) as $video)
                                        <li class="video-container">
                                            <iframe width="100%" height="auto" src="{{ $video->link ?? '#' }}" title="{{ $video->title ?? '' }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endisset
                            
                            @isset($college_details->images)
                            <div class="info-block info-block--photos bg--body shadow--base rounded-2">
                                <div class="info-block__header">
                                    <h6 class="text--dark fw-semibold mb-0">Photos</h6>
                                </div>
                                <div class="info-block__body">
                                    <div class="grid grid-cols-2 gap-3 gallery">
                                        @foreach(array_slice(json_decode($college_details->images), 0, 4) as $image)
                                        <a href="{{asset(Storage::url($image))}}">
                                            <img src="{{asset(Storage::url($image))}}" alt="" />
                                        </a>
                                        @endforeach
                                    </div>

                                    <div class="mt-3">
                                        <a href="javascript:document.getElementById('gallery-tab').click()" class="btn btn--secondary-outline d-block w-100">View All</a>
                                    </div>
                                </div>
                            </div>
                            @endisset
                            
                            @isset($college_details->course)
                            <div class="info-block info-block--top-courses bg--body shadow--base rounded-2">
                                <div class="info-block__header">
                                    <h6 class="text--dark fw-semibold mb-0">Top Courses</h6>
                                </div>
                                <div class="info-block__body pt-0 pt-0">
                                    <ul>
                                        @foreach(json_decode($college_details->course) as $course)
                                        <li>
                                            <a href="#" class="link--dark d-flex justify-content-between py-3">
                                                <div>
                                                    <p class="text--sm fw-medium mb-0">{{ $course->course ?? '' }}</p>
                                                </div>
                                                <span class="text--xs fw-medium">{{ $course->fees ?? '' }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <div>
                                        <a href="javascript:document.getElementById('courses-tab').click()" class="btn btn--secondary-outline d-block w-100">View More Courses</a>
                                    </div>
                                </div>
                            </div>
                            @endisset
                            
                            @isset($college_details->faculty)
                            <div class="info-block info-block--faculties bg--body shadow--base rounded-2">
                                <div class="info-block__header">
                                    <h6 class="text--dark fw-semibold mb-0">Faculties</h6>
                                </div>
                                <div class="info-block__body pt-0">
                                    <ul>
                                        @foreach(json_decode($college_details->faculty) as $teacher)
                                        <li>
                                            <a href="#" class="link--dark d-block py-3">
                                                <p class="text--sm fw-medium mb-0">{{ $teacher->name  ?? '' }}</p>
                                                <span class="text--xs">{{ $teacher->designation  ?? '' }}</span>
                                                <span class="text--xs">{{ $teacher->qualification ?? '' }}</span>
                                            </a>
                                        </li>
                                        @endforeach
                                    </ul>

                                    <div>
                                        <a href="javascript:document.getElementById('faculty-tab').click()" class="btn btn--secondary-outline d-block w-100">View All Faculties</a>
                                    </div>
                                </div>
                            </div>
                            @endisset

                            <!--<div class="info-block info-block--notifications bg--body shadow--base rounded-2 overflow-hidden">-->
                            <!--    <div class="info-block__header bg--primary">-->
                            <!--        <h6 class="text-white fw-semibold mb-0">Notifications</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body py-0">-->
                            <!--        <ul>-->
                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>-->
                            <!--                        <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>-->
                            <!--                        <span class="text--xs cta-btn">Read More</span>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>-->
                            <!--                        <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>-->
                            <!--                        <span class="text--xs cta-btn">Read More</span>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>-->
                            <!--                        <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>-->
                            <!--                        <span class="text--xs cta-btn">Read More</span>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="info-block info-block--notifications bg--body shadow--base rounded-2 overflow-hidden">-->
                            <!--    <div class="info-block__header">-->
                            <!--        <h6 class="text--dark fw-semibold mb-0">Other Colleges In The Same Group</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body py-0">-->
                            <!--        <ul>-->
                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/14885360896.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">Adamas Institute of Technology - [AIT]</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-location-dot me-1"></i>Kolkata India</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/14885360896.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">Adamas Institute of Technology - [AIT]</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-location-dot me-1"></i>Kolkata India</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="info-block info-block--notifications info-block--news bg--body shadow--base rounded-2 overflow-hidden">-->
                            <!--    <div class="info-block__header">-->
                            <!--        <h6 class="text--dark fw-semibold mb-0">News</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body py-0">-->
                            <!--        <ul>-->
                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">-->
                            <!--                    <figure class="mb-0 pe-2 flex-shrink-0">-->
                            <!--                        <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />-->
                            <!--                    </figure>-->
                            <!--                    <div>-->
                            <!--                        <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>-->
                            <!--                        <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>-->
                            <!--                    </div>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="info-block bg--body shadow--base rounded-2 overflow-hidden">-->
                            <!--    <div class="info-block__header">-->
                            <!--        <h6 class="text--dark fw-semibold mb-0">Placements</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body">-->
                            <!--        <p class="text--green text--sm fw-medium mb-1">₹43,00,000</p>-->
                            <!--        <p class="mb-3 text--xs">Highest Package</p>-->
                            <!--        <hr />-->
                            <!--        <ul class="grid grid-cols-3 gap-3">-->
                            <!--            <img src="{{ asset('assets/images/1514350929Aditya Birla Group.webp') }}" alt="" />-->
                            <!--            <img src="{{ asset('assets/images/1514357378Cognizant.webp') }}" alt="" />-->
                            <!--            <img src="{{ asset('assets/images/1514365706FLIPKART.webp') }}" alt="" />-->
                            <!--            <img src="{{ asset('assets/images/1514441221Deloitte.webp') }}" alt="" />-->
                            <!--            <img src="{{ asset('assets/images/1514444983HDFC Bank.webp') }}" alt="" />-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="info-block info-block--faculties bg--body shadow--base rounded-2">-->
                            <!--    <div class="info-block__header">-->
                            <!--        <h6 class="text--dark fw-semibold mb-0">Learn more about the courses</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body px-3 py-0">-->
                            <!--        <ul>-->
                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex justify-content-between py-3">-->
                            <!--                    <span class="text--xs fw-medium mb-0">B. Pharma</span>-->
                            <!--                    <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex justify-content-between py-3">-->
                            <!--                    <span class="text--xs fw-medium mb-0">D. Pharma</span>-->
                            <!--                    <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex justify-content-between py-3">-->
                            <!--                    <span class="text--xs fw-medium mb-0">B.Tech Civil Engineering</span>-->
                            <!--                    <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex justify-content-between py-3">-->
                            <!--                    <span class="text--xs fw-medium mb-0">B.Tech Biotechnology</span>-->
                            <!--                    <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="link--dark d-flex justify-content-between py-3">-->
                            <!--                    <span class="text--xs fw-medium mb-0">B.Sc (Hons.) Microbiology</span>-->
                            <!--                    <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        </ul>-->
                            <!--    </div>-->
                            <!--</div>-->

                            <!--<div class="info-block info-block--faculties info-block--reviews info-block--reviews bg--body shadow--base rounded-2">-->
                            <!--    <div class="info-block__header">-->
                            <!--        <h6 class="text--dark fw-semibold mb-0">Learn more about the courses</h6>-->
                            <!--    </div>-->
                            <!--    <div class="info-block__body px-3 py-0">-->
                            <!--        <ul>-->
                            <!--            <li>-->
                            <!--                <a href="#" class="d-block py-3">-->
                            <!--                    <span class="mb-1 text--xs d-flex flex-wrap align-items-center"><b>7.3/10</b> Students Satisfactory Rating</span>-->
                            <!--                    <span class="text--dark text--sm fw-medium d-block mb-1">Some informations regarding {{ $college->name ?? '' }} .</span>-->
                            <!--                    <span class="text--para text--xs d-block mb-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur porro, deserunt delectus saepe facere optio labore animi in nostrum molestias sint, sit tempore eligendi earum officia voluptatem sapiente magni repellendus.</span>-->
                            <!--                    <span class="text--xs text--dark fw-medium"><strong>PM</strong>By Pritam Mukherjee</span>-->
                            <!--                </a>-->
                            <!--            </li>-->

                            <!--            <li>-->
                            <!--                <a href="#" class="d-block py-3">-->
                            <!--                    <span class="mb-1 text--xs d-flex flex-wrap align-items-center"><b>7.3/10</b> Students Satisfactory Rating</span>-->
                            <!--                    <span class="text--dark text--sm fw-medium d-block mb-1">Some informations regarding {{ $college->name ?? '' }} .</span>-->
                            <!--                    <span class="text--para text--xs d-block mb-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur porro, deserunt delectus saepe facere optio labore animi in nostrum molestias sint, sit tempore eligendi earum officia voluptatem sapiente magni repellendus.</span>-->
                            <!--                    <span class="text--xs text--dark fw-medium"><strong>PM</strong>By Pritam Mukherjee</span>-->
                            <!--                </a>-->
                            <!--            </li>-->
                            <!--        </ul>-->

                            <!--        <div class="mt-1">-->
                            <!--            <a href="#" class="btn btn--secondary-outline d-block w-100">View All Reviews(12)</a>-->
                            <!--        </div>-->
                            <!--    </div>-->
                            <!--</div>-->
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Apply Now -->
    <div class="modal apply-now-modal fade" id="applyModal" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
          <div class="modal-content overflow-hidden">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

            <div class="modal-body p-0">
              <div class="row g-0 flex-column-reverse flex-lg-row">
                <div class="col-12 col-lg-4 left-col bg--light p-3 p-sm-4">
                  <h6 class="text--dark fw-semibold mb-3 d-none d-lg-block">How College Choice helps you in Admission</h6>

                  <div class="grid grid-cols-2 gap-3 gap-sm-4 mb-3 d-none d-lg-grid">
                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/brochure.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">Brochure Details</p>
                    </div>

                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/fees.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">Check Detailed Fees</p>
                    </div>

                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/filter.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">Shortlist & Apply</p>
                    </div>

                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/headset.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">24/7 Counselling</p>
                    </div>

                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/degree.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">Scholarships</p>
                    </div>

                    <div class="icon-box bg--body text-center p-3 rounded-1">
                      <figure class="mb-2">
                        <img src="{{ asset('assets/images/deadline.png') }}" alt="" width="64" height="64" />
                      </figure>
                      <p class="mb-0 text--xs fw-medium">Application Deadlines</p>
                    </div>
                  </div>

                  <h6 class="text--dark fw-semibold mb-3">What People Say</h6>

                  <div class="owl-carousel owl-theme testimonial-carousel has-nav-vertical-middle">
                    <div class="item">
                      <div class="t-card d-xl-flex bg--body p-2 rounded-1">
                        <figure class="mb-2 mb-xl-0 flex-xl-shrink-0">
                          <img src="{{ asset('assets/images/client-1.jpg') }}" alt="" width="80" height="80" class="rounded-circle w-100 h-100 object-fit-cover" />
                        </figure>
                        <div class="t-card__body ps-2 pt-1 pt-xl-0">
                          <p class="mb-2 text--xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem libero mollitia eveniet ipsum suscipit omnis eos dolores labore atque ducimus.</p>
                          <p class="fw-medium text--xs mb-0">John Doe</p>
                        </div>
                      </div>
                    </div>

                    <div class="item">
                      <div class="t-card d-xl-flex bg--body p-2 rounded-1">
                        <figure class="mb-2 mb-xl-0 flex-xl-shrink-0">
                          <img src="{{ asset('assets/images/client-1.jpg') }}" alt="" width="80" height="80" class="rounded-circle w-100 h-100 object-fit-cover" />
                        </figure>
                        <div class="t-card__body ps-2 pt-1 pt-xl-0">
                          <p class="mb-2 text--xs">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem libero mollitia eveniet ipsum suscipit omnis eos dolores labore atque ducimus.</p>
                          <p class="fw-medium text--xs mb-0">John Doe</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 col-lg-8 right-col p-3 p-sm-4">
                  <div class="form-wrapper p-xl-2">
                    <div class="form-wrapper__header mt-2 mb-4 d-sm-flex align-items-center">
                      <figure class="mb-2 mb-sm-0 d-inline-flex align-items-center justify-content-center">
                        <img src="{{ asset(Storage::url($college->logo)) }}" alt="" />
                      </figure>

                      <div class="ps-sm-3">
                        <h3 class="text--secondary fw-semibold mb-1">Register Now To Apply</h3>
                        <h5 class="text--dark fw-medium mb-0">{{ $college->name ?? '' }}</h5>
                      </div>
                    </div>
                    <hr />
                    <div class="form-wrapper__body">
                      <form action="{{ route('send-query') }}" method="POST" class="apply-form has-floating-labels">
                        @csrf
                        <div class="grid-row gap-y-5 gap-sm-5 gap-lg-6 mb-3">
                            <div class="position-relative col-span-12 col-span-sm-6">
                                <input type="text" name="name" id="afName" placeholder="" required />
                                <label for="afName">Full Name <span class="text-danger">*</span></label>
                                <span class="icon"><i class="fa-solid fa-user"></i></span>
                            </div>

                            <div class="position-relative col-span-12 col-span-sm-6">
                                <input type="text" name="email" id="afEmail" placeholder="" required />
                                <label for="afEmail">Email <span class="text-danger">*</span></label>
                                <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                            </div>

                            <div class="position-relative col-span-12 col-span-sm-6">
                                <input type="text" name="phone" id="afPhone" placeholder="" required />
                                <label for="afPhone">Phone <span class="text-danger">*</span></label>
                                <span class="icon"><i class="fa-solid fa-phone"></i></span>
                            </div>
                          
                            <div class="position-relative col-span-12 col-span-sm-6">
                                <select class="form-select" name="city_id" required>
                                   @foreach($district_array as $data)
                                        <option value="{{ $data->id }}">{{ $data->name }}</option>
                                   @endforeach
                                </select>
                                <label for="afCity">City You Live in <span class="text-danger">*</span></label>
                                <span class="icon"><i class="fa-solid fa-phone"></i></span>
                            </div>
                            
                            <div class="position-relative col-span-12 col-span-sm-6">
                                <select class="form-select" name="course_id" required>
                                    @foreach($course_array as $data)
                                        <option value="{{ $data->id }}">{{ $data->short_name }}</option>
                                    @endforeach
                                </select>
                                <label for="afCourse">Course Interested In<span class="text-danger">*</span></label>
                                <span class="icon"><i class="fa-solid fa-graduation-cap"></i></span>
                            </div>
                            
                            <div class="d-none position-relative col-span-12 col-span-sm-6">
                                <input type="text" name="college_id" id="afPhone" placeholder="" value="{{ $college->id }}" />
                            </div>
                        </div>
                        <p class="fw-medium pt-1">By submitting this form, you accept and agree to our <a href="#" class="link--primary link-hover--underline">Terms of Use</a>.</p>
                        <div class="text-end">
                          <button type="submit" class="btn btn--secondary text-uppercase">Submit</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
</main>
@stop