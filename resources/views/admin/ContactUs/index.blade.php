@extends('admin.include.master')
@section('title')


@stop

@section('css')
    <link href="{{ asset('admin/assets/plugins/datatable/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/buttons.bootstrap4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatable/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/plugins/datatable/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/datatable/css/responsive.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
@endsection
@section('page-header')
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto"> ContactUs</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">
                </span>
            </div>
        </div>

    </div>
@endsection
@section('content')



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




    @if (session()->has('delete'))
        <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
            <strong> {{ session()->get('delete') }} </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <script>
        setTimeout(function() {
            $('.alert').fadeOut('slow');
        }, 3000);
    </script>

    <div class="row">


        <div class="col-xl-12">
            <div class="card mg-b-20">
                <div class="card-header pb-0">
                    <div class="d-flex justify-content-between">
                        <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">

                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example1" class="table key-buttons text-md-nowrap" data-page-length='5'>
                            <thead>
                                <tr class="text-center">
                                    <th class="border-bottom-0">Num</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Subject</th>
                                    <th class="border-bottom-0">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($messages as $item)
                                    <tr class="text-center">
                                        <td> {{ $loop->iteration }} </td>

                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->subject }}</td>
                                        <td class="text-center">
                                            <div class="d-flex justify-content-center align-items-center gap-2">
                                                <a title="عرض الرسالة" href="{{ route('contact.show', $item->id) }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-eye"></i> Show
                                                </a>

                                                <form action="{{ route('contact.destroy', $item->id) }}" method="POST" onsubmit="return confirmDelete();">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash-alt"></i> Delete
                                                    </button>
                                                </form>
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
