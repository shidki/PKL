@extends("sistem_informasi.admin.main")
@section('main')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
<div class="col-lg-12">
  <div class="card w-100">
    <div class="card-body">
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <div class="text-left mb-5">
            <span style="font-size: 15px; font-weight: bold;"><a href="/wisata">DAFTAR WISATA</a> / EDIT WISATA</span>
          </div>
          <form action="/submit_edit_wisata" method="post" enctype="multipart/form-data">
            @csrf
              <div class="formbold-steps">
                  <ul>
                      <li class="formbold-step-menu1 active">
                          <span>1</span>
                          Wisata
                      </li>
                      <li class="formbold-step-menu2">
                          <span>2</span>
                          Alamat
                      </li>
                      <li class="formbold-step-menu3">
                          <span>3</span>
                          Confirm
                      </li>
                  </ul>
              </div>
      
              <div class="formbold-form-step-1 active">
                <div class="mb-3">
                  <div>
                    <label for="id" class="formbold-form-label"> ID Wisata </label>
                      <input
                      type="text"
                      name="id"
                      placeholder="Nama id"
                      value="{{ $wisata->id }}"
                      id="id"
                      class="formbold-form-input"
                      readonly
                      />
                  </div>
                  <div>
                    <label for="nama" class="formbold-form-label"> Nama Wisata </label>
                      <input
                      type="text"
                      name="nama"
                      placeholder="Nama nama"
                      value="{{ $wisata->nama }}"
                      id="nama"
                      class="formbold-form-input"
                      required
                      />
                  </div>
                  <div class="gambar_upload">
                    <span class="formbold-form-label mt-3"> Foto Wisata</span>
                    <img src="{{ asset($wisata->gambar) }}" height="300px" width="100%" alt="Foto Wisata" style="margin-bottom: 30px;">
                    <input id="file-upload" type="file" name="file_gambar" accept="image/*" />
  
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
                  <div>
                      <label for="deskripsi" class="formbold-form-label mt-3 mt-3"> Deskripsi Wisata </label>
                      <p>Deskripsi : {{ $wisata->deskripsi }}</p>
                      <textarea
                      rows="6"
                      name="deskripsi"
                      id="deskripsi"
                      placeholder="Masukkan deskripsi baru"
                      class="formbold-form-input"
                      ></textarea>
                  </div>
                  <div>
                    <label for="jarak" class="formbold-form-label"> Harga Tiket pada hari biasa (Rupiah) </label>
                      <input
                      type="int"
                      name="harga"
                      placeholder="Masukkan harga"
                      value="{{ $wisata->harga_tiket }}"
                      id="harga"
                      class="formbold-form-input"
                      required
                      />
                  </div>
                  <div>
                    <label for="jarak" class="formbold-form-label"> Harga Tiket pada weekend (Rupiah)</label>
                      <input
                      type="int"
                      name="harga_weekend"
                      placeholder="Masukkan harga"
                      value="{{ $wisata->harga_weekend }}"
                      id="harga_weekend"
                      class="formbold-form-input"
                      required
                      />
                  </div>
                  <div>
                    <label for="jarak" class="formbold-form-label"> Jarak dari balaikota (Km) </label>
                      <input
                      type="int"
                      name="jarak"
                      placeholder="Masukkan jarak"
                      value="{{ $wisata->jarak }}"
                      id="jarak"
                      class="formbold-form-input"
                      required
                      />
                  </div>
                </div>
                <div class="text-center mt-5 text-danger"><strong>{{ session('error_input_dinas') }}</strong></div>
              </div>
              <div class="formbold-form-step-2">
                <div>
                  <label for="alamat" class="formbold-form-label mt-3 mt-3"> Alamat Wisata </label>
                  <p>Alamat : {{ $wisata->alamat }}</p>
                  <textarea
                  rows="6"
                  name="alamat"
                  id="alamat"
                  placeholder="Masukkan alamat baru"
                  class="formbold-form-input"
                  ></textarea>
              </div>
              </div>
              <div class="formbold-form-step-3">
                <div class="formbold-form-confirm">
                  <p>Click SUBMIT jika sudah yakin, jika belum klik <a href="/wisata">Disini</a></p>
                  <div>
                  </div>
                </div>
              </div>
              <div class="formbold-form-btn-wrapper">
                <button class="formbold-back-btn">
                  Back
                </button>
      
                <button class="formbold-btn">
                    Next Step
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_1675_1807)">
                    <path d="M10.7814 7.33312L7.20541 3.75712L8.14808 2.81445L13.3334 7.99979L8.14808 13.1851L7.20541 12.2425L10.7814 8.66645H2.66675V7.33312H10.7814Z" fill="white"/>
                    </g>
                    <defs>
                    <clipPath id="clip0_1675_1807">
                    <rect width="16" height="16" fill="white"/>
                    </clipPath>
                    </defs>
                    </svg>
                </button>
              </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
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
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    body {
      font-family: "Inter", sans-serif;
    }
    :root {
    --primary: #111926;
    --white: #fff;
    --background: #F8F8FF;
    --gray: #D3D3D3;
}
.custom-bullet::before {
        content: '\2022'; /* Unicode character for a filled circle */
        color: rgb(129, 129, 129); /* Customize the color */
        display: inline-block;
        width: 1em; /* Adjust the width as needed */
        margin-right: 0.5em; /* Adjust the spacing as needed */
    }
  .dropzone-box {
    border-radius: 2rem;
    padding: 2rem;
    box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
    display: flex;
    justify-content: center;
    flex-direction: column;
    max-width: 36rem;
    width: 100%;
    background-color: var(--white);
}

.dropzone-box h2 {
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.dropzone-area {
    padding: 1rem;
    position: relative;
    margin-top: 1rem;
    min-height: 16rem;
    display: flex;
    text-align: center;
    justify-content: center;
    align-items: center;
    flex-direction: column;
    border: 2px dashed var(--primary);
    border-radius: 1rem;
    color: var(--primary);
    cursor: pointer;
}

.dropzone-area [type="file"] {
    cursor: pointer;
    position: absolute;
    opacity: 0;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
}

.dropzone-area .file-upload-icon svg {
    height: 5rem;
    width: 5rem;
    margin-bottom: 0.5rem;
    stroke: var(--primary);
}

.dropzone--over {
    border-style: solid;
    background-color: var(--background);
}

.dropzone-actions {
    display: flex;
    justify-content: space-between;
    padding-top: 1.5rem;
    margin-top: 1.5rem;
    border-top: 1px solid var(--gray);
    gap: 1rem;
    flex-wrap: wrap;
}

.dropzone-actions button {
    flex-grow: 1;
    min-height: 3rem;
    font-size: 1.2rem;
}

.dropzone-actions button:hover {
    text-decoration: underline;
}

.dropzone-actions button[type='reset'] {
    background-color: transparent;
    border: 1px solid var(--gray);
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    color: var(--primary);
    cursor: pointer;
}

.dropzone-actions button[type='submit'] {
    background-color: var(--primary);
    border: 1px solid var(--primary);
    border-radius: 0.5rem;
    padding: 0.5rem 1rem;
    color: var(--white);
    cursor: pointer;
}

    .formbold-main-wrapper {
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 50px;
    }
  
    .formbold-form-wrapper {
      margin: 0 auto;
      max-width: 550px;
      width: 100%;
      background: white;
    }
  
    .formbold-steps {
      padding-bottom: 18px;
      margin-bottom: 35px;
      border-bottom: 1px solid #3761a1;
    }
    @media(max-width: 1024px){
      .formbold-steps ul{
        flex-direction: column;
        gap: 20px;
      }
    }
    .formbold-steps ul {
      padding: 0;
      margin: 0;
      list-style: none;
      display: flex;
      gap: 40px;
    }
    .formbold-steps li {
      display: flex;
      align-items: center;
      gap: 14px;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }
    .formbold-steps li span {
      display: flex;
      align-items: center;
      justify-content: center;
      background: #DDE3EC;
      border-radius: 50%;
      width: 36px;
      height: 36px;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
    }
    .formbold-steps li.active {
      color: #07074D;;
    }
    .formbold-steps li.active span {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-input-flex {
      display: flex;
      gap: 20px;
      margin-bottom: 22px;
    }
    .formbold-input-flex > div {
      width: 50%;
    }
    .formbold-form-input {
      width: 100%;
      padding: 13px 22px;
      border-radius: 5px;
      border: 1px solid #DDE3EC;
      background: #FFFFFF;
      font-weight: 500;
      font-size: 16px;
      color: #536387;
      outline: none;
      resize: none;
    }
    .formbold-form-input:focus {
      border-color: #6a64f1;
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
    }
    .formbold-form-label {
      color: #07074D;
      font-weight: 500;
      font-size: 14px;
      line-height: 24px;
      display: block;
      margin-bottom: 10px;
    }
  
    .formbold-form-confirm {
      border-bottom: 1px solid #DDE3EC;
      padding-bottom: 35px;
    }
    .formbold-form-confirm p {
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      margin-bottom: 22px;
      width: 75%;
    }
    .formbold-form-confirm > div {
      display: flex;
      gap: 15px;
    }
  
    .formbold-confirm-btn {
      display: flex;
      align-items: center;
      gap: 10px;
      background: #FFFFFF;
      border: 0.5px solid #DDE3EC;
      border-radius: 5px;
      font-size: 16px;
      line-height: 24px;
      color: #536387;
      cursor: pointer;
      padding: 10px 20px;
      transition: all .3s ease-in-out;
    }
    .formbold-confirm-btn {
      box-shadow: 0px 1px 2px rgba(0, 0, 0, 0.12);
    }
    .formbold-confirm-btn.active {
      background: #6A64F1;
      color: #FFFFFF;
    }
  
    .formbold-form-step-1,
    .formbold-form-step-2,
    .formbold-form-step-3 {
      display: none;
    }
    .formbold-form-step-1.active,
    .formbold-form-step-2.active,
    .formbold-form-step-3.active {
      display: block;
    }
  
    .formbold-form-btn-wrapper {
      display: flex;
      align-items: center;
      justify-content: flex-end;
      gap: 25px;
      margin-top: 25px;
    }
    .formbold-back-btn {
      cursor: pointer;
      background: #FFFFFF;
      border: none;
      color: #07074D;
      font-weight: 500;
      font-size: 16px;
      line-height: 24px;
      display: none;
    }
    .formbold-back-btn.active {
      display: block;
    }
    .formbold-btn {
      display: flex;
      align-items: center;
      gap: 5px;
      font-size: 16px;
      border-radius: 5px;
      padding: 10px 25px;
      border: none;
      font-weight: 500;
      background-color: #6A64F1;
      color: white;
      cursor: pointer;
    }
    .formbold-btn:hover {
      box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.05);
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

    const stepMenuOne = document.querySelector('.formbold-step-menu1')
    const stepMenuTwo = document.querySelector('.formbold-step-menu2')
    const stepMenuThree = document.querySelector('.formbold-step-menu3')
  
    const stepOne = document.querySelector('.formbold-form-step-1')
    const stepTwo = document.querySelector('.formbold-form-step-2')
    const stepThree = document.querySelector('.formbold-form-step-3')
  
    const cancel = document.getElementById('cancel')
    const formSubmitBtn = document.querySelector('.formbold-btn')
    const formBackBtn = document.querySelector('.formbold-back-btn')
  
    formSubmitBtn.addEventListener("click", function(event){
      event.preventDefault()
      if(stepMenuOne.className == 'formbold-step-menu1 active') {
          event.preventDefault()
  
          stepMenuOne.classList.remove('active')
          stepMenuTwo.classList.add('active')
  
          stepOne.classList.remove('active')
          stepTwo.classList.add('active')
  
          formBackBtn.classList.add('active')
          formBackBtn.addEventListener("click", function (event) {
            event.preventDefault()
  
            stepMenuOne.classList.add('active')
            stepMenuTwo.classList.remove('active')
  
            stepOne.classList.add('active')
            stepTwo.classList.remove('active')
  
            formBackBtn.classList.remove('active')
  
          })
  
        } else if(stepMenuTwo.className == 'formbold-step-menu2 active') {
          event.preventDefault()
  
          stepMenuTwo.classList.remove('active')
          stepMenuThree.classList.add('active')
  
          stepTwo.classList.remove('active')
          stepThree.classList.add('active')
  
          formBackBtn.classList.remove('active')
          formSubmitBtn.textContent = 'Submit'
        } else if(stepMenuThree.className == 'formbold-step-menu3 active') {
          document.querySelector('form').submit()
        }
    })

    const dropzoneBox = document.getElementsByClassName("dropzone-box")[0];

    const inputFiles = document.querySelectorAll(
      ".dropzone-area input[type='file']"
    );

    const inputElement = inputFiles[0];

    const dropZoneElement = inputElement.closest(".dropzone-area");

    inputElement.addEventListener("change", (e) => {
      if (inputElement.files.length) {
        updateDropzoneFileList(dropZoneElement, inputElement.files[0]);
      }
    });

    dropZoneElement.addEventListener("dragover", (e) => {
      e.preventDefault();
      dropZoneElement.classList.add("dropzone--over");
    });

    ["dragleave", "dragend"].forEach((type) => {
      dropZoneElement.addEventListener(type, (e) => {
        dropZoneElement.classList.remove("dropzone--over");
      });
    });

    dropZoneElement.addEventListener("drop", (e) => {
      e.preventDefault();

      if (e.dataTransfer.files.length) {
        inputElement.files = e.dataTransfer.files;

        updateDropzoneFileList(dropZoneElement, e.dataTransfer.files[0]);
      }

      dropZoneElement.classList.remove("dropzone--over");
    });

    const updateDropzoneFileList = (dropzoneElement, file) => {
      let dropzoneFileMessage = dropzoneElement.querySelector(".message");

      dropzoneFileMessage.innerHTML = `
            ${file.name}, ${file.size} bytes
        `;
    };

    dropzoneBox.addEventListener("reset", (e) => {
      let dropzoneFileMessage = dropZoneElement.querySelector(".message");

      dropzoneFileMessage.innerHTML = `No Files Selected`;
    });

    dropzoneBox.addEventListener("submit", (e) => {
      e.preventDefault();
      const myFiled = document.getElementById("upload-file");
      console.log(myFiled.files[0]);
    });
  </script>
@endsection