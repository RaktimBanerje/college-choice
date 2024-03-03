@extends('layouts.app')

@section('content')
<main>
  <section class="hero-section position-relative bg--dark bg--center bg--cover bg--no-repeat hero-ovarlay" style="background-image: url(assets/images/hero-section-bg.jpg)">
    <!--<div class="container">-->
    <!--  <div class="content-box text-center has-h1--white text-white">-->
    <!--    <h1>Find Over 11000+ Course in India</h1>-->
    <!--  </div>-->
    <!--</div>-->

    <div class="carousel-wrap">
        <div class="owl-carousel owl-theme hero-desktop-carousel has-nav-vertical-middle d-md-block d-none">
          <div class="item" data-timeout="8000">
            <div class="video-wrapper" data-index="1">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/static_videos/2.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
    
          <div class="item" data-timeout="21000">
            <div class="video-wrapper" data-index="2">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/static_videos/1.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
    
          <div class="item" data-timeout="12000">
            <div class="video-wrapper" data-index="3">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/images/1st_college choice_mp4_1.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
        </div>
        
        <div class="owl-carousel owl-theme hero-mobile-carousel has-nav-vertical-middle d-block d-md-none">
          <div class="item" data-timeout="8000">
            <div class="video-wrapper" data-index="1">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/static_videos/1_mobile_view.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
    
          <div class="item" data-timeout="21000">
            <div class="video-wrapper" data-index="2">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/static_videos/2_mobile_view.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
    
          <div class="item" data-timeout="12000">
            <div class="video-wrapper" data-index="3">
              <video width="320" height="240" autoplay loop muted play-inline>
                <source src="assets/static_videos/3_mobile_view.mp4" type="video/mp4" />
              </video>
            </div>
          </div>
        </div>
    </div>


    <button class="sf-trigger-btn bg--body" id="btnSearchTrigger">
      <span class="icon"><i class="fa-solid fa-magnifying-glass"></i></span>
      <span class="text">Search for colleges, exams and more...</span>
    </button>
  </section>

  <section class="explore-section border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4 pt-4">
        <h2>Explore College By Course</h2>
      </div>

      <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2">
        @foreach($courses as $course)
        <div class="item">
          <div class="c-card p-3 rounded-2">
            <div class="c-card__header d-flex mb-2 align-items-center">
              <figure class="c-card__icon mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle me-2">
                <img src="assets/images/engineering.png" alt="" width="64" height="64" />
              </figure>
              <div class="ms-1">
                <h5 class="text--dark mb-1">{{ $course->short_name }}</h5>
                <p class="mb-0 text--xs">6000 Colleges</p>
              </div>
            </div>
            <div class="c-card__body">
              <ul>
                @foreach($course->childs as $child)
                <li>
                  <a href="{{ route('course.colleges', $child->slug) }}">{{ $child->short_name }}</a>
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        @endforeach
        <div class="item d-none">
          <div class="c-card">
            <div class="w-100 h-100 d-flex align-items-center justify-content-center">
              <a href="#" class="fs-5 d-inline-flex align-items-center fw-medium lh-1 p-1">See All <i class="lni lni-arrow-right-circle ms-2"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="top-colleges-section bg--light border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>top colleges district wise</h2>
      </div>

      <div class="custom-tab" id="topCollegesTab">
        <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2 mb-3">
          @php $i = 0; @endphp
          @foreach($categories as $category) @php $i++; @endphp
          <div class="item">
            <button class="custom-tab__btn <?php if($i == 1) {echo 'active';} ?>" data-target="{{ $category->short_name }}">{{ $category->short_name }}</button>
          </div>
          @endforeach
        </div>

        <div class="custom-tab__content pt-md-2 mb-4">
            @php $i = 0; @endphp
            @foreach($categories as $category) @php $i++; @endphp
                <div class="custom-tab__pane <?php if($i == 1) {echo 'active';} ?>" data-id="{{ $category->short_name }}">
                    <div class="grid grid-cols-2 grid-cols-sm-3 grid-cols-lg-4 grid-cols-xl-5 gap-3 gap-md-4">
                        @foreach($category->districts as $district)
                            <div class="col-block">
                                <figure class="mb-0">
                                  <a 
                                    href="{{ route('course_district_colleges', [$category->short_name, $district->name, $category->id, $district->id]) }}" class="d-block w-100 h-100">
                                    <img src="{{ Storage::url($district['bg_image']) }}" alt="" width="200" height="210" class="w-100 h-100 object-fit-cover" />
                                  </a>
                                </figure>
                                <div class="col-block__body d-flex flex-wrap align-items-center">
                                  <p class="text-white mb-2 fw-medium">Best {{ $category->short_name }} Colleges in {{ $district->name }}</p>
                                  <ul>
                                    @foreach($district['logos'] as $logo)
                                    <li>
                                      <img src="{{ Storage::url($logo) }}" alt="" width="24" height="24" />
                                    </li>
                                    @endforeach
                                  </ul>
                                  <span class="text-white text--xs ms-2">+{{ $district['number_of_colleges'] }} More</span>
                                </div>
                              </div>
                        @endforeach
                    </div>
                  </div>
            @endforeach
        </div>
      </div>

      <!--<div class="text-center pt-md-2">-->
      <!--  <a href="#" class="btn btn--secondary-outline">Show More</a>-->
      <!--</div>-->
    </div>
  </section>

  <section class="explore-programs border-b--1 d-none">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>Explore Programs</h2>
      </div>

      <div class="custom-tab" id="exploreProgramsTab">
        <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2 mb-3">
          <div class="item">
            <button class="custom-tab__btn active" data-target="education">Education</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="nursing">Nursing</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="pharmacy">Pharmacy</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="paramedical">Paramedical</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="management">Management</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="bvoc">B. Voc</button>
          </div>
        </div>

        <div class="custom-tab__content pt-md-2 mb-4">
          <div class="custom-tab__pane active" data-id="education">
            <div class="row">
              <div class="col-12 col-lg-4">
                <h6 class="text--dark fw-medium">Top 10 Colleges</h6>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="clgID1-tab" data-bs-toggle="tab" data-bs-target="#clgID1" type="button" role="tab" aria-controls="clgID1" aria-selected="true">M.R Group of Colleges & Hospitals</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="clgID2-tab" data-bs-toggle="tab" data-bs-target="#clgID2" type="button" role="tab" aria-controls="clgID2" aria-selected="false">M.R Institute Of Nursing</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="clgID3-tab" data-bs-toggle="tab" data-bs-target="#clgID3" type="button" role="tab" aria-controls="clgID3" aria-selected="false">Mother Marry Institute Of Nursing</button>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-8">
                <div class="tab-content mt-2 mt-lg-0">
                  <div class="tab-pane active" id="clgID1" role="tabpanel" aria-labelledby="clgID1-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="clgID2" role="tabpanel" aria-labelledby="clgID2-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="clgID3" role="tabpanel" aria-labelledby="clgID3-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="custom-tab__pane" data-id="nursing">
            <div class="row">
              <div class="col-12 col-lg-4">
                <h6 class="text--dark fw-medium">Top 10 Colleges</h6>
                <ul class="nav nav-tabs" role="tablist">
                  <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="clgID1-tab" data-bs-toggle="tab" data-bs-target="#clgID1" type="button" role="tab" aria-controls="clgID1" aria-selected="true">M.R Group of Colleges & Hospitals</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="clgID2-tab" data-bs-toggle="tab" data-bs-target="#clgID2" type="button" role="tab" aria-controls="clgID2" aria-selected="false">M.R Institute Of Nursing</button>
                  </li>
                  <li class="nav-item" role="presentation">
                    <button class="nav-link" id="clgID3-tab" data-bs-toggle="tab" data-bs-target="#clgID3" type="button" role="tab" aria-controls="clgID3" aria-selected="false">Mother Marry Institute Of Nursing</button>
                  </li>
                </ul>
              </div>
              <div class="col-12 col-lg-8">
                <div class="tab-content mt-2 mt-lg-0">
                  <div class="tab-pane active" id="clgID1" role="tabpanel" aria-labelledby="clgID1-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="clgID2" role="tabpanel" aria-labelledby="clgID2-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                  <div class="tab-pane" id="clgID3" role="tabpanel" aria-labelledby="clgID3-tab">
                    <div class="row g-4">
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Courses</h6>

                        <ul>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                          <li>
                            <a href="#">Diploma in OT Technician</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Career Opportunities</h6>

                        <ul>
                          <li>
                            <a href="#">Govt.Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">Private Hospitals Stuff Nurse</a>
                          </li>
                          <li>
                            <a href="#">AIIMS Nursing Institutes' Lecturer</a>
                          </li>
                          <li>
                            <a href="#">Nursing in Railway recuirtment Board</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-12 col-md-6">
                        <h6 class="text--dark mb-3 fw-medium">Entrance Examination</h6>

                        <ul>
                          <li>
                            <a href="#">JENPAH</a>
                          </li>
                          <li>
                            <a href="#">WBJEE</a>
                          </li>
                          <li>
                            <a href="#">NET/SET</a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="cta-section border-b--1">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-12 col-lg-6 form-col pe-lg-4">
          <div class="content-box mb-4">
            <h2>Confused About Your <em>Next Step?</em></h2>
            <h4>Discover Your Perfect Path after Class 12th !</h4>
            <p>Fill the form and get personalised career counselling from our expert accademic counsellors!</p>
          </div>

          <div class="form-wrapper">
            <form action="{{ route('send-query') }}" method="POST" class="apply-form has-floating-labels">
                @csrf
                <div class="grid-row gap-y-5 gap-sm-5 gap-lg-6 mb-3">
                    <div class="position-relative col-span-12 col-span-sm-6">
                      <input type="text" name="name" id="afName" placeholder="" />
                      <label for="afName">Full Name <span class="text-danger">*</span></label>
                      <span class="icon"><i class="fa-solid fa-user"></i></span>
                    </div>

                    <div class="position-relative col-span-12 col-span-sm-6">
                      <input type="text" name="email" id="afEmail" placeholder="" />
                      <label for="afEmail">Email <span class="text-danger">*</span></label>
                      <span class="icon"><i class="fa-solid fa-envelope"></i></span>
                    </div>

                    <div class="position-relative col-span-12 col-span-sm-6">
                      <input type="text" name="phone" id="afPhone" placeholder="" />
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
                        <input type="text" name="college_id" id="afPhone" placeholder="" value="" />
                    </div>
                </div>
                <p class="fw-medium pt-1">By submitting this form, you accept and agree to our <a href="#" class="link--primary link-hover--underline">Terms of Use</a>.</p>
                <div class="text-center text-sm-start">
                  <button type="submit" class="btn btn--secondary text-uppercase">Submit</button>
                </div>
            </form>
          </div>
        </div>
        <div class="col-12 col-lg-6 video-col ps-lg-4">
          <video width="400" height="auto" control="false" autoplay loop play-inline>
            <source src="assets/images/cta-video.mp4" />
          </video>

          <div class="content-box info-box p-3 bg--light fw-medium text--dark">
            <p>Let us be your career guidance! Our personalized career counseling empowers you to make informed decisions about your future career.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="latest-notification-section border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>Latest Notification</h2>
      </div>

      <!-- Notification Carousel For Large Screen -->
      <div class="owl-carousel owl-theme notifications-carousel has-nav-vertical-middle pt-md-2 d-none d-lg-block">
        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/8526_1699617137.pdf" target="_blank" class="link--dark line-clamp line-clamp--2" title="MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>10-11-2023</span>
              </div>
            </div>
            
            <p class="line-clamp line-clamp--3">Notice on Form fill-up for Regular & Backlog Students for Odd Semester</p>
            
            <p class="mb-0">
              <a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/8526_1699617137.pdf" target="_blank" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>

          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/2805_1698921393.pdf" target="_blank" class="link--dark line-clamp line-clamp--2" title="MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>02-11-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">Notification on implementation of 4 year curriculum and credit framework</p>
            
            <p class="mb-0">
              <a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/2805_1698921393.pdf" target="_blank" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>

        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/1736_1695979897.pdf" target="_blank" class="link--dark line-clamp line-clamp--2" title="MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>28-09-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">Notification for Publication of results of PPR_Even 2022-23</p>
            <p class="mb-0">
              <a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/1736_1695979897.pdf" target="_blank" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>

          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/8720_1695298510.pdf" target="_blank" class="link--dark line-clamp line-clamp--2" title="MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL">MAULANA ABUL KALAM AZAD UNIVERSITY OF TECHNOLOGY, WEST BENGAL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>20-09-2023</span>
              </div>
            </div>
            
            <p class="line-clamp line-clamp--3">Notification for Publication of Results of the Special Supplementary Examinations 2022-23</p>

            <p class="mb-0">
              <a href="https://d2xe8shibzpjog.cloudfront.net/Notice/makaut1/8720_1695298510.pdf" target="_blank" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>

        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="PHARMACY COUNCIL OF INDIA">PHARMACY COUNCIL OF INDIA</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>14-11-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">NBEMS CPR Awareness Programme (Online) on 6th December 2023 at 09:30 AM</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>

          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="INDIAN NURSING COUNCIL">INDIAN NURSING COUNCIL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>01-11-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">Attention of self enrolled /enrolment of Nurses in Nurse Registration and Tracking System (NRTS)
</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>

        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="WEST BENGAL NURSING COUNCIL
">WEST BENGAL NURSING COUNCIL
</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>01-11-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">Notice Regarding Starting Of Online  Reciprocal Registration Portal & Date booking for verification
</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>

          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="WEST BENGAL NURSING COUNCIL">WEST BENGAL NURSING COUNCIL</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>01-11-2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">Instructions For Uploading Of Documents in Reciprocal Registration Portal </p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>
      </div>

      <!-- Notification Carousel For Small and Tablet Screen -->
      <div class="owl-carousel owl-theme notifications-carousel has-nav-vertical-middle pt-md-2 d-lg-none">
        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="GATE 2024 Data Science and AI Syllabus Out, Download PDF here.">GATE 2024 Data Science and AI Syllabus Out, Download PDF here.</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>Aug 14, 2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">IISc Banglore has released GATE 2024 Data Science and AI Syllabus PDF at gate2024.iisc.ac.in. Download PDF here.</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>

        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="GATE 2024 Data Science and AI Syllabus Out, Download PDF here.">GATE 2024 Data Science and AI Syllabus Out, Download PDF here.</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>Aug 14, 2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">IISc Banglore has released GATE 2024 Data Science and AI Syllabus PDF at gate2024.iisc.ac.in. Download PDF here.</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>

        <div class="item">
          <div class="noti-block p-3">
            <div class="d-flex mb-3">
              <figure class="flex-shrink-0">
                <img src="assets/images/Gate_Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <h6 class="mb-1"><a href="#" class="link--dark line-clamp line-clamp--2" title="GATE 2024 Data Science and AI Syllabus Out, Download PDF here.">GATE 2024 Data Science and AI Syllabus Out, Download PDF here.</a></h6>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <span class="text--dark text--xs ms-1"><i class="fa-solid fa-calendar-days me-1"></i>Aug 14, 2023</span>
              </div>
            </div>

            <p class="line-clamp line-clamp--3">IISc Banglore has released GATE 2024 Data Science and AI Syllabus PDF at gate2024.iisc.ac.in. Download PDF here.</p>
            <p class="mb-0">
              <a href="#" class="link--dark d-inline-flex align-items-center">Read More <i class="fa-solid fa-chevron-right ms-2"></i></a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="top-exams-section border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>Upcoming Exams</h2>
      </div>

      <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2">
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="https://delhipolice.gov.in/" class="link--dark">Delhi Police Constable Exam</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>820</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>14th NOV to 3rd DEC 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>Rs 21,700- Rs. 69,100/-</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="https://delhipolice.gov.in/">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="https://delhipolice.gov.in/">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>

        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="http://www.ssc.nic.in/" class="link--dark">HSPC PGT</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>1324</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>4 TH DECEMBER 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>Rs. 35,400 to Rs. 1,12,400 in CPC pay-level 6</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="http://www.ssc.nic.in/">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="http://www.ssc.nic.in//">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="http://hpsc.gov.in/" class="link--dark">HSPC MEDICAL OFFICER GROUP A</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>167</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>10 TH DECEMBER 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>INR 56,100- 1,44,300 as per WBS(ROPA) rules, 2019</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="http://hpsc.gov.in/">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="http://hpsc.gov.in/">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="http://hpsc.gov.in/" class="link--dark">HSPC PGT </a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>4476</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>16 TH TO 17 TH DECEMBER, 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>Rs. 47600- 151100/-</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="http://hpsc.gov.in/">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="http://hpsc.gov.in/">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="https://psc.uk.gov.in/" class="link--dark">UKPSC RO ARO</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>137</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>17 TH DECEMBER, 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>RO - INR 47,600/- to INR 1,51,100/-   ARO -INR 44,900/- to INR 1,42,400/-</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="https://psc.uk.gov.in/">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="https://psc.uk.gov.in/">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="https://mpsc.gov.in/adv_notification?m=8" class="link--dark">MPPSC State Service Recruitment 2023</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>673</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>17 TH DECEMBER, 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>56,100 per month with Grade Pay of Rs 5400 or Rs 3600 based on the Posts.</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="https://mpsc.gov.in/adv_notification?m=8">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="https://mpsc.gov.in/adv_notification?m=8">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
        <div class="item">
          <div class="exam-card p-3 rounded-2">
            <div class="exam-card__header d-flex mb-2 align-items-center">
              <figure class="mb-0 flex-shrink-0 d-inline-flex align-items-center justify-content-center rounded-circle">
                <img src="assets/images/NTA- Logo.webp" alt="" width="44" height="44" />
              </figure>
              <div>
                <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                <h6 class="text--dark mb-1 mt-2"><a target="_blank" href="http://hpsc.gov.in/" class="link--dark">Deputy Superintendent Jail (Male) in Jail Department, Haryana</a></h6>
              </div>
            </div>
            <div class="exam-card__body">
              <table class="mb-2">
                <tbody>
                  <tr>
                    <td>Vaccancies</td>
                    <td>2</td>
                  </tr>
                  <tr>
                    <td>Exam Date</td>
                    <td>17 TH DECEMBER, 2023</td>
                  </tr>
                  <tr>
                    <td>Salary</td>
                    <td>Rs. 35,400-1,12,400/-</td>
                  </tr>
                </tbody>
              </table>

              <ul class="pt-1">
                <li>
                  <a target="_blank" href="http://hpsc.gov.in//">Application Process <i class="fa-solid fa-chevron-right"></i></a>
                </li>
                <li>
                  <a target="_blank" href="http://hpsc.gov.in/">Exam Info <i class="fa-solid fa-chevron-right"></i></a>
                </li>
              </ul>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </section>

  <section class="top-exams-section trending-courses-section border-b--1 d-none">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>trending courses in 2023-24 session</h2>
      </div>

      <div class="custom-tab pt-md-2" id="trendingCoursesCTab">
        <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle mb-3">
          <div class="item">
            <button class="custom-tab__btn active" data-target="bachelors">Bachelors</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="masters">Masters</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="doctorates">Doctorates</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="diploma">Diploma</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="certification">Certification</button>
          </div>
        </div>

        <div class="custom-tab__content">
          <div class="custom-tab__pane active" data-id="bachelors">
            <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle">
              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="custom-tab__pane" data-id="masters">
            <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle">
              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>

              <div class="item">
                <div class="exam-card p-3 rounded-2">
                  <div class="exam-card__header mb-2">
                    <span class="bg--light text--xs me-2 px-2 py-1">Exam</span>
                    <h6 class="text--dark mb-1 mt-2"><a href="#" class="link--dark">NEET</a></h6>
                  </div>
                  <div class="exam-card__body">
                    <table class="mb-2">
                      <tbody>
                        <tr>
                          <td>Participating Colleges</td>
                          <td>820</td>
                        </tr>
                        <tr>
                          <td>Exam Date</td>
                          <td>May 05, 2024</td>
                        </tr>
                        <tr>
                          <td>Exam Level</td>
                          <td>National</td>
                        </tr>
                      </tbody>
                    </table>

                    <ul class="pt-1">
                      <li>
                        <a href="#">Course Overview <i class="fa-solid fa-chevron-right"></i></a>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="board-exams-section bg--light border-b--1 d-none">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>Board Exams</h2>
      </div>

      <div class="custom-tab" id="boardExamsCTab">
        <div class="owl-carousel owl-theme courses-carousel has-nav-vertical-middle pt-md-2 mb-3">
          <div class="item">
            <button class="custom-tab__btn active" data-target="wbchse">wbchse</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="wbbse">wbbse</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="cbse">cbse</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="icsc">icsc</button>
          </div>

          <div class="item">
            <button class="custom-tab__btn" data-target="nios">nios</button>
          </div>
        </div>

        <div class="custom-tab__content pt-1">
          <div class="custom-tab__pane active" data-id="wbchse">
            <ul class="d-flex flex-wrap gap-x-3 gap-x-sm-4 gap-y-3">
              <li>
                <a href="#">WBCHSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBCHSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBCHSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBCHSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBCHSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>
            </ul>
          </div>

          <div class="custom-tab__pane" data-id="wbbse">
            <ul class="d-flex flex-wrap gap-x-4 gap-y-3">
              <li>
                <a href="#">WBBSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBBSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBBSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBBSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>

              <li>
                <a href="#">WBBSE Class 12<i class="lni lni-arrow-right-circle ms-2"></i></a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="best-books-section border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>best books for your exam preparation</h2>
      </div>

      <div class="owl-carousel owl-theme books-carousel has-nav-vertical-middle pt-md-2">
        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 1.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">JENPAS -UG (Practice Set)</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 2.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">JENPAS - UG ( Guide Book)</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 3.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">NEET</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 4.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">NEET Champion</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 5.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">144 JEE MAIN Chemistry</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 6.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">JEE MAIN SOLVED PAPERS</p>
          </div>
        </div>
        
        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 7.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">JEE MAIN SOLVED PAPERS</p>
          </div>
        </div>
        
        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/static_images/College Choice Book 8.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">144 JEE MAIN PHYSICS</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="online-resources-section bg--light border-b--1">
    <div class="container">
      <div class="content-box has-h2--capitalize text-center text-sm-start mb-4">
        <h2>best online resources for exam preparation</h2>
      </div>

      <div class="owl-carousel owl-theme books-carousel has-nav-vertical-middle pt-md-2">
        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/images/vedanta-logo.webp" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">Vedantu JEE Made Ejee</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/images/unacademy.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">Unacademy</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/images/pw-learner.webp" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">PW Learner App</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/images/byjus.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">Byju's Learning App</p>
          </div>
        </div>

        <div class="item">
          <div class="block text-center">
            <figure class="mb-3 rounded-1 overflow-hidden">
              <img src="assets/images/extra-marks-logo.png" alt="" width="" height="" />
            </figure>
            <p class="mb-0 fw-semibold text--dark">Extra Marks Pvt. Ltd</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@stop

