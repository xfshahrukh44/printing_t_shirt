<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\inquiry;
use App\schedule;
use App\newsletter;
use App\post;
use App\banner;
use App\imagetable;
use DB;
use Mail;use View;
use Session;
use App\Http\Helpers\UserSystemInfoHelper;
use App\Http\Traits\HelperTrait;
use Auth;
use App\Profile;
use App\Page;
use Image;

class HomeController extends Controller
{
    use HelperTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
     // use Helper;

    public function __construct()
    {
        //$this->middleware('auth');

        $logo = imagetable::
                     select('img_path')
                     ->where('table_name','=','logo')
                     ->first();

        $favicon = imagetable::
                     select('img_path')
                     ->where('table_name','=','favicon')
                     ->first();

        View()->share('logo',$logo);
        View()->share('favicon',$favicon);

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {

       $page = DB::table('pages')->where('id', 1)->first();
       $section = DB::table('section')->where('page_id', 1)->get();
       $banner = DB::table('banners')->get();
       $blog = DB::table('blogs')->get();
       $instagram = DB::table('instagrams')->take(5)->get();

       $get_product = DB::table('products')->where('status', '1')->take(6)->get();

       return view('welcome', compact('page', 'section', 'banner', 'blog', 'instagram', 'get_product'));

    }


    public function about()
    {

       $page = DB::table('pages')->where('id', 7)->first();
       $section = DB::table('section')->where('page_id', 7)->get();

       return view('about', compact('page', 'section'));
    }


    public function product($cat = "" , $subcat = "", $childsubcat = "")
    {

       $page = DB::table('pages')->where('id', 1)->first();


       if($cat != "" && $subcat == "" && $childsubcat == "")
       {

            // dd("category");
            $get_product = DB::table('products')->where('category',$cat)->where('status','1')->paginate(12);

       }
       elseif($cat != "" && $subcat != "" && $childsubcat == "")
       {

            // dd("sub-category");
            $get_product = DB::table('products')->where('category',$cat)->where('subcategory',$subcat)->where('status','1')->paginate(12);


        }
        elseif($cat != "" && $subcat != "" && $childsubcat != "")
       {

            // dd("child-sub-category");
            $get_product = DB::table('products')->where('category',$cat)->where('subcategory',$subcat)->where('childsubcategory',$childsubcat)->where('status','1')->paginate(12);

       }
       else
       {
            $get_product = DB::table('products')->where('status','1')->paginate(12);

       }

       //dd($get_product);

       return view('product2', compact('page', 'get_product'));

    }


    public function product_detail($id = '' , $cat = "" , $subcat = "", $childsubcat = "")
    {

       $page = DB::table('pages')->where('id', 1)->first();

       $get_product_detail = DB::table('products')->where('id',$id)->where('status','1')->first();


       return view('product_detail', compact('page' ,'get_product_detail'));
    }



    public function blog()
    {
       $page = DB::table('pages')->where('id', 1)->first();

       $blog = DB::table('blogs')->get();

       return view('blog', compact('page', 'blog'));
    }


    public function blog_detail($id = '')
    {
       $page = DB::table('pages')->where('id', 1)->first();

        // dd($id);
        $blog_detail = DB::table('blogs')->where('id', $id)->first();

       return view('blog_detail', compact('page', 'blog_detail'));
    }



    public function contact()
    {
       $page = DB::table('pages')->where('id', 1)->first();

       return view('contact', compact('page'));
    }



    public function careerSubmit(Request $request)
    {


        inquiry::create($request->all());


        return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);
        return back();
    }

    public function newsletterSubmit(Request $request){

        $is_email = newsletter::where('newsletter_email',$request->newsletter_email)->count();
        if($is_email == 0) {
            $inquiry = new newsletter;
            $inquiry->newsletter_email = $request->newsletter_email;
            $inquiry->save();
            return response()->json(['message'=>'Thank you for contacting us. We will get back to you asap', 'status' => true]);

        }else{
            return response()->json(['message'=>'Email already exists', 'status' => false]);
        }

    }

    public function updateContent(Request $request){
        $id = $request->input('id');
        $keyword = $request->input('keyword');
        $htmlContent = $request->input('htmlContent');
        if($keyword == 'page'){
            $update = DB::table('pages')
                        ->where('id', $id)
                        ->update(array('content' => $htmlContent));

            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }else if($keyword == 'section'){
            $update = DB::table('section')
                        ->where('id', $id)
                        ->update(array('value' => $htmlContent));
            if($update){
                return response()->json(['message'=>'Content Updated Successfully', 'status' => true]);
            }else{
                return response()->json(['message'=>'Error Occurred', 'status' => false]);
            }
        }
    }

}
