@extends('layouts.app')

@section('content')

    <div class="contact_form">
        <div class="container">

            <div class="row">
                <div class="col-md-12">
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

                            </table>
                        </div>



                    </div>
                </div>
            </div>
            <br>
            <div class="row">

                <div class="card pd-20 pd-sm-40 col-md-12">
                    <div class="card-header"><strong>Product</strong> List</div>


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

        </div>
    </div>


    <div class="panel"></div>
    </div>

@endsection
