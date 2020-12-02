<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Response;
use Http;
use App\Models\User;
use Auth;
use Session;
use DB;
use Analytics;
use Spatie\Analytics\Period;

class HomeController extends Controller
{

    public function login(Request $request)
    {
      
        if (Auth::attempt($request->only('email','password'))) {
                return redirect()->route('home')->with('welcome',''); 
        }
        return redirect()->back()->with('error','');
    
    }

    public function home(Request $request)
    {
        if($request->name == 'current-week' ){
            $start = Carbon::now()->startOfWeek();
            $end = Carbon::now()->endOfWeek();
            $periode = Period::create($start, $end);
            $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
            $data['n_visitor'] = Analytics::fetchUserTypes($periode);
            $data['browser'] = Analytics::fetchTopBrowsers($periode);
            $data['refe'] = Analytics::fetchTopReferrers($periode);
            $data['top'] = Analytics::fetchMostVisitedPages($periode);
            $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
            return view('backend.index', compact('data'));
            }else{
                if($request->name == 'today'){
                    $start = Carbon::now()->today();
                    $end = Carbon::now()->today();
                    $periode = Period::create($start, $end);
                    $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                    $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                    $data['browser'] = Analytics::fetchTopBrowsers($periode);
                    $data['refe'] = Analytics::fetchTopReferrers($periode);
                    $data['top'] = Analytics::fetchMostVisitedPages($periode);
                    $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                    return view('backend.index', compact('data'));
                }else{
                    if($request->name == 'latest-week'){
                        $start = Carbon::now()->subWeek()->startOfWeek();
                        $end = Carbon::now()->subWeek()->endOfWeek();
                        $periode = Period::create($start, $end);
                        $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                        $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                        $data['browser'] = Analytics::fetchTopBrowsers($periode);
                        $data['refe'] = Analytics::fetchTopReferrers($periode);
                        $data['top'] = Analytics::fetchMostVisitedPages($periode);
                        $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                        return view('backend.index', compact('data'));
                    }else{
                        if($request->name == 'current-month'){
                        $start = Carbon::now()->startOfMonth();
                        $end = Carbon::now()->endOfMonth();
                        $periode = Period::create($start, $end);
                        $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                        $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                        $data['browser'] = Analytics::fetchTopBrowsers($periode);
                        $data['refe'] = Analytics::fetchTopReferrers($periode);
                        $data['top'] = Analytics::fetchMostVisitedPages($periode);
                        $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                        return view('backend.index', compact('data'));
                        }else{
                            if($request->name == 'latest-month'){
                               $start = Carbon::parse('-1 months')->startOfMonth();
                               $end = Carbon::parse('-1 months')->endOfMonth();
                               $periode = Period::create($start, $end);
                               $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                               $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                               $data['browser'] = Analytics::fetchTopBrowsers($periode);
                               $data['refe'] = Analytics::fetchTopReferrers($periode);
                               $data['top'] = Analytics::fetchMostVisitedPages($periode);
                               $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                               return view('backend.index', compact('data'));  
                            }else{
                                if($request->name == 'current-year'){
                                    $start = Carbon::now()->startOfYear();
                                    $end = Carbon::now()->endOfYear();
                                    $periode = Period::create($start, $end);
                                    $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                                    $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                                    $data['browser'] = Analytics::fetchTopBrowsers($periode);
                                    $data['refe'] = Analytics::fetchTopReferrers($periode);
                                    $data['top'] = Analytics::fetchMostVisitedPages($periode);
                                    $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                                    return view('backend.index', compact('data'));  
                                }else{
                                    if($request->name == 'latest-year'){
                                    $start = Carbon::parse('-1 years')->startOfYear();
                                    $end = Carbon::parse('-1 years')->endOfYear();
                                    $periode = Period::create($start, $end);
                                    $data['total'] = Analytics::fetchTotalVisitorsAndPageViews($periode);
                                    $data['n_visitor'] = Analytics::fetchUserTypes($periode);
                                    $data['browser'] = Analytics::fetchTopBrowsers($periode);
                                    $data['refe'] = Analytics::fetchTopReferrers($periode);
                                    $data['top'] = Analytics::fetchMostVisitedPages($periode);
                                    $data['vp'] = Analytics::fetchVisitorsAndPageViews($periode);
                                    return view('backend.index', compact('data'));
                                    }else{
                                    //Utma
                                    $data['total'] = Analytics::fetchTotalVisitorsAndPageViews(Period::days(7));
                                    $data['n_visitor'] = Analytics::fetchUserTypes(Period::days(7));
                                    $data['browser'] = Analytics::fetchTopBrowsers(Period::days(7));
                                    $data['refe'] = Analytics::fetchTopReferrers(Period::days(7));
                                    $data['top'] = Analytics::fetchMostVisitedPages(Period::days(7));
                                    $data['vp'] = Analytics::fetchVisitorsAndPageViews(Period::days(7));
                                    $data['aa'] = Analytics::performQuery(
                                    Period::years(1),
                                    'ga:sessions',
                                    [
                                        'metrics' => 'ga:sessions, ga:pageviews',
                                        'dimensions' => 'ga:yearMonth'
                                    ]
                                    );
                                    return view('backend.index', compact('data'));
                                    }
                                  }
                                }
                            }
                        }
                    }
                }
                
                
                
                
            }


        }

