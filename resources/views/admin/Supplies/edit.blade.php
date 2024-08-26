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
    Update-Supplies
@stop
@section('page-header')
    <!-- breadcrumb -->
    <div class="breadcrumb-header justify-content-between">
        <div class="my-auto">
            <div class="d-flex">
                <h4 class="content-title mb-0 my-auto">Supplies</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/
                    Update-Supplies</span>
            </div>
        </div>
    </div>
    <!-- breadcrumb -->
@endsection
@section('content')


    <!-- row -->
    {{-- <div class="row"> --}}

    <main id="main" class="main">
        <section class="section">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-12 mb-2">
                        <div class="card">
                            <div class="card-body">


                                <form method="POST" action="{{ route('admin.supplies.update',$supplies->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf


                                        <h3 class="text-center text-primary">Update your medical supplies you want</h3>
                                        <div class="form-group my-2">
                                            <label>Supplies</label>
                                            <textarea type="text" name="supplies" value="{{$supplies->supplies}}" class="form-control  @error('supplies') is-invalid @enderror" ></textarea>
                                        </div>


                                        <h5 class="text-center text-info">put your location</h5>

                                        <div class="form-group my-2">
                                            <label>State</label>
                                            <input type="text" name="state" value="{{$supplies->state}}"  class="form-control @error('state') is-invalid @enderror" >
                                        </div>

                                        <div class="form-group my-2">
                                            <label>Street</label>
                                            <input type="text" name="street" value="{{$supplies->street}}"  class="form-control @error('street') is-invalid @enderror">
                                        </div>

                                        <div class="form-group my-2">
                                            <label>PLZcode</label>
                                            <input type="number" name="PLZcode" value="{{$supplies->PLZcode}}"  class="form-control @error('PLZcode') is-invalid @enderror">
                                        </div>

                                        <div class="form-group my-2">
                                            <label>your WhatsApp</label>
                                            <input type="text" name="yourWhatsApp" value="{{$supplies->yourWhatsApp}}"  class="form-control @error('yourWhatsApp') is-invalid @enderror">
                                        </div>


                                    <div class="d-grid gap-2 my-3">
                                        <button type="submit" class="btn btn-warning">Update</button>
                                    </div>


                                </form><!-- End General Form Elements -->
                            </div>
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
