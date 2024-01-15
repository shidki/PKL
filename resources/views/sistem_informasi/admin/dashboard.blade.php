@extends('sistem_informasi.admin.main')
@section('main')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-8 d-flex align-items-strech">
        <div class="card w-100">
          <div class="card-body">
            <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
              <div class="mb-3 mb-sm-0">
                <h5 class="card-title fw-semibold">Jumlah Pengunjung</h5>
              </div>
              {{-- <div>
                <select class="form-select">
                  <option value="1">March 2023</option>
                  <option value="2">April 2023</option>
                  <option value="3">May 2023</option>
                  <option value="4">June 2023</option>
                </select>
              </div> --}}
            </div>
            <div id="chart"></div>
          </div>
        </div>
      </div>
      <div class="col-lg-4">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">Jumlah Pengguna</h5>
                <div class="row align-items-center">
                  <div class="col-8">
                    <h4 class="fw-semibold mb-3">{{ $jml_pengguna }}</h4>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-center">
                      <div id="breakup"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          {{-- <div class="col-lg-12">
            <!-- Monthly Earnings -->
            <div class="card">
              <div class="card-body">
                <div class="row alig n-items-start">
                  <div class="col-8">
                    <h5 class="card-title mb-9 fw-semibold"> Jumlah User </h5>
                    <h4 class="fw-semibold mb-3">{{ $jml_user }}</h4>
                  </div>
                </div>
              </div>
              <div id="earning"></div>
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  var jmlAdmin = {{ $jml_admin }};
  var jmlUser = {{ $jml_user }};
  var tglKunjungan = {!! json_encode($tgl_kunjungan) !!};
  var get_tanggal_kunjungan = Object.keys(tglKunjungan);
  var get_jml_kunjungan = Object.values(tglKunjungan);

</script>
@endsection