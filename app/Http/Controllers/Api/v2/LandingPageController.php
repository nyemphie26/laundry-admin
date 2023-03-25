<?php

namespace App\Http\Controllers\Api\v2;

use App\Models\LandingPage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandingPageController extends Controller
{
    public function homePage()
    {
        $home = LandingPage::where('page','main-page')->get()->keyBy('key')->pluck('value', 'key');
        return response()->json($home);
    }

    public function about()
    {
        $home = LandingPage::where('page','about')->get()->keyBy('key')->pluck('value', 'key');
        return response()->json($home);
    }

    public function contact()
    {
        $home = LandingPage::where('page','contact')->get()->keyBy('key')->pluck('value', 'key');
        return response()->json($home);
    }

    public function service(Request $request)
    {
        $page = $request->slug;
        $home = LandingPage::where('page',$page)->get()->keyBy('key')->pluck('value', 'key');
        return response()->json($home);
    }
}
