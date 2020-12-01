@extends('layouts.frontend')
@section('title','Kontak')

@section('css')
<style>
    .bungkus-iframe {
        position: relative;
        overflow: hidden;
        width: 100%;
        padding-top: 56.25%; /* 16:9 Aspect Ratio (divide 9 by 16 = 0.5625) */
    }

    /* Then style the iframe to fit in the container div with full height and width */
    .responsive-iframe {
        position: absolute;
        top: 0;
        left: 0;
        bottom: 0;
        right: 0;
        width: 100%;
        height: 100%;
    }

</style>

@endsection
@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{ asset('asset/temp_frontend/images/banner/banner2.jpg') }})">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Kontak</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li><a href="#">Kontak</a></li>
                     </ol>
                  </div>
               </div><!-- Col end -->
            </div><!-- Row end -->
         </div><!-- Container end -->
      </div><!-- Banner text end -->
</div><!-- Banner area end --> 


<section id="main-container" class="main-container">
    <div class="container">

       <div class="row text-center">

          <h3 class="section-sub-title">Kontak Kami</h3>
       </div><!--/ Title row end -->

       <div class="row">
      

          <div class="col-md-4">
             <div class="ts-service-box-bg text-center">
                <span class="ts-service-icon icon-round">
                   <i class="fa fa-envelope"></i>
                </span>
                <div class="ts-service-box-content">
                   <h4>Email </h4>
                   <p>{{ $email->value }}</p>
               </div>
             </div>
          </div><!-- Col 2 end -->

          <div class="col-md-4">
             <div class="ts-service-box-bg text-center">
                <span class="ts-service-icon icon-round">
                   <i class="fa fa-map-marker"></i>
                </span>
                <div class="ts-service-box-content">
                   <h4>Alamat</h4>
                   <p>{{ $alamat->value }}</p>
               </div>
             </div>
          </div><!-- Col 1 end -->

          <div class="col-md-4">
             <div class="ts-service-box-bg text-center">
                <span class="ts-service-icon icon-round">
                   <i class="fa fa-phone-square"></i>
                </span>
                <div class="ts-service-box-content">
                   <h4>No Handphone</h4>
                   <p>{{ $no_hp->value }}</p>
               </div>
             </div>
          </div><!-- Col 3 end -->

       </div>

       <div class="row" style="margin-top:100px;">
        	<div class="col-md-12">
                <div class="bungkus-iframe">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3960.620683999018!2d107.58071841431733!3d-6.935856869820183!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e68e8aee1af1f5b%3A0xf5915a3ea5c48de7!2sKenzie%20Komunika!5e0!3m2!1sid!2sid!4v1606572054320!5m2!1sid!2sid" class="responsive-iframe"></iframe>
                </div>
                
        	</div>
       </div>
     
    </div><!-- Conatiner end -->
 </section><!-- Main container end -->
  

@endsection