@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.slider')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.slider')}}
@endsection
@section('content') 
<form id="myForm" method="POST" action="{{ route('slider.store') }}"
                                enctype="multipart/form-data">
                                @csrf
<div class="row">
            <div class="col">
                <label for="name_ar">slider_title</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control @error('slider_title') is-invalid @enderror" name="slider_title"required>
                </div>
                @error('slider_title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                <label for="name_en">Short Title</label>
                <div class="input-group mb-3 col">
                    <input type="text"  class="form-control @error('short_title') is-invalid @enderror" name="short_title"required>
                </div>
                @error('short_title')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
        </div>
        
        <div class="col">
                <label for="slider_image">Image</label>
                <div class="input-group mb-3 col">
                    <input type="file"  class="form-control  @error('slider_image') is-invalid @enderror" name="slider_image" required>
                </div>
                @error('slider_image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="col">
                                    <button type="submit" class="btn btn-primary px-5">Add Slider</button>
                                </div>
                            </form>
<!-- <div class="row">
                <div class="col-xl-9 mx-auto">
                    <div class="card">
                        <div class="card-body">
                            <form id="myForm" method="POST" action="{{ route('slider.store') }}"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Slider Title</label>
                                    <input type="text" name="slider_title" class="form-control"
                                        value="{{ old('slider_title') }}" placeholder="Slider Title">
                                </div>
                                @error('slider_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Short Title</label>
                                    <input type="text" name="short_title" class="form-control"
                                        value="{{ old('short_title') }}" placeholder="Short Title">
                                </div>
                                @error('short_title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="mb-3">
                                    <label class="form-label">Slider Image</label>
                                    <input type="file" name="slider_image" id="image" class="form-control"
                                        value="{{ old('slider_image') }}">
                                </div>
                                @error('slider_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0"> </h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <img id="showImage" src="{{ url('upload/no_image.jpg') }}" alt="Admin"
                                            style="width:100px; height: 100px;">
                                    </div>
                                </div>
                                <div class="col">
                                    <button type="submit" class="btn btn-primary px-5">Add Slider</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
            </div> -->
            @endsection