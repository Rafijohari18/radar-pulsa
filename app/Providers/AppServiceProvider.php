<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Repositories\Interfaces\PageRepositoryInterface;
use App\Repositories\Interfaces\UsersRepositoryInterface;
use App\Repositories\Interfaces\ConfigRepositoryInterface;

use App\Repositories\PageRepository;
use App\Repositories\UsersRepository;
use App\Repositories\ConfigRepository;

use App\Services\Interfaces\PageServiceInterface;
use App\Services\Interfaces\ConfigServiceInterface;

use App\Services\PageService;
use App\Services\ConfigService;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;

use Carbon\Carbon;
use App\Models\PageLang;
use App\Models\CategoryContent;
use App\Models\Config;
use App\Models\Page;
use App\Models\PageMedia;
use App\Models\Slider;
use App\Models\Content;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /**Module Pages */
        $this->app->bind(PageRepositoryInterface::class, PageRepository::class);
        $this->app->bind(PageServiceInterface::class, PageService::class);

       
        $this->app->bind(ConfigRepositoryInterface::class, ConfigRepository::class);
        $this->app->bind(ConfigServiceInterface::class, ConfigService::class);
        /**Module Addon */

        View::share([
            'list_navbar'       => PageLang::get(),
            'slider'            => Slider::all(),
            'rektor'            => Content::where('id',5)->first(),
            'profil'            => Content::where('category_content_id',4)->
                                orderBy('id','DESC')->get(),
            'content_memilih_kami'         => Content::where('category_content_id',2)->
                                orderBy('id','DESC')->get(),
            'jumlah_layanan'    => Content::where('category_content_id',5)->
                                orderBy('id','DESC')->get(),      
            'rekening'    => Content::where('category_content_id',7)->
                                orderBy('id','DESC')->get(),                                       
                           
            'header_dosen'          => CategoryContent::where('id',8)->first(),
            'title_memilih_kami'    => CategoryContent::where('id',2)->first(),
            'title_rekening'    => CategoryContent::where('id',7)->first(),
            'sub_header'          => PageLang::where('id',27)->first(),
            'tentang'           => Page::where('parent',3)->get(),
            'tipe_no_center'    => Page::where('parent',29)->get(),
            'title_no_center'   => PageLang::where('id',29)->first(),
            'title_mitra'       => PageLang::where('id',28)->first(),
            'media_mitra'       => PageMedia::where('page_id',28)->get(),
            
            'logo'              => Config::where('id',8)->first(),
            'alamat'            => Config::where('id',1)->first(),
            'no_hp'             => Config::where('id',4)->first(),
            'email'             => Config::where('id',3)->first(),
            'fb'                => Config::where('id',5)->first(),
            'ig'                => Config::where('id' ,6)->first(),
            'tw'                => Config::where('id',7)->first(),
            'yt'                => Config::where('id',8)->first(),
            'bg_web'            => Config::where('id',9)->first(),
        ]);

    

    }
}
