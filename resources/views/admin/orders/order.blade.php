@extends('admin.include.master')
@section('title')

    {{-- <style>
        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: middle;
        }

        .table th {
            background-color: #f2f2f2;
            color: #333;
            font-weight: bold;
        }

        .text-center {
            text-align: center;
        }

        .table .text-primary {
            color: #007bff;
        }

        .table .text-danger {
            color: #dc3545;
        }

        .table .text-success {
            color: #28a745;
        }

        .table img {
            width: 80px;
            height: auto;
            border-radius: 10%;
        }

        .table-actions {
            display: flex;
            justify-content: center;
        }

        .table-actions a {
            margin: 0 5px;
        }
    </style> --}}


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
                <h3 class="content-title mb-0 my-auto text-center"> All-Orders</h3><span
                    class="text-muted mt-1 tx-13 mr-2 mb-0">
                </span>
                <a class="btn btn-primary btn-lg" href="{{ route('home') }}" style="padding: 12px 24px;">Back</a>

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
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">


                        <table id="example1" class="table key-buttons text-md-nowrap">
                            <thead>
                                <tr class="text-center">
                                    <th class="border-bottom-0">Num</th>
                                    <th class="border-bottom-0">Name</th>
                                    <th class="border-bottom-0">Email</th>
                                    <th class="border-bottom-0">Phone</th>
                                    <th class="border-bottom-0">Address</th>
                                    <th class="border-bottom-0">Price</th>
                                    <th class="border-bottom-0">Quantity</th>
                                    <th class="border-bottom-0">Product_Name</th>
                                    <th class="border-bottom-0">Delivery Status</th>
                                    <th class="border-bottom-0">Photo</th>
                                    <th class="border-bottom-0">Delivered</th>
                                    <th class="border-bottom-0">Action</th>
                                    <th class="border-bottom-0">Send Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $item)
                                    <tr class="text-center">
                                        <td> {{ $loop->iteration }} </td>
                                        <td>{{ $item->name }}</td>
                                        <td class="text-primary">{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td>{{ $item->address }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->product_name }}</td>
                                        <td
                                            class="{{ $item->delivery_status == 'Delivered' ? 'text-success' : 'text-danger' }}">
                                            {{ $item->delivery_status }}
                                        </td>
                                        <td>
                                            @if ($item->product && $item->product->hasMedia('photo'))
                                                <img src="{{ $item->product->getFirstMediaUrl('photo') }}"
                                                    alt="{{ $item->product_name }}"
                                                    style="width:40%; height:auto; border-radius: 20%;">
                                            @else
                                                <span>الصورة غير متوفرة</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->delivery_status == 'processing')
                                                <a class="btn btn-sm btn-primary"
                                                    href="{{ route('order.delivered', $item->id) }}"
                                                    onclick="return confirm('Are you sure this product is delivered !!!')">Delivered</a>
                                            @else
                                                <p>Delivered</p>
                                            @endif
                                        </td>
                                        <td>
                                            <a title="ازاله" class="btn btn-sm btn-danger mr-2" href="javascript:void(0);"
                                                onclick="confirmDelete('{{ route('order.destroy', $item->id) }}')">Delete</a>
                                        </td>
                                        <td>
                                            <a href="{{ route('send_email', $item->id) }}" class="btn btn-sm btn-info">Send
                                                Email</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <th class="text-danger text-center">لا يوجد لديك اية طلبات</th>
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

@section('js')
    <script src="{{ asset('admin/assets/plugins/datatable/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/plugins/datatable/js/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            var table = $('#example1').DataTable({
                "pageLength": 5,
                "language": {
                    "lengthMenu": "عرض _MENU_ صفوف",
                    "info": "عرض _START_ إلى _END_ من أصل _TOTAL_ صف",
                    "paginate": {
                        "first": "الأول",
                        "last": "الأخير",
                        "next": "التالي",
                        "previous": "السابق"
                    }
                },
                "dom": "lrtip"
            });

            function showErrorMessage(message) {
                $('#noResultMessage').text(message).show();
            }

            function hideErrorMessage() {
                $('#noResultMessage').hide();
            }

            $('#searchByName').on('keyup', function() {
                table.column(1).search(this.value).draw();
                checkResults();
            });

            $('#searchByPhone').on('keyup', function() {
                table.column(2).search(this.value).draw();
                checkResults();
            });

            $('#searchByAddress').on('keyup', function() {
                table.column(3).search(this.value).draw();
                checkResults();
            });

            function checkResults() {
                if (table.rows({ search: 'applied' }).count() === 0) {
                    showErrorMessage("لا يوجد عميل مطابق لهذا البحث.");
                } else {
                    hideErrorMessage();
                }
            }
        });
    </script>
@endsection


