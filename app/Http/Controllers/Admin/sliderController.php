<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Support\Facades\Validator;
;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {        $sliderData = Slider::all();
        // return view('backend.slider.all_slider', compact('sliderData'));
        return view('admin.slider.index',compact('sliderData'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        
        try{

            $image=$request->file('slider_image')->store('public/assets/uploads/image_slider/');
            $slider=new Slider();
            $slider->slider_title=$request->slider_title;
            $slider->short_title=$request->short_title;
            $slider->slider_image=$image;
            $slider->save();
            toastr()->success(trans("messages_trans.success_save"), 'Congrats', ['timeOut' => 5000]);
            return redirect()->route('slider.index');
        }catch(\Exception $e){ 
            return redirect()->route('slider.index')->with('error',$e);
        }
    }


        // $validator = Validator::make($request->all(), [
        //     'slider_title' => [
        //         'required',
        //         'string',
        //         "regex:/^[a-zA-Z0-9\s'%]+$/",
        //     ],
        //     'short_title' => [
        //         'required',
        //         'string',
        //         "regex:/^[a-zA-Z0-9\s'%]+$/",
        //     ],
        //     'slider_image' => [
        //         'required',
        //         'image',
        //         function ($attribute, $value, $fail) {
        //             $extension = strtolower($value->getClientOriginalExtension());

        //             if (!in_array($extension, ['png', 'jpeg', 'jpg', 'gif'])) {
        //                 $fail('Invalid photo. Please select a photo in PNG, JPEG, JPG or GIF format.');
        //             }
        //         },
                
        //     ],
        // ], [
        //     'slider_title.required' => 'Please enter a name',
        //     'slider_title.regex' => 'Strings cant contain special characters',
        //     'short_title.required' => 'Please enter a name.',
        //     'short_title.regex' => 'Strings cant contain special characters.',
        //     'slider_image.required' => 'Please select a photo.',
        // ]);

        // if ($validator->fails()) {
        //     return redirect()->back()->withErrors($validator)->withInput();
        // }

        // if ($request->hasFile('slider_image')) {
        //     $sliderImage = $request->file('slider_image');
        //     $sliderImageName = time() . '.' . $sliderImage->getClientOriginalExtension();
        //     $sliderImage->move(public_path('upload/sliders'), $sliderImageName);
        //     $save_url = 'upload/sliders/' . $sliderImageName;

        //     $uploadDirectory = public_path('upload'); 

        //     $sliderDirectory = $uploadDirectory . '/sliders'; 
        //     $files=File::filse($sliderDirectory);

        //     if (count($files) === 0) {
                
        //         echo "The image cannot be found in the upload/sliders folder.";
        //     } else if (count($files) > 1) {
        //         echo "There is more than one file in the upload/sliders directory.";
        //     } else if (File::exists($sliderDirectory)) {
        //         $files = File::allFiles($sliderDirectory);
        //         File::delete($files);
        //     }
        // }
        // Slider::insert([
        //     'slider_title' => $request->slider_title,
        //     'short_title' => $request->short_title,
        //     'slider_image' => $save_url,
        // ]);


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
