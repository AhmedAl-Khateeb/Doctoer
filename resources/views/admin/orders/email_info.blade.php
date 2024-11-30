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
{{-- @section('page-header') --}}

@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <a class="btn btn-primary btn-lg" href="{{ route('home') }}" style="padding: 12px 24px;">Back</a>
                </span>
            </div>
        </div>

    </div>
@endsection

@section('content')





        <h1 class="text-black text-center py-2"> Send Email to {{ $order->email }}</h1>
<div class="d-flex justify-content-center mt-5">
    <div class="container col-8">
        <div class="card">
            <div class="card-body">

      <form action="{{ route('send_user_email',$order->id) }}" method="POST" class="container mt-5" style="max-width: 600px;">
        @csrf
        <div class="form-group mb-4">
            <label for="greeting">Email Greeting:</label>
            <input type="text" name="greeting" id="greeting" class="form-control" placeholder="Enter email greeting">
        </div>

        <div class="form-group mb-4">
            <label for="firstling">Email First Line:</label>
            <input type="text" name="firstling" id="firstling" class="form-control" placeholder="Enter first line">
        </div>

        <div class="form-group mb-4">
            <label for="body">Email Body:</label>
            <textarea name="body" id="body" class="form-control" rows="4" placeholder="Enter email body"></textarea>
        </div>

        <div class="form-group mb-4">
            <label for="button">Email Button Name:</label>
            <input type="text" name="button" id="button" class="form-control" placeholder="Enter button text">
        </div>

        <div class="form-group mb-4">
            <label for="url">Email URL:</label>
            <input type="url" name="url" id="url" class="form-control" placeholder="Enter URL">
        </div>

        <div class="form-group mb-4">
            <label for="lasttling">Email Last Line:</label>
            <input type="text" name="lasttling" id="lasttling" class="form-control" placeholder="Enter last line">
        </div>

        <div class="text-center mt-4">
            <input type="submit" value="Send Email" class="btn btn-primary px-4">
        </div>
    </form>
            </div>
        </div>
    </div>
</div>




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
    <!--Internal  Datatable js -->
    <script src="{{ asset('admin/assets/js/table-data.js') }}"></script>
    <!-- Internal Modal js-->
    <script src="{{ asset('admin/assets/js/modal.js') }}"></script>


@endsection
<script>
    function confirmDelete(url) {
        if (confirm('هل انت متأكد من عملية الحذف?')) {
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
