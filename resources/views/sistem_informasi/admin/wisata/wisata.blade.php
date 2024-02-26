@extends("sistem_informasi.admin.main")
@section('main')
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-IYF3A/b5QDsjjr6f5lC7PgeVojOO0GW7R+EiAtkdbY//SWEZDtQqFJ9C1STh0pcHp1K5V02LFQKZ1KGHTtL54A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset('assets/sistem_informasi/table/css/style.css') }}">
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
    color: rgb(0, 0, 0);
    height: 80px;
    font-weight: bold;
    background: #66ff66;
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
    .gambar_upload {
        display: block;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 600px;
    }
    
    .gambar_upload label {
        float: left;
        clear: both;
        width: 100%;
        padding: 2rem 1.5rem;
        text-align: center;
        background: #fff;
        border-radius: 7px;
        border: 3px solid #eee;
        transition: all 0.2s ease;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
    }
    
    .gambar_upload label:hover {
        border-color: #454cad;
    }
    
    .gambar_upload label.hover {
        border: 3px solid #454cad;
        box-shadow: inset 0 0 0 6px #eee;
    }
    
    .gambar_upload label.hover #start i.fa {
        transform: scale(0.8);
        opacity: 0.3;
    }
    
    .gambar_upload #start {
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #start.hidden {
        display: none;
    }
    
    .gambar_upload #start i.fa {
        font-size: 50px;
        margin-bottom: 1rem;
        transition: all 0.2s ease-in-out;
    }
    
    .gambar_upload #response {
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #response.hidden {
        display: none;
    }
    
    .gambar_upload #response #messages2 {
        margin-bottom: 0.5rem;
    }
    
    .gambar_upload #file-image {
        display: inline;
        margin: 0 auto 0.5rem auto;
        width: auto;
        height: auto;
        max-width: 180px;
    }
    
    .gambar_upload #file-image.hidden {
        display: none;
    }
    
    .gambar_upload #notimage {
        display: block;
        float: left;
        clear: both;
        width: 100%;
    }
    
    .gambar_upload #notimage.hidden {
        display: none;
    }
    
    .gambar_upload progress,
    .gambar_upload .progress {
        display: inline;
        clear: both;
        margin: 0 auto;
        width: 100%;
        max-width: 180px;
        height: 8px;
        border: 0;
        border-radius: 4px;
        background-color: #eee;
        overflow: hidden;
    }
    
    .gambar_upload .progress[value]::-webkit-progress-bar {
        border-radius: 4px;
        background-color: #eee;
    }
    
    .gambar_upload .progress[value]::-webkit-progress-value {
        background: linear-gradient(to right, #393f90 0%, #454cad 50%);
        border-radius: 4px;
    }
    
    .gambar_upload .progress[value]::-moz-progress-bar {
        background: linear-gradient(to right, #393f90 0%, #454cad 50%);
        border-radius: 4px;
    }
    
    .gambar_upload input[type=file] {
        display: none;
    }
    
    .gambar_upload div {
        margin: 0 0 0.5rem 0;
        color: #5f6982;
    }
    
    .gambar_upload .btn {
        display: inline-block;
        margin: 0.5rem 0.5rem 1rem 0.5rem;
        clear: both;
        font-family: inherit;
        font-weight: 700;
        font-size: 14px;
        text-decoration: none;
        text-transform: initial;
        border: none;
        border-radius: 0.2rem;
        outline: none;
        padding: 0 1rem;
        height: 36px;
        line-height: 36px;
        color: #fff;
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        background: #454cad;
        border-color: #454cad;
        cursor: pointer;
    }
    </style>
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="text-right mr-3 mb-3">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Add Wisata</span></button>
            </div>
            {{-- POP UP FOTO Wisata --}}
            <div class="modal fade" id="staticBackdrop3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="staticBackdropLabel">Foto Wisata <strong><span id="nama_wisata_modal2"></span></strong></h5>
                        </div>
                        <div class="modal-body" id="foto_wisata_container">
                                            
                        </div>
                        <div class="modal-footer" style="text-align: center">
                            <button type="submit" class="btn bg-danger" style="color: white" id="delete_gambar_wisata" data-bs-dismiss="modal">Delete</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
            {{-- END POP UP --}}
           {{-- POP UP ADD WISATA --}}
           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Wisata</h5>
                    </div>
                    <form action="/add/wisata" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Wisata :</label>
                                <input id="nama" type="text" class="form-control" placeholder="Masukkan naama wisata" required name="nama">
                            </div>
                            <div class="gambar_upload">
                                <span class="formbold-form-label mt-3"> Foto Penginapan <strong class="text-danger">*</strong></span>
                                <input required id="file-upload" type="file" name="file_gambar" accept="image/*" />
              
                                <label for="file-upload" id="file-drag" style="display: inline-block; margin-bottom: 20px;">
                                  <img id="file-image" src="#" alt="Preview" class="hidden">
                                  <div id="start">
                                    <i class="fa fa-download" aria-hidden="true"></i>
                                    <div>Select a file or drag here</div>
                                    <div id="notimage" class="hidden">Please select an image</div>
                                    <span id="file-upload-btn" class="btn btn-primary">Select a file</span>
                                  </div>
                                  <div id="response" class="hidden">
                                    <div id="messages2"></div>
                                    <progress class="progress" id="file-progress" value="0">
                                      <span>0</span>%
                                    </progress>
                                  </div>
                                </label>
                              </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea required name="deskripsi" class="form-control" placeholder="Masukkan deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <input id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" required name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Tiket ( hari biasa ) :</label>
                                <input id="harga" type="number" class="form-control" placeholder="Masukkan harga" required name="harga">
                            </div>
                            <div class="form-group">
                                <label for="harga_weekend">Harga Tiket ( weekend ) :</label>
                                <input id="harga_weekend" type="number" class="form-control" placeholder="Masukkan harga" required name="harga_weekend">
                            </div>
                            <div class="form-group">
                                <label for="jarak">Jarak dari balaikota (Km) :</label>
                                <input id="jarak" type="float" class="form-control" placeholder="Masukkan jarak" required name="jarak">
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
        <div class="col-lg-25 d-flex align-items-strech">
            <div class="card w-100">
                <div class="card-body">
                    <input type="text" class="form-control text-center" placeholder="Search nama wisata" id="searchEmail">
                </div>
            </div>
        </div>
            <div class="col-lg-25 d-flex align-items-strech">
                <div class="card w-100">
                  <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-wrap">
                                <table class="table" id="usersTable">
                                    <thead class="thead-primary">
                                        <tr>
                                            <th>No <button style="border: none; background: transparent;" onclick="sortTable()"><i class="fa fa-sort text-light"  style="font-size: 12px; margin-left: 3px;"></i></button></th>
                                            {{-- <th>Nama<button style="border: none; background: transparent;" onclick="sortTableName()"><i class="fa fa-sort text-light ml-2"></i></button></th> --}}
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>alamat<br>
                                            <th>Foto<br>
                                            <th>harga tiket biasa<br>
                                            <th>harga tiket weekend <br>
                                            <th>jarak<br>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wisata as $wisatas )
                                        <tr>
                                            <th scope="row" class="scope" width="200px">{{ $loop->iteration }}</th>
                                            <td class="text-center" width="150px">{{ $wisatas->nama }}</td>
                                            <td class="text-justify" style="width: 250px;">{{ $wisatas->deskripsi }}</td>
                                            <td class="text-center" style="width: 200px;">{{ $wisatas->alamat }}</td>
                                            <td class="text-center" style="width: 50px;">
                                                <button type="submit" data-bs-toggle="modal" data-bs-target="#staticBackdrop3" name="foto_wisata" data-id="{{ json_encode(['gambar' => $wisatas->gambar,'id_wisata' => $wisatas->id, 'nama' => $wisatas->nama]) }}" style="display: inline-block; border:none; background: transparent;" title="edit menu" class="d-inline-block">
                                                    <i class="fa fa-search-plus" style="font-size: 15px;"></i>
                                                </button>
                                            </td>
                                            <td class="text-center" style="width: 200px;">{{ $wisatas->harga_tiket }}</td>
                                            <td class="text-center" style="width: 200px;">{{ $wisatas->harga_weekend }}</td>
                                            <td class="text-center" style="width: 260px;">{{ $wisatas->jarak }} <strong>Km</strong></td>
                                            <td style="width: 300px">
                                                <a href={{ route('delete_wisata' , ['id' => $wisatas->id]) }} class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 15px; color: red;" class="fa fa-trash"></i>
                                                </a>
                                                <a href={{route('edit_wisata' ,['id' => $wisatas->id ])}} class="d-inline-block" title="edit" name="edit">
                                                    <i class="fa fa-pencil" style="font-size: 15px"></i>
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

    @if ($massage = Session::get('error_toast'))
        <script>
            let box = document.getElementById('toastBox');
            let toast = document.createElement('div');

            let icon = '<i class="fa-solid fa-circle-exclamation"></i>';
            toast.classList.add('toastt');
            toast.innerHTML = icon + "{{ $massage }}";
            box.appendChild(toast);

            toast.classList.add("errortoast");
            let toastt = document.querySelector('.toastt');
            toastt.style.backgroundColor = "red";
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
            let toastt = document.querySelector('.toastt');
            toastt.style.backgroundColor = "#38ff5d";
            setTimeout(() => {
                toast.remove();
            }, 3500);
        </script>
    @endif
    {{-- search email --}}
    <script>
        // untuk sesuai email
        document.addEventListener('DOMContentLoaded', function () {
        var searchEmailInput = document.getElementById('searchEmail');
        var usersTable = document.getElementById('usersTable');
        var rows = usersTable.getElementsByTagName('tr');

        searchEmailInput.addEventListener('input', function () {
            var filter = searchEmailInput.value.toLowerCase();

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
    // search sesuai email dan username
    // document.addEventListener('DOMContentLoaded', function () {
    //     var searchEmailInput = document.getElementById('searchEmailInput');
    //     var usersTable = document.getElementById('usersTable');
    //     var rows = usersTable.getElementsByTagName('tr');

    //     searchEmailInput.addEventListener('input', function () {
    //         var filter = searchEmailInput.value.toLowerCase();

    //         for (var i = 1; i < rows.length; i++) { // Mulai dari indeks 1 untuk melewati baris header
    //             var emailColumn = rows[i].getElementsByTagName('td')[1]; // Kolom email
    //             var usernameColumn = rows[i].getElementsByTagName('td')[2]; // Kolom username

    //             if (emailColumn && usernameColumn) {
    //                 var emailText = emailColumn.textContent || emailColumn.innerText;
    //                 var usernameText = usernameColumn.textContent || usernameColumn.innerText;

    //                 // Mencocokkan filter dengan email atau username
    //                 if (emailText.toLowerCase().indexOf(filter) > -1 || usernameText.toLowerCase().indexOf(filter) > -1) {
    //                     rows[i].style.display = ''; // Menampilkan baris jika sesuai dengan filter
    //                 } else {
    //                     rows[i].style.display = 'none'; // Menyembunyikan baris jika tidak sesuai dengan filter
    //                 }
    //             }
    //         }
    //     });
    // });
    </script>
    <script>
        function ekUpload() {
        function Init() {

            console.log("Upload Initialised");

            var fileSelect = document.getElementById('file-upload'),
                fileDrag = document.getElementById('file-drag'),
                submitButton = document.getElementById('submit-button');

            fileSelect.addEventListener('change', fileSelectHandler, false);

            // Is XHR2 available?
            var xhr = new XMLHttpRequest();
            if (xhr.upload) {
                // File Drop
                fileDrag.addEventListener('dragover', fileDragHover, false);
                fileDrag.addEventListener('dragleave', fileDragHover, false);
                fileDrag.addEventListener('drop', fileSelectHandler, false);
            }
        }

        function fileDragHover(e) {
            var fileDrag = document.getElementById('file-drag');

            e.stopPropagation();
            e.preventDefault();

            fileDrag.className = (e.type === 'dragover' ? 'hover' : 'modal-body file-upload');
        }

        function fileSelectHandler(e) {
            // Fetch FileList object
            var files = e.target.files || e.dataTransfer.files;

            // Cancel event and hover styling
            fileDragHover(e);

            // Process all File objects
            for (var i = 0, f; f = files[i]; i++) {
                parseFile(f);
                uploadFile(f);
            }
        }

        // Output
        function output(msg) {
            // Response
            var m = document.getElementById('messages2');
            m.innerHTML = msg;
        }

        function parseFile(file) {

            console.log(file.name);
            output(
                '<strong>' + encodeURI(file.name) + '</strong>'
            );

            // var fileType = file.type;
            // console.log(fileType);
            var imageName = file.name;

            var isGood = (/\.(?=gif|jpg|png|jpeg)/gi).test(imageName);
            if (isGood) {
                document.getElementById('start').classList.add("hidden");
                document.getElementById('response').classList.remove("hidden");
                document.getElementById('notimage').classList.add("hidden");
                // Thumbnail Preview
                document.getElementById('file-image').classList.remove("hidden");
                document.getElementById('file-image').src = URL.createObjectURL(file);
            } else {
                document.getElementById('file-image').classList.add("hidden");
                document.getElementById('notimage').classList.remove("hidden");
                document.getElementById('start').classList.remove("hidden");
                document.getElementById('response').classList.add("hidden");
                document.getElementById("file-upload-form").reset();
            }
        }

        function setProgressMaxValue(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.max = e.total;
            }
        }

        function updateFileProgress(e) {
            var pBar = document.getElementById('file-progress');

            if (e.lengthComputable) {
                pBar.value = e.loaded;
            }
        }

        function uploadFile(file) {

            var xhr = new XMLHttpRequest(),
                fileInput = document.getElementById('class-roster-file'),
                pBar = document.getElementById('file-progress'),
                fileSizeLimit = 1024; // In MB
            if (xhr.upload) {
                // Check if file is less than x MB
                if (file.size <= fileSizeLimit * 1024 * 1024) {
                    // Progress bar
                    pBar.style.display = 'inline';
                    xhr.upload.addEventListener('loadstart', setProgressMaxValue, false);
                    xhr.upload.addEventListener('progress', updateFileProgress, false);

                    // File received / failed
                    xhr.onreadystatechange = function(e) {
                        if (xhr.readyState == 4) {
                            // Everything is good!

                            // progress.className = (xhr.status == 200 ? "success" : "failure");
                            // document.location.reload(true);
                        }
                    };

                    // Start upload
                    xhr.open('POST', document.getElementById('file-upload-form').action, true);
                    xhr.setRequestHeader('X-File-Name', file.name);
                    xhr.setRequestHeader('X-File-Size', file.size);
                    xhr.setRequestHeader('Content-Type', 'multipart/form-data');
                    xhr.send(file);
                } else {
                    output('Please upload a smaller file (< ' + fileSizeLimit + ' MB).');
                }
            }
        }

        // Check for the various File API support.
        if (window.File && window.FileList && window.FileReader) {
            Init();
        } else {
            document.getElementById('file-drag').style.display = 'none';
        }
    }
    ekUpload();

        var staticBackdrop3 = document.getElementById('staticBackdrop3');
        staticBackdrop3.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var dataId = button.getAttribute('data-id');
            var parsedDataId = JSON.parse(dataId);
            
            var NamaInstansi = staticBackdrop3.querySelector('#nama_wisata_modal2');
            NamaInstansi.textContent = parsedDataId.nama;

            var fotowisataCont = staticBackdrop3.querySelector('#foto_wisata_container');
            var delete_gambar_wisata = staticBackdrop3.querySelector('#delete_gambar_wisata');
            console.log(parsedDataId.id_wisata);
            if(parsedDataId.gambar !== null){
                var img = document.createElement("img"); // Perbaikan: Penggunaan createElement
                img.src = "{{ asset('') }}" + parsedDataId.gambar;
                img.setAttribute('id','Gambar_instansi');
                fotowisataCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotowisataCont.appendChild(img);
                delete_gambar_wisata.setAttribute('onclick','showDeleteGambar("__id_wisata_")'.replace('__id_wisata_', parsedDataId.id_wisata));

            }else{
                var h3 = document.createElement("h3"); // Perbaikan: Penggunaan createElement
                h3.textContent = "Belum Ada Gambar"
                h3.setAttribute('class','text-center text-danger');
                fotowisataCont.innerHTML = ''; // Kosongkan konten sebelumnya jika ada
                fotowisataCont.appendChild(h3);
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
                    deleteGambarWisata(id);
                } else if (result.dismiss === Swal.DismissReason.cancel) {
                    swalWithBootstrapButtons.fire({
                        title: "Peringatan",
                        text: "Gambar gagal dihapus",
                        icon: "error"
                    });
                }
            });
        };
        function deleteGambarWisata(idWisata) {
            // Kirim permintaan AJAX ke controller untuk menghapus admin
            // Sesuaikan dengan URL atau metode yang digunakan dalam aplikasi Anda
            console.log('warung1 = ' + idWisata);
            $.ajax({
                url: '/delete_gambar_wisata/' + idWisata,  
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
                        title: "Deleted!",
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
                const valueA = a.cells[1].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari wisata
                const valueB = b.cells[1].textContent.trim().toLowerCase().charAt(0); // Huruf pertama dari wisata

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