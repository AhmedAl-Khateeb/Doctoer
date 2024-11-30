@extends('admin.include.master')
@section('title')
    Categories

@stop

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
                <h4 class="content-title mb-0 my-auto"> Category</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
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
        }, 3000);
    </script>

    {{-- =============================================== --}}
    <!-- row -->
    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">

                                <a class=" btn btn-success" href="{{ route('category.create') }}">Add Category+ </a>
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
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($categories as $category)
                                    <tr>
                                        <td> {{ $loop->iteration }} </td>

                                        <td>{{ $category->name }}</td>


                                        <td>


                                            <div class="d-flex align-items-center">
                                                <a title="تعديل"  class="btn  btn-info " href="{{ route('category.edit', $category->id) }}">Edit</a>

                                                <div>
                                                    <a title="ازاله" class="btn  btn-danger m-3" href="javascript:void(0);" onclick="confirmDelete('{{ route('category.destroy', $category->id) }}')">Delete</a>
                                                </div>

                                            </div>
                                        </td>
                                    </tr>

                                @empty
                                    <tr>
                                        <th class="text-danger text-center">You don't have any data</th>
                                    </tr>
                                @endforelse




                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>



@endsection
@section('js')

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
<script>
    $('.modal-effect').on('click', function(e) {
    e.preventDefault();
    $($(this).attr('href')).modal('show');
});

</script>
