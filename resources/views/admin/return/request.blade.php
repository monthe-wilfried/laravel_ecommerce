@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">Return Order</a>
            <span class="breadcrumb-item active">Return Request</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Return Request</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">

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
                                    @if($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->return_order == 2)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.view.order', $order->id) }}" class="btn btn-sm btn-info"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                    <a href="{{ route('admin.approve.return', $order->id) }}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up" aria-hidden="true"></i> Approve</a>
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
