@extends('admin.include.master')

@section('page-header')
@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Empty</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <!-- row -->

    <h1 class="text-black text-center py-2">update Category {{ $category->id }}</h1>
    <div class="d-flex justify-content-center mt-5">
        <div class="container col-8">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('category.update', ['id' => $category->id]) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" id="id" value="{{ $category->id }}">

                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Name</label>
                            <input class="form-control" value="{{ $category->name }}" name="name" id="name" type="text">
                        </div>

                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    </div>
    </div>
    </div>
    </div>


    </div>
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
@endsection
<script>
    function showPreview(event) {
        if (event.target.files.length > 0) {
            let src = URL.createObjectURL(event.target.files[0]);
            let prv = document.getElementById('img-prv');
            prv.src = src;
        }
    }
</script>
