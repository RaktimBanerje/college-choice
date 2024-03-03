@extends('layouts.app')

@section('content')
<main class="site-content">
      <section 
        class="pagetitle-block bg--dark bg--center bg--cover bg--no-repeat d-md-block d-none" 
        style="margin-top: 135px; background-image: url('{{ asset('assets/images/college-choice-banner.jpg') }}');">
        <div class="container-fluid position-relative">
          <!--<nav aria-label="breadcrumb">-->
          <!--  <ol class="breadcrumb mb-0">-->
          <!--    <li class="breadcrumb-item">-->
          <!--      <a href="index.html"><i class="fa-solid fa-home"></i></a>-->
          <!--    </li>-->
          <!--    <li class="breadcrumb-item active" aria-current="page">MBA Colleges</li>-->
          <!--  </ol>-->
          <!--</nav>-->
        </div>
      </section>
      
      
        <section 
        class="pagetitle-block bg--dark bg--center bg--cover bg--no-repeat d-block d-md-none" 
        style="background-image: url('{{ asset('assets/images/college-choice-banner.jpg') }}');">
        <div class="container-fluid position-relative">
          <!--<nav aria-label="breadcrumb">-->
          <!--  <ol class="breadcrumb mb-0">-->
          <!--    <li class="breadcrumb-item">-->
          <!--      <a href="index.html"><i class="fa-solid fa-home"></i></a>-->
          <!--    </li>-->
          <!--    <li class="breadcrumb-item active" aria-current="page">MBA Colleges</li>-->
          <!--  </ol>-->
          <!--</nav>-->
        </div>
      </section>
      
      
      <section class="college-cat-single-section bg--light">
        <div class="container-fluid">
          <h2 class="text--dark fw-semibold">Top {{ $course->full_name }} colleges in <?php if(isset($district)) {echo  $district->name; } else {echo "West Bengal";}  ?></h2>
          
          <div>
            <div class="row">
              <div class="col-2 d-none">
                <div class="filter-wrap bg--body p-3 rounded-2 shadow--base"></div>
              </div>
              <div class="col-12">
                <div class="filter-wrap bg--body p-3 rounded-2 shadow--base">
                  <div class="table-responsive-md">
                    <table class="table cat-colleges-table">
                      <thead class="bg--primary text-white">
                        <tr>
                          <th scope="col">SL No</th>
                          <th scope="col">Colleges</th>
                          <!--<th scope="col">Course Fees</th>-->
                          <!--<th scope="col">Placement</th>-->
                          <th scope="col">User Reviews</th>
                          <th scope="col">Ranking</th>
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($colleges as $college)
                        <tr>
                          <td>#{{ $loop->iteration }}</td>
                          <td>
                            <div class="clg-item">
                              <figure>
                                @php
                                    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $college->name), '-'));
                                @endphp
                                <a href="{{ route('college.details', [$slug, $college->id]) }}">
                                  <img src="{{ Storage::url($college->logo) }}" style="height: 43px; width: 43px; max-height: 43px; max-width: 43px;" alt="" />
                                </a>
                              </figure>
                              <div>
                                <div class="clg-item__title">
                                    <a href="{{ route('college.details', [$slug, $college->id]) }}">{{ $college->name }}</a>
                                </div>
                                <p class="text--xs">{{ $college->location }}</p>

                                <ul class="clg-item__cta">
                                  <li>
                                    <a href="{{ route('college.details', [$slug, $college->id]) }}" class="text--sm fw-medium">Apply Now <i class="fa-solid fa-arrow-right ms-1"></i></a>
                                  </li>
                                  <li>
                                    <a href="{{ route('college.details', [$slug, $college->id]) }}" class="text--sm text--green fw-medium">Download Brochure <i class="fa-solid fa-download ms-1"></i></a>
                                  </li>
                                </ul>
                              </div>
                            </div>
                          </td>
                          
                          <td>
                            <p class="review-val">
                              <span class="text--orange text--xs me-1"><i class="fa-solid fa-circle mb-2"></i></span>
                              8.7/10
                            </p>
                            <p class="text--xs mb-2"><a href="#" class="link--dark link-hover--underline">Based on 274 user reviews</a></p>
                          </td>
                          <td>
                            <p class="rank-count"><a href="#">#3<sup>rd</sup>/<span class="text--secondary">131</span> in India<br><span></a></p>
                          </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main>
@stop

