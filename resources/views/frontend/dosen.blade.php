@extends('layouts.frontend')
@section('css')
<style>
  .thumbnail-img{
    height: 100%;
    left: 0;
    overflow: hidden;
    position: absolute;
    top: 0;
    width: 100%;
  }
  .stie-img {
    position: relative;
    width: 100%;
    height: 800px;
    max-width: 100%;
    overflow: hidden;
    margin-bottom: 1.5em;
  }
</style>

@endsection
@section('content')

<section class="hero-wrap hero-wrap-2 ftco-degree-bg js-fullheight" style="background-image: url({{ asset($background->value) }});"    data-stellar-background-ratio="0.5">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text js-fullheight align-items-center justify-content-center">
          <div class="col-md-9 ftco-animate pb-5 text-center">
          	<p class="breadcrumbs"><span class="mr-2"><a href="{{ url('/') }}">Home <i class="ion-ios-arrow-forward"></i></a></span></p>
            <h1 class="mb-3 bread">Data Dosen</h1>
          </div>
        </div>
      </div>
</section>

<section class="ftco-section ftco-agent">
    	<div class="container">
        <div class="row">
        @foreach($data['dosen'] as $key => $dosen)
        
          <div class="col-md-3">
          
        		<div class="agent">
    					<div class="img">
                
		    				<img src="{{ asset($dosen->foto) }}" class="img-fluid" alt="Colorlib Template">
	    				</div>
	    				<div class="desc">
	    					<h3>{{ $dosen->nama }}</h3>
								<p class="h-info">
                  <span class="location">{{ $dosen->no_kartu }}</span>
                   <span class="details">&mdash; {{ $dosen->tipe_pegawai }}</span>
                   <a data-toggle="modal" data-target="#exampleModal--{{ $key }}" class="float-right details" style="border-bottom-style: dotted;">Info Detail</a>
                </p>
	    				</div>
            </div>
            
          </div>
        

          <!-- modal -->
          <div class="modal fade" id="exampleModal--{{ $key }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ $dosen->nama }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <table>
                  <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td>{{ $dosen->nip }}</td>
                  </tr>
                  <tr>
                    <td>NIDN</td>
                    <td>:</td>
                    <td>{{ $dosen->nidn }}</td>
                  </tr>
                  <tr>
                    <td>Jenis Kelamin</td>
                    <td>:</td>
                    <td> {{  $dosen->jenis_kelamin == 'L' ? 'Laki-Laki' : 'Perempuan'  }}</td>
                  </tr>
                  <tr>
                  <tr>
                    <td>Tipe Pegawai</td>
                    <td>:</td>
                    <td>{{ $dosen->tipe_pegawai }}</td>
                  </tr>
                  <tr>
                    <td>No Kartu</td>
                    <td>:</td>
                    <td>{{ $dosen->no_kartu }}</td>
                  </tr>
                  <tr>
                    <td>No Whatsapp</td>
                    <td>:</td>
                    <td>{{ $dosen->no_wa }}</td>
                  </tr>
                  <tr>
                    <td>Tempat,Tanggal Lahir</td>
                    <td>:</td>
                    <td>{{ $dosen->tempat_lahir }}, {{ Carbon\Carbon::parse($dosen->tanggal_lahir)->translatedFormat('d F Y') }}</td>
                  </tr> 
                  <tr>
                    <td>Agama</td>
                    <td>:</td>
                    <td>{{ $dosen->agama }}</td>
                  </tr>
                  <tr>
                    <td>Status Nikah</td>
                    <td>:</td>
                    <td>{{  $dosen->status_nikah == 'SM' ? 'Sudah Menikah' : 'Belum Menikah'  }}</td>
                  </tr>


                </table>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                
              </div>
            </div>
          </div>
        </div>


          <!-- end modal -->


        @endforeach  
        	

        </div>
    	</div>
    </section>




@endsection
@section('js')

<script>
$('#bologna-list a').on('click', function (e) {
  e.preventDefault()
  $(this).tab('show')
})
</script>
@endsection