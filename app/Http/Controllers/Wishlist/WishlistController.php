<?php

namespace App\Http\Controllers\Wishlist;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Wishlist;
use Illuminate\Http\Request;
use Image;
use File;

class WishlistController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */

    public function index(Request $request)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $wishlist = Wishlist::where('product_id', 'LIKE', "%$keyword%")
                ->orWhere('favorite', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $wishlist = Wishlist::paginate($perPage);
            }

            return view('wishlist.wishlist.index', compact('wishlist'));
        }
        return response(view('403'), 403);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('wishlist.wishlist.create');
        }
        return response(view('403'), 403);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $wishlist = new Wishlist($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $wishlist_path = 'uploads/wishlists/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($wishlist_path) . DIRECTORY_SEPARATOR. $profileImage);

                $wishlist->image = $wishlist_path.$profileImage;
            }
            
            $wishlist->save();
            return redirect()->back()->with('message', 'Wishlist added!');
        }
        return response(view('403'), 403);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $wishlist = Wishlist::findOrFail($id);
            return view('wishlist.wishlist.show', compact('wishlist'));
        }
        return response(view('403'), 403);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $wishlist = Wishlist::findOrFail($id);
            return view('wishlist.wishlist.edit', compact('wishlist'));
        }
        return response(view('403'), 403);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $wishlist = Wishlist::where('id', $id)->first();
            $image_path = public_path($wishlist->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/wishlists/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/wishlists/'.$fileNameToStore;               
        }


            $wishlist = Wishlist::findOrFail($id);
            $wishlist->update($requestData);
            return redirect()->back()->with('message', 'Wishlist updated!');
        }
        return response(view('403'), 403);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $model = str_slug('wishlist','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Wishlist::destroy($id);
            return redirect()->back()->with('message', 'Wishlist deleted!');
        }
        return response(view('403'), 403);

    }
}
