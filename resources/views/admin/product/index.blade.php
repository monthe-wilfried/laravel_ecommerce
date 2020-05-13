@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Products</a>
            <span class="breadcrumb-item active">All Products</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Products Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product List
                    <a href="{{ route('admin.product.create') }}" class="btn btn-sm btn-primary" style="float: right">Add New</a>
                </h6>


                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Product Code</th>
                            <th class="wd-15p">Product Name</th>
                            <th class="wd-20p">Image</th>
                            <th class="wd-20p">Category</th>
                            <th class="wd-20p">Brand</th>
                            <th class="wd-20p">Checked</th>
                            <th class="wd-20p">Quantity</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Action</th>
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
                                    @if($product->main_slider)
                                        <span class="badge badge-secondary">Main Slider</span>
                                    @endif
                                    @if($product->trend)
                                        <span class="badge badge-secondary">Trend</span>
                                    @endif
                                    @if($product->hot_deal)
                                        <span class="badge badge-secondary">Hot Deal</span>
                                    @endif
                                        <br>
                                    @if($product->mid_slider)
                                        <span class="badge badge-secondary">Mid Slider</span>
                                    @endif
                                    @if($product->best_rated)
                                        <span class="badge badge-secondary">Best Rated</span>
                                    @endif
                                    @if($product->hot_new)
                                        <span class="badge badge-secondary">Hot New</span>
                                    @endif
                                        <br>
                                    @if($product->buyone_getone)
                                        <span class="badge badge-secondary">BuyOne GetOne</span>
                                    @endif
                                </td>
                                <td>{{ $product->product_quantity}}</td>
                                <td>
                                    @if($product->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">Inactive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-sm btn-info" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                                    <a id="delete" href="{{ route('admin.product.delete', $product->id) }}" class="btn btn-sm btn-danger" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a>
                                    <a href="{{ route('admin.product.show', $product->id) }}" class="btn btn-sm btn-warning"title="Show"><i class="fa fa-eye" aria-hidden="true"></i></a>

                                    @if($product->status == 1)
                                        <a href="{{ route('admin.product.inactive', $product->id) }}" class="btn btn-sm btn-danger" title="Inactive"><i class="fa fa-thumbs-down" aria-hidden="true"></i></a>
                                    @else
                                        <a href="{{ route('admin.product.active', $product->id) }}" class="btn btn-sm btn-indigo" title="Active"><i class="fa fa-thumbs-up" aria-hidden="true"></i></a>
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
