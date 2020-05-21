@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="">User Role</a>
            <span class="breadcrumb-item active">All Users</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Admin Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Admin List
                    <a href="{{ route('admin.create') }}" class="btn btn-sm btn-primary" style="float: right">Add New</a>
                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">Name</th>
                            <th class="wd-15p">Phone</th>
                            <th class="wd-20p">email</th>
                            <th class="wd-20p">Access</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @if($user->category == 1)
                                        <span class="badge badge-danger">Category</span>
                                    @endif
                                    @if($user->coupon == 1)
                                        <span class="badge badge-warning">Coupon</span>
                                    @endif
                                    @if($user->product == 1)
                                        <span class="badge badge-primary">Product</span>
                                    @endif
                                    @if($user->order == 1)
                                        <span class="badge badge-secondary">Order</span>
                                    @endif

                                    @if($user->blog == 1)
                                        <span class="badge badge-dark">Blog</span>
                                    @endif
                                    @if($user->newsletter == 1)
                                        <span class="badge badge-success">Newsletter</span>
                                    @endif
                                    @if($user->seo == 1)
                                        <span class="badge badge-info">SEO</span>
                                    @endif
                                    @if($user->report == 1)
                                        <span class="badge badge-danger">Report</span>
                                    @endif

                                    @if($user->role == 1)
                                        <span class="badge badge-primary">Role</span>
                                    @endif
                                    @if($user->return == 1)
                                        <span class="badge badge-secondary">Return</span>
                                    @endif
                                    @if($user->contact == 1)
                                        <span class="badge badge-dark">Contact</span>
                                    @endif
                                    @if($user->review == 1)
                                        <span class="badge badge-info">Review</span>
                                    @endif

                                    @if($user->setting == 1)
                                        <span class="badge badge-danger">Setting</span>
                                    @endif

                                        @if($user->stock == 1)
                                            <span class="badge badge-info">Stock</span>
                                        @endif


                                </td>
                                <td>
                                    <a href="{{ route('admin.edit', $user->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a id="delete" href="{{ route('admin.delete', $user->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
