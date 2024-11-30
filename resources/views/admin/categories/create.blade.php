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

<h1 class="text-black text-center py-2">Create Category</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="container col-8">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('category.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group my-2">
                        <label for="name_category">Name Category</label>
                        <input type="text" id="name_category" name="name" class="form-control @error('name_category') is-invalid @enderror" placeholder="Enter category name">
                        @error('name_category')
                            <span class="text-danger">* {{ $message }} </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Create Category</button>
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



