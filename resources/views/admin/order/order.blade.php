@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.order')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.order')}}
@endsection
@section('content')

<div class="card-header">
        <a href="#" class="btn btn-outline-primary">order</a>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>Order Data</th>
                <th>first_name</th>
                <th>phone</th>
                <th>transeaction_id</th> 
                <th>total_price</th>
                <th>address1</th>
                <th>email</th>
            </tr>
            
            </thead>
            <tbody>
            @php
            
            $i = 1; @endphp
            
            @foreach($orders as $order)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$order->created_at}}</td>
                    <td>{{$order->user->fname}}</td>
                    <td>{{$order->user->phone}}</td>
                    <td>{{$order->transeaction_id}}</td>
                    <td>{{ $order->total}}</td>
                    <td>{{$order->user->address1}}</td>
                    <td>{{$order->user->email}}</td>
                    <td><a href="{{url('admin/view-orders/'.$order->id)}}" class="btn btn-primary">view</a></td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <!-- <div class="card-body">
        <h3> <p>order_items</p></h3>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>order_id</th>
                <th>product name</th>
                <th>product price</th>

                <th>qty</th>

            </tr>
            </thead>
            <tbody>
            @php $i = 1; @endphp
            @foreach($order_items as $items)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$items->orders_id}}</td>
                    <td>{{$items->product->name}}</td>
                    <td>{{$items->product->selling_price}}</td>
                    
                    <td>{{$items->qty}}</td>
                    
                </tr> 
            @endforeach
            </tbody>
        </table>
    </div> -->
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

