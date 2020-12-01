<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;
use Http;
use App\Models\Page;
use App\Models\PageLang;
use App\Models\PageMedia;
use App\Models\Content;
use Auth;
use Session;
use DB;

class ProfilController extends Controller
{

    public function index($slug)
    {
        $data['page']           = Page::where('slug',$slug)->first();
        
        $data['content']        = PageLang::where('page_id',$data['page']->id)->first();
        $data['page_media']     = PageMedia::where('page_id',$data['page']->parent)->first(); 
        $data['content_news']   = Content::where('category_content_id',3)->get()->take(5);
        return view('frontend.profil',compact('data'));
    }


}