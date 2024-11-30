@extends('admin.include.master')


@section('css')
    <!-- Internal Data table css -->
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">



@endsection
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> Product</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                </span>
            </div>
        </div>

    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    <!-- Create Post Form -->

    @if (session()->has('Add'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong> {{ session()->get('Add') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif



    @if (session()->has('Error'))
        <div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
            <strong> {{ session()->get('Error') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif


    {{-- ################### --}}
    {{-- Edit Message --}}
    @if (session()->has('edit'))
        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
            <strong> {{ session()->get('edit') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    {{-- DELETE Message --}}
    @if (session()->has('delete'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong> {{ session()->get('delete') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <script>
        // الانتظار لمدة 3 ثواني (3000 مللي ثانية) قبل إخفاء الرسالة
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 2000);
    </script>

    {{-- =============================================== --}}
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
                            <a class="modal-effect btn btn-success" data-effect="effect-newspaper" data-toggle="modal"
                                href="#modaldemo8">Add Product+ </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                            <thead>
                                <tr>
                                    <th class="border-bottom-0">Num</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Description</th>
                                    <th class="border-bottom-0">Weight</th>
                                    <th class="border-bottom-0">Price</th>
                                    <th class="border-bottom-0">Category</th>
                                    <th class="border-bottom-0">Photo</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $product->name }}</td>
                                        <td>{{ $product->description }}</td>
                                        <td>kg : {{ $product->weight }}</td>

                                        <td>EGP : {{ number_format($product->price, 0, '.', '') }}</td>
                                        <td>{{ $product->category_id }}</td>
                                        <td>
                                            @if($product->hasMedia('photo'))
                                                <img src="{{ $product->getFirstMediaUrl('photo') }}" alt="{{ $product->name }}" style="width: 70px; height: auto;">
                                            @endif
                                        </td>
                                        <td>


                                            <div class="d-flex align-items-center">
                                                <a title="تعديل"  class="btn btn-sm btn-info mr-2" href="{{ route('products.edit', $product->id) }}">Edit</a>
                                                <a title="عرض المنتج" class="btn btn-sm btn-success mr-2" href="{{ route('products.show', $product->id) }}">Show</a>

                                                <div>
                                                    <a title="ازاله" class="btn btn-sm btn-danger mr-2" href="javascript:void(0);" onclick="confirmDelete('{{ route('products.destroy', $product->id) }}')">Delete</a>
                                                </div>

                                            </div>



                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th class="text-danger text-center" colspan="8">You don't have any data</th>
                                    </tr>
                                @endforelse

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{-- ############## --}}
        {{-- Create Category --}}

        <div class="modal" id="modaldemo8">
            <div class="modal-dialog" role="document">
                <div class="modal-content modal-content-demo">
                    <div class="modal-header">
                        <h6 class="modal-title">Add Product</h6><button aria-label="Close" class="close"
                            data-dismiss="modal" type="button"><span aria-hidden="true">&times;</span></button>
                    </div>

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf


                        <div class="modal-body">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" name="name" placeholder="اسم المنتج">
                            </div>

                            <div class="form-group">
                                <label for="">Description</label>
                                <input type="text" class="form-control" name="description"  placeholder="ضع وصف للمنتج">
                            </div>

                            <div class="form-group">
                                <label for="">Weight</label>
                                <select class="form-control" name="weight">
                                    <option value="0.25">0.25 g (ربع كيلو)</option>
                                    <option value="0.5">0.5 g (نصف كيلو)</option>
                                    <option value="1">1 Kg</option>
                                    <option value="2">2 Kg</option>
                                    <option value="3">3 Kg</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Price</label>
                                <input type="number" class="form-control" name="price"  placeholder="حدد السعر"  step="0.01">
                            </div>

                            <div class="form-group my-2">
                                <label for="category_id">Category_ID</label>
                                <select name="category_id" class="form-control" style="font-size: 1.25rem; height: 50px;">
                                @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                                </div>

                            <div class="form-group">
                                <label for="">Photo</label>
                                <input class="photo" type="file" class="form-control" name="photo"  placeholder="اختر صوره مناسبه ">
                            </div>


                        </div>
                        <div class="modal-footer">
                            <button class="btn ripple btn-success" type="submit">Create</button>
                            <button class="btn ripple btn-danger" data-dismiss="modal" type="button">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ############################################## --}}
    </div>







    <!--======================== delete ====================================-->
    {{-- <div class="modal" id="modaldemo9">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content modal-content-demo">
                <div class="modal-header">
                    <h6 class="modal-title">Delete</h6><button aria-label="Close" class="close" data-dismiss="modal"
                        type="button"><span aria-hidden="true">&times;</span></button>
                </div>
                <form action="{{ route('products.destroy', ['id' => $product->id]) }}" method="POST">

                    @csrf
                    @method('DELETE')

                    <div class="modal-body">
                        <p>هل انت متاكد من عملية الحذف ؟</p><br>
                        <input type="hidden" name="id" id="id" value="">
                        <input class="form-control" name="name" id="name" type="text" readonly>
                        <input class="form-control" name="description" id="description" type="text" readonly>
                        <input class="form-control" name="price" id="price" type="number" readonly>
                        <input class="form-control" name="category_id" id="category_id" type="text" readonly>
                        <img id="photoPreview" src="" alt="Product Photo" style="width: 70px; height: auto;">
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>




    </div> --}}
    <!-- Container closed -->
    </div>
    <!-- main-content closed -->
@endsection
@section('js')
    <!-- Internal Data tables -->
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/responsive.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap4.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/jszip.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/pdfmake.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/vfs_fonts.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/table-data.js') }}"></script>
    <script src="{{ asset('admin/assets/js/modal.js') }}"></script>



@endsection

<script>
    function confirmDelete(url) {
        if (confirm('لا يمكنك استعادة البيانات هل انت متأكد من عملية الحذف?')) {
            window.location.href = url;
        }
    }
</script>

