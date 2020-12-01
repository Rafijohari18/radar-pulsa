@extends('layouts.backend')

@section('title', $data['title'])

@section('content')

 <!-- start page title -->
 <div class="row align-items-center">
    <div class="col-sm-6">
        <div class="page-title-box">
            <h4 class="font-size-18">Data Dosen</h4>
            <ol class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Data Master</a></li>
                <li class="breadcrumb-item active">Data Dosen</li>
            </ol>
        </div>
    </div>

    <div class="col-sm-6">
        <div class="float-right d-none d-md-block">
                <a href="{{ route('dosen.create') }}" class="btn btn-primary dropdown-toggle waves-effect waves-light">
                    <i class="mdi mdi-plus"></i> Tambah
                </a>
        </div>
    </div>
</div>     
                        <!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            
            <div class="card-body">
            
                <h4 class="card-title">Data Dosen</h4>
               
               
                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                    <tr>
                      <th>No</th>
                      <th>Foto</th>
                      <th>NIP</th>
                      <th>NIDN</th>
                      <th>Nama</th>
                      <th>Tipe Pegawai</th>
                      <th>Posisi</th>
                      <th>Aksi</th>
                    </tr>
                    </thead>


                    <tbody>
                    @foreach($data['dosen'] as $item)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>
                        <img src="{{ asset($item->foto) }}" class="img-thumbnail"></td>
                      <td>{{ $item->nip }}</td>
                      <td>{{ $item->nidn }}</td>
                      <td>{{ $item->nama }}</td>
                    
                      <td>{{ $item->tipe_pegawai }}</td>
                      <td>
                      @php
                        $min = $item->min('position');
                        $max = $item->max('position');
                        @endphp
                        @if ($min != $item['position'])
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn icon-btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="click to up position">
                            <i class="ion ion-md-arrow-round-up"></i>
                            <form action="{{ route('dosen.position', ['id' => $item['id'], 'position' => ($item['position'] - 1)]) }}" method="POST">
                                @csrf
                                @method('PUT')                                            
                            </form>
                        </a>
                        @else
                        <button type="button" class="btn icon-btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="click to up position" disabled><i class="ion ion-md-arrow-round-up"></i></button>
                        @endif
                        @if ($max != $item['position'])
                        <a href="javascript:void(0);" onclick="$(this).find('form').submit();" class="btn icon-btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="click to down position">
                            <i class="ion ion-md-arrow-round-down"></i>
                            <form action="{{ route('dosen.position', ['id' => $item['id'], 'position' => ($item['position'] + 1)]) }}" method="POST">
                                @csrf
                                @method('PUT')                                            
                            </form>
                        </a>
                        @else
                        <button type="button" class="btn icon-btn btn-sm btn-secondary" data-toggle="tooltip" data-original-title="click to down position" disabled><i class="ion ion-md-arrow-round-down"></i></button>
                        @endif
                      
                        </td>
                        <td>
                
                            <a href="{{ route('dosen.edit', ['id' => $item['id']]) }}" class="btn icon-btn btn-sm btn-info" data-toggle="tooltip" data-original-title="click to edit dosen">
                                <i class="ion ion-md-create"></i>
                            </a>
                            
                            <a href="{{ route('dosen.destroy', ['id' => $item['id']]) }}" class="btn icon-btn btn-sm btn-danger delete" onclick="return confirm('Anda Yakin ?')" data-toggle="tooltip" data-original-title="click to delete dosen"><i class="ion ion-md-trash"></i>
                                
                            </a>
                   
                        </td>
                    </tr>
                    
                    @endforeach
                    
                    
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@endsection


@section('jsbody')

@endsection