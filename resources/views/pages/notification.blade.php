@extends('layouts.app')

@section('content')
<main>
  <section class="col-single-section">
    <header 
        class="col-single-section__top position-relative bg--dark bg--center bg--cover bg--no-repeat" 
        style="background-image: url('{{ asset('assets/images/college-choice-banner2.jpg') }}')"
    >
      <div class="container-fluid position-relative">
        <div class="d-flex flex-wrap flex-lg-nowrap align-items-center justify-content-between">
          <div class="d-sm-flex content-col">
            <a href="#" class="bg--body py-1 px-2 me-3 d-inline-block rounded-2 flex-shrink-0 lh-1 col-single__logo mb-3 mb-sm-0">
              <img src="{{ asset('assets/images/degree.png') }}" alt="" />
            </a>
            <div class="ps-1">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-1">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Notification</a></li>
                  <li class="breadcrumb-item active" aria-current="page">{{ $notification->Title ?? '' }}</li>
                </ol>
              </nav>
              <h1 class="text-white fw-semibold mb-2">{{ $notification->Title ?? '' }}</h1>
            </div>
          </div>
        </div>
      </div>
    </header>

    <div class="col-single-section__bottom bg--light">
      <!-- Col Single Main tabs -->
      <ul class="nav nav-tabs bg--body" id="colSingleTab" role="tablist">
        <li class="nav-item" role="presentation">
          <button class="nav-link active" id="info-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="info" aria-selected="true">Description</button>
        </li>
      </ul>

      <div class="container-fluid">
        <div class="row">
          <div class="col-12 col-xl-9 mb-4 mb-xl-0">
            <!-- Tab panes -->
            <div class="tab-content mb-3">
                <div class="tab-pane active" id="description" role="tabpanel" aria-labelledby="info-tab">
                    <div class="info-block bg--body shadow--base rounded-2">
                        <div class="info-block__header p-3">
                            <h5 class="text--dark fw-semibold mb-0">{{ $notification->Title ?? '' }}</h5>
                        </div>
                        <div class="info-block__body p-3">
                            <div class="content-box content-box--prose">
                            {!! $notification->description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          </div>
          <div class="col-12 col-xl-3">
            <aside>
              <a href="#" class="btn btn--secondary btn--apply-now text-center mb-3">
                  <span>Download Syllabus</span><i class="lni lni-download"></i></a>

              <div class="info-block info-block--top-courses bg--body shadow--base rounded-2">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Top Courses</h6>
                </div>
                <div class="info-block__body pt-0 pt-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <div>
                          <p class="text--sm fw-medium mb-0">B. Tech Biotechnology</p>
                          <span class="text--xs">AVG FEE - ₹1,65,000/Yr</span>
                        </div>
                        <span class="text--xs fw-medium">4 Years</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <div>
                          <p class="text--sm fw-medium mb-0">B. Tech Biotechnology</p>
                          <span class="text--xs">AVG FEE - ₹1,65,000/Yr</span>
                        </div>
                        <span class="text--xs fw-medium">4 Years</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <div>
                          <p class="text--sm fw-medium mb-0">B. Tech Biotechnology</p>
                          <span class="text--xs">AVG FEE - ₹1,65,000/Yr</span>
                        </div>
                        <span class="text--xs fw-medium">4 Years</span>
                      </a>
                    </li>
                  </ul>

                  <div>
                    <a href="#" class="btn btn--secondary-outline d-block w-100">View More Courses(126)</a>
                  </div>
                </div>
              </div>

              <div class="info-block info-block--notifications bg--body shadow--base rounded-2 overflow-hidden">
                <div class="info-block__header bg--primary">
                  <h6 class="text-white fw-semibold mb-0">Notifications</h6>
                </div>
                <div class="info-block__body py-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>
                          <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>
                          <span class="text--xs cta-btn">Read More</span>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>
                          <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>
                          <span class="text--xs cta-btn">Read More</span>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/CAT logo.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-1 fw-medium line-clamp">Lorem ipsum dolor sit amet consectetur.</p>
                          <p class="text--xs mb-1 line-clamp line-clamp--2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quisquam est cumque magni assumenda ea rem quis ex nostrum placeat odit!</p>
                          <span class="text--xs cta-btn">Read More</span>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>Aug 02, 2023</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="info-block info-block--notifications bg--body shadow--base rounded-2 overflow-hidden">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Other Colleges In The Same Group</h6>
                </div>
                <div class="info-block__body py-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/14885360896.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">Adamas Institute of Technology - [AIT]</p>
                          <span class="text--xs date"><i class="fa-solid fa-location-dot me-1"></i>Kolkata India</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/14885360896.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">Adamas Institute of Technology - [AIT]</p>
                          <span class="text--xs date"><i class="fa-solid fa-location-dot me-1"></i>Kolkata India</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="info-block info-block--notifications info-block--news bg--body shadow--base rounded-2 overflow-hidden">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">News</h6>
                </div>
                <div class="info-block__body py-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>
                        </div>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex py-3" title="Lorem ipsum dolor sit amet consectetur">
                        <figure class="mb-0 pe-2 flex-shrink-0">
                          <img src="{{ asset('assets/images/17-10 09-Featured new Admission cat123.webp') }}" alt="" width="42" height="42" />
                        </figure>
                        <div>
                          <p class="text--dark text--sm mb-0 fw-medium line-clamp">CAT Exam: Evolution Over the Years</p>
                          <span class="text--xs date"><i class="fa-solid fa-calendar-days me-1"></i>1 Day Ago</span>
                        </div>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="info-block bg--body shadow--base rounded-2 overflow-hidden">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Placements</h6>
                </div>
                <div class="info-block__body">
                  <p class="text--green text--sm fw-medium mb-1">₹43,00,000</p>
                  <p class="mb-3 text--xs">Highest Package</p>
                  <hr />
                  <ul class="grid grid-cols-3 gap-3">
                    <img src="{{ asset('assets/images/1514350929Aditya Birla Group.webp') }}" alt="" />
                    <img src="{{ asset('assets/images/1514357378Cognizant.webp') }}" alt="" />
                    <img src="{{ asset('assets/images/1514365706FLIPKART.webp') }}" alt="" />
                    <img src="{{ asset('assets/images/1514441221Deloitte.webp') }}" alt="" />
                    <img src="{{ asset('assets/images/1514444983HDFC Bank.webp') }}" alt="" />
                  </ul>
                </div>
              </div>

              <div class="info-block info-block--faculties bg--body shadow--base rounded-2">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Faculties</h6>
                </div>
                <div class="info-block__body pt-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-block py-3">
                        <p class="text--sm fw-medium mb-0">Dr Tuhin Bhadra</p>
                        <span class="text--xs">Assistant Professor, School of Basic & Applied Sciences (Geography)</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-block py-3">
                        <p class="text--sm fw-medium mb-0">Dr Anu Rai</p>
                        <span class="text--xs">Assistant Professor, School of Basic and applied Science (Geography)</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-block py-3">
                        <p class="text--sm fw-medium mb-0">Dr. Rajib Sarkar</p>
                        <span class="text--xs">Assistant Professor, School of Basic & Applied Sciences (Geography)</span>
                      </a>
                    </li>
                  </ul>

                  <div>
                    <a href="#" class="btn btn--secondary-outline d-block w-100">View All Faculties(12)</a>
                  </div>
                </div>
              </div>

              <div class="info-block info-block--faculties bg--body shadow--base rounded-2">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Learn more about the courses</h6>
                </div>
                <div class="info-block__body px-3 py-0">
                  <ul>
                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <span class="text--xs fw-medium mb-0">B. Pharma</span>
                        <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <span class="text--xs fw-medium mb-0">D. Pharma</span>
                        <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <span class="text--xs fw-medium mb-0">B.Tech Civil Engineering</span>
                        <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <span class="text--xs fw-medium mb-0">B.Tech Biotechnology</span>
                        <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="link--dark d-flex justify-content-between py-3">
                        <span class="text--xs fw-medium mb-0">B.Sc (Hons.) Microbiology</span>
                        <span class="text--xs"><i class="fa-solid fa-chevron-right"></i></span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>

              <div class="info-block info-block--faculties info-block--reviews info-block--reviews bg--body shadow--base rounded-2">
                <div class="info-block__header">
                  <h6 class="text--dark fw-semibold mb-0">Learn more about the courses</h6>
                </div>
                <div class="info-block__body px-3 py-0">
                  <ul>
                    <li>
                      <a href="#" class="d-block py-3">
                        <span class="mb-1 text--xs d-flex flex-wrap align-items-center"><b>7.3/10</b> Students Satisfactory Rating</span>
                        <span class="text--dark text--sm fw-medium d-block mb-1">Some informations regarding {{ $course->short_name ?? '' }}.</span>
                        <span class="text--para text--xs d-block mb-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur porro, deserunt delectus saepe facere optio labore animi in nostrum molestias sint, sit tempore eligendi earum officia voluptatem sapiente magni repellendus.</span>
                        <span class="text--xs text--dark fw-medium"><strong>PM</strong>By Pritam Mukherjee</span>
                      </a>
                    </li>

                    <li>
                      <a href="#" class="d-block py-3">
                        <span class="mb-1 text--xs d-flex flex-wrap align-items-center"><b>7.3/10</b> Students Satisfactory Rating</span>
                        <span class="text--dark text--sm fw-medium d-block mb-1">Some informations regarding {{ $course->short_name ?? '' }}.</span>
                        <span class="text--para text--xs d-block mb-1">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consequuntur porro, deserunt delectus saepe facere optio labore animi in nostrum molestias sint, sit tempore eligendi earum officia voluptatem sapiente magni repellendus.</span>
                        <span class="text--xs text--dark fw-medium"><strong>PM</strong>By Pritam Mukherjee</span>
                      </a>
                    </li>
                  </ul>

                  <div class="mt-1">
                    <a href="#" class="btn btn--secondary-outline d-block w-100">View All Reviews(12)</a>
                  </div>
                </div>
              </div>
            </aside>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@stop
