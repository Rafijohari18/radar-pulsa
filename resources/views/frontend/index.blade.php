@extends('layouts.frontend')
@section('title','Home - Radar')
@section('content')

		<div id="box-slide" class="owl-carousel owl-theme page-slider">
		@foreach($slider as $key => $slider)

				<div class="item" style="background-image:url({{ asset($slider->image) }})">
					<div class="container">
						<div class="box-slider-content">
							<div class="box-slider-text">
								<h3 class="box-slide-sub-title">{{ $slider->title }}</h3>
								<p class="box-slide-description">{!! $slider->content !!}</p>
								<p>
									
								</p>
							</div>
						</div>
					</div>

		</div><!-- Item 1 end -->
		@endforeach  
      

		</div><!-- Box owl carousel end-->

		<section class="call-to-action no-padding">
			<div class="container">
				<div class="action-style-box">
					<div class="row">
						<div class="col-md-10">
							<div class="call-to-action-text">
                <h1 class="text-white" style="color:white;">{{ $sub_header->title }}</h1>
								<h3 class="action-title">
                  {!! $sub_header->content !!}
                </h3>
							</div>
						</div><!-- Col end -->
					
					</div><!-- row end -->
				</div><!-- Action style box -->
			</div><!-- Container end -->
		</section><!-- Action end -->

		<section id="ts-features" class="ts-features">
			<div class="container">
				<div class="row">
          
          @foreach($profil as $value_profil)
          
          <div class="col-md-4">
						<div class="ts-service-box">
							<div class="ts-service-image-wrapper">
								
							</div>
							<div class="ts-service-box-img pull-left">
								<img src="{{ asset('asset/temp_frontend/images/icon-image/service-icon1.png')}}" alt="" />
							</div>
							<div class="ts-service-info">
								<h3 class="service-box-title"><a href="">{{ $value_profil->title }}</a></h3>
                {!! $value_profil->content !!}
								
							</div>
						</div><!-- Service1 end -->
					</div><!-- Col 1 end -->
          @endforeach
			
				</div><!-- Content row end -->
			</div><!-- Container end -->
		</section><!-- Feature are end -->

		<section id="facts" class="facts-area dark-bg">
			<div class="container">
				<div class="row">
					<div class="facts-wrapper">
						@foreach($jumlah_layanan as $jml)

						<div class="col-sm-4 ts-facts">
							<div class="ts-facts-img">
								<img src="{{ asset($jml->cover) }}" alt="{{ $jml->title }}" />
							</div>
							<div class="ts-facts-content">
								<h2 class="ts-facts-num"><span class="counterUp">{{ strip_tags($jml->content) }}</span></h2>
								<h3 class="ts-facts-title">{{ $jml->title }}</h3>
							</div>
						</div><!-- Col end -->

						@endforeach


					</div> <!-- Facts end -->
				</div>
				<!--/ Content row end -->
			</div>
			<!--/ Container end -->
		</section><!-- Facts end -->



		<section class="content">
			<div class="container">
				<div class="row">
					<div class="col-md-12">

						<h3 class="column-title">{{ $title_mitra->title }}</h3>

						<div class="row all-clients">
							@foreach($media_mitra as $media)
							<div class="col-sm-3">
								<figure class="clients-logo">
									<a href="#"><img class="img-responsive" src="{{ asset($media->file ) }}" alt="{{ $media->title }}" /></a>
								</figure>
							</div><!-- Client 1 end -->
							@endforeach

							

						</div><!-- Clients row end -->

					</div><!-- Col end -->

				</div>
				<!--/ Content row end -->
			</div>
			<!--/ Container end -->
		</section><!-- Content end -->

		<section id="news" class="news">
			<div class="container">
				<div class="row text-center">
					
					<h3 class="section-sub-title">{{ $title_memilih_kami->name }}</h3>
				</div>
				<!--/ Title row end -->

				<div class="row">
					@foreach($content_memilih_kami as $content)
					<div class="col-md-4 col-xs-12">
						<div class="latest-post">
							<div class="latest-post-media">
								<a href="" class="latest-post-img">
									<img class="img-responsive" src="{{ asset($content->cover )}}" alt="{{ $content->title }}">
								</a>
							</div>
							<div class="post-body">
								<h4 class="post-title">
									<a href="">{{ $content->title }}</a>
								</h4>
								<div class="latest-post-meta">
									<span class="post-item-date">
										{!! $content->content !!}
									</span>
								</div>
							</div>
						</div><!-- Latest post end -->
					</div><!-- 1st post col end -->
					@endforeach
				</div>
				<!--/ Content row end -->


			</div>
			<!--/ Container end -->
		</section>
		<!--/ News end -->


    @endsection

	