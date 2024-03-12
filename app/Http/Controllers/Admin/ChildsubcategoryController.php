<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Models\Subcategory;
use App\Models\Childsubcategory;
use Illuminate\Http\Request;

use Image;
use File;

class ChildsubcategoryController extends Controller
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $keyword = $request->get('search');
            $perPage = 2500;

            if (!empty($keyword)) {
                $childsubcategory = Childsubcategory::where('subcategory', 'LIKE', "%$keyword%")
                ->orWhere('childsubcategory', 'LIKE', "%$keyword%")
                ->paginate($perPage);
            } else {
                $childsubcategory = Childsubcategory::paginate($perPage);
            }

            return view('childsubcategory.childsubcategory.index', compact('childsubcategory'));
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            
            $subcategory = Subcategory::all();
            
            return view('childsubcategory.childsubcategory.create' , compact('subcategory'));
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','add-'.$model)->first()!= null) {
            

            $childsubcategory = new Childsubcategory($request->all());

            if ($request->hasFile('image')) {

                $file = $request->file('image');
                
                //make sure yo have image folder inside your public
                $childsubcategory_path = 'uploads/childsubcategorys/';
                $fileName = $file->getClientOriginalName();
                $profileImage = date("Ymd").$fileName.".".$file->getClientOriginalExtension();

                Image::make($file)->save(public_path($childsubcategory_path) . DIRECTORY_SEPARATOR. $profileImage);

                $childsubcategory->image = $childsubcategory_path.$profileImage;
            }
            
            $childsubcategory->save();
            return redirect()->back()->with('message', 'Childsubcategory added!');
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','view-'.$model)->first()!= null) {
            $childsubcategory = Childsubcategory::findOrFail($id);
            return view('childsubcategory.childsubcategory.show', compact('childsubcategory'));
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            $childsubcategory = Childsubcategory::findOrFail($id);
            return view('childsubcategory.childsubcategory.edit', compact('childsubcategory'));
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','edit-'.$model)->first()!= null) {
            
            $requestData = $request->all();
            

        if ($request->hasFile('image')) {
            
            $childsubcategory = Childsubcategory::where('id', $id)->first();
            $image_path = public_path($childsubcategory->image); 
            
            if(File::exists($image_path)) {
                File::delete($image_path);
            }

            $file = $request->file('image');
            $fileNameExt = $request->file('image')->getClientOriginalName();
            $fileNameForm = str_replace(' ', '_', $fileNameExt);
            $fileName = pathinfo($fileNameForm, PATHINFO_FILENAME);
            $fileExt = $request->file('image')->getClientOriginalExtension();
            $fileNameToStore = $fileName.'_'.time().'.'.$fileExt;
            $pathToStore = public_path('uploads/childsubcategorys/');
            Image::make($file)->save($pathToStore . DIRECTORY_SEPARATOR. $fileNameToStore);

             $requestData['image'] = 'uploads/childsubcategorys/'.$fileNameToStore;               
        }


            $childsubcategory = Childsubcategory::findOrFail($id);
            $childsubcategory->update($requestData);
            return redirect()->back()->with('message', 'Childsubcategory updated!');
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
        $model = str_slug('childsubcategory','-');
        if(auth()->user()->permissions()->where('name','=','delete-'.$model)->first()!= null) {
            Childsubcategory::destroy($id);
            return redirect()->back()->with('message', 'Childsubcategory deleted!');
        }
        return response(view('403'), 403);

    }
}
