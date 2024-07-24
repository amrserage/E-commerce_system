<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class CategoryController extends Controller
{
    use ApiResponseTrait;
    public function index(){
        $Category= CategoryResource::collection(Category::all());

        // $category=Category::all();
        return $this->ApiResponse($Category,'available category',200);

    }
    public function show($id){
        $Category=($Category=Category::find($id));
        if($Category){
            return $this->ApiResponse(new CategoryResource($Category),'available category',200);
        }else{
            return $this->ApiResponse(null,'category not found',404);
        }
    }
    public function store(Request $request ){
//         $validation=Validator::make($request->all(),[
//             'name'=>'Required',
//             'slug'=>'Required',
//         'description' =>'Required',
//         'is_showing'=>'Required',
//         'is_popular' =>'Required',
//         'meta_title' =>'Required',
//         'meta_description'=>'Required',
//         'meta_keywords'=>'Required',
//         ]);
// if($validation->fails()){
//     return $this->ApiResponse(null,$validation->errors(),400);
// }
        // $image=$request->file('image')->store('public/assets/uploads/Category');
        $Category=Category::create([
            'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
            'slug' => $request->slug,
            'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
            'is_showing' => $request->is_showing ? '1' : '0',
            'is_popular' => $request->is_popular ? '1' : '0',
            'meta_title' => ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en],
            'meta_description' => ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
            'meta_keywords' => $request->meta_keywords
                    ]);
            if($Category){
                return $this->ApiResponse(new CategoryResource($Category),'available category',201);
            }else{
                return $this->ApiResponse(null,'category dont add',404);
            }
        }
        public function update(Request $request , $id){
    //         $validation=Validator::make($request->all(),[
    //             'name'=>'Required',
    //             'slug'=>'Required',
    //         'description' =>'Required',
    //         'is_showing'=>'Required',
    //         'is_popular' =>'Required',
    //         'meta_title' =>'Required',
    //         'meta_description'=>'Required',
    //         'meta_keywords'=>'Required',
    //         ]);
    // if($validation->fails()){
    //     return $this->ApiResponse(null,$validation->errors(),400);
    // }
    $Category=Category::find($id);
    $Category->update([
        'name' => ['ar' => $request->name_ar, 'en' => $request->name_en],
        'slug' => $request->slug,
        'description' => ['ar' => $request->description_ar, 'en' => $request->description_en],
        'is_showing' => $request->is_showing ? '1' : '0',
        'is_popular' => $request->is_popular ? '1' : '0',
        'meta_title'=> ['ar' => $request->meta_title_ar, 'en' => $request->meta_title_en],
        'meta_description' => ['ar' => $request->meta_description_ar, 'en' => $request->meta_description_en],
        'meta_keywords' => $request->meta_keywords,
        
    ]);
        if($Category){
            return $this->ApiResponse(new CategoryResource($Category),'category Updata',201);
        }
        }
        public function destroy($id){
            $Category=Category::find($id);
            if(!$Category){
                return $this->ApiResponse(null,'not found',405);
            }
            $Category->delete($id);
            // $Category=Category::destroy($id);
            if($Category){
                return $this->ApiResponse(null,'category deleted',200);
            }
        }
    }

    