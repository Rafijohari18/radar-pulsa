@extends('layouts.frontend')
@section('title','Cara Pendaftaran')
@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{ asset('asset/temp_frontend/images/banner/banner2.jpg') }})">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Cara Pendaftaran</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li><a href="#">Cara Pendaftaran</a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
   </div><!-- Banner area end --> 

   <section id="main-container" class="main-container">
      <div class="container">
         <div class="row">
            <h3 class="section-sub-title text-center">{{ $data['cara_daftar']->title }}</h3>
            <div class="col-md-12">
                {!! $data['cara_daftar']->content !!}
            </div>


         </div><!-- Main row end -->

      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	


   @endsection
