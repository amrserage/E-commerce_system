@extends('admin.master')

@section('title')
{{trans('admin_title_page_trans.order')}}
@endsection
@section('title_page')
{{trans('admin_title_page_trans.order')}}
@endsection
@section('content')
<div class="card-body">
        <h3> <p>order_items</p></h3>
        <table id="example1" class="table table-bordered table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th>order_id</th>
                <th>product name</th>
                <th>product price</th>
                <th>total price</th>

                <th>qty</th>

            </tr>
            </thead>
            <tbody>
            @php $total=0 @endphp
            @php $i = 1; @endphp
            @foreach ($order->orderItems as $items )
            @php $total=$items->qty *$items->product->selling_price  @endphp
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$items->orders_id}}</td>
                    <td>{{$items->product->name}}</td>
                    <td>{{$items->product->selling_price}}</td>
                    <td>{{$total}}</td>
                    
                    <td>{{$items->qty}}</td>
                    
                </tr> 
            
            </tbody>
        </table>
    </div>
@endforeach
@endsection