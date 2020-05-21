@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">Stock Management</a>
            <span class="breadcrumb-item active">All Products</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Stock Products Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Stock Product List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-20p">Image</th>
                            <th class="wd-20p">Category</th>
                            <th class="wd-20p">Brand</th>
                            <th class="wd-20p">Quantity</th>
                            <th class="wd-20p">Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{ $product->product_code }}</td>
                                <td>{{ $product->product_name }}</td>
                                <td><img src="{{ asset($product->image_one) ?? 'No Image' }}" height="50px" width="60px"></td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->brand->name ?? 'No Brand' }}</td>
                                <td>
                                    @if($product->product_quantity == 0)
                                        <span class="badge badge-danger">Out of Stock</span>
                                    @else
                                        {{ $product->product_quantity}}
                                    @endif

                                </td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->


        </div><!-- sl-pagebody -->
    </div><!-- sl-mainpanel -->

    </div>

@endsection
