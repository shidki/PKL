@extends('sistem_informasi.admin.main')
@section('main')
<div class="container-fluid">
    <!--  Row 1 -->
    <div class="row">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-3 fw-semibold">Jumlah Admin</h5>
                <div class="row align-items-center">
                  <div class="col-8">
                    <h4 class="fw-semibold mb-3">{{ $jml_admin}}</h4>
                  </div>
                  <div class="col-4">
                    <div class="d-flex justify-content-center">
                      {{-- <div id="breakup"></div> --}}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-3">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4">
                  <h5 class="card-title mb-3 fw-semibold">Jumlah Instansi</h5>
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="fw-semibold mb-3">{{ $jml_instansi }}</h4>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        {{-- <div id="breakup"></div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4">
                  <h5 class="card-title mb-3 fw-semibold">Jumlah Penginapan</h5>
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="fw-semibold mb-3">{{ $jml_penginapan }}</h4>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        {{-- <div id="breakup"></div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4">
                  <h5 class="card-title mb-3 fw-semibold">Jumlah Wisata</h5>
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="fw-semibold mb-3">{{ $jml_wisata }}</h4>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        {{-- <div id="breakup"></div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3">
              <!-- Yearly Breakup -->
              <div class="card overflow-hidden">
                <div class="card-body p-4">
                  <h5 class="card-title mb-3 fw-semibold">Jumlah kuliner</h5>
                  <div class="row align-items-center">
                    <div class="col-8">
                      <h4 class="fw-semibold mb-3">{{ $jml_kuliner }}</h4>
                    </div>
                    <div class="col-4">
                      <div class="d-flex justify-content-center">
                        {{-- <div id="breakup"></div> --}}
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-12">
            <!-- Yearly Breakup -->
            <div class="card overflow-hidden">
              <div class="card-body p-4">
                <h5 class="card-title mb-9 fw-semibold">PROFILE</h5>
                <div class="row align-items-center">
                  <div class="col-7 mb-4 mt-2" style="border-bottom: .6px solid rgb(84, 84, 84)">
                    <h4 class="mb-3"><i class="fa fa-envelope-o" style="display: inline-block; margin-right:10px;"></i><span>{{ $email }}</span></h4>
                  </div>
                  <div class="col-7 mb-4 mt-2" style="border-bottom: .6px solid rgb(84, 84, 84)">
                    <h4 class="mb-3"><i class="fa fa-user" style="display: inline-block; margin-right:10px;"></i><span>{{ $name }}</span></h4>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
<script>
  var jmlAdmin = {{ $jml_admin }};
</script>
@endsection