@extends('master')

@section('title', 'Nilai')

@section('content')
    <a href="#" data-toggle="modal" data-target="#modalAjax" class="btn btn-primary btn-action mb-3 mr-3" style="width: 10%" data-toggle="tooltip" title="" data-original-title="Tambah"><i class="fas fa-plus pt-1"></i></a>
    <a href="{{ route('perhitungan') }}" class="btn btn-primary btn-action mb-3" style="width: 20%">Hitung Proses</a>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Asal Sekolah</th>
                        <th>Jenis Kelamin</th>
                        <th style="width: 20%">Action</th>
                    </tr>
                    </thead>
                    <tbody>                
                        @php
                            $no = 1;
                        @endphp     
                        
                        @foreach ($data_nilai as $data)
                        <tr>
                            <td>{{ $no++ }}</td>
                            <td>{{ $data->calon_paskibraka->name }}</td>
                            <td>{{ $data->calon_paskibraka->asal_sekolah }}</td>
                            <td>{{ $data->calon_paskibraka->jenis_kelamin }}</td>
                            <td>
                                <form action="{{ route('delete-nilai', $data->id) }}" method="post" id="formDelete-{{ $data->id }}">
                                    @csrf
                                    @method('delete')
                                    <a href="javascript:void(0)" id="edit-nilai" data-toggle="modal" data-target="#modalAjax" data-id="{{ $data->id }}" class="btn btn-secondary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="{{ $data->id }}"><i class="fas fa-pencil-alt pt-1"></i></a>
                                    <a class="btn btn-danger btn-action mr-1" data-toggle="tooltip" title="" data-confirm="Anda Yakin Ingin Menghapus Data?" data-confirm-yes="submitDelete({{ $data->id }})"><i class="fas fa-trash pt-1"></i>
                                    </a>
                                    <a class="btn btn-primary btn-action" id="detail-nilai" data-toggle="modal" data-target="#modalDetail" data-id="{{ $data->id }}" title=""><i class="fas fa-info pt-1"></i></a>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- modal input dan edit --}}
<form id="nilai-form">
    @csrf
    <input type="hidden" id="nilai-id" name="id">
    <div class="modal fade" id="modalAjax" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-title">Tambah Nilai</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label style="font-size:15px" for="nama_lengkap">Nama Lengkap</label>
                        {{-- <input type="text" class="form-control" value="" name="nama_lengkap" id="search_name" autocomplete="off" > --}}
                       <select id="cari-nama" class="form-control" name="calon_paskibraka_id" style="width: 100%;">
                            <option value="" disabled selected>-- Pilih Nama Calon Paskibra --</option>
                            @foreach ($data_calon as $data)
                                <option value={{ $data->id }}>{{ $data->name }}</option>
                            @endforeach
                       </select>
                       <p class="error" id="calon_paskibraka_id-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="akademik">Akademik</label>
                        <input type="text" class="form-control" value="" id="akademik" name="akademik">
                        <p class="error" id="akademik-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="jalan_ditempat">Jalan Ditempat</label>
                        <input type="text" class="form-control" value="" id="jalan_ditempat" name="jalan_ditempat">
                        <p class="error" id="jalan_ditempat-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="langkah_tegap">Langkah Tegap</label>
                        <input type="text" class="form-control" value="" id="langkah_tegap" name="langkah_tegap">
                        <p class="error" id="langkah_tegap-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="penghormatan">Penghormatan</label>
                        <input type="text" class="form-control" value="" id="penghormatan" name="penghormatan">
                        <p class="error" id="penghormatan-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="belok">Belok</label>
                        <input type="text" class="form-control" value="" id="belok" name="belok">
                        <p class="error" id="belok-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="hadap">Hadap</label>
                        <input type="text" class="form-control" value="" id="hadap" name="hadap">
                        <p class="error" id="hadap-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="lari">Lari</label>
                        <input type="text" class="form-control" value="" id="lari" name="lari">
                        <p class="error" id="lari-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="pushup">Push Up</label>
                        <input type="text" class="form-control" value="" id="pushup" name="pushup">
                        <p class="error" id="pushup-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="situp">Sit Up</label>
                        <input type="text" class="form-control" value="" id="situp" name="situp">
                        <p class="error" id="situp-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="pullup">Pull Up</label>
                        <input type="text" class="form-control" value="" id="pullup" name="pullup">
                        <p class="error" id="pullup-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="tb">Tinggi Badan</label>
                        <input type="text" class="form-control" value="" id="tb" name="tb">
                        <p class="error" id="tb-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="bb">Berat Badan</label>
                        <input type="text" class="form-control" value="" id="bb" name="bb">
                        <p class="error" id="bb-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                    <div class="form-group">
                        <label style="font-size:15px" for="bentuk_kaki">Bentuk Kaki</label>
                        <select class="form-control" id="bentuk_kaki" name="bentuk_kaki">
                            <option value="">-- Pilih Bentuk Kaki --</option>
                            <option value="5">Normal</option>
                            <option value="3">X / O <= 5cm</option>
                            <option value="1">X / 0 > 5cm</option>
                        </select>
                        <p class="error" id="bentuk_kaki-error" style="color:red; margin: 0; font-size:12px"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" id="save-nilai" value="create" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</form>

{{-- modal detail nilai --}}
<div class="modal fade" id="modalDetail" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-title">Detail Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="identitas-section">
                    <p>Nama Lengkap&nbsp;&nbsp;&nbsp;&nbsp; : <b id="nama_lengkap"></b></p>
                    <p>Jenis Kelamin&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <b id="gender"></b></p>
                    <p>Asal Sekolah&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : <b id="sekolah"></b></p>
                </div>
                <hr>
                <div class="nilai-section">
                    <div class="nilai mb-4">
                        <div class="aspek mb-2"><b>Akademik</b></div>
                        <div class="kriteria">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" style="font-size: 12px; width: 20%; text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Sejarah Paskibra</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        <tr>
                                            <td id="nilai_akademik"></td>
                                        </tr>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="nilai mb-4">
                        <div class="aspek mb-2"><b>PBB</b></div>
                        <div class="kriteria">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" style="font-size: 12px; text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Jalam Ditempat</th>
                                            <th>Langkah Tegap</th>
                                            <th>Penghormatan</th>
                                            <th>Belok Kanan / Kiri</th>
                                            <th>Hadap Kanan / Kiri</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        <tr>
                                            <td id="nilai_jalan_ditempat"></td>
                                            <td id="nilai_langkah_tegap"></td>
                                            <td id="nilai_penghormatan"></td>
                                            <td id="nilai_belok"></td>
                                            <td id="nilai_hadap"></td>
                                        </tr>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="nilai mb-4">
                        <div class="aspek mb-2"><b>Jasmani</b></div>
                        <div class="kriteria">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" style="font-size: 12px; width: 80%; text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Lari</th>
                                            <th>Push Up</th>
                                            <th>Sit Up</th>
                                            <th>Pull Up</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        <tr>
                                            <td id="nilai_lari"></td>
                                            <td id="nilai_pushup"></td>
                                            <td id="nilai_situp"></td>
                                            <td id="nilai_pullup"></td>
                                        </tr>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="nilai mb-4">
                        <div class="aspek mb-2"><b>Fisik</b></div>
                        <div class="kriteria">
                            <div class="table-responsive">
                                <table class="table table-striped mb-0" style="font-size: 12px; width: 70%; text-align:center;">
                                    <thead>
                                        <tr>
                                            <th>Tinggi Badan</th>
                                            <th>Berat Badan</th>
                                            <th>Bentuk Kaki</th>
                                        </tr>
                                    </thead>
                                    <tbody>    
                                        <tr>
                                            <td id="nilai_tb"></td>
                                            <td id="nilai_bb"></td>
                                            <td id="nilai_bentuk_kaki"></td>
                                        </tr>            
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="submit" id="print-nilai" value="print" class="btn btn-primary">Print</button> --}}
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
