@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.users')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.users')}}
@endsection
@section('content')
<div class="card-header">
        <a href="#" ></a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>{{trans('product_trans.name')}}</th>
                <th>{{trans('product_trans.phone')}}</th>
                <th>{{trans('product_trans.email')}}</th>
                <th>{{trans('product_trans.view')}}</th>

            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($users as $register)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$register->fname.''.$register->lname}}</td>
                    <td>{{$register->phone}}</td>
                    <td>{{$register->email}}</td>
                    <td>
                    <a href="{{url('view-users/'.$register->id)}}"class="btn btn-primary">view</a>
                </td>
                </tr>
            @endforeach
            </tbody>

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

@section('js')
@endsection
@section('css')