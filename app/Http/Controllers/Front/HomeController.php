<?php

namespace App\Http\Controllers\Front;
use Carbon\Carbon;

use App\Models\Dolce;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $adesso = Carbon::now();
        $scadenza = $adesso->subDays(intval(config('settings.scadenza_giorni')));
        $dolci = Dolce::where('created_at','>', $scadenza)
        ->where('qta','>', 0)
        ->latest()->paginate(10);
        
        return view('front.homepage',compact('dolci'));
       
    }
}
