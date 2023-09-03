@vite('resources/js/app.js')
@include('frontend.header')
@include('frontend.navbar')
<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}" />
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" />
<!-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" /> -->
<!-- <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" /> -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<div class="container">
    <div class="riwayat">
        <h2 class="riwayat-title">Riwayat Pemesanan</h2>
        <h6 class="riwayat-sub-title">Kelola Pesanan dan Faktur Anda</h6>
        <hr size="5px">
        </hr>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-10 col-md-8">
            <h2 class="riwayat-title">Detail Pemesanan</h2>
            <h6 class="riwayat-sub-title">Review and Manage Detail Order</h6>
        </div>
        <div class="col-2 col-md-4 p-0 download-sub d-flex align-items-center justify-content-right">
            <div class="input-group">
                <button class="btn btn-primary mobile-riwayat" type="submit"><i class="fa fa-cloud-download"
                        aria-hidden="true"></i>
                </button>
            </div>
            <div class="input-group">
                <button class="btn btn-primary riwayat" type="submit"><i class="fa fa-cloud-download"
                        aria-hidden="true"></i>
                    Download</button>
            </div>
        </div>
    </div>
</div>
<div class="container table-riwayat">
    <div class="table-responsive riwayat">
        <table class="table table-responsive table-borderless bg-white table-hover" id="myTable">
            <thead>
                <tr class="bg-light riwayat">
                    <th scope="col" width="5%"><input class="form-check-input" type="checkbox"></th>
                    <th scope="col" width="5%">Invoice</th>
                    <th scope="col" style="text-align: center" width="20%">Tanggal Pemesanan</th>
                    <th scope="col" width="10%">Status</th>
                    <th scope="col" style="text-align: center" width="20%">Customer</th>
                    <th scope="col" width="5%"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row"><input class="form-check-input" type="checkbox"></th>
                    <td>12</td>
                    <td>1 Oct, 21</td>
                    <td><i class="fa-regular fa-circle-check"></i><span class="ms-1" style="color: green;">Paid</span>
                    </td>
                    <td>
                        <div class="row">
                            <div class="col-lg-4 d-none d-lg-block "><img src="{{ asset('assets/pict/logo-cust.png') }}"
                                    class="icon-table">
                            </div>
                            <div class="col-12 col-lg-8" style="padding-left: 0px">
                                <h6 class="font-riwayat">Ulfiatun Hasanah</h6>
                                <h6 class="font-sub-riwayat">iniemailnyaulfi@gmail.com</h6>
                            </div>
                        </div>
                    </td>
                    <td style="text-align: end">
                        <div class="dropdown">
                            <i class="fa fa-ellipsis-v riwayat" aria-hidden="true"></i>
                        </div>
                    </td>
                </tr>

            </tbody>
        </table>
    </div>
</div>
</div>
<!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/datatable/datatables.min.css') }}" />
<script type="text/javascript" src="{{ asset('assets/datatable/datatables.min.js') }}"></script>
<div class="container">
    <div class="riwayat pt-3">
        <h2>Riwayat Pemesanan</h2>
        <h5>Kelola Pesanan dan Faktur Anda</h5>
        <hr size="4px">
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h3>Detail Pemesanan</h3>
            <h6>Review and Manage Detail Order</h6>
        </div>
        <div class="col-md-4 cari-sub d-flex align-items-center">
            <div class="input-group">
                <button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                <input class="form-control" placeholder="Search" type="text" name="subscribe" id="subscribe">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
        <div class="col-md-4 download-sub d-flex align-items-center">
            <div class="input-group">
                <button class="btn btn-primary" type="submit"><i class="fa fa-cloud-download" aria-hidden="true"></i> Download</button>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <table class="table table-hover bg-white">
        <thead>
            <tr>
                <th scope="col">Invoice</th>
                <th scope="col">Tanggal Pemesanan</th>
                <th scope="col">Status</th>
                <th scope="col">Customer</th>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>
                    <div class="dropdown">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>Thornton</td>
                <td>@fat</td>
                <td>
                    <div class="dropdown">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>Larry the Bird</td>
                <td>@twitter</td>
                <td>
                    <div class="dropdown">
                        <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
<div class="container">
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Sebelumnya</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#">Selanjutnya</a>
            </li>
        </ul>
    </nav>
</div> -->
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
    });
</script>
