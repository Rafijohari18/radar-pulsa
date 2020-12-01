@extends('layouts.frontend')
@section('title','Produk')

@section('content')

<div id="banner-area" class="banner-area" style="background-image:url({{ asset('asset/temp_frontend/images/banner/banner2.jpg') }})">
      <div class="banner-text">
         <div class="container">
            <div class="row">
               <div class="col-xs-12">
                  <div class="banner-heading">
                     <h1 class="banner-title">Produk</h1>
                     <ol class="breadcrumb">
                        <li>Home</li>
                        <li><a href="#">Produk</a></li>
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
            <h3 class="section-sub-title text-center">Produk Kami</h3>
                <div class="col-md-12">
                    <div class="table-responsive">
                        @foreach($data['cat_produk'] as $cat_produk)
                        <table class="table table-bordered">
                            <thead >
                                <tr style="background:#4784A5;color:white;">
                                    <th scope="col" colspan="4" class="text-center">{{ $cat_produk->name }}</th>
                                </tr>
                                <tr style="background:#7aacc7;">
                                    <th scope="col">Kode</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cat_produk->cekProduk($cat_produk['id']) as $produk)
                                <tr>
                                    <th scope="row">{{ $produk->kode }}</th>
                                    <td>{{ $produk->keterangan }}</td>
                                    <td>{{ $produk->status }}</td>
                                    <td>Rp. {{ number_format(($produk->harga), 0, ',', '.') }}</td>
                                </tr>
                                @endforeach

                                
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                    
                </div>


         </div><!-- Main row end -->

      </div><!-- Conatiner end -->
   </section><!-- Main container end -->
	


   @endsection
