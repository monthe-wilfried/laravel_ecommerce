@extends('layouts.app')

@section('content')

    <div class="contact_form">
        <div class="container">
            <div class="row">
                <div class="col-sm-9 card">

                    <table class="table table-response">
                        <thead>
                        <tr>
                            <th scope="col">Payment Type</th>
                            <th scope="col">Return</th>
                            <th scope="col">Amount</th>
                            <th scope="col">Date</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($orders as $order)
                            <tr>
                                <td scope="col">{{ $order->payment_type }}</td>
                                <td scope="col">
                                    @if($order->return_order == 0)
                                        <span class="badge badge-info">No Request</span>
                                    @elseif($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->return_order == 2)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                </td>
                                <td scope="col">${{ $order->total }}</td>
                                <td scope="col">{{ $order->date }}</td>
                                <td scope="col">
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
                                <td scope="col">
                                    @if($order->return_order == 0)
                                        <a id="return" href="{{ route('return.request', $order->id) }}" class="btn btn-danger btn-sm">Return</a>
                                    @elseif($order->return_order == 1)
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif($order->return_order == 2)
                                        <span class="badge badge-success">Success</span>
                                    @endif
                                    @if($order->return_order == 0)

                                    @endif
                                </td>
                            </tr>
                        </tbody>
                        @endforeach
                    </table>
                    {{ $orders->render() }}
                </div>

                <div class="col-sm-3">
                    <div class="card">
                        <img src="{{ asset('public/frontend/images/no_user.png') }}" class="card-img-top" style="height: 90px; width: 90px; margin-left: 36%;">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ strtoupper(Auth::user()->name) }}</h5>
                        </div>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="{{ route('password.change') }}">Change Password</a></li>
                            <li class="list-group-item">Edit Profile</li>
                            <li class="list-group-item"><a href="{{ route('success.orderlist') }}">Return Order</a></li>
                        </ul>
                        <div class="card-body">
                            <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="panel"></div>
    </div>

@endsection
