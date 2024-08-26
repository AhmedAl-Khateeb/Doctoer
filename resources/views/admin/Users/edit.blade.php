@extends('layouts.master')
@section('css')
    <!--- Internal Select2 css-->
    <link href="{{ URL::asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet">
    <!---Internal Fileupload css-->
    <link href="{{ URL::asset('assets/plugins/fileuploads/css/fileupload.css') }}" rel="stylesheet" type="text/css" />
    <!---Internal Fancy uploader css-->
    <link href="{{ URL::asset('assets/plugins/fancyuploder/fancy_fileupload.css') }}" rel="stylesheet" />
    <!--Internal Sumoselect css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/sumoselect/sumoselect-rtl.css') }}">
    <!--Internal  TelephoneInput css-->
    <link rel="stylesheet" href="{{ URL::asset('assets/plugins/telephoneinput/telephoneinput-rtl.css') }}">
@endsection
@section('title')
    Update
@stop
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Users</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Update</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')

  @section('content')
  <!-- row -->
{{--
  <div class="d-flex justify-content-between">
    <div class="col-sm-6 col-md-4 col-xl-3 mg-t-20 mg-xl-t-0">
        <a class="btn btn-danger" href="{{ route('admin.users.update',$user->id) }}">Update </a>
    </div>
</div> --}}



  {{-- <div class="row"> --}}
    <main id="main" class="main">
    <section class="section">
        <div class="container">
      <div class="row">
        <div class="col-md-6 col-12 mb-2">
          <div class="card">
            <div class="card-body">

    <form method="POST" action="{{route('admin.users.update',$user->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="form-group">

                <label >Name</label>
                <input type="text" class="form-control" value="{{$user->name}}" id="inputName" name="name">

        </div>

            <div class="form-group">
                <label>Email</label>
                <input value="{{$user->email}}" class="form-control"  name="email" type="email" >
            </div>

            <div class="form-group my-2">
                <label>Password</label>
                <input type="text" value="{{$user->password}}" name="password" class="form-control">
            </div>


            <div class="form-group my-2">
                <input type="radio" name="status" value="doctoer"> doctoer
                <br>
                <input type="radio" name="status"  value="patient"> patient
            </div>
        {{-- </div> --}}

        <div class="d-grid my-3">
            <button type="submit" class="btn btn-warning">Update</button>
        </div>


      </form><!-- End General Form Elements -->
          </div>
        </div>
      </div>
        </div>
    </section>
    </main>

  </div>
  <!-- row closed -->
</div>
<!-- Container closed -->
</div>
<!-- main-content closed -->
@endsection
@section('js')

    <!-- Internal Select2 js-->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <!--Internal Fileuploads js-->
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fileuploads/js/file-upload.js') }}"></script>
    <!--Internal Fancy uploader js-->
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.ui.widget.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.iframe-transport.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/jquery.fancy-fileupload.js') }}"></script>
    <script src="{{ URL::asset('assets/plugins/fancyuploder/fancy-uploader.js') }}"></script>
    <!--Internal  Form-elements js-->
    <script src="{{ URL::asset('assets/js/advanced-form-elements.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.js') }}"></script>
    <!--Internal Sumoselect js-->
    <script src="{{ URL::asset('assets/plugins/sumoselect/jquery.sumoselect.js') }}"></script>
    <!--Internal  Datepicker js -->
    <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
    <!--Internal  jquery.maskedinput js -->
    <script src="{{ URL::asset('assets/plugins/jquery.maskedinput/jquery.maskedinput.js') }}"></script>
    <!--Internal  spectrum-colorpicker js -->
    <script src="{{ URL::asset('assets/plugins/spectrum-colorpicker/spectrum.js') }}"></script>
    <!-- Internal form-elements js -->
    <script src="{{ URL::asset('assets/js/form-elements.js') }}"></script>

@endsection