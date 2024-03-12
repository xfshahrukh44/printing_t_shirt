<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\Models\Instagram;
use Illuminate\Http\Request;
use Image;
use File;

class InstagramController extends Controller
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 25;

            if (!empty($keyword)) {
                $instagram = Instagram::where('link', 'LIKE', "%$keyword%")
                ->orWhere('image', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $instagram = Instagram::paginate($perPage);
            }

            return view('instagram.instagram.index', compact('instagram'));
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            return view('instagram.instagram.create');
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

        $model = str_slug('instagram','-');

        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $instagram = new Instagram($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $instagram_path = 'uploads/instagrams/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($instagram_path) . DIRECTORY_SEPARATOR. $profileImage);

                $instagram->image = $instagram_path.$profileImage;
            }
            
            $instagram->save();
            return redirect()->back()->with('message', 'Instagram added!');
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $instagram = Instagram::findOrFail($id);
            return view('instagram.instagram.show', compact('instagram'));
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $instagram = Instagram::findOrFail($id);
            return view('instagram.instagram.edit', compact('instagram'));
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $instagram = Instagram::where('id', $id)->first();
            $image_path = public_path($instagram->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/instagrams/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/instagrams/'.$fileNameToStore;               
        }


            $instagram = Instagram::findOrFail($id);
            $instagram->update($requestData);
            return redirect()->back()->with('message', 'Instagram updated!');
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
        $model = str_slug('instagram','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Instagram::destroy($id);
            return redirect()->back()->with('message', 'Instagram deleted!');
        }
        return response(view('403'), 403);

    }
}
