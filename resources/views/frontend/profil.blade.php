@extends('layouts.frontend')
@section('content')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url({{ asset($background->value) }});" data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span> 
              <span>
                @if($data['page']->parent == 3)
                    Tentang
                @elseif($data['page']->parent == 5)
                    Organisasi
                @elseif($data['page']->parent == 7)
                    Akademik
                @elseif($data['page']->parent == 8)
                    Fasilitas

                @endif
                {{ $data['content']->category_content_id == '1' ? 'Berita' : 'Artikel'  }}
               <i class="ion-ios-arrow-forward"></i></span></p>
            <h1 class="mb-3 bread">{{  $data['content']->title }}</h1>
          </div>
        </div>
      </div>
</section>

<section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 order-md-last ftco-animate">
              
            {!! $data['content']->content !!}
            
            @if($data['page_media'])
            <ul>  
              <li>
                <a href="{{ asset($data['page_media']->file) }}" download>{{ $data['page_media']->title }}</a>
              </li>
            </ul>
            @endif
            
          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
           
          <div class="sidebar-box ftco-animate">
              <h3>Pengumuman Terbaru</h3>
              @foreach($data['content_news'] as $content_news)
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="background-image: url({{ asset($content_news->cover) }});"></a>
                <div class="text">
                  <h3 class="heading"><a href="{{ route('informasi.preview',['slug' => $content_news->slug ]) }}">{{ $content_news->title }}</a></h3>
                  <div class="meta">
                    <div><a href="{{ route('informasi.preview',['slug' => $content_news->slug ]) }}"><span class="icon-calendar"></span> {{ Carbon\Carbon::parse($content_news->created_at)->translatedFormat('d F Y') }}</a></div>
                    <div><a href="{{ route('informasi.preview',['slug' => $content_news->slug ]) }}"><span class="icon-person"></span> {{ $content_news->User->name }}</a></div>
                    
                  </div>
                </div>
              </div>
              @endforeach
            </div>


           
          </div>

        </div>
      </div>
    </section> <!-- .section -->

@endsection
@section('js')

<script>
$('#bologna-list a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
@endsection