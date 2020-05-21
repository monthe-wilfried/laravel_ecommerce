@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('admin.coupons.index') }}">Orders</a>
            <span class="breadcrumb-item active">Order Details</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Today Orders Report</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Payment Type</th>
                            <th class="wd-20p">Transaction ID</th>
                            <th class="wd-20p">SubTotal</th>
                            <th class="wd-20p">Shipping Cost</th>
                            <th class="wd-20p">Total</th>
                            <th class="wd-20p">Date</th>
                            <th class="wd-20p">Status</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td>{{ $order->payment_type }}</td>
                                <td>{{ $order->balance_transaction }}</td>
                                <td>${{ $order->subtotal }}</td>
                                <td>${{ $order->shipping }}</td>
                                <td>${{ $order->total }}</td>
                                <td>{{ $order->date }}</td>
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
                                <td>
                                    <a href="{{ route('admin.view.order', $order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
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
