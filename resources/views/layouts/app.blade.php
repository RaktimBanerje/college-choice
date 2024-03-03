<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap-5.3.0-dist/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2.3.4/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/owl-carousel-2.3.4/owl.theme.default.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/vendors/Magnific-Popup-master/dist/magnific-popup.css') }} " />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.lineicons.com/4.0/lineicons.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/helper-classes.min.css') }} " />
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }} " />
    <title>College Choice | Home</title>
  </head>
  <body>
    <header class="site-header">
      <div class="site-header__top">
        <div class="container-fluid">
          <div class="row align-items-center">
            <div class="col-6">
              <div class="d-inline-flex site-header__contacts">
                <a href="tel:+917450055055" class="me-3 text-light"><i class="fa-solid fa-phone me-2"></i><span class="ps-1"><strong>745-005-5055</strong></span></a>
                <a href="mailto:collegechoiceworld@gmail.com" class="d-none d-md-inline-block text-light"><i class="fa-solid fa-envelope me-2"></i><span class="ps-1"><strong>collegechoiceworld@gmail.com</strong></span></a>
              </div>
            </div>
            <div class="col-6 cta-list text-end">
              <a href="#">Login</a>
              <a href="#" class="btn btn--secondary">Download</a>
            </div>
          </div>
        </div>
      </div>

      <div class="site-header__bottom">
        <div class="container-fluid">
          <div class="row align-items-md-center justify-content-md-between">
            <div class="col-6 col-lg-2 d-flex align-items-center justify-content-md-end">
                
              <button class="site-header__button--nav-toggler d-inline-block d-lg-none me-2 me-sm-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">
                <i class="fa-solid fa-bars"></i>
              </button>

              <a href="https://collegechoice.world/" class="site-header__logo d-inline-block">
                <img src="{{ asset('assets/images/logo.png') }}" alt="" width="184" height="163" />
              </a>
            </div>

            <div class="col-6 col-lg-10 text-end d-flex justify-content-end">
              <nav class="site-header__nav d-none d-lg-inline-flex w-auto">
                <ul>
                    <li>
                    <a href="#"><span class="text-dark">Colleges</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>

                    <div class="mega-menu">
                      <ul class="menu-list">
                        @foreach($college_menu as $menu)
                        <li class="item">
                          <a href="#">{{ $menu->short_name }}</a>
                          <div class="item__body overflow-hidden">
                            <div class="grid grid-cols-3 gap-x-6">
                              <div class="col-wrapper">
                                <p class="text--sm text--dark fw-semibold">College By Degrees</p>

                                <ul class="d-flex flex-column mb-3">
                                    @foreach($menu->childs as $child)
                                      <li>
                                        <a href="{{ route('course.colleges', $child->slug) }}">{{ $child->short_name }}</a>
                                      </li>
                                    @endforeach
                                </ul>

                                <p class="text--sm text--dark fw-semibold">College By Location</p>

                                <ul class="d-flex flex-column">
                                    @foreach($menu->districts as $district)
                                      <li>
                                        <a href="{{ route('course_district_colleges', [$menu->short_name, $district->name, $menu->id, $district->id]) }}">{{ $district->name }}</a>
                                      </li>
                                    @endforeach
                                </ul>
                              </div>

                              <div class="col-wrapper">
                                <p class="text--sm text--dark fw-semibold">Popular Colleges</p>

                                <ul class="d-flex flex-column">
                                    @foreach($menu->popular_colleges as $college)
                                    @php
                                        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $college->name), '-'));
                                    @endphp
                                        <li>
                                            <a href="{{ route('college.details', [$slug, $college->id]) }}">{{ $college->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                              </div>

                              <div class="col-wrapper">
                                <p class="text--sm text--dark fw-semibold">Top Colleges</p>

                                <ul class="d-flex flex-column">
                                    @foreach($menu->top_colleges as $college)
                                    @php
                                        $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $college->name), '-'));
                                    @endphp
                                        <li>
                                            <a href="{{ route('college.details', [$slug, $college->id]) }}">{{ $college->name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                              </div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </li>
                    <li>
                    <a href="#"><span class="text-dark">Courses</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>

                    <div class="mega-menu mega-menu--v2">
                      <div class="grid grid-cols-4 gap-x-6">
                        <div class="col-wrapper">
                          <p class="text--sm fw-semibold">Nursing</p>

                          <ul class="d-flex flex-column mb-3">
                            <li>
                              <a href="https://collegechoice.world/course/general-nursing-and-midwifery">GNM Nursing</a>
                            </li>

                            <li>
                              <a href="https://collegechoice.world/course/bachelor-of-science-in-nursing">B.S.C Nursing</a>
                            </li>
                          </ul>
                        </div>

                        <div class="col-wrapper">
                          <p class="text--sm fw-semibold">Pharmacy</p>

                          <ul class="d-flex flex-column mb-3">
                            <li>
                              <a href="https://collegechoice.world/course/bachelor-of-pharmacy">B.Pharm</a>
                            </li>

                            <li>
                              <a href="https://collegechoice.world/course/diploma-in-pharmacy">D.Pharm</a>
                            </li>
                          </ul>
                        </div>

                        <div class="col-wrapper">
                          <p class="text--sm fw-semibold">Education</p>

                          <ul class="d-flex flex-column mb-3">
                            <li>
                              <a href="https://collegechoice.world/course/diploma-in-elementary-education">D.El.Ed.</a>
                            </li>

                            <li>
                              <a href="https://collegechoice.world/course/bachelor-of-education">B.Ed</a>
                            </li>
                          </ul>
                        </div>
                      </div>
                      <!--<div class="pb-3 mx-3 text-start"><a href="#" class="fw-semibold link--cta ms-1">View All</a></div>-->
                    </div>
                  </li>
                    <li>
                        <a href="#"><span class="text-dark">Exams</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>
                    </li>
                    <li>
                        <a href="#"><span class="text-dark">Careers</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>
                    </li>
                    <li>
                        <a href="#"><span class="text-dark">Study Abroad</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>
                    </li>
                    <li>
                        <a href="#"><span class="text-dark">Latest Updates</span> <i class="fa-solid fa-caret-down ms-2 text-dark"></i></a>
                    </li>
                </ul>
              </nav>

              <button class="site-header__btn--search bg-transparent border-0 text-white fs-5 mx-3 ms-xl-4"><i class="fa-solid fa-magnifying-glass text-dark"></i></button>
              
              <!--<button class="site-header__button--nav-toggler d-inline-block d-lg-none me-2 me-sm-3 d-block d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#navOffcanvas" aria-controls="navOffcanvas">-->
              <!--  <i class="fa-solid fa-bars" style="color: black;"></i>-->
              <!--</button>-->
            </div>
          </div>
        </div>
      </div>

      <div class="form-wrapper bg--light">
        <button class="form-wrapper__btn--close bg-transparent border-0 text--dark fw-semibold d-inline-flex align-items-center position-absolute"><i class="lni lni-close"></i></button>

        <div class="form-wrapper__header bg--body">
          <form action="#" class="search-form" autocomplete="off">
            <div class="position-relative">
              <input type="text" name="search" placeholder="Search College here..." required />
            </div>
          </form>
        </div>

        <div class="form-wrapper__body">
          <!-- Search List Items -->
          <ul class="search-result-list">
            <!--<li class="list-item d-flex justify-content-between align-items-center">-->
            <!--  <div class="list-item__left d-inline-flex align-items-center pe-3">-->
            <!--    <figure class="mb-0">-->
            <!--      <img src="assets/images/clg-logo.webp" alt="" width="50" height="50" />-->
            <!--    </figure>-->
            <!--    <a href="#" class="link--dark fw-medium">Adamas University</a>-->
            <!--  </div>-->

            <!--  <div class="list-item__right d-flex align-items-center flex-shrink-0">-->
            <!--    <figure class="mb-0 me-2">-->
            <!--      <img src="assets/images/India_1495.webp" alt="" width="20" height="20" class="rounded-circle ratio-1x1 h-100 object-fit-cover" />-->
            <!--    </figure>-->
            <!--    <span class="fw-medium">College</span>-->
            <!--  </div>-->
            <!--</li>-->
          </ul>

          <!-- Suggestion -->
          <!--<div class="suggestion-box p-3">-->
          <!--  <h3 class="text--orange fw-semibold">Trending Searches</h3>-->
          <!--  <ul>-->
          <!--    <li>-->
          <!--      <a href="#">Upcoming Exams</a>-->
          <!--    </li>-->

          <!--    <li>-->
          <!--      <a href="#">"IIT" in Colleges</a>-->
          <!--    </li>-->

          <!--    <li>-->
          <!--      <a href="#">"CAT" in exams</a>-->
          <!--    </li>-->
          <!--  </ul>-->
          <!--</div>-->

          <!-- For empty result -->
          <h6 class="text-danger px-3 d-none">No college found.</h6>
        </div>
      </div>

      <div class="offcanvas offcanvas-start bg--body" tabindex="-1" id="navOffcanvas" aria-labelledby="navOffcanvasLabel">
        <div class="offcanvas-header">
          <button class="bg-white text--sm bg-transparent border-0 text--dark fw-medium btn--back invisible"><i class="fa-solid fa-chevron-left ms-1"></i> Back</button>
          <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body position-relative overflow-x-hidden">
          <ul class="menu-cat-list">
            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 140 175" enable-background="new 0 0 140 140" xml:space="preserve">
                      <g>
                        <path d="M134,124.1488647h-5.1101074V53.5587769c0-0.5500488-0.4499512-1-1-1h-2v-8c0-0.5500488-0.4499512-1-1-1h-15.1499023   c-0.5500488,0-1,0.4499512-1,1v8H31.2600098v-8c0-0.5500488-0.4499512-1-1-1H15.1099854c-0.5499268,0-1,0.4499512-1,1v8h-2   c-0.5499268,0-1,0.4499512-1,1v70.5900879H6c-0.5500488,0-1,0.4499512-1,1v8.8498535c0,0.5500488,0.4499512,1,1,1h128   c0.5500488,0,1-0.4499512,1-1v-8.8498535C135,124.5988159,134.5500488,124.1488647,134,124.1488647z M119.1906738,48.4025269   c0-0.5522461,0.4472656-1,1-1s1,0.4477539,1,1v1.3125c0,0.5522461-0.4472656,1-1,1s-1-0.4477539-1-1V48.4025269z    M113.4406738,48.4025269c0-0.5522461,0.4472656-1,1-1s1,0.4477539,1,1v1.3125c0,0.5522461-0.4472656,1-1,1s-1-0.4477539-1-1   V48.4025269z M24.5600586,48.3988647c0-0.5500488,0.4499512-1,1-1c0.5499268,0,1,0.4499512,1,1v1.3198242   c0,0.5500488-0.4500732,1-1,1c-0.5500488,0-1-0.4499512-1-1V48.3988647z M18.8100586,48.3988647c0-0.5500488,0.4499512-1,1-1   c0.5499268,0,1,0.4499512,1,1v1.3198242c0,0.5500488-0.4500732,1-1,1c-0.5500488,0-1-0.4499512-1-1V48.3988647z    M19.1099854,97.7824097V81.6661987h10.5v16.1162109H19.1099854z M29.6099854,99.7824097v17.1164551c0,0.5499268-0.4500732,1-1,1   h-8.5c-0.5499268,0-1-0.4500732-1-1V99.7824097H29.6099854z M19.1099854,79.6661987V62.5587769c0-0.5500488,0.4500732-1,1-1h8.5   c0.5499268,0,1,0.4499512,1,1v17.1074219H19.1099854z M110.3859863,97.7824097V81.6661987h10.5v16.1162109H110.3859863z    M120.8859863,99.7824097v17.1164551c0,0.5499268-0.4501953,1-1,1h-8.5c-0.5500488,0-1-0.4500732-1-1V99.7824097H120.8859863z    M110.3859863,79.6661987V62.5587769c0-0.5500488,0.4499512-1,1-1h8.5c0.5498047,0,1,0.4499512,1,1v17.1074219H110.3859863z    M92.1307373,62.5587769c0-0.5500488,0.4500732-1,1-1h8.5c0.5499268,0,1,0.4499512,1,1v17.1074219h-10.5V62.5587769z    M92.1307373,81.6661987h10.5v16.1162109h-10.5V81.6661987z M92.1307373,99.7824097h10.5v17.1164551c0,0.5499268-0.4500732,1-1,1   h-8.5c-0.5499268,0-1-0.4500732-1-1V99.7824097z M73.8754883,62.5587769c0-0.5500488,0.4501953-1,1-1h8.5   c0.5500488,0,1,0.4499512,1,1v17.1074219h-10.5V62.5587769z M73.8754883,81.6661987h10.5v16.1162109h-10.5V81.6661987z    M73.8754883,99.7824097h10.5v17.1164551c0,0.5499268-0.4499512,1-1,1h-8.5c-0.5498047,0-1-0.4500732-1-1V99.7824097z    M55.6203613,62.5587769c0-0.5500488,0.4500732-1,1-1h8.5c0.5499268,0,1,0.4499512,1,1v17.1074219h-10.5V62.5587769z    M55.6203613,81.6661987h10.5v16.1162109h-10.5V81.6661987z M55.6203613,99.7824097h10.5v17.1164551c0,0.5499268-0.4500732,1-1,1   h-8.5c-0.5499268,0-1-0.4500732-1-1V99.7824097z M37.3652344,62.5587769c0-0.5500488,0.4499512-1,1-1h8.5   c0.5498047,0,1,0.4499512,1,1v17.1074219h-10.5V62.5587769z M37.3652344,81.6661987h10.5v16.1162109h-10.5V81.6661987z    M37.3652344,99.7824097h10.5v17.1164551c0,0.5499268-0.4501953,1-1,1h-8.5c-0.5500488,0-1-0.4500732-1-1V99.7824097z" />
                        <path d="M23.4499512,34.9187622c-0.3800049-0.4599609-1.1499023-0.4599609-1.5300293,0l-5.5849609,6.6400146h12.6999512   L23.4499512,34.9187622z" />
                        <path d="M118.0799561,34.9187622c-0.1900635-0.2299805-0.4699707-0.3599854-0.7600098-0.3599854   c-0.2999268,0-0.5799561,0.1300049-0.7698975,0.3599854l-5.5849609,6.6400146h12.6998291L118.0799561,34.9187622z" />
                        <path d="M93.6199951,22.5587769c0-0.3200684-0.1500244-0.6199951-0.4000244-0.8100586L70.5899658,5.1887817   c-0.3499756-0.25-0.8299561-0.25-1.1800537,0L46.7800293,21.7487183c-0.25,0.1900635-0.4100342,0.4899902-0.4100342,0.8100586   v10.7099609h47.25V22.5587769z M70,28.218689c-4.1101074,0-7.4499512-3.3398438-7.4499512-7.4499512   c0-4.0999756,3.3398438-7.4399414,7.4499512-7.4399414c4.0999756,0,7.4399414,3.3399658,7.4399414,7.4399414   C77.4399414,24.8788452,74.0999756,28.218689,70,28.218689z" />
                        <path d="M103.9699707,36.2687378c0-0.5500488-0.4499512-1-1-1H37.0300293c-0.5500488,0-1,0.4499512-1,1v14.2900391h67.9399414   V36.2687378z" />
                      </g>
                    </svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Colleges</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>

                  <li>
                    <a href="#">MCA</a>
                  </li>

                  <li>
                    <a href="#">MBBS</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Chennai</a>
                  </li>

                  <li>
                    <a href="#">Bangalore</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" version="1.1" style="shape-rendering: geometricPrecision; text-rendering: geometricPrecision; image-rendering: optimizeQuality" viewBox="0 0 846.66 1058.325" x="0px" y="0px" fill-rule="evenodd" clip-rule="evenodd">
                      <g><path class="fil0" d="M179.21 32.01l488.24 0c39.78,0 72.33,32.54 72.33,72.33l0 637.99c0,39.78 -32.55,72.33 -72.33,72.33l-488.24 0c-39.79,0 -72.33,-32.55 -72.33,-72.33l0 -637.99c0,-39.79 32.54,-72.33 72.33,-72.33zm17.91 152.06l35.55 34.94 78.36 -85.89 34.38 31.3 -110.87 121.54 -69.98 -68.78 32.56 -33.11zm164.75 35.21l320.23 0 0 45.49 -320.23 0 0 -45.49zm-164.75 178.58l35.55 34.94 78.36 -85.89 34.38 31.3 -110.87 121.54 -69.98 -68.78 32.56 -33.11zm164.75 35.21l320.23 0 0 45.49 -320.23 0 0 -45.49zm-164.75 178.58l35.55 34.94 78.36 -85.89 34.38 31.3 -110.87 121.54 -69.98 -68.78 32.56 -33.11zm164.75 35.21l320.23 0 0 45.49 -320.23 0 0 -45.49z" /></g>
                    </svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Exams</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" enable-background="new 0 0 100 100" xml:space="preserve"><path d="M94.334,37.177c0.723-0.526,0.881-1.535,0.355-2.254c-0.489-0.678-1.398-0.835-2.105-0.426  c-0.586-1.201-0.907-2.512-0.907-3.871c0-1.623,0.457-3.175,1.286-4.559l1.371-0.996c0.477-0.347,0.727-0.924,0.652-1.507  c-0.072-0.583-0.457-1.078-1.002-1.299L55.131,6.724c-1.313-0.526-3.214-0.28-4.352,0.546L7.696,38.602  c-0.132,0.095-0.241,0.212-0.337,0.338l-0.003-0.003C5.814,40.982,5,43.409,5,45.96c0,2.163,0.619,4.225,1.738,6.054  C5.619,53.842,5,55.902,5,58.064c0,2.164,0.619,4.226,1.738,6.054C5.619,65.947,5,68.009,5,70.171c0,2.548,0.814,4.979,2.356,7.024  l0.271,0.359l39.272,15.709c0.489,0.194,1.042,0.289,1.604,0.289c0.987,0,2.001-0.289,2.748-0.832l21.541-15.664l21.541-15.668  c0.722-0.527,0.881-1.535,0.356-2.255c-0.49-0.678-1.399-0.836-2.106-0.426c-0.586-1.201-0.907-2.513-0.907-3.871  c0-1.624,0.457-3.175,1.286-4.559l1.371-0.996c0.722-0.527,0.881-1.536,0.356-2.255c-0.49-0.678-1.399-0.835-2.106-0.425  c-0.586-1.201-0.907-2.513-0.907-3.872c0-1.623,0.457-3.174,1.286-4.559L94.334,37.177z M52.227,17.31l24.211,9.685l-8.877,6.457  l-24.211-9.685L52.227,17.31z M70.896,74.445L49.354,90.111c-0.273,0.197-0.94,0.279-1.256,0.154L9.683,74.9  c-0.953-1.406-1.455-3.033-1.455-4.729c0-1.438,0.369-2.813,1.057-4.06L46.9,81.158c0.489,0.195,1.042,0.29,1.604,0.29  c0.987,0,2.001-0.29,2.748-0.833l21.541-15.664l16.852-12.258c-0.137,0.699-0.229,1.412-0.229,2.145  c0,1.834,0.441,3.604,1.286,5.201L70.896,74.445z M70.896,62.341L49.354,78.006c-0.273,0.198-0.94,0.28-1.256,0.154L9.683,62.795  c-0.953-1.406-1.455-3.033-1.455-4.729c0-1.438,0.369-2.814,1.057-4.062L46.9,69.052c0.489,0.196,1.042,0.29,1.604,0.29  c0.987,0,2.001-0.29,2.748-0.832l21.541-15.665l16.852-12.257c-0.137,0.7-0.229,1.412-0.229,2.144c0,1.835,0.441,3.604,1.286,5.202  L70.896,62.341z M70.896,50.234L49.354,65.898c-0.273,0.199-0.94,0.281-1.256,0.154L9.683,50.688  c-0.953-1.404-1.455-3.031-1.455-4.729c0-1.438,0.369-2.815,1.057-4.061L46.9,56.945c0.472,0.188,1.024,0.289,1.599,0.289  c1.023,0,2.024-0.303,2.754-0.832l38.394-27.921c-0.138,0.7-0.229,1.412-0.229,2.144c0,1.835,0.44,3.604,1.286,5.202L70.896,50.234z  " /></svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Courses</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>

                  <li>
                    <a href="#">MCA</a>
                  </li>

                  <li>
                    <a href="#">MBBS</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Chennai</a>
                  </li>

                  <li>
                    <a href="#">Bangalore</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 64 80" style="enable-background: new 0 0 64 64" xml:space="preserve"><path d="M54,16h-4v-4.7c0-4-3.3-7.3-7.3-7.3H21.3c-4,0-7.3,3.3-7.3,7.3V16h-4c-3.3,0-6,2.7-6,6v32c0,3.3,2.7,6,6,6h44  c3.3,0,6-2.7,6-6V22C60,18.7,57.3,16,54,16z M30.3,46.1l-7.4-7.4l2.8-2.8l4.6,4.6l10.1-10.1l2.8,2.8L30.3,46.1z M46,16H18v-4.7  C18,9.5,19.5,8,21.3,8h21.4c1.8,0,3.3,1.5,3.3,3.3V16z" /></svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Careers</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>

                  <li>
                    <a href="#">MCA</a>
                  </li>

                  <li>
                    <a href="#">MBBS</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Chennai</a>
                  </li>

                  <li>
                    <a href="#">Bangalore</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns:x="http://ns.adobe.com/Extensibility/1.0/" xmlns:i="http://ns.adobe.com/AdobeIllustrator/10.0/" xmlns:graph="http://ns.adobe.com/Graphs/1.0/" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background: new 0 0 100 100" xml:space="preserve">
                      <switch>
                        <foreignObject requiredExtensions="http://ns.adobe.com/AdobeIllustrator/10.0/" x="0" y="0" width="1" height="1" />
                        <g i:extraneous="self">
                          <g>
                            <path d="M75.8,71.5l-1-0.3c-6,4.9-13.7,7.8-21.9,7.8c-16,0-29.5-10.9-33.4-25.7c-0.8,0.1-1.6,0.2-2.5,0.2c-0.5,0-0.9,0-1.4-0.1     c4,16.8,19.2,29.4,37.3,29.4c9.5,0,18.3-3.5,25.1-9.4C77.1,73,76.4,72.3,75.8,71.5z" />
                            <path d="M35.7,28.5c0.2,0.1,0.4,0.2,0.6,0.4c0.1,0.2,0.2,1.3,0.1,2.5v0.1l0,0.1c0,0,1,2.4,0.1,4.3c-1,2.1-0.8,5.4-0.3,6.1     c0.4,0.7,2.7,3.6,3,3.9c0.3,0.2,1,2.4,1.1,2.7c0.1,0.3,1.5,2.1,3.1,2c0.9,0,1.9,0.5,2.6,0.8c0.4,0.2,0.6,0.3,0.8,0.3     c0.1,0,0.2,0.2,0.3,0.3c0.2,0.4,0.5,0.9,1.4,1.4c0.2,0.1,0.4,0.3,0.7,0.4c0.8,0.4,1.9,1.1,2,1.3c0,0.1-0.2,0.3-0.3,0.4     c-0.5,0.6-1.3,1.5-1.1,2.8c0.3,1.8,2.8,3.9,3.6,4.4c0.5,0.3,0.3,4,0,4.6c-0.1,0.2-0.1,0.5-0.1,0.9c-0.1,0-0.2,0-0.3,0     c-9.7,0-18.1-5.9-21.7-14.3c-0.2,0-0.4,0-0.5,0h-1.9c-0.6,0-1.2-0.1-1.7-0.3C30.8,64.1,41,71.8,53,71.8c6.6,0,12.6-2.3,17.3-6.2     c0.1-0.3,0.2-0.6,0.3-0.9l0.4-0.9c0.6-1.4,1.8-2.5,3.3-3L71.7,61h-0.2c-0.5,0-1-0.1-1.5-0.3c-3.2,3.4-7.4,5.8-12.1,6.8     c0.2-0.3,0.4-0.5,0.4-0.6c0.1-0.1,0.3-0.2,0.4-0.3c0.4-0.2,0.8-0.4,1-0.7c0.3-0.4,1.1-1.3,1.4-1.4c0.4-0.2,3.2-2.8,3.4-3.2     c0.4-1,1-2.2,1.4-2.5c0.6-0.5,0.1-1.4-0.2-1.8l-0.1-0.1c-0.2-0.4-1.8-0.6-2.1-0.5c-0.3,0-1.6-0.7-1.7-1c0-0.5-1.3-1.7-1.7-1.7     c-0.2,0-1-0.2-1.4-0.7c-0.5-0.7-2.4-1.1-2.9-1.1c-0.5,0-1.3-0.1-1.8-0.3c-0.5-0.2-1.3,0.1-2.1,0.4c-0.2,0.1-0.3,0.1-0.4,0.2     c-0.3,0.1-1.8-0.3-2.2-0.4c-0.1-0.1-0.2-0.7-0.2-1c0-0.4-0.1-0.6-0.1-0.8c-0.1-0.2-0.5-0.3-1.2-0.5c-0.2,0-0.4-0.1-0.5-0.1     c0-0.1,0.1-0.3,0.2-0.4c0.2-0.6,0.4-1,0.3-1.2c-0.1-0.1-0.1-0.2-0.2-0.2c-0.4-0.1-0.8,0.3-1.4,0.7c-0.2,0.2-0.6,0.4-0.7,0.4     c-0.3,0-0.9-0.2-1.6-0.7c-0.4-0.3,0.1-1.6,0.3-2.3c0.1-0.3,0.2-0.6,0.2-0.7c0-0.2,0.8-0.4,1.9-0.4c0.3,0,0.7-0.1,1.1-0.1     c0.4-0.1,0.8-0.1,1-0.1c0.2,0,0.5,0.4,0.6,0.7c0.3,0.4,0.5,0.8,0.9,0.7c0.4-0.1,0.4-0.7,0.4-1.1c0-0.1,0-0.3,0-0.3     c0-0.3,0.6-1.2,1.1-1.5c0.6-0.3,1.3-1.4,1.1-2c0-0.2,1-0.9,1.3-1.1c0.1-0.1,0.3-0.2,0.4-0.3c0.1-0.1,0.2-0.1,0.3-0.2     c0.3-0.2,0.8-0.4,0.8-1c0-0.4,1.1-0.5,1.7-0.6c0.2,0,0.3,0,0.4-0.1c0.4-0.1,0.7-0.2,0.8-0.4c0.1-0.2,0-0.5-0.1-0.8     c0-0.1-0.1-0.2-0.1-0.3c-0.2-0.5-0.1-0.9,0.4-1.3c0.2-0.2,0.6-0.2,1.1-0.3c0.4-0.1,0.9-0.1,1.4-0.3c0.3-0.1,0.5-0.3,0.5-0.5     c0.1-0.3-0.1-0.5-0.3-0.7c-0.1-0.1-0.1-0.2-0.2-0.3c-0.2-0.5-0.7-0.8-0.9-1c-0.1-0.1-0.3-0.8-0.4-1.2c-0.1-0.3-0.1-0.5-0.2-0.7     c-0.1-0.1-0.2-0.3-0.3-0.3c-0.4-0.1-0.9,0.1-1.3,0.2c0-0.1-0.1-0.2-0.1-0.3c0-0.3-0.1-0.5-0.2-0.6c-0.1-0.1-0.3-0.3-0.5-0.5     c-0.3-0.3-0.8-0.7-1-1c-0.2-0.2-0.3-0.2-0.4-0.2c-0.4,0.1-0.7,0.5-1,1c0,0.1-0.1,0.1-0.1,0.2c-0.5,0.8-0.6,1.3-0.2,1.6     c0,0,0.1,0.1,0,0.4c-0.2,0.4-0.4,0.7-0.6,0.7h-0.1c-0.4,0-0.5,0.6-0.7,1.2C53,32.7,53,33,52.9,33.2c-0.1-0.1-0.2-0.4-0.2-1.5     v-0.1c0-0.1,0-0.2-0.1-0.3c-0.1-0.1-0.3-0.1-0.5-0.1c-0.2,0-0.3,0-0.4-0.1c-0.3-0.4-1.5-0.9-2-1.1c0-0.7,0-1.4,0-1.5     c0.2-0.2,2.1-1.6,2.6-1.7c0.6-0.2,2.2-1.3,2.5-1.5c0.3-0.2,0.3-0.4,0.3-0.5c-0.1-0.5-1-0.9-1.3-1c-0.3-0.7-0.8-0.7-1.3-0.7     c-0.3,0-0.6,0-1-0.1c-1.5-0.2-2.7-0.3-3.7-0.2c-0.7,0.1-1.5-0.1-2.2-0.2c-0.4-0.1-0.7-0.1-0.9-0.2c2.6-1,5.5-1.6,8.4-1.6     c3.2,0,6.3,0.7,9.1,1.8c0.1,0.3,0.2,0.5,0.3,0.8c0.3,0.7,0.8,1.9,0.8,2.7c0,0.9,0.1,1.8,0,2.1c-0.1,0.3,1.8,2.4,2.2,2.4     c0.4,0.1,0.7-0.2,0.9-0.6c0.3-0.4,0.6-0.9,1.4-1.5c0.6-0.5,2.1-0.3,2.5-0.3c0.8,0.8,1.5,1.7,2.1,2.6c-0.1,0.1-0.3,0.2-0.4,0.3     c-0.3,0.3-1.3,1.3-1.2,2c0.1,0.7,0.9,1.6,1.9,2.1c1,0.5,1.1,1.5,1.1,1.6c0,0.2,1.4,1,1.4,1s-0.6,1.1-0.8,1.1     c-0.3,0-0.5,1.1-0.5,1.6c0,0.4,0.6,1.2,1.2,1.7c0.6,0.5,1.5-0.8,1.5-0.8c0.1,0.7,0.1,1.4,0.2,2.2c-0.6,0-1.6,0.4-1.9,0.7     c-0.4,0.3-1.3,3.1-1.6,3.4c0,0-0.1,0.1-0.1,0.2c0.2-0.1,0.3-0.1,0.5-0.1l7-1.3c0.1-0.8,0.1-1.6,0.1-2.4     C80.3,29.4,68,17.2,53,17.2c-11.2,0-20.8,6.8-25,16.4l3.7,1.1C32.6,32.4,34.1,30.3,35.7,28.5z" />
                            <path d="M97.2,62.4l-6.3-9.9l2.4-5.6c0.7-1.6,0.7-3.5,0-5.1c-0.3-0.7-1.1-1-1.8-0.8c-1.6,0.6-3,1.8-3.7,3.5l-2.4,5.6L74,52.2     c-0.7,0.1-1.2,0.6-1.5,1.2l-1.3,2.9c-0.1,0.2,0.1,0.5,0.4,0.5l11.4-0.5l-2.7,7.8l-4.4,0.6c-0.5,0.1-0.9,0.4-1.1,0.8l-0.4,0.9     c-0.1,0.2,0,0.4,0.2,0.5l4.4,1.2c0,0.8,0.4,1.5,1.1,1.8s1.5,0.1,2.1-0.4l3.9,2.4c0.2,0.1,0.4,0,0.5-0.2l0.4-0.9     c0.2-0.5,0.1-1-0.1-1.4l-2.6-3.6l3.9-7.2l7.3,8.7c0.2,0.2,0.5,0.2,0.6-0.1l1.3-2.9C97.6,63.7,97.5,62.9,97.2,62.4z" />
                            <path d="M22.1,48.7l3-0.9c0.8-0.2,1.4-1,1.4-1.8v-4.2l2.7-0.8v4.2h-0.1c-0.2,0-0.4,0.2-0.4,0.4v2c0,0.2,0.2,0.4,0.4,0.4h0.1     l-0.6,1.2c-0.1,0.2,0.1,0.5,0.3,0.5h1.9c0.3,0,0.5-0.3,0.3-0.5l-0.6-1.2h0.1c0.2,0,0.4-0.2,0.4-0.4v-2c0-0.2-0.2-0.4-0.4-0.4     h-0.1v-4.6l0.5-0.1c0.8-0.2,0.8-1.4,0-1.7l-12-3.6c-0.6-0.2-1.2-0.3-1.9-0.3c-0.6,0-1.2,0.1-1.8,0.3l-12,3.6     c-0.8,0.2-0.8,1.4,0,1.7l4.6,1.4v4.1c0,0.8,0.6,1.6,1.4,1.8l3,0.9C15.3,49.6,18.8,49.6,22.1,48.7z" />
                          </g>
                        </g>
                      </switch>
                    </svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Study Abroad</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>

                  <li>
                    <a href="#">MCA</a>
                  </li>

                  <li>
                    <a href="#">MBBS</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Chennai</a>
                  </li>

                  <li>
                    <a href="#">Bangalore</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>

            <li>
              <a href="#" class="d-flex justify-content-between align-items-center">
                <div class="me-3 d-inline-flex align-items-center">
                  <figure class="mb-0 me-3 bg--light rounded-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 125" style="enable-background: new 0 0 100 100" xml:space="preserve"><path d="M77.3,20v60h-3.7c0-1.1-0.9-2-2-2c-2,0-3.7-1.7-3.7-3.7V30.1c0-1.1-0.9-2-2-2H31.6V20H77.3z M71.6,80H27.4  c-2.6,0-4.7-2.1-4.7-4.7V30.1h43.2V63v11.3C65.9,77.4,68.5,80,71.6,80z M46.4,68.4H28.1v2.5h18.4V68.4z M46.4,61.8H28.1v2.5h18.4  V61.8z M46.4,55.1H28.1v2.5h18.4V55.1z M46.4,48.5H28.1V51h18.4V48.5z M60.2,68.4h-7.9v2.5h7.9V68.4z M60.2,61.8h-7.9v2.5h7.9V61.8z   M60.2,55.1h-7.9v2.5h7.9V55.1z M60.2,48.5h-7.9V51h7.9V48.5z M60.2,36.6H28.1v7.8h32.1V36.6z" /></svg>
                  </figure>
                  <p class="text--dark mb-0 fw-medium">Latest Updates</p>
                </div>
                <span><i class="fa-solid fa-chevron-right"></i></span>
              </a>
              <div class="drawer-menu-wrapper bg--body">
                <p class="text--dark"></p>
                <p class="fw-medium mb-2">College By Degrees</p>

                <ul class="mb-3 pt-1">
                  <li>
                    <a href="#">B. Tech</a>
                  </li>

                  <li>
                    <a href="#">BCA</a>
                  </li>

                  <li>
                    <a href="#">MCA</a>
                  </li>

                  <li>
                    <a href="#">MBBS</a>
                  </li>
                </ul>

                <p class="fw-medium mb-2">College By Location</p>

                <ul class="pt-1">
                  <li>
                    <a href="#">Kolkata</a>
                  </li>

                  <li>
                    <a href="#">Delhi</a>
                  </li>

                  <li>
                    <a href="#">Mumbai</a>
                  </li>

                  <li>
                    <a href="#">Chennai</a>
                  </li>

                  <li>
                    <a href="#">Bangalore</a>
                  </li>

                  <li>
                    <a href="#">Punjab</a>
                  </li>
                </ul>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </header>
    
    
    @yield('content')
    
    
    
    <footer class="site-footer">
      <div class="site-footer__top">
        <div class="container-fluid">
          <div class="text-center">
            <div class="content-box has-h2--white text-white text-uppercase mb-4">
              <h2>Subscribe To Our Newsletter</h2>
              <ul>
                <li>College Notifications</li>
                <li>Exam Notifications</li>
                <li>News Updates</li>
              </ul>
            </div>

            <form action="#" class="newsletter-form pt-3">
              <div class="d-flex flex-wrap flex-column gap-y-4 gap-x-lg-0 flex-lg-row flex-lg-nowrap justify-content-center">
                <div>
                  <input type="email" name="nf_email" id="" placeholder="Your Email*" />
                </div>

                <div>
                  <input type="email" name="nf_email" id="" placeholder="Your Mobile No.*" />
                </div>

                <div>
                  <select name="nf_course" id="">
                    <option value="" selected disabled>Choose Your Course</option>
                    <option value="Course 1">Course 1</option>
                    <option value="Course 2">Course 2</option>
                    <option value="Course 3">Course 3</option>
                    <option value="Course 4">Course 4</option>
                  </select>
                </div>

                <button type="submit" class="btn btn--primary">Submit</button>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="site-footer__middle py-4">
        <div class="container-fluid">
          <div class="grid-row gap-y-8 gap-x-3 gap-x-sm-6">
            <div class="col-span-6 col-span-md-4 col-span-lg-2">
              <p class="text-white text-uppercase">Top Colleges</p>
              <nav class="site-footer__nav">
                <ul>
                  <li>
                    <a href="course/general-nursing-and-midwifery/colleges">GNM Nursing</a>
                  </li>

                  <li>
                    <a href="course/bachelor-of-science-in-nursing/colleges">B.S.C Nursing</a>
                  </li>

                  <li>
                    <a href="course/bachelor-of-pharmacy/colleges">B.Pharm</a>
                  </li>

                  <li>
                    <a href="course/diploma-in-pharmacy/colleges">D.Pharm</a>
                  </li>

                  <li>
                    <a href="course/diploma-in-elementary-education/colleges">D.El.Ed.</a>
                  </li>

                  <li>
                    <a href="course/bachelor-of-education/colleges">B.Ed</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-span-6 col-span-md-4 col-span-lg-2">
              <p class="text-white text-uppercase">TOP UNIVERSITIES</p>
              <nav class="site-footer__nav">
                <ul>
                  <li>
                    <a href="course/nursing/colleges">Nursing</a>
                  </li>

                  <li>
                    <a href="course/pharmacy/colleges">Pharmacy</a>
                  </li>

                  <li>
                    <a href="course/education/colleges">Education</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-span-6 col-span-md-4 col-span-lg-2">
              <p class="text-white text-uppercase">Top Exam</p>
              <nav class="site-footer__nav">
                <ul>
                  <li>
                    <a href="#">cat</a>
                  </li>

                  <li>
                    <a href="#">Gate</a>
                  </li>

                  <li>
                    <a href="#">JEE Main</a>
                  </li>

                  <li>
                    <a href="#">Neet</a>
                  </li>

                  <li>
                    <a href="#">Xat</a>
                  </li>

                  <li>
                    <a href="#">Clat</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-span-6 col-span-md-4 col-span-lg-2">
              <p class="text-white text-uppercase">Quick Links</p>
              <nav class="site-footer__nav">
                <ul>
                  <li>
                    <a href="#">About Us</a>
                  </li>

                  <li>
                    <a href="#">Contact Us</a>
                  </li>

                  <li>
                    <a href="#">FAQs</a>
                  </li>

                  <li>
                    <a href="#">Privacy Policy</a>
                  </li>

                  <li>
                    <a href="#">Return Policy</a>
                  </li>

                  <li>
                    <a href="#">Terms & Condition</a>
                  </li>
                </ul>
              </nav>
            </div>
            <div class="col-span-6 col-span-md-8 col-span-lg-4">
              <p class="text-white">Contact Info</p>

              <ul class="site-footer__contacts">
                <li>
                  <p class="text--sm text--white-muted mb-1">Send Email</p>
                  <p class="mb-0"><a href="mailto:collegechoiceworld@gmail.com">collegechoiceworld@gmail.com</a></p>
                </li>

                <li>
                  <p class="text--sm text--white-muted mb-1">Call Us</p>
                  <p class="mb-0"><a href="tel:+917450055055">745-005-5055</a></p>
                </li>

                <li>
                  <p class="text--sm text--white-muted mb-1">Locate Us</p>
                  <p class="mb-0 text-white">India, West Bengal, Kolkata</p>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="site-footer__bottom">
        <div class="container-fluid">
          <div class="wrapper py-4">
            <div class="row align-items-center">
              <div class="col-12 col-lg-6 text-center text-lg-start mb-3 mb-lg-0">
                <p class="mb-0 text--sm text-white">© 2023 Collegechoice Web Pvt. Ltd. All Rights Reserved</p>
              </div>
              <div class="col-12 col-lg-6 text-center text-lg-end">
                <ul class="social-icons d-inline-flex w-auto">
                  <li>
                    <a href="#" target="_blank"><i class="fa-brands fa-facebook"></i></a>
                  </li>
                  <li>
                    <a href="#" target="_blank"><i class="fa-brands fa-twitter"></i></a>
                  </li>
                  <li>
                    <a href="#" target="_blank"><i class="fa-brands fa-pinterest-p"></i></a>
                  </li>
                  <li>
                    <a href="#" target="_blank"><i class="fa-brands fa-instagram"></i></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <button class="btn--scroll-to-top">
        <i class="fa-solid fa-arrow-up"></i>
      </button>

      <div id="width-indicator"></div>
    </footer>

    <script src="{{ asset('assets/vendors/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/bootstrap-5.3.0-dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/owl-carousel-2.3.4/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/vendors/Magnific-Popup-master/dist/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    <script>
        $("input[name='search']").on("keyup", function(event) {
            let key = $("input[name='search']").val()
            
            fetch(`/search/${key}`)
            .then(response => response.json())
            .then(data => {
                console.log(data)
                
                $(".search-result-list").empty()
                
                data.colleges.forEach((item, index) => {
                    let name = item.name.toLowerCase().replace(/[^a-zA-Z0-9-]+/g, '-').replace(/^-+|-+$/g, '')
                    console.log(name)
                    // name = name.toLowerCase().replace(/[^a-zA-Z0-9-]+/g, '-').replace(/^-+|-+$/g, '')
                    
                    $(".search-result-list").append(`
                        <li class="list-item d-flex justify-content-between align-items-center">
                          <div class="list-item__left d-inline-flex align-items-center pe-3">
                            <figure class="mb-0">
                              <img src="/storage/${item.logo}" alt="" width="50" height="50" />
                            </figure>
                            <a href="https://collegechoice.world/college/${name}/${item.id}" class="link--dark fw-medium">${item.name}</a>
                          </div>
            
                          <div class="list-item__right d-flex align-items-center flex-shrink-0">
                            <figure class="mb-0 me-2">
                              <img src="{{ asset('assets/images/India_1495.webp') }}" alt="" width="20" height="20" class="rounded-circle ratio-1x1 h-100 object-fit-cover" />
                            </figure>
                            <span class="fw-medium">College</span>
                          </div>
                        </li>
                    `)
                })
                
                
                // data.courses.forEach((item, index) => {
                //     $(".search-result-list").append(`
                //         <li class="list-item d-flex justify-content-between align-items-center">
                //           <div class="list-item__left d-inline-flex align-items-center pe-3">
                //             <figure class="mb-0">
                //               <img src="{{ asset('assets/images/degree.png') }}" alt="" width="50" height="50" />
                //             </figure>
                //             <a href="/course/${item.slug}" class="link--dark fw-medium">${item.short_name}</a>
                //           </div>
            
                //           <div class="list-item__right d-flex align-items-center flex-shrink-0">
                //             <figure class="mb-0 me-2">
                //               <img src="{{ asset('assets/images/India_1495.webp') }}" alt="" width="20" height="20" class="rounded-circle ratio-1x1 h-100 object-fit-cover" />
                //             </figure>
                //             <span class="fw-medium">Course</span>
                //           </div>
                //         </li>
                //     `)
                // })
            })
        })
    </script>
    
    <script>
        // $(document).ready(function() {
        //     for(let i = 0; i < 10 ; i++) {
        //         setTimeout(function() {
        //             $(".owl-next")[0].click()
        //             setTimeout(function() {
        //                 $(".owl-next")[0].click()
        //                 setTimeout(function() {
        //                     $(".owl-next")[0].click()
        //                 }, 12000)
        //             }, 21000)
        //         }, 8000)
        //     }
        // })
        
        
        // $(document).ready(function() {
        //     var owl = $('.hero-carousel');
        //     console.log(owl)
             
        //     owl.on('translated.owl.carousel', function(event){
        //       var currentSlide = event.item.index;
        
        //       // Read the data-timeout attribute for the current slide
        //       var currentTimeout = owl.find('.item').eq(currentSlide).find('[data-timeout]').data('timeout');
        //       console.log(currentTimeout)
        
        //       // Stop the autoplay and start it with the new timeout
        //       owl.trigger('stop.owl.autoplay');
        //       owl.trigger('play.owl.autoplay', [currentTimeout]);
        //     });
        // })
    </script>
  </body>
</html>

