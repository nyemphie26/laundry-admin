<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\LandingPage;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class LandingPageController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = LandingPage::where('page','main-page')->get()->keyBy('key')->pluck('value', 'key');
        // return $data;
        return view('Pages.LandingPage.mainPage', compact('data'));
    }

    public function about()
    {
        $data = LandingPage::where('page','about')->get()->keyBy('key')->pluck('value','key');
        // return $data;
        return view('Pages.LandingPage.about', compact('data'));
    }

    public function contact()
    {
        $data = LandingPage::where('page','contact')->get()->keyBy('key')->pluck('value','key');
        // return $data;
        return view('Pages.LandingPage.contact', compact('data'));
    }

    public function services()
    {
        $data = LandingPage::where('page','LIKE','Service%')->get()->keyBy('key')->pluck('value','key');
        $categories = Category::all();
        // return $data['bed-and-linen_Page_title'];
        return view('Pages.LandingPage.services', compact('categories','data'));
    }

    public function storeValue(Request $request)
    {
        $formData = request()->all();
        if (isset($formData['keyPage'])) {
            $page = $formData['keyPage'];
        }
        else {
            $page = Route::getCurrentRoute()->uri;
        }
        // return response()->json(['message'=>$page],200);

        foreach ($formData as $key => $value) {
            if (Str::contains($key,['_background','_picture'])) {
                //store background
                if ($value != 'undefined') {
                    $formData[$key] = $value->store('landingPageImages');
                }
            }
        }
        
        
        try {
            foreach ($formData as $key => $value) {
                if (Str::contains($key,['_background','_picture'])) {
                    //store background
                    if ($value != 'undefined') {
                        LandingPage::updateOrCreate(
                            ['key' => $key], ['value'=>env('APP_URL')."/storage/".$value, 'page'=>$page]
                        );
                    }
                }
                elseif($key != 'keyPage'){
                    LandingPage::updateOrCreate(
                        ['key' => $key], ['value'=>$value, 'page'=>$page]
                    );
                }
            }

            return response()->json(['message'=>'Landing Page been updated'],200);
            
        } catch (\Throwable $th) {
            return response()->json(['message'=>$th->getMessage()],500);
        }
    }
}
