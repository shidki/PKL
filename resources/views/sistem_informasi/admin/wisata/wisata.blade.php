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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-IYF3A/b5QDsjjr6f5lC7PgeVojOO0GW7R+EiAtkdbY//SWEZDtQqFJ9C1STh0pcHp1K5V02LFQKZ1KGHTtL54A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <div class="text-right mr-3 mb-3">
                <button type="submit" class="btn btn-success" data-bs-toggle="modal"  data-bs-target="#staticBackdrop"><i class="fa fa-plus"></i> <span class="d-inline-block ml-3">Add Admin</span></button>
            </div>
           {{-- POP UP ADD WISATA --}}
           <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Add Wisata</h5>
                    </div>
                    <form action="/add/wisata" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="nama">Nama Wisata :</label>
                                <input id="nama" type="text" class="form-control" placeholder="Masukkan naama wisata" required name="nama">
                            </div>
                            <div class="form-group">
                                <label for="deskripsi">Deskripsi :</label>
                                <textarea name="deskripsi" class="form-control" placeholder="Masukkan deskripsi" id="deskripsi" cols="30" rows="10"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat :</label>
                                <input id="alamat" type="text" class="form-control" placeholder="Masukkan Alamat" required name="alamat">
                            </div>
                            <div class="form-group">
                                <label for="harga">Harga Tiket :</label>
                                <input id="harga" type="number" class="form-control" placeholder="Masukkan harga" required name="harga">
                            </div>
                            <div class="form-group">
                                <label for="jarak">Jarak dari balaikota (Km) :</label>
                                <input id="jarak" type="number" class="form-control" placeholder="Masukkan jarak" required name="jarak">
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
                                            <th>No <button style="border: none; background: transparent;" onclick="sortTable()"><i class="fa fa-sort text-light ml-2"></i></button></th>
                                            {{-- <th>Nama<button style="border: none; background: transparent;" onclick="sortTableName()"><i class="fa fa-sort text-light ml-2"></i></button></th> --}}
                                            <th>Nama</th>
                                            <th>Deskripsi</th>
                                            <th>alamat<br>
                                            <th>harga tiket<br>
                                            <th>jarak<br>
                                            <th>#</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wisata as $wisatas )
                                        <tr>
                                            <th scope="row" class="scope" width="150px">{{ $loop->iteration }}</th>
                                            <td class="text-center" width="150px">{{ $wisatas->nama }}</td>
                                            <td class="text-justify" style="width: 300px;">{{ $wisatas->deskripsi }}</td>
                                            <td class="text-center" style="width: 260px;">{{ $wisatas->alamat }}</td>
                                            <td class="text-center" style="width: 260px;">{{ $wisatas->harga_tiket }}</td>
                                            <td class="text-center" style="width: 260px;">{{ $wisatas->jarak }} <strong>Km</strong></td>
                                            <td style="width: 300px">
                                                <a href={{ route('delete_wisata' , ['id' => $wisatas->id]) }} class="d-inline-block" style="margin-right:28px;" title="delete" name="delete">
                                                    <i style="font-size: 20px" class="fa fa-trash"></i>
                                                </a>
                                                <a href={{route('edit_wisata' ,['id' => $wisatas->id ])}} class="d-inline-block" title="edit" name="edit">
                                                    <i class="fa fa-pencil" style="font-size: 20px"></i>
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


</body>

</html>
@endsection