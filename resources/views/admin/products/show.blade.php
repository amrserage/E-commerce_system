@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.product')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.product')}}
@endsection
@section('content')
<div class="card-body">
    @if(session('error_catch'))
        <div class="bg-danger">{{session('error_catch')}}</div>
    @endif

    <form action="#" >
        @csrf


        <div class="row">
        <div class="col">
                <label for="name_ar">{{trans('product_trans.category')}}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" value="{{$product->category->name}}" >
                </div>
                
            </div>
            
            </div>
        <div class="row">
            <div class="col">
                <label for="name_ar">{{trans('product_trans.name_ar')}}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('name_ar') is-invalid @enderror" value=" {{$product->getTranslation('name','ar')}}" >
                </div>
                
            </div>
            <div class="col">
                <label for="name_en">{{trans('product_trans.name_en')}}</label>
                <div class="input-group mb-3 col">
                    <input type="text" class="form-control @error('name_en') is-invalid @enderror"  value="{{$product->getTranslation('name','en')}}" >

                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="slug">{{trans('product_trans.slug')}}</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control  @error('slug') is-invalid @enderror"  value="{{$product->slug}}">
                </div>
                
            </div>
            <div class="col">
                    <div class="row my-2">
                        <label for="image">{{trans('product_trans.image')}}</label>
                        <div class="col">
                            <img src="{{Storage::url($product->image)}}" alt="" class="img-thumbnail" style="max-width:100px;">
                        </div>
                    </div>
                </div>

        </div>

        <div class="row">
            <div class="col">
                <label for="short_description_ar">{{trans('product_trans.short_description_ar')}}</label>
                <div class="input-group mb-3">
                    <textarea name="short_description_ar" rows="3" cols="3"
                                class="form-control @error('short_description_ar') is-invalid @enderror"> {{$product->getTranslation('short_description','ar')}}</textarea>
                </div>
                
            </div>
            <div class="col">
                <label for="short_description_en">{{trans('product_trans.short_description_en')}}</label>
                <div class="input-group mb-3">
                    <textarea name="short_description_en" rows="3" cols="3"
                                class="form-control @error('short_description_en') is-invalid @enderror">{{$product->getTranslation('short_description','en')}}</textarea>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="description_ar">{{trans('product_trans.description_ar')}}</label>
                <div class="input-group mb-3">
                    <textarea name="description_ar" rows="3" cols="3"
                                class="form-control @error('description_ar') is-invalid @enderror">{{$product->getTranslation('description','ar')}}</textarea>
                </div>
                
            </div>
            <div class="col">
                <label for="description_en">{{trans('product_trans.description_en')}}</label>
                <div class="input-group mb-3">
                    <textarea name="description_en" rows="3" cols="3"
                                class="form-control @error('description_en') is-invalid @enderror">{{$product->getTranslation('description','en')}}</textarea>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="status">{{trans('product_trans.status')}}</label>
                <div class="input-group mb-3">
                @if($product->status == 1)
                            <span class="badge badge-success">{{trans('category_trans.showing')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.hidden')}}</span>
                        @endif
                </div>

            </div>
            <div class="col">
                <label for="trend">{{trans('product_trans.trend')}}</label>
                <div class="input-group mb-3 col">
                @if($product->trend == 1)
                            <span class="badge badge-success">{{trans('category_trans.popular')}}</span>
                        @else
                            <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                        @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="price">{{trans('product_trans.price')}}</label>
                <div class="input-group mb-3">
                    <input type="number" value="{{$product->price}}"
                            class="form-control @error('price') is-invalid @enderror" >
                </div>
                
            </div>
            <div class="col">
                <label for="selling_price">{{trans('product_trans.selling_price')}}</label>
                <div class="input-group mb-3">
                    <input type="number" value="{{$product->selling_price}}"
                            class="form-control @error('selling_price') is-invalid @enderror" >
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="qty">{{trans('product_trans.qty')}}</label>
                <div class="input-group mb-3">
                    <input type="number" value="{{$product->qty}}"
                            class="form-control @error('qty') is-invalid @enderror">
                </div>
               
            </div>
            <div class="col">
                <label for="tax">{{trans('product_trans.tax')}}</label>
                <div class="input-group mb-3">
                    <input type="number" value="{{$product->tax}}"
                            class="form-control @error('tax') is-invalid @enderror">
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="meta_title">{{trans('product_trans.meta_title')}}</label>
                <div class="input-group mb-3"> 
                <input type="text" name="meta_title" value="{{$product->meta_title}}"class="form-control @error('meta_title') is-invalid @enderror" >
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="meta_description_ar">{{trans('product_trans.meta_description_ar')}}</label>
                <div class="input-group mb-3">
                <textarea name="meta_description_ar" rows="3" cols="3"
                            class="form-control @error('meta_description_ar') is-invalid @enderror">{{$product->getTranslation('meta_description','ar')}}</textarea>
                </div>
                
            </div>
            <div class="col">
                <label for="meta_description_en">{{trans('product_trans.meta_description_en')}}</label>
                <div class="input-group mb-3">
                <textarea name="meta_description_en" rows="3" cols="3"
                            class="form-control @error('meta_description_en') is-invalid @enderror">{{$product->getTranslation('meta_description','en')}}</textarea>
                </div>
                
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label for="meta_keywords">{{trans('product_trans.meta_keyword')}}</label><span
                    class="text-danger">{{trans('product_trans.meta_keyword_note')}}</span>
                <div class="input-group mb-3">
                <textarea name="meta_keywords" rows="3" cols="3"
                            class="form-control @error('meta_keywords') is-invalid @enderror">{{$product->meta_keywords}}</textarea>
                </div>
                
            </div>
        </div>
        
        </form>
</div>

@endsection

@section('js')

@endsection