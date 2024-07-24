@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.user_details')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.user_details')}}
@endsection
@section('content')
<div class="card-header">
        <a href="{{route('users')}}"class="btn btn-primary" >back</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>id</th>
                <th>{{trans('product_trans.name')}}</th>
                <th>{{trans('product_trans.phone')}}</th>
                <th>{{trans('product_trans.email')}}</th>
                <th>{{trans('product_trans.address1')}}</th>
                <th>{{trans('product_trans.city')}}</th>

                <th>{{trans('product_trans.is_admin')}}</th>



                <!-- <th>{{trans('product_trans.status')}}</th>
                <th>{{trans('product_trans.trend')}}</th>
                <th>{{trans('buttons_trans.Actions')}}</th> -->
            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$users->fname.''.$users->lname}}</td>
                    <td>{{$users->phone}}</td>
                    <td>{{$users->email}}</td>

                    <td>{{$users->address1}}</td>
                    <td>{{$users->city}}</td>
                    <td>{{$users->is_admin =='0'? 'User':'Admin'}}</td>
                    
                </td>
                </tr>
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