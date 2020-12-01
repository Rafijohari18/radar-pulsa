@extends('layouts.frontend')
@section('content')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight"  style="background-image: url({{ asset($background->value) }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> <span>{{  $data['category']->name }} <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">{{  $data['category']->name }}</h1>
          </div>
        </div>
      </div>
</section>

<section class="ftco-section goto-here">
    <div class="container">
    	<div class="row justify-content-center">
          <div class="col-md-12 heading-section text-center ftco-animate mb-5">
          	<span class="subheading">Informasi</span>
            <h2 class="mb-2">Indeks {{  $data['category']->name }} </h2>
          </div>
        </div>
        <div class="row">
        @foreach( $data['content'] as $item)
			<a href="{{ route('informasi.preview',['slug' => $item->slug ]) }}">
				<div class="col-md-4">
					<div class="property-wrap ftco-animate">
						<a href="{{ route('informasi.preview',['slug' => $item->slug ]) }}" class="img" style="background-image: url({{ asset($item->cover) }});"></a>
						<div class="text">
							
							<ul class="property_list">
								<li><span class="fa fa-calendar"> {{ Carbon\Carbon::parse($item->created_at)->translatedFormat('d F Y') }}</span></li>
								<li><span class="fa fa-user"></span>{{ $item->User->name }}</li>
							</ul>
							<h3><a href="{{ route('informasi.preview',['slug' => $item->slug ]) }}">{!! Str::limit($item->title, 30, '...') !!}</a></h3>
							
							<a href="{{ route('informasi.preview',['slug' => $item->slug ]) }}" class="d-flex align-items-center justify-content-center btn-custom">
								<span class="ion-ios-link"></span>
							</a>
						</div>
					</div>
				</div>
			</a>

		@endforeach	

			


        </div>
    </div>
</section>

@endsection