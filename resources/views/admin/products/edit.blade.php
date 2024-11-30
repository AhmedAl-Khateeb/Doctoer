
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


  <!-- edit -->
  <h1 class="text-black text-center py-2">Update_Product,{{ $product->id }}</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="container col-8">
        <div class="card">
            <div class="card-body">
              <form action="{{ route('products.update', ['id' => $product->id]) }}" method="post" enctype="multipart/form-data" autocomplete="off">
                  @csrf
                  @method('PUT')

                  <!-- Hidden Input for Product ID -->
                  <input type="hidden" name="id" id="id">

                  <div class="modal-body">
                      <div class="form-group">
                          <label for="">Name</label>
                          <input type="text" class="form-control" value="{{ $product->name }}"  id="name"  name="name">
                      </div>

                      <div class="form-group">
                          <label for="">Description</label>
                          <input type="text" class="form-control" name="description"  value="{{ $product->description }}"   id="description" >
                      </div>


                      <div class="form-group">
                        <label for="">Weight</label>
                        <input type="number" class="form-control" name="weight" value="{{ $product->weight }}">
                    </div>

                      <div class="form-group">
                          <label for="">Price</label>
                          <input type="number" class="form-control" name="price"  id="price"  value="{{ $product->price }}"  >
                      </div>


                          <div class="form-group my-2">
                            <label for="category_id">Category_ID</label>
                            <select name="category_id" class="form-control" style="font-size: 1.25rem; height: 50px;">
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group">
                            <label for="photo">Photo</label>
                            <input type="file" class="form-control" name="photo" id="photo">
                        </div>
                        @error('photo')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror




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
