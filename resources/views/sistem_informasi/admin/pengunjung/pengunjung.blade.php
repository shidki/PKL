@extends("sistem_informasi.admin.main")
@section('main')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <link rel="stylesheet" href="{{asset('assets/sistem_informasi/table/css/style.css') }}">
    <style>
        #toastBox {
    position: fixed;
    bottom: 30px;
    right: 30px;
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    overflow: hidden;
    }
    
    .toastt {
    width: 300px;
    color: rgb(255, 255, 255);
    height: 80px;
    font-weight: bold;
    background: #38ff5d;
    font-weight: 500;
    font-size: 12px;
    border-top: 1px solid black;
    border-left: 1px solid black;
    border-right: 1px solid black;
    box-shadow: 0 0 20px rgb(0, 0, 0, .6);
    display: flex;
    align-items: center;
    }
    
    .toastt i {
    margin: 0 20px;
    font-size: 35px;
    color: red;
    }
    
    .toastt.errortoast i {
    margin: 0 20px;
    font-size: 22px;
    color: red;
    }
    
    .toastt.sukses i {
    margin: 0 20px;
    font-size: 22px;
    color: green;
    }
    
    .toastt::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 100%;
    height: 5px;
    background: red;
    animation: anim 5s linear forwards;
    }
    
    @keyframes anim {
    100% {
        width: 0;
    }
    }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="text-right mr-3 mb-3">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Add Pengunjung</span></button>
            </div>
            {{-- POP UP ADD KUNJUNGAN --}}
            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Add Pengunjung</h5>
                        </div>
                        <form action="/add/pengunjung" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="nama">Nama :</label>
                                    <input id="nama" type="text" class="form-control" placeholder="Nama Pengunjung" required name="nama">
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Tujuan :</label>
                                    <input id="tujuan" type="text" class="form-control" placeholder="Tujuan Pengunjung" required name="tujuan">
                                </div>
                                <div class="form-group">
                                    <label for="dinas">Dinas Tujuan :</label>
                                    <select name="dinas" id="dinas" name="dinas" class="form-select" aria-label="Default select example" required>
                                        <option value="">Select</option>
                                        @foreach ($gedung as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tgl_kunjungan">Tanggal Kunjungan</label>
                                    <input id="before_buat" type="date" class="form-control" name="tgl_kunjungan" required>
                                </div>
                            </div>
                            <div class="modal-footer" style="text-align: center">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Confirm</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            {{-- END POP UP --}}
            
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Pengunjung</th>
                                            <th>Tujuan</th>
                                            <th>Dinas Tujuan</th>
                                            <th>Jadwal Kunjungan<br><strong>( YYYY-MM-DD )</strong></th>
                                            <th>Status</th>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($pengunjung as $pengunjungs )
                                        <tr>
                                            <th scope="row" class="scope">{{ $loop->iteration }}</th>
                                            <td class="text-center" width="150px">{{ $pengunjungs->nama }}</td>
                                            <td class="text-justify" style="width: 200px;">{{ $pengunjungs->nama_tujuan }}</td>
                                            <td class="text-justify" style="width: 300px;">{{ $pengunjungs->lokasi_tujuan }}</td>
                                            <td class="text-center" style="width: 260px;">{{ $pengunjungs->jadwal_kunjungan }}</td>
                                            <td class="text-center" style="width: 150px;">{{ $pengunjungs->status }}</td>
                                            <td style="width: 300px">
                                                <a href={{ route('delete_pengunjung' , ['id' => $pengunjungs->id_tujuan]) }} class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </a>
                                                @if ($pengunjungs->status == "confirmed")
                                                    <i class="fa fa-pencil d-inline-block" style="font-size: 20px;"></i>
                                                    <i class="fa fa-check d-inline-block" style="font-size: 20px; margin-left:25px;"></i>
                                                @else
                                                <a href={{ route('edit_pengunjung' ,['id' => $pengunjungs->id_tujuan ]) }} class="d-inline-block" title="edit" name="edit">
                                                    <i class="fa fa-pencil" style="font-size: 20px"></i>
                                                </a>
                                                <a href={{ route('confirm_pengunjung' ,['id' => $pengunjungs->id_tujuan ]) }} class="d-inline-block" style="margin-left:25px;" title="confirm" name="confirm">
                                                    <i class="fa fa-check" style="font-size: 20px"></i>
                                                </a>
                                                @endif
                                            </td>                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="d-flex" style="justify-content: space-between">
            <i class="fa fa-arrow-left ml-5  btn-arrow" id="prev-page" style="font-size: 30px"></i>
            <div></div>
            <i class="fa fa-arrow-right mr-5  btn-arrow" id="next-page" style="font-size: 30px"></i>
        </div>
    </section>
    <div id="toastBox">
    </div>

    @if ($massage = Session::get('error_toast'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            setTimeout(() => {
                toast.remove();
            }, 3500);
        </script>
    @endif
@if ($massage = Session::get('sukses_toast'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            setTimeout(() => {
                toast.remove();
            }, 3500);
        </script>
    @endif


    <script src="{{asset('assets/sistem_informasi/table/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/popper.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/sistem_informasi/table/js/main.js')}}"></script>
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    $(document).ready(function () {
        // Set the number of rows to display per page
        var rowsPerPage = 5;

        // Hide all rows beyond the specified limit
        $('tbody tr').hide();
        $('tbody tr:lt(' + rowsPerPage + ')').show();

        // Add pagination controls
        var currentPage = 1;
        var totalRows = $('tbody tr').length;
        var totalPages = Math.ceil(totalRows / rowsPerPage);

        // Display pagination controls
        function displayPaginationControls() {
            $('#pagination-controls').html('Page ' + currentPage + ' of ' + totalPages);
        }

        displayPaginationControls();

        // Handle next button click
        $('#next-page').on('click', function () {
            if (currentPage < totalPages) {
                $('tbody tr').hide();
                var start = (currentPage * rowsPerPage);
                var end = start + rowsPerPage;
                $('tbody tr').slice(start, end).show();
                currentPage++;
                displayPaginationControls();
            }
        });

        // Handle previous button click
        $('#prev-page').on('click', function () {
            if (currentPage > 1) {
                currentPage--;
                var start = ((currentPage - 1) * rowsPerPage);
                var end = start + rowsPerPage;
                $('tbody tr').hide();
                $('tbody tr').slice(start, end).show();
                displayPaginationControls();
            }
        });
    });
</script>
<script>
    var staticBackdrop = document.getElementById('staticBackdrop')
    staticBackdrop.addEventListener('show.bs.modal', function (event) {
        var button = event.relatedTarget
        var dataId = button.getAttribute('data-id')
        // Mengisi placeholder pada data dengan data sesuai dengan ID dari data yang di klik
        var nama = exampleModal.querySelector('.nama input')
        var jabatan = exampleModal.querySelector('.jabatan input')
        var sip = exampleModal.querySelector('.sip input')
        var tanggal_buat_sip = exampleModal.querySelector('.tanggal_buat_sip input')
        var exp_sip = exampleModal.querySelector('.exp_sip input')
        nama.value = dataId.nama
        jabatan.value = dataId.jabatan
        sip.value = dataId.sip
        tanggal_buat_sip.value = dataId.tanggal_buat_sip
        exp_sip.value = dataId.exp_sip
    })
</script>

</body>

</html>
@endsection