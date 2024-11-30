@extends('admin.include.master')

@section('page-header')
@endsection

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Pages</h4>
                <span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Product Details</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection

@section('content')
    <h1 class="text-center display-4 text-success">Product: {{ $product->id }}</h1>

    <div class="container col-md-8 mt-4">
        <div class="card shadow">
            <div class="card-body text-center">



@if ($product->getFirstMediaUrl('photo'))
<img src="{{ $product->getFirstMediaUrl('photo') }}" class="img-fluid rounded mb-3" style="width: 150px" alt="Product Image">
@else
<p class="text-warning">لا توجد صورة متاحة لهذا المنتج.</p>
@endif




                <!-- Product details -->
                <h5 class="card-title"> <span class="text-info">{{ $product->name }}</span></h5><br>
                <h6 class="card-subtitle mb-2 text-muted"> {{ $product->description }}</h6><br>
                <h6 class="card-subtitle mb-2 text-muted"><span class="text-success">{{  number_format($product->price, 0, '.', '')  }}: EGP</span>
                    <br>
                <h6 class="card-subtitle mb-2 text-muted"><span class="text-success">{{  number_format($product->weight, 0, '.', '')  }}: kg</span>

                </h6><br>
                <h6 class="card-subtitle mb-2 text-muted">Category :: {{ $product->category_id }}</h6><br>
                <h6 class="card-subtitle mb-2 text-muted">Published :: {{ $product->created_at->format('d M Y') }}</h6>

                <hr>

                <!-- Action buttons -->
                <div class="d-flex justify-content-between mt-3">
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-info">Edit</a>
                    <a class="btn btn-success" href="{{ route('products.index', $product->id) }}">Back</a>

                    <div>
                        <button type="button" class="btn btn-danger"
                            onclick="confirmDelete('{{ route('products.destroy', $product->id) }}')">Delete</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        function confirmDelete(url) {
            if (confirm('Are you sure you want to delete this product?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
