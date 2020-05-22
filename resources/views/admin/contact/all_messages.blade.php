@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">Contact Messages</a>
            <span class="breadcrumb-item active">All Messages</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Order Details</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Order List</h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-20p">Phone</th>
                            <th class="wd-20p">Email</th>
                            <th class="wd-20p">Message</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($messages as $key => $message)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $message->name }}</td>
                                <td>{{$message->phone ?? 'No Phone' }}</td>
                                <td>{{ $message->email}}</td>
                                <td>{{$message->message }}</td>
                                <td>
                                    <a id="delete" href="{{ route('admin.message.delete', $message->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
