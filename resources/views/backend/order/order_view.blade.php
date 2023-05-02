@extends('layouts.dashboard')
@section('content')
  <!-- CONTENT WRAPPER -->
  <div class="ec-content-wrapper">
    <div class="content">
        <div class="breadcrumb-wrapper">
            <div>
                <h1>Invoice details</h1>
            <p class="breadcrumbs"><span><a href="index.html">Home</a></span>
                <span><i class="mdi mdi-chevron-right"></i></span>Invoice
            </p>
            </div>
            
        </div>
        <style>
            @media print {
                /* Hide every other element */
                body * {
                    visibility: hidden;
                }
                
                *{
                    visibility: hidden;
                }

                /* Then displaying print container elements */
                .print-container, .print-container * {
                    visibility: visible;
                }

                /* Adjusting the position to always start from top left */
                .print-container {
                    position: absolute;
                    left: 0px;
                    top: 0px;
                    right: 0px;
                }
            }
        </style>
        <div class="row">
            <div class="col-12">
                <div class="ec-odr-dtl card card-default">
                    <div class="card-header card-header-border-bottom d-flex justify-content-between">
                        <h2 class="ec-odr">Order details</h2>
                    </div>
                    <div class="card-body">
                        <div class="invoice_details_top_wrapper">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="invoice_details_logo">
                                        @if (App\Models\Aboutus::latest()->exists())
                                            <img src="{{ asset('uploads/logo') }}/{{App\Models\Aboutus::latest()->take(1)->first()->logo}}" alt="logo">
                                        @else
                                            <img src="{{asset('backend/assets/img/logo.png')}}" alt="">
                                        @endif
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="invoice_details_text">
                                         <h4>Invoice</h4>
                                         <p>Order Id: <span>{{$order_info->order_id}}</span></p>
                                         <p>Invoice Date: <span>{{Carbon\Carbon::now()->format('d M Y')}}</span></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-content">
                                        <h5 class="title_infos"> <span class="mdi mdi-account-circle"></span> Customer info</h5> 
                                         <ul>
                                            <li>Name: <span> {{$order_info->rel_to_customer->name}}</span></li>
                                            <li>Email: <span>{{$order_info->rel_to_customer->email}}</span> </li>
                                         </ul>
                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-content">
                                        <h5 class="title_infos"> <span class="mdi mdi-ship-wheel"></span> Shipping info</h5> 
                                        @php
                                            $billings = App\Models\Billingdetails::where('order_id', $order_info->order_id)->get();
                                        @endphp
                                         <ul>
                                            <li>Name: <span>{{$billings->first()->name}}</span></li>
                                            <li>Address: <span>{{$billings->first()->address}}</span> </li>
                                            <li>Phone: <span>{{$billings->first()->phone}}</span></li>
                                         </ul>
                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-content">
                                        <h5 class="title_infos"> <span class="mdi mdi-cart"></span> Order info</h5> 
                                         <ul>
                                            <li>Name: <span>{{$billings->first()->name}}</span></li>
                                            <li>Address: <span>{{$billings->first()->address}}</span> </li>
                                            <li>Phone: <span>{{$billings->first()->phone}}</span></li>
                                         </ul>
                                    </div>
                                </address>
                            </div>
                            <div class="col-xl-3 col-lg-6">
                                <address class="info-grid">
                                    <div class="info-content">
                                        <h5 class="title_infos"> <span class="mdi mdi-card-bulleted"></span>Payment info</h5> 
                                         <ul>
                                            <li>Payment method: 
                                                <span>
                                                    @if ($order_info->payment_method == 1)
                                                        Cash on delivery
                                                    @elseif ($order_info->payment_method == 2)
                                                        bKash
                                                    @else
                                                        Rocket
                                                    @endif
                                                </span>
                                            </li>
                                            <li>
                                                Transaction Number: 
                                                <span>
                                                    {{$order_info->tran_number == null ? 'NA' : $order_info->tran_number}}
                                                </span> 
                                            </li>
                                         </ul>
                                    </div>
                                </address>
                            </div>
                        
                        </div>
                    </div>
                </div>

                

                <div class="ec-odr-dtl card card-default mt-5 print-container">
                    <div class="card-header card-header-border-bottom d-flex justify-content-center">
                        <a href="{{route('site')}}" target="_" class="mt-3">
                            @if (App\Models\Aboutus::latest()->exists())
                                <img src="{{ asset('uploads/logo') }}/{{App\Models\Aboutus::latest()->take(1)->first()->logo}}" alt="logo">
                            @else
                                <img src="{{asset('backend/assets/img/logo.png')}}" alt="">
                            @endif
                        </a>
                        <h2 class="ec-odr">Product summary</h2>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table table-striped o-tbl">
                                        <thead>
                                            <tr class="line">
                                                <td><strong>Order ID</strong></td>
                                                <td><strong>Photo</strong></td>
                                                <td><strong>Product name</strong></td>
                                                <td><strong>Unit</strong></td>
                                                <td><strong>Price</strong></td>
                                                <td><strong>Sub total</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {{-- {{$order_info->order_id}} --}}
                                            @php
                                                $subtotaltaka = 0;
                                            @endphp
                                            @foreach (App\Models\Orderproduct::where('order_id', $order_info->order_id)->get() as $product)
                                            <tr>
                                                <td>{{$product->order_id}}</td>
                                                <td><img class="product-img" src="{{asset('uploads/products/preview')}}/{{$product->rel_to_product->preview_one}}" alt="" /></td>
                                                <td>{{$product->rel_to_product->product_name}}</td>
                                                <td>{{$product->quantity}} Units</td>
                                                <td>{{$product->price}} Tk</td>
                                                @php
                                                    $totaltaka = $product->price*$product->quantity
                                                @endphp
                                                <td>{{$totaltaka}} Tk</td></td>
                                            </tr>

                                            @php
                                                $subtotaltaka += $product->price*$product->quantity
                                            @endphp

                                            @endforeach

                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Total</strong></td>
                                                <td class="text-right"><strong>{{$subtotaltaka}} Tk</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Charge</strong></td>
                                                <td class="text-right"><strong>{{$order_info->charge}} Tk</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Discount:</strong></td>
                                                <td class="text-right"><strong>{{$order_info->discount == null ? '0' : $order_info->discount}} Tk</strong></td>
                                            </tr>
                                            <tr>
                                                <td colspan="4">
                                                </td>
                                                <td class="text-right"><strong>Grand total:</strong></td>
                                                <td class="text-right"><strong>{{$order_info->total}} Tk</strong></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="invoice_details_bottom">
                                    <h5>Terms & Condition:</h5>
                                    <p>Velit cillum ea anim laboris nulla ex non in culpa.</p>
                                    <p>Amet consequat esse deserunt quis pariatur.</p>
                                    <p>Nisi nostrud amet occaecat dolor velit.</p>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="invoice_details_bottom_right">
                                    <h4>Authorized person</h4>
                                    <img src="{{asset('backend/assets/img/sign.png')}}" alt="">
                                    <h5>Paul wilington</h5>
                                    <p>Chief accoutant</p>
                                    
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="invoice_details_button float-end">
                    <button type="button" class="btn btn-primary print float-right"> Print
                    </button>                    
                </div>
                
            </div>
        </div>
    </div> <!-- End Content -->
</div> 
 <!-- End Content Wrapper -->
@endsection

@section('footer_script')

<script>
    $(document).ready(function() {
        $('.print').click(function() {
            window.print();
        })
    })
</script>
    
@endsection