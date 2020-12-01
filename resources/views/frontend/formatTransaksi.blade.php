@extends('layouts.frontend')

@section('title','Format Transaksi')
@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{ asset('asset/temp_frontend/images/banner/banner2.jpg') }})">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Format Transaksi</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li>Transaksi</li>
                        <li><a href="#">Format Transaksi</a></li>
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
            <div class="col-md-12">
                {!! $data['format_transaksi']->content !!}
            </div>


         </div><!-- Main row end -->
            
         @foreach($data['list_format'] as $format)
         @foreach($format->pageLang as $page)
         
         <div class="row text-center">
            <h3 class="section-sub-title">{{ $page->title }}</h3>

            <div class="col-md-12">

                {!! $page->content !!}

            </div>
         </div><!--/ Title row end -->
        @endforeach
        @endforeach

      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	


@endsection
