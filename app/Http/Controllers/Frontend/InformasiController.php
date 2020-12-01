<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;
use Http;
use App\Models\CategoryContent;
use App\Models\PageLang;
use App\Models\CategoryProduct;
use App\Models\Page;
use App\Models\Content;
use App\Models\Config;
use App\Models\Slider;
use App\Models\Dosen;
use Auth;
use Session;
use DB;

class InformasiController extends Controller
{

    public function index($slug)
    {
        $data['category'] = CategoryContent::where('slug',$slug)->first();
        $data['content'] = Content::where('category_content_id',$data['category']->id)->get();
         
        return view('frontend.informasi',compact('data'));
    }

    public function preview(Request $request, $slug)
    {
        $data['content']        = Content::where('slug',$slug)->first();
        $data['content_news']   = Content::where('category_content_id',$data['content']->category_content_id)
                                    ->get()->take(5);
                            
        $data['category']       = CategoryContent::where('id',$data['content']->category_content_id)->first();
         
        return view('frontend.preview_informasi',compact('data'));
    }

    public function kontak()
    {
        $data['kontak'] = Config::where('id',10)->first();
        return view('frontend.kontak',compact('data'));
        

    }

    public function prevslider(Request $request, $id)
    {
        $data['slider'] = Slider::where('id',$id)->first();
        $data['content_news']   = Content::where('category_content_id',1)
        ->get()->take(5);

        return view('frontend.preview_slider',compact('data'));
    }

    public function dosen(Request $request)
    {
        
        $data['dosen'] = Dosen::orderBy('position','ASC')->get();
        
        $data['content_news']   = Content::where('category_content_id',1)
        ->get()->take(5);

        return view('frontend.dosen',compact('data'));
    }

    public function formatTransaksi(Request $request)
    {
        $data['format_transaksi'] = PageLang::where('id',39)->first();
        $data['list_format'] = Page::with('pageLang')->where('parent',39)->get();
        
        return view('frontend.formatTransaksi',compact('data'));
    }

    public function caraPendaftaran()
    {
        $data['cara_daftar'] = PageLang::where('id',41)->first();
        
        return view('frontend.caraPendaftaran',compact('data'));
    }

    public function produk()
    {
        $data['cat_produk'] = CategoryProduct::with('Product')->get();
        
        return view('frontend.produk',compact('data'));
    }

}