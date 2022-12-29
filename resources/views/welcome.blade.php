@extends('layouts1.app')

{{-- title --}}
@section('title', 'صفحه اصلی')

{{-- Page Title --}}
{{-- @section('pageTitle')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">صفحه اصلی</h1>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
{{-- Page Content --}}
@section('content')
    <div class="content-wrapper">
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">صفحه اصلی</h1>
                  </div>
              </div>
          </div>
      </div>
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-lg-4 col-6">
  
                      <div class="small-box bg-info">
                          <div class="inner">
                               <h3>{{ $totalActiveCompany }}</h3>
                              <p> موجوده فعاله کمپنی</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-building"></i>
                          </div>
                      </div>
                  </div>
  
                  <div class="col-lg-4 col-6">
  
                      <div class="small-box bg-danger">
                          <div class="inner">
                              <h3>{{ $totalDeactiveCompany }}</h3>
                              <p>موجوده غیر فعاله کمپنی</p>
                          </div>
                          <div class="icon">
                            <i class="far fa-building"></i>
                          </div>
                      </div>
                  </div>
  
  
                  <div class="col-lg-4 col-6">
  
                      <div class="small-box bg-success">
                          <div class="inner">
                              <h3>{{ $totalOrders }}</h3>
                              <p> مجموعه دی آردرونو</p>
                          </div>
                          <div class="icon">
                            <i class="fas fa-layer-group"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="row d-flex justify-content-center">
                  <div class="col-lg-4 col-6">
  
                      <div class="small-box bg-warning">
                          <div class="inner">
                            <h3>{{ $totalNonOrders }}</h3>
                            <p> د پروګرام په حال آردرونه</p>
                          </div>
                          <div class="icon">
                            <i class="fab fa-first-order"></i>
                          </div>
                      </div>
                  </div>
  
                  <div class="col-lg-4 col-6">
  
                      <div class="small-box bg-success">
                          <div class="inner">
                              {{-- <h3>{{ $totalFinishingParts }}</h3> --}}
                              <h3>{{ $totalUnProgrameOrder }}</h3>
                              <p>پروګرام شوی آردرونه</p>
                          </div>
                          <div class="icon">
                            <i class="fab fa-jedi-order"></i>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </section>
      

    </div>
@endsection
