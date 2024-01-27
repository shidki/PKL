@extends('sistem_informasi.admin.main')
@section('main')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Work+Sans&display=swap" rel="stylesheet">
<div class="col-lg-12">
  <div class="card w-100">
    <div class="card-body">
      <div class="formbold-main-wrapper">
        <div class="formbold-form-wrapper">
          <form action="/submit_edit_penginapan" method="post" enctype="multipart/form-data">
            @csrf
              <div class="formbold-steps">
                  <ul>
                      <li class="formbold-step-menu1 active">
                          <span>1</span>
                          Penginapan
                      </li>
                      <li class="formbold-step-menu2">
                          <span>2</span>
                          Fasilitas
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
                      <label for="id" class="formbold-form-label">Id Penginapan <strong class="text-danger font-weight-bold">*</strong> </label>
                      <input
                      type="text"
                      name="id"
                      placeholder="Nama id"
                      value="{{ $penginapan->id }}"
                      id="id"
                      class="formbold-form-input"
                      readonly
                      />
                    </div>
                    <div>
                      <label for="penginapan" class="formbold-form-label">Nama Penginapan <strong class="text-danger font-weight-bold">*</strong> </label>
                      <input
                      type="text"
                      name="penginapan"
                      placeholder="Nama penginapan"
                      value="{{ $penginapan->nama }}"
                      id="penginapan"
                      class="formbold-form-input"
                      required
                      />
                    </div>
                    <div>
                        <label for="alamat" class="formbold-form-label mt-3"> Alamat </label>
                        <div class="mb-2">Current alamat : <br><strong>{{ $penginapan->alamat }}</strong></div>
                        <textarea
                        rows="6"
                        name="alamat"
                        id="alamat"
                        placeholder="Masukkan alamat"
                        class="formbold-form-input"
                        ></textarea>
                    </div>
                    <div>
                        <label for="telp" class="formbold-form-label mt-3">No Telp ( contoh: 08547218271 / 02177218) <strong class="text-danger font-weight-bold">*</strong> </label>
                        <input
                        type="int"
                        name="telp"
                        placeholder="Masukkan No telp"
                        value="{{ $penginapan->telp }}"
                        id="telp"
                        class="formbold-form-input"
                        required
                        />
                    </div>
                    <div>
                        <label for="harga" class="formbold-form-label mt-3">Harga per malam<strong class="text-danger font-weight-bold">*</strong> </label>
                        <input
                        type="int"
                        name="harga"
                        placeholder="Masukkan jml harga"
                        value="{{ $penginapan->harga }}"
                        id="harga"
                        class="formbold-form-input"
                        required
                        />
                    </div>
                    <div>
                        <label for="jarak" class="formbold-form-label mt-3">Jarak dari balaikota<strong class="text-danger font-weight-bold">*</strong> </label>
                        <input
                        type="int"
                        name="jarak"
                        value="{{ $penginapan->jarak }}"
                        placeholder="Masukkan jml jarak"
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
                    <div>
                      <ul style="list-style-type:circle">
                        <li type="none" style="border-bottom: 1px solid rgb(129, 129, 129); display:inline-block; padding-bottom:3px; margin-bottom:10px;">Ketentuan Format File</li>
                        <li>File harus dalam bentuk excel</li>
                        <li>Hanya Menulis fasilitas pada satu kolom pertama tiap baris</li>
                        <li type="none"><img src="{{ asset('assets/sistem_informasi/images/layanan/ketentuan_fasilitas.png') }}" height="150px" width="150px" alt=""></li>
                      </ul>
                    </div>
                    <label for="fasilitas" class="formbold-form-label"> Tambah fasilitas </label>
                    <div>
                      <ul style="list-style-type:circle">
                        <li type="none" style="border-bottom: 1px solid rgb(129, 129, 129); display:inline-block; padding-bottom:3px; margin-bottom:10px;">List Fasilitas</li>
                        @if (count($fasilitas) == 0)
                          <li class="font-weight-bold">-</li>
                        @else
                        <li type="none" style="font-weight: bold; margin-bottom:10px;">Klik tombol <i class="fa fa-trash-o"></i> untuk menghapus fasilitas tersebut </li>
                          @foreach ($fasilitas as $fasilitass )
                          <li class="d-flex custom-bullet" style="justify-content: space-between;"><span>{{ $fasilitass->nama_fasilitas }}</span><a style="display: inline-block;" href={{ route('hapus_fasilitas',['id_fasilitas' => $fasilitass->id_fasilitas ]) }} title="hapus layanan" class="d-inline-block ml-5"><i class="fa fa-trash-o"></i></a></li>
                          @endforeach
                        @endif
                      </ul>
                    </div>
                    <div class="dropzone-area">
                      <div class="file-upload-icon">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                              stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                              <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                              <path d="M14 3v4a1 1 0 0 0 1 1h4" />
                              <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z" />
                          </svg>
                      </div>
                      <p style="font-weight: bold">Masukkan File Untuk Menambah fasilitas</p>
                      <input type="file" id="upload-file" name="file_fasilitas">
                      <p class="message">No Files Selected</p>
                  </div>
                </div>
              </div>
      
              <div class="formbold-form-step-3">
                <div class="formbold-form-confirm">
                  <p>Click SUBMIT jika sudah yakin, jika belum klik <a href="/penginapan">Disini</a></p>
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
  <script>
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