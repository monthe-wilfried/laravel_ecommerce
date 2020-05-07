@extends('layouts.admin_layouts')

@section('admin_content')

    <div class="sl-mainpanel">

        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="{{ route('categories.index') }}">Category</a>
            <span class="breadcrumb-item active">Categories</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Categories Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Category List
                    <a href="" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#modaldemo3" style="float: right">Add New</a>
                </h6>

                <!-- LARGE MODAL -->
                <div id="modaldemo3" class="modal fade">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content tx-size-sm">
                            <div class="modal-header pd-x-20">
                                <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Add Category</h6>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form method="post" action="{{ route('category.store') }}">
                                @csrf
                                <div class="modal-body pd-20">

                                    <div class="form-group">
                                        <label for="name">Category name</label>
                                        <input type="text" class="form-control" name="name" placeholder="Category">
                                        @if($errors->has('name'))
                                            <div class="alert alert-danger" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </div>
                                        @endif
                                    </div>

                                </div><!-- modal-body -->
                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-info pd-x-20">Submit</button>
                                    <button type="button" class="btn btn-secondary pd-x-20" data-dismiss="modal">Close</button>
                                </div>
                            </form>
                        </div>
                    </div><!-- modal-dialog -->
                </div><!-- modal -->

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th class="wd-15p">ID</th>
                            <th class="wd-15p">Name</th>
                            <th class="wd-20p">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($categories as $key=>$category)
                            <tr>
                                <td>{{ $key +1 }}</td>
                                <td>{{ $category->name ?? 'No name available' }}</td>
                                <td>
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                    <a id="delete" href="{{ route('category.delete', $category->id) }}" class="btn btn-sm btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i> Delete</a>
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
