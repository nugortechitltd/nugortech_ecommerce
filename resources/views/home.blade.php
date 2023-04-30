@extends('layouts.dashboard')

@section('content')
<div class="row">
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-2">
            <div class="card-body">
                <span class="mdi mdi-account-clock"></span>
                <h2 class="mb-1">Signups</h2>
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <p class="">Today</p>
                        <h3 class="text-white me-4">{{$todayUser}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Weekly</p>
                        <h3 class="text-white me-4">{{$thisweekuser}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Monthly</p>
                        <h3 class="text-white me-4">{{$thisMonthUser}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Total</p>
                        <h3 class="text-white me-4">{{$totalUser}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-3">
            <div class="card-body">
                <span class="mdi mdi-package-variant"></span>
                <h2 class="mb-1">Orders</h2>
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <p class="">Today</p>
                        <h3 class="text-white me-4">{{$todayOrder}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Weekly</p>
                        <h3 class="text-white me-4">{{$thisweekorder}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Monthly</p>
                        <h3 class="text-white me-4">{{$thisMonthOrder}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Total</p>
                        <h3 class="text-white me-4">{{$totalOrder}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-4">
            <div class="card-body">
                <span class="mdi mdi-cart"></span>
                <h2 class="mb-1">Sells</h2>
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <p class="">Today</p>
                        <h3 class="text-white me-4">{{$todaySells}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Weekly</p>
                        <h3 class="text-white me-4">{{$thisweeksells}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Monthly</p>
                        <h3 class="text-white me-4">{{$thisMonthsells}}</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Total</p>
                        <h3 class="text-white me-4">{{$totalsells}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-sm-6 p-b-15 lbl-card">
        <div class="card card-mini dash-card card-1">
            <div class="card-body">
                <span class="mdi mdi-cart"></span>
                <h2 class="mb-1">Revenue</h2>
                <div class="mt-5">
                    <div class="d-flex align-items-center justify-content-between pt-3">
                        <p class="">Today</p>
                        <h3 class="text-white me-4">{{$todayrevenue}} Tk</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Weekly</p>
                        <h3 class="text-white me-4">{{$thisweekrevenue}} Tk</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Monthly</p>
                        <h3 class="text-white me-4">{{$thisMonthrevenue}} Tk</h3>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <p class="">Total</p>
                        <h3 class="text-white me-4">{{$totalrevenue}} Tk</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="ec-odr-dtl card card-default">
        <div class="card-header card-header-border-bottom d-flex justify-content-between">
            <h2 class="ec-odr">Order details</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-cart-plus"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>Confirmed Order</li>
                                    <li>{{$confirmorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-repeat"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>Processing Order</li>
                                    <li>{{$processingorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-gift"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>Product Dispatched</li>
                                    <li>{{$dispatchorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-truck-fast"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>On Delivery</li>
                                    <li>{{$ondeliveryorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-shopping"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>Product Delivered</li>
                                    <li>{{$deliveredorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
                <div class="col-xl-3 col-lg-4 mt-3">
                    <address class="info-grid">
                        <div class="info-content d-flex align-items-center justify-content-between">
                            <h5 class="title_infos d-flex justify-content-center align-items-center"> 
                                <span class="mdi mdi-cancel"></span> 
                                <ul class="d-flex flex-column justify-content-center">
                                    <li>Canceled Order</li>
                                    <li>{{$cancelorders}}</li>
                                 </ul>
                            </h5> 
                        </div>
                    </address>
                </div>
            
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="card card-default">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="responsive-data-table" class="table" style="width:100%">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Date</th>
                                <th>Subtotal</th>
                                <th>Discount</th>
                                <th>Charge</th>
                                <th>Total</th>
                                <th>Payment method</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
    
                        <tbody>
                            @foreach ($orders as $sl => $order)
                            <tr>
                                <td>{{$order->order_id}}</td>
                                <td>{{$order->rel_to_customer->name}}</td>
                                <td>{{$order->created_at->format('d-m-Y')}}</td>
                                <td>{{$order->subtotal}} Tk</td>
                                <td>{{$order->discount == null ? 'NA': $order->discount.' Tk'}}</td>
                                <td>{{$order->charge == null ? 'NA': $order->charge.' Tk' }}</td>
                                <td>{{$order->total}} Tk</td>
                                <td>
                                    @php
                                        if($order->payment_method == 1) {
                                            echo 'Cash on delivery';
                                        } else if($order->payment_method == 2) {
                                            echo 'bKash';
                                        } else {
                                            echo 'Rocket';
                                        }
                                    @endphp
                                </td>
                                <td> 
                                    <span class="badge badge-@php
                                    if($order->status == 0) {
                                        echo 'secondary';
                                    } else if($order->status == 1) {
                                        echo 'primary';
                                    } else if($order->status == 2) {
                                        echo 'info';
                                    } else if($order->status == 3) {
                                        echo 'warning';
                                    } else if($order->status == 4) {
                                        echo 'success';
                                    } else {
                                        echo 'danger';
                                    }
                                    @endphp">
                                    @php
                                        if($order->status == 0) {
                                            echo 'Confirmed Order';
                                        } else if($order->status == 1) {
                                            echo 'Processing Order';
                                        } else if($order->status == 2) {
                                            echo 'Product Dispatched';
                                        } else if($order->status == 3) {
                                            echo 'On delivery';
                                        } else if($order->status == 4){
                                            echo 'Product Delivered';
                                        } else {
                                            echo 'Cancelled';
                                        }
                                    @endphp    
                                    </span> 
                                </td>
                                <td>
                                    <form action="{{route('order.status')}}" method="POST">
                                        @csrf
                                    <div class="btn-group mb-1">
                                        <button type="button"
                                            class="btn btn-outline-success">Info</button>
                                        <button type="button"
                                            class="btn btn-outline-success dropdown-toggle dropdown-toggle-split"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false" data-display="static">
                                            <span class="sr-only">Info</span>
                                        </button>
                                       
                                            <div class="dropdown-menu">
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'0'}}">Order Confirm</button>
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'1'}}">Order Processing</button>
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'2'}}">Order Dispatched</button>
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'3'}}">Order On Delivery</button>
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'4'}}">Order Delivered</button>
                                                <button class="dropdown-item" name="status" type="submit" value="{{$order->order_id.','.'5'}}">Order Cancel</button>
                                            </div>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
