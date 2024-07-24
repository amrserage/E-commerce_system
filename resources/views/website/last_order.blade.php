@extends('website.layouts.master')
@section('title')
last-order
@endsection
@section('content')
@if($orders->isEmpty())
    <p>No order history found for this user.</p>
@else
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order image</th>
                <th>Order Date</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)

                @foreach($order->orderItems as $orderItem)
                    @php
                        $product = $orderItem->product;

                    @endphp
                    <tr>
                    <td><img src="{{Storage::url($product->image)}}" style="max-width: 100px;"></td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $orderItem->qty }}</td>
                        <td>{{  $order->total }}</td>
                    </tr>
                @endforeach
            @endforeach
        </tbody>
    </table>
@endif
                        
<!-- //$subtotal = $orderItem->qty * $product->price; // Assuming 'price' is a field in the products table
                        //$orderTotal += $subtotal; -->
<!-- @if($orders->isEmpty())
    <p>No order history found for this user.</p>
@else
<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Order Date</th>
                 <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Order Total</th> -->
                <!-- Add other headers as needed
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->created_at }}</td>
                        <td>{{ $order->total }}</td>
                        
                    </tr>
            @endforeach
        </tbody>
    </table>
    @endif -->
@endsection