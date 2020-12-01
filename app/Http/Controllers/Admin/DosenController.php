<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PageRequest;
use App\Services\DosenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Dosen;
use File;
use Str;

class DosenController extends Controller{

    private $pageService, $configService;

    public function __construct(DosenService $dosenService)
    {
        $this->dosenService = $dosenService;
    }

    public function index(Request $request)
    {
        $data['title'] = 'Dosen';
        $data['dosen'] = Dosen::orderBy('position','ASC')->get();
        
        return view('backend.dosen.index', compact('data'));
    }

    public function create()
    {
        
        $data['title'] = 'Dosen';
        $data['type'] = 'create';
        
        return view('backend.dosen.form', compact('data'));
    }

    public function store(Request $request)
    {
        
        if ($request->foto != NULL) {
                $file = $request->foto;
                $name = 'file/'.Str::slug($request->input('foto')).''.time().'-'.$file->getClientOriginalName();
                $file->move(public_path().'/file/', $name);  
                $fileMove = $name;  
        } else {
                $fileMove = NULL;
        }
        
        $ordering = Dosen::max('position') + 1;

        

        Dosen::create([
            'nip'               => $request->nip,
            'nidn'              => $request->nidn,
            'foto'              => $fileMove,
            'tipe_pegawai'      => $request->tipe_pegawai,
            'nama'              => $request->nama,
            'no_kartu'          => $request->no_kartu,
            'no_wa'             => $request->no_wa,
            'alamat'            => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => date('Y-m-d',strtotime($request->tanggal_lahir)),
            'jenis_kelamin'     => $request->jenis_kelamin,
            'agama'             => $request->agama,
            'status_nikah'      => $request->status_nikah,
            'position'          => $ordering,

        ]);

        return redirect()->route('dosen.index');
    }

    public function edit($id)
    {
        $data['title'] = 'Edit';
        $data['type'] = strtolower($data['title']);
        $data['dosen'] = Dosen::find($id);
        
       
        return view('backend.dosen.form', compact('data'));
    }

    public function update(Request $request,$id)
    {
        
        if ($request->foto != NULL) {
            $file = $request->foto;
            $name = 'file/'.Str::slug($request->input('foto')).''.time().'-'.$file->getClientOriginalName();
            $file->move(public_path().'/file/', $name);  
            $fileMove = $name;  
        } else {
            $fileMove = $request->image_lama;
        }
        
        $category = Dosen::find($id);
        $category->update([
            'nip'               => $request->nip,
            'nidn'              => $request->nidn,
            'foto'              => $fileMove,
            'tipe_pegawai'      => $request->tipe_pegawai,
            'nama'              => $request->nama,
            'no_kartu'          => $request->no_kartu,
            'no_wa'             => $request->no_wa,
            'alamat'            => $request->alamat,
            'tempat_lahir'      => $request->tempat_lahir,
            'tanggal_lahir'     => date('Y-m-d',strtotime($request->tanggal_lahir)),
            'jenis_kelamin'     => $request->jenis_kelamin,
            'agama'             => $request->agama,
            'status_nikah'      => $request->status_nikah,

        ]);
        return redirect()->route('dosen.index');


    }

    public function destroy($id)
    {
        $data['dosen']  =  Dosen::where('id',$id)->first();

        Dosen::where('id',$id)->delete();
        File::delete($data['dosen']->foto);
        return redirect()->back();

    }
    public function position($id, $position)
    {
        
        if ($position >= 1) {
                
            $data = Dosen::find($id);
            
            $data->where('position', $position)->update([
                'position' => $data->position,
            ]);

            Dosen::where('id',$id)->update([
                'position' => $position,
            ]);
            


                
        }

        return back()->with('success', 'Change position successfully');
        
    }

    
}
