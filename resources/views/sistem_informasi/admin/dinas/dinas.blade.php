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
    <style>
        #Gambar_instansi{
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
    #searchDinas::placeholder {
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        color: #888;
        opacity: 1;
        padding-left: 5px;
    }
    </style>
</head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="text-left mb-3">
                <span style="font-size: 20px; font-weight: bold;color: rgb(43, 75, 255);margin-left: 14px">Instansi / Daftar Instansi</span>
            </div>
            <div class="text-right mr-3 mb-3">
                <a href="/add_dinas" class="btn btn-success"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Tambah Instansi</span></a>
            </div>
            {{-- POP UP LIST LAYANAN --}}
           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">List Layanan <strong><span id="nama_dinas_modal"></span></strong></h5>
                    </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Layanan :</label>
                                <div id="layananList"></div>
                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                </div>
            </div>
        </div>
        {{-- END POP UP --}}
        {{-- POP UP FOTO INSTANSI --}}
        <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Foto Instansi <strong><span id="nama_dinas_modal2"></span></strong></h5>
                    </div>
                        <div class="modal-body" id="foto_instansi_container">
                            
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="submit" class="btn bg-danger" style="color: white" id="delete_gambar_instansi" data-bs-dismiss="modal">Hapus</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                </div>
            </div>
        </div>
        {{-- END POP UP --}}
        <div class="modal fade" id="deskripsi_instansi_container" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Deskripsi Instansi <strong><span id="nama_dinas_modal2"></span></strong></h5>
                    </div>
                        <div class="modal-body" id="deskripsi_instansi">
                            
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- END POP UP --}}

        {{-- POP UP EDIT LAYANAN --}}
       <div class="modal fade" style="overflow-y: auto;" id="editLayanan" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editLayananTabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content" >
                <div class="modal-header">
                    <h5 class="modal-title" id="editLayananTabel">Edit Layanan <strong><span id="nama_dinas_modal"></span></strong></h5>
                </div>
                    <form action="/edit_layanan" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="Id_layanan">Id Layanan :</label>
                                <input id="id_layanan" type="text" class="form-control"  readonly name="id_layanan">
                            </div>
                            <div class="form-group">
                                <label for="nama_instansi">Nama Instansi :</label>
                                <input id="nama_instansi" type="text" class="form-control"  readonly name="nama_instansi">
                            </div>
                            <div class="form-group">
                                Deskripsi : <pre id="deskripsi_layanan_sebelumnya"></pre>
                                <label for="deskripsiLayanan" class="form-label">Deskripsi Layanan</label>
                                <textarea class="form-control" id="deskripsiLayanan" name="deskripsiLayanan" rows="3"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="judul_gambar_detail">Judul Gambar :</label>
                                <input id="judul_gambar_detail" type="text" class="form-control"  required name="judul_gambar_detail">
                            </div>
                            <div class="form-group">
                                <strong>Detail Layanan ( gambar ) :</strong> <br>
                                gambar sebelumnya :  
                                <div id="gambar_container" class="mb-3">

                                </div>
                                <input type="file" accept="image/*" id="detail" name="detail_layanan_gambar">
                            </div>
                            <div class="form-group">
                                <label for="nama_layanan">Nama Layanan :</label>
                                <input id="nama_layanan" type="text" class="form-control"  required name="nama_layanan">
                            </div>
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Kembali</button>
                            <button type="submit" class="btn btn-primary">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- END POP UP --}}
            <div class="col-lg-12 d-flex align-items-strech mb-4">
                <div class="w-100">
                    <div class="">
                        <input style="border-radius: 50px;" type="text" class="form-control text-center" placeholder="&#xf002;   Cari Nama Instansi" id="searchDinas">
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
                                            <th>No <button style="border: none; background: transparent;" onclick="sortTable()"><i class="fa fa-sort text-light"  style="font-size: 10px; margin-left: 3px;"></i></button></th>
                                            <th>Nama <button style="border: none; background: transparent;" onclick="sortTableName()"><i class="fa fa-sort text-light" style="font-size: 10px; margin-left: 3px;"></i></button></th>
                                            <th>Deskripsi</th>
                                            <th>Foto</th>
                                            <th>Layanan</th>
                                            <th>Maps</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($gedung as $dinas )
                                        <tr>
                                            <th scope="row" class="scope" width="250px">{{ $loop->iteration }}</th>
                                            <td class="text-left" width="100px" >{{ $dinas->nama }}</td>
                                            <td class="text-center" style="width: 50px;">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#deskripsi_instansi_container" name="deskripsi_instansi" data-id="{{ json_encode(['deskripsi' => $dinas->deskripsi,'id_dinas' => $dinas->id, 'nama' => $dinas->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit menu" class="d-inline-block">
                                                    <i class="fa fa-search-plus" style="font-size: 15px;"></i>
                                                </button>
                                            </td>
                                            <td class="text-center" style="width: 100px;">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop2" name="foto_instansi" data-id="{{ json_encode(['gambar' => $dinas->gambar,'id_dinas' => $dinas->id, 'nama' => $dinas->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit menu" class="d-inline-block">
                                                    <i class="fa fa-camera" style="font-size: 15px;"></i>
                                                </button>
                                            </td>
                                            <td style="width: 100px;"> 
                                                {{-- <ol>
                                                    @foreach ($layanan[$dinas->id] as $layanans)
                                                    <li class="text-left">{{ $layanans->nama }}</li>
                                                    @endforeach

                                                </ol> --}}
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop" name="edit_menu" data-id="{{ json_encode(['layanan' => $layanan[$dinas->id], 'nama' => $dinas->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit menu" class="d-inline-block">
                                                    <i class="fa fa-search-plus" style="font-size: 15px;"></i>
                                                </button>
                                            </td>
                                            <td style="width: 200px">
                                                @if ($dinas->maps !== null)
                                                    <iframe src="{{ $dinas->maps}}" frameborder="0"></iframe>
                                                @else
                                                <strong style="font-size: 50px;">-</strong>
                                                @endif
                                            </td>
                                            <td style="width: 300px">
                                                {{-- <a href={{ route('delete_dinas', ['id' => $dinas->id]) }} class="d-inline-block mr-3" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </a> --}}
                                                <button style="border: none; background: transparent; color: red;" onclick="showDeleteConfirmation( '{{$dinas->id }}' )" class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 15px" class="fa fa-trash"></i>
                                                </button>
                                                <a href={{ route('edit_dinas' ,['id' => $dinas->id ]) }} class="d-inline-block ml-3" title="edit" name="edit">
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
        // Fungsi untuk menampilkan SweetAlert
        function showDeleteConfirmation(dinasId) {
            console.log(dinasId);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
    
            swalWithBootstrapButtons.fire({
                title: "Peringatan",
                text: "Hapus Instansi ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteAdmin(dinasId);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Instansi gagal dihapus",
                        icon: "error"
                    });
                }
            });
        }
    
        // Fungsi untuk menghapus admin
        function deleteAdmin(dinasId) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            $.ajax({
                url: '/delete/dinas/' + dinasId,
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


        var staticBackdrop = document.getElementById('staticBackdrop');
        staticBackdrop.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
    
            var namaInstansi = staticBackdrop.querySelector('#nama_dinas_modal');
            namaInstansi.textContent = parsedDataId.nama;


            var layananList = document.getElementById('layananList');
            layananList.innerHTML = ''; // Mengosongkan konten sebelumnya

            if (parsedDataId.layanan.length > 0) {
                var ol = document.createElement('ol');
                parsedDataId.layanan.forEach(function (layanan) {
                    var li = document.createElement('li');
                    li.setAttribute('style', 'font-weight: bold;');

                    li.className = 'text-left d-flex';
                    li.style.justifyContent = "space-between"
                    
                    var namaLayanan = document.createElement('span');
                    namaLayanan.innerHTML = layanan.nama
                    namaLayanan.style.width = '350px';
                    li.appendChild(namaLayanan);

                    var btn_action = document.createElement('span');
                    var deleteLink = document.createElement('button');
                    deleteLink.setAttribute('onclick','showDeleteLayanan("__id_layanan__")'.replace('__id_layanan__', layanan.id));
                    deleteLink.setAttribute('style','margin-right:28px; border: none; background: transparent; color: red;')
                    deleteLink.title = 'hapus layanan';
                    deleteLink.className = 'd-inline-block ';
                    deleteLink.innerHTML = '<i class="fa fa-trash"></i>';

                    var editLink = document.createElement('button');
                    editLink.type = 'submit';
                    editLink.setAttribute('data-bs-toggle', 'modal');
                    editLink.setAttribute('data-bs-target', '#editLayanan');
                    editLink.name = 'edit_layanan';
                    console.log(layanan);
                    editLink.setAttribute('data-id', JSON.stringify({ namaLayanan: layanan.nama,deskripsiLayanan: layanan.deskripsi, id: layanan.id, instansi: parsedDataId.nama, gambar: layanan.gambar_detail,judul_gambar: layanan.judul_gambar }));
                    editLink.style.display = 'inline-block';
                    editLink.style.marginLeft = '20px';
                    editLink.style.border = 'none';
                    editLink.style.background = 'transparent';
                    editLink.title = 'edit layanan';
                    editLink.className = 'd-inline-block ';
                    editLink.innerHTML = '<i class="fa fa-pen"></i>';

                    btn_action.appendChild(deleteLink);
                    btn_action.appendChild(editLink);

                    li.appendChild(btn_action);


                    ol.appendChild(li);
                });
                layananList.appendChild(ol);
            } else {
                // Tampilkan pesan jika tidak ada layanan
                layananList.innerHTML = '<p>Tidak ada layanan untuk insantsi ini.</p>';
            }
        });

        


        //  untuk show modal edit layanan

        var editLayanan = document.getElementById('editLayanan');
        editLayanan.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var NamaInput = editLayanan.querySelector('#nama_layanan');
            NamaInput.value = parsedDataId.namaLayanan;

            console.log(parsedDataId.gambar);
            var DeskripsiInput = editLayanan.querySelector('#deskripsi_layanan_sebelumnya');
            DeskripsiInput.innerHTML = "";
            DeskripsiInput.innerHTML = parsedDataId.deskripsiLayanan;

            var gambar_container = editLayanan.querySelector('#gambar_container');
            var judul_gambar = editLayanan.querySelector('#judul_gambar_detail');
            if(parsedDataId.judul_gambar !== null){
                judul_gambar.value = parsedDataId.judul_gambar;
            }else{
                judul_gambar.value = "";
            }

            gambar_container.innerHTML = "";
            


            if(parsedDataId.gambar !== null){
                var img = document.createElement("img");
                img.style.width = "100%";
                img.style.height = "300px";
                img.src = "{{ asset('') }}" + parsedDataId.gambar;
                img.alt = parsedDataId.namaLayanan;
                gambar_container.appendChild(img);
            }else{
                var h5 = document.createElement("h5");
                h5.innerHTML = "Belum Ada Gambar";
                h5.style.textAlign = "center";
                h5.style.fontSize = "15px";
                h5.style.color = "red";
                gambar_container.appendChild(h5);
            }

            var namaInstansi = editLayanan.querySelector('#nama_instansi');
            namaInstansi.value = parsedDataId.instansi;

            var idInput = editLayanan.querySelector('#id_layanan');
            idInput.value = parsedDataId.id;
        });

        // untuk foto instansi
        var staticBackdrop2 = document.getElementById('staticBackdrop2');
        staticBackdrop2.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var NamaInstansi = staticBackdrop2.querySelector('#nama_dinas_modal2');
            NamaInstansi.textContent = parsedDataId.nama;

            var fotoInstansiCont = staticBackdrop2.querySelector('#foto_instansi_container');
            var delete_gambar_instansi = staticBackdrop2.querySelector('#delete_gambar_instansi');
            if(parsedDataId.gambar !== null){
                var img = document.createElement("img"); // Perbaikan: Penggunaan createElement
                img.src = "{{ asset('') }}" + parsedDataId.gambar;

                img.setAttribute('id','Gambar_instansi');
                fotoInstansiCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotoInstansiCont.appendChild(img);
                delete_gambar_instansi.setAttribute('onclick','showDeleteGambar("__id_instansi_")'.replace('__id_instansi_', parsedDataId.id_dinas));

            }else{
                var h3 = document.createElement("h3"); // Perbaikan: Penggunaan createElement
                h3.textContent = "Belum Ada Gambar"
                h3.setAttribute('class','text-center text-danger');
                fotoInstansiCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotoInstansiCont.appendChild(h3);
            }
        });
        //  untuk deskrpsi instansi
        var deskripsi_instansi_container = document.getElementById('deskripsi_instansi_container');
        deskripsi_instansi_container.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var NamaInstansi = deskripsi_instansi_container.querySelector('#nama_dinas_modal2');
            NamaInstansi.textContent = parsedDataId.nama;
            console.log(parsedDataId.deskripsi);
            var deskripsiInstansiCont = deskripsi_instansi_container.querySelector('#deskripsi_instansi');
            if(parsedDataId.gambar !== null){
                deskripsiInstansiCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                deskripsiInstansiCont.textContent = parsedDataId.deskripsi
            
            }else{
                var h3 = document.createElement("h3"); // Perbaikan: Penggunaan createElement
                h3.textContent = "Belum Ada Deskripsi"
                h3.setAttribute('class','text-center text-danger');
                deskripsiInstansiCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                deskripsiInstansiCont.appendChild(h3);
            }
        });


        function showDeleteLayanan(layananId) {
            console.log(layananId);
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
    
            swalWithBootstrapButtons.fire({
                title: "Peringatan",
                text: "Hapus layanan ini ?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Setuju",
                cancelButtonText: "Batal",
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    deleteLayanan(layananId);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "layanan gagal dihapus",
                        icon: "error"
                    });
                }
            });
        }

        function showDeleteGambar(instansiID) {
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {
                    confirmButton: "btn btn-success",
                    cancelButton: "btn btn-danger"
                },
                buttonsStyling: false
            });
    
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
                    deleteGambarInstansi(instansiID);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Gambar gagal dihapus",
                        icon: "error"
                    });
                }
            });
        }
    
        // Fungsi untuk menghapus admin
        function deleteLayanan(layananId) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            $.ajax({
                url: '/hapus_layanan/' + layananId,
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

        function deleteGambarInstansi(idInstansi) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            $.ajax({
                url: '/hapus_gambar_idInstansi/' + idInstansi,
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
    title: "{{session('error_add')}}",
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