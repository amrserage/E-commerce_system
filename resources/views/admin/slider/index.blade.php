@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.slider')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.slider')}}
@endsection
@section('content')

<a class="btn btn-outline-primary" href="{{route('slider.create')}}" >{{trans('buttons_trans.create')}}</a>
<table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>slider_title</th>
                <th>short_title</th>
                <th>iamge</th>
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($sliderData as $slider)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$slider->slider_title}}</td>
                    <td>{{$slider->short_title}}</td>
                    <td><img src="{{Storage::url($slider->slider_image)}}" style="max-width: 100px;"></td></tr>
            @endforeach
            </tbody>

        </table>
@endsection