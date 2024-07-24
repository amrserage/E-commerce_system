@extends('admin.master')
@section('title')
{{trans('admin_sidebar_trans.categories')}}
@endsection
@section('title_page')
{{trans('admin_sidebar_trans.categories')}}
@endsection
@section('content')

<div class="card-body">
<a class="btn btn-outline-primary" href="{{route('categories.create')}}" >{{trans('buttons_trans.create')}}</a>

                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr> <th>#</th>
                        <th>{{trans('category_trans.Name')}}</th>
                        <th>{{trans('category_trans.Image')}}</th>
                        <th>{{trans('category_trans.Is_showing')}}</th>
                        <th>{{trans('category_trans.Is_popular')}}</th>
                        <th>{{trans('buttons_trans.Actions')}}</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i=1 ?>
                        @foreach($categories as $category)
                    <tr> 
                        <td>{{$i++}}</td>
                        <td>{{$category->name}}</td>
                        <td><img src="{{Storage::url($category->image)}}" alt="" style="max-width: 100px;"></td>
                        <td> @if($category->is_showing==1)
                            <span class="badge badge success">{{trans('category_trans.showing')}}</span>
                            @else
                            <span class="badge badge denger">{{trans('category_trans.hidden')}}</span>
                            @endif
                        </td>
                        <td>
                        @if($category->is_popular==1)
                            <span class="badge badge-success">{{trans('category_trans.Is_popular')}}</span>
                            @else
                            <span class="badge badge-danger">{{trans('category_trans.no_popular')}}</span>
                            @endif
                        </td>

                        <td>
                            <a class="btn btn-outline-primary" href="{{route('categories.show',$category->id)}}" >{{trans('buttons_trans.show')}}</a>
                            <a class="btn btn-outline-warning" href="{{route('categories.edit',$category->id)}}" >{{trans('buttons_trans.edit')}}</a>
                            <a class="btn btn-outline-danger" href="{{route('categories.destroy',$category->id)}}" >{{trans('buttons_trans.delete')}}</a>
                        </td>          
                        
                    </tr>
                    @endforeach()
                    </tfoot>
                    </table>
                </div>
@endsection
@section('js')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.js')}}"></script>
    <script>
        $(function () {
            $("#example1").DataTable();
            // $('#example2').DataTable({
            //     "paging": true,
            //     "lengthChange": false,
            //     "searching": false,
            //     "ordering": true,
            //     "info": true,
            //     "autoWidth": false,
            // });
        });

    </script>

@endsection
@section('css')
@endsection