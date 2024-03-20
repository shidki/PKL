@extends("sistem_informasi.admin.main")
@section('main')
<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="assets/sistem_informasi/table/css/style.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
            #searchDinas::placeholder {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #888;
        opacity: 1;
        padding-left: 5px;
    }
                        #Gambar_penginapan{
            width: 100%;
            height: 400px;
        }
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
    background: #1ec73d;
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
            <div class="text-left mb-3">
                <span style="font-size: 20px; font-weight: bold;color: rgb(43, 75, 255);margin-left: 14px">DAFTAR PENGINAPAN</span>
            </div>
            <div class="text-right mr-3 mb-3">
                <a href="/add/penginapan" class="btn btn-success"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Tambah Penginapan</span></a>
            </div>
            {{-- POP UP FOTO PENGINAPAN --}}
            <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Foto Penginapan <strong><span id="nama_penginapan_modal2"></span></strong></h5>
                        </div>
                            <div class="modal-body" id="foto_penginapan_container">
                                
                            </div>
                            <div class="modal-footer" style="text-align: center">
                                <button type="submit" class="btn bg-danger" style="color: white" id="delete_gambar_penginapan" data-bs-dismiss="modal">Hapus</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            </div>
                    </div>
                </div>
            </div>
            {{-- END POP UP --}}
            <div class="col-lg-12 d-flex align-items-strech mb-4">
                <div class=" w-100">
                    <div class="-body">
                        <input style="border-radius: 50px;" type="text" class="form-control text-center" placeholder="&#xf002;   Cari nama penginapan" id="searchDinas">
                    </div>
                </div>
            </div>
            <div class="col-lg-12 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table" id="usersTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No<button style="border: none; background: transparent;" onclick="sortTable()"><i class="fa fa-sort text-light" style="font-size: 12px; margin-left: 3px;"></i></button></th>
                                            {{-- <th>Nama<button style="border: none; background: transparent;" onclick="sortTableName()"><i class="fa fa-sort text-light ml-2"></i></button></th> --}}
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            {{-- <th>No Telp</th> --}}
                                            <th>Foto</th>
                                            {{-- <th>Harga</th> --}}
                                            <th>Jarak</th>
                                            <th>Fasilitas</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($penginapan as $penginapans )
                                        <tr>
                                            <th scope="row" class="scope" width="100px">{{ $loop->iteration }}</th>
                                            <td class="text-left" style="width: 150px;">{{ $penginapans->nama }}</td>
                                            <td class="text-justify" style="width: 200px;">{{ $penginapans->alamat }}</td>
                                            {{-- <td class="text-center" style="width: 50px;">{{ $penginapans->telp }}</td> --}}
                                            <td class="text-center" style="width: 100px;">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" name="foto_penginapan" data-id="{{ json_encode(['gambar' => $penginapans->gambar,'id_penginapan' => $penginapans->id, 'nama' => $penginapans->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit menu" class="d-inline-block">
                                                    <i class="fa fa-camera" style="font-size: 15px;"></i>
                                                </button>
                                            </td>
                                            {{-- <td class="text-center" style="width: 80px;">Rp.{{ $penginapans->harga_terendah }} - Rp.{{ $penginapans->harga_tertinggi }}</td> --}}
                                            <td class="text-center" style="width: 80px;">{{ $penginapans->jarak }} <strong>Km</strong></td>
                                            <td style="width: 250px;">
                                                <ol>
                                                    @foreach ($fasilitas[$penginapans->id] as $fasilitass)
                                                    <li class="text-left" style=" display: flex;justify-content: space-between;"><span>{{ $loop->iteration }}. {{ $fasilitass->nama_fasilitas }}</span>
                                                        <span style=" display: flex;justify-content: space-between;">
                                                            <button style="border: none; background: transparent; color: red;" onclick="showDeleteFasilitas( '{{$fasilitass->id }}' )" class="d-inline-block" style="margin-right:28px;" title="Hapus Fasilitas" name="delete">
                                                                <i style="font-size: 15px" class="fa fa-trash"></i>
                                                            </button>
                                                            <button style="border: none; background: transparent; color: rgb(255, 0, 0); margin-left: 10px;" onclick="showDeleteConfirmationFasilitas( '{{$fasilitass->id_jenis_fasilitas }}' )" class="d-inline-block" style="margin-right:28px;" title="Hapus Fasilitas keseluruhan" name="delete">
                                                                <i style="font-size: 15px" class="fa fa-ban"></i>
                                                            </button>
                                                        </span>
                                                    </li>
                                                    @endforeach

                                                </ol>
                                            </td>
                                            <td style="width: 200px">
                                                {{-- <a href={{ route('delete_penginapan', ['id' => $penginapans->id]) }} class="d-inline-block mr-3" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </a> --}}
                                                <button style="border: none; background: transparent; color: red;" onclick="showDeleteConfirmation( '{{$penginapans->id }}' )" class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 15px" class="fa fa-trash"></i>
                                                </button>
                                                <a href={{ route('edit_penginapan' ,['id' => $penginapans->id ]) }} class="d-inline-block ml-3" title="edit" name="edit">
                                                    <i class="fa fa-pen" style="font-size: 15px"></i>
                                                </a>
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
    <script>
        function showDeleteConfirmationFasilitas(jenisfatilitasId) {
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger"
            },
            buttonsStyling: false
        });
      
        swalWithBootstrapButtons.fire({
            title: "Peringatan",
            text: "Hapus Fasilitas Ini Secara Keseluruhan ?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Setuju",
            cancelButtonText: "Batal",
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                deletejenisfatilitas(jenisfatilitasId);
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                swalWithBootstrapButtons.fire({
                    title: "Peringatan",
                    text: "Fasilitas gagal dihapus",
                    icon: "error"
                });
            }
        });
      }
      
      // Fungsi untuk menghapus admin
      function deletejenisfatilitas(jenisfatilitasId) {
        // Kirim permintaan AJAX ke controller untuk menghapus admin
        // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
        $.ajax({
            url: '/hapus_jenis_fasilitas/' + jenisfatilitasId,
            // console.log(url);
            type: 'GET',
            success: function (response) {
                // Tampilkan SweetAlert sukses setelah menghapus
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: "btn btn-success"
                    },
                    buttonsStyling: false
                });
      
                swalWithBootstrapButtons.fire({
                    title: "Fasilitas Berhasil Dihapus",
                    text: response.sukses_delete,
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload();
                    }
                });
      
                // Di sini, Anda dapat memutuskan apa yang harus dilakukan setelah menghapus,
                // seperti me-refresh halaman atau menghapus elemen dari DOM, dll.
            },
            error: function (error) {
                console.error("Error deleting admin:", error);
            }
        });
      }
      </script>
    <script>
        var staticBackdrop3 = document.getElementById('staticBackdrop3');
        staticBackdrop3.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var NamaInstansi = staticBackdrop3.querySelector('#nama_penginapan_modal2');
            NamaInstansi.textContent = parsedDataId.nama;

            var fotoPenginapanCont = staticBackdrop3.querySelector('#foto_penginapan_container');
            var delete_gambar_penginapan = staticBackdrop3.querySelector('#delete_gambar_penginapan');
            console.log(parsedDataId.id_penginapan);
            if(parsedDataId.gambar !== null){
                var img = document.createElement("img"); // Perbaikan: Penggunaan createElement
                img.src = "{{ asset('') }}" + parsedDataId.gambar;
                img.setAttribute('id','Gambar_penginapan');
                fotoPenginapanCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotoPenginapanCont.appendChild(img);
                delete_gambar_penginapan.setAttribute('onclick','showDeleteGambar("__id_penginapan_")'.replace('__id_penginapan_', parsedDataId.id_penginapan));

            }else{
                var h3 = document.createElement("h3"); // Perbaikan: Penggunaan createElement
                h3.textContent = "Belum Ada Gambar"
                h3.setAttribute('class','text-center text-danger');
                fotoPenginapanCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotoPenginapanCont.appendChild(h3);
            }
        });
        function showDeleteGambar(id) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
            console.log('warung = ' + id);
            swalWithBootstrapButtons.fire({
                title: "Peringatan",
                text: "Hapus Gambar ini ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteGambarPenginapan(id);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Gambar gagal dihapus",
                        icon: "error"
                    });
                }
            });
        };
        function deleteGambarPenginapan(idPenginapan) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            console.log('warung1 = ' + idPenginapan);
            $.ajax({
                url: '/delete_gambar_penginapan/' + idPenginapan,  
                // console.log(url);
                type: 'GET',
                success: function (response) {
                    // Tampilkan SweetAlert sukses setelah menghapus
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success"
                        },
                        buttonsStyling: false
                    });
    
                    swalWithBootstrapButtons.fire({
                        title: "Data Berhasil Dihapus!",
                        text: response.sukses_delete,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
                },
                error: function (error) {
                    console.error("Error deleting admin:", error);
                }
            });
        };
        // Fungsi untuk menampilkan SweetAlert
        function showDeleteConfirmation(penginapanId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
    
            swalWithBootstrapButtons.fire({
                title: "Peringatan",
                text: "Hapus Penginapan ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deletePenginapan(penginapanId);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Penginapan gagal dihapus",
                        icon: "error"
                    });
                }
            });
        }
    
        // Fungsi untuk menghapus admin
        function deletePenginapan(penginapanId) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            $.ajax({
                url: '/delete/penginapan/' + penginapanId,
                // console.log(url);
                type: 'GET',
                success: function (response) {
                    // Tampilkan SweetAlert sukses setelah menghapus
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success"
                        },
                        buttonsStyling: false
                    });
    
                    swalWithBootstrapButtons.fire({
                        title: "Data Berhasil Dihapus!",
                        text: response.sukses_delete,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
    
                    // Di sini, Anda dapat memutuskan apa yang harus dilakukan setelah menghapus,
                    // seperti me-refresh halaman atau menghapus elemen dari DOM, dll.
                },
                error: function (error) {
                    console.error("Error deleting admin:", error);
                }
            });
        }
    </script>
    <script>
        // Fungsi untuk menampilkan SweetAlert
        function showDeleteFasilitas(fasilitasId) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
    
            swalWithBootstrapButtons.fire({
                title: "Peringatan",
                text: "Hapus fasilitas ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteFasilitas(fasilitasId);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Fasilitas gagal dihapus",
                        icon: "error"
                    });
                }
            });
        }
    
        // Fungsi untuk menghapus admin
        function deleteFasilitas(fasilitasId) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            $.ajax({
                url: '/hapus_fasilitas/' + fasilitasId,
                // console.log(url);
                type: 'GET',
                success: function (response) {
                    // Tampilkan SweetAlert sukses setelah menghapus
                    const swalWithBootstrapButtons = Swal.mixin({
                        customClass: {
                            confirmButton: "btn btn-success"
                        },
                        buttonsStyling: false
                    });
    
                    swalWithBootstrapButtons.fire({
                        title: "Data Berhasil Dihapus!",
                        text: response.sukses_delete,
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    });
    
                    // Di sini, Anda dapat memutuskan apa yang harus dilakukan setelah menghapus,
                    // seperti me-refresh halaman atau menghapus elemen dari DOM, dll.
                },
                error: function (error) {
                    console.error("Error deleting admin:", error);
                }
            });
        }
    </script>

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


    <script src="assets/sistem_informasi/table/js/jquery.min.js"></script>
    <script src="assets/sistem_informasi/table/js/popper.js"></script>
    <script src="assets/sistem_informasi/table/js/bootstrap.min.js"></script>
    <script src="assets/sistem_informasi/table/js/main.js"></script>
    <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    {{-- search Dinas --}}
    <script>
        // untuk sesuai Dinas
        document.addEventListener('DOMContentLoaded', function () {
        var searchDinasInput = document.getElementById('searchDinas');
        var usersTable = document.getElementById('usersTable');
        var rows = usersTable.getElementsByTagName('tr');

        searchDinasInput.addEventListener('input', function () {
            var filter = searchDinasInput.value.toLowerCase();

            for (var i = 1; i < rows.length; i++) {
                var emailColumn = rows[i].getElementsByTagName('td')[0];

                if (emailColumn) {
                    var emailText = emailColumn.textContent || emailColumn.innerText;

                    if (emailText.toLowerCase().indexOf(filter) > -1) {
                        rows[i].style.display = '';
                    } else {
                        rows[i].style.display = 'none';
                    }
                }
            }
        });
    });
    </script>
    <script>
        let ascendingOrder = true;
    
        function sortTable() {
            const table = document.getElementById('usersTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1); // Exclude the header row
    
            rows.sort((a, b) => {
                const valueA = parseInt(a.cells[0].textContent);
                const valueB = parseInt(b.cells[0].textContent);
    
                if (ascendingOrder) {
                    return valueA - valueB;
                } else {
                    return valueB - valueA;
                }
            });
    
            // Update the table with the sorted rows
            rows.forEach(row => table.tBodies[0].appendChild(row));
    
            // Toggle sorting order and update the sort icon
            ascendingOrder = !ascendingOrder;
            const sortIcon = document.getElementById('sortIcon');
            sortIcon.className = ascendingOrder ? 'fa fa-sort-asc text-light ml-2' : 'fa fa-sort-desc text-light ml-2';
        }

        function sortTableName() {
            const table = document.getElementById('usersTable');
            const rows = Array.from(table.getElementsByTagName('tr')).slice(1); // Exclude the header row

            rows.sort((a, b) => {
                const valueA = a.cells[2].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari Username
                const valueB = b.cells[2].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari Username

                if (ascendingOrder) {
                    return valueA.localeCompare(valueB);
                } else {
                    return valueB.localeCompare(valueA);
                }
            });

            // Update the table with the sorted rows
            rows.forEach(row => table.tBodies[0].appendChild(row));

            // Toggle sorting order and update the sort icon
            ascendingOrder = !ascendingOrder;
            const sortIcon = document.getElementById('sortIcon');
            sortIcon.className = ascendingOrder ? 'fa fa-sort-asc text-light ml-2' : 'fa fa-sort-desc text-light ml-2';
        }
    </script>
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
@if (session('sukses_add'))
<script>
    Swal.fire({
    title: "Berhasil menambah data",
    icon: "success"
    });
</script>
@endif
@if (session('error_add'))
<script>
    Swal.fire({
    title: "Gagal menambah data",
    icon: "error"
    });
</script>
@endif
@if (session('sukses_delete'))
<script>
    Swal.fire({
    title: "Berhasil menghapus data",
    icon: "success"
    });
</script>
@endif
@if (session('error_delete'))
<script>
    Swal.fire({
    title: "Gagal menghapus data",
    icon: "error"
    });
</script>
@endif
@if (session('sukses_edit'))
<script>
    Swal.fire({
    title: "Data berhasil di edit",
    icon: "success"
    });
</script>
@endif
@if (session('error_edit'))
<script>
    Swal.fire({
    title: "Data gagal di edit",
    icon: "error"
    });
</script>
@endif

</body>

</html>
@endsection