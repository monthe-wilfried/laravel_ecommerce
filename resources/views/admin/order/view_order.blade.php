@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order Detals</h6>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Order</strong> Details</div>

                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $order->name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $order->phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Payment Type:</th>
                                        <td>{{ $order->payment_type }}</td>
                                    </tr>

                                    <tr>
                                        <th>Payment ID:</th>
                                        <td>{{ $order->payment_id }}</td>
                                    </tr>

                                    <tr>
                                        <th>Total Amount:</th>
                                        <td>${{ $order->total }}</td>
                                    </tr>

                                    <tr>
                                        <th>Month:</th>
                                        <td>{{ $order->month }}</td>
                                    </tr>

                                    <tr>
                                        <th>Date:</th>
                                        <td>{{ $order->date }}</td>
                                    </tr>
                                </table>
                            </div>



                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header"><strong>Shipping</strong> Details</div>

                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $shipping->shipping_name }}</td>
                                    </tr>

                                    <tr>
                                        <th>Phone:</th>
                                        <td>{{ $shipping->shipping_phone }}</td>
                                    </tr>

                                    <tr>
                                        <th>Email:</th>
                                        <td>{{ $shipping->shipping_email }}</td>
                                    </tr>

                                    <tr>
                                        <th>Address:</th>
                                        <td>{{ $shipping->shipping_address }}</td>
                                    </tr>

                                    <tr>
                                        <th>City:</th>
                                        <td>{{ $shipping->shipping_city }}</td>
                                    </tr>

                                    <tr>
                                        <th>Country:</th>
                                        <td>{{ $shipping->shipping_country }}</td>
                                    </tr>

                                    <tr>
                                        <th>Status:</th>
                                        <td>
                                            @if($order->status == 0)
                                                <span class="badge badge-warning">Pending</span>
                                            @elseif($order->status == 1)
                                                <span class="badge badge-info">Payment Accepted</span>
                                            @elseif($order->status == 2)
                                                <span class="badge badge-warning">Progress</span>
                                            @elseif($order->status == 3)
                                                <span class="badge badge-success">Delivered</span>
                                            @else
                                                <span class="badge badge-danger">Canceled</span>
                                            @endif
                                        </td>
                                    </tr>
                                </table>
                            </div>



                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="card pd-20 pd-sm-40 col-md-12">
                        <h6 class="card-body-title">Product List</h6>


                        <div class="table-wrapper">
                            <table class="table display responsive nowrap">
                                <thead>
                                <tr>
                                    <th class="wd-15p">Product ID</th>
                                    <th class="wd-15p">Product Name</th>
                                    <th class="wd-20p">Image</th>
                                    <th class="wd-20p">Color</th>
                                    <th class="wd-20p">Size</th>
                                    <th class="wd-20p">Quantity</th>
                                    <th class="wd-20p">Unit Price</th>
                                    <th class="wd-20p">Total Amount</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($details as $detail)
                                    <tr>
                                        <td>{{ $detail->product_code }}</td>
                                        <td>{{ $detail->product_name }}</td>
                                        <td><img src="{{ asset($detail->image_one) ?? 'No Image' }}" height="50px" width="60px"></td>
                                        <td>{{ $detail->color }}</td>
                                        <td>{{ $detail->size }}</td>
                                        <td>{{ $detail->quantity}}</td>
                                        <td>{{ $detail->single_price}}</td>
                                        <td>{{ $detail->total_price}}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div><!-- table-wrapper -->
                    </div><!-- card -->

                </div>

                @if($order->status == 0)
                    <a href="{{ route('admin.payment.accept', $order->id) }}" class="btn btn-info">Accept Payment</a>
                    <a href="{{ route('admin.payment.cancel', $order->id) }}" class="btn btn-danger">Cancel Order</a>
                @elseif($order->status == 1)
                    <a href="{{ route('admin.delivery.process', $order->id) }}" class="btn btn-info">Process Delivery</a>
                @elseif($order->status == 2)
                    <a href="{{ route('admin.delivery.success', $order->id) }}" class="btn btn-success">Delivery Done</a>
                @elseif($order->status == 3)
                    <strong class="text-success text-center">This product is successfully delivered.</strong>
                @else
                    <strong class="text-danger text-center">This order is not valid</strong>
                @endif


            </div>
        </div>


    </div>

@endsection
