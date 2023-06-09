@extends('master')

@section('title', 'Calon Paskibra')

@section('content')

    <a href="#" data-toggle="modal" data-target="#modalAjax" class="btn btn-primary btn-action mb-3" style="width: 10%" data-toggle="tooltip" title="" data-original-title="Tambah"><i class="fas fa-plus pt-1"></i></a>
    
    {{-- <form id="form-periode" action="{{ route('show-periode') }}" method="get"> --}}
        @csrf
        <div class="form-group ml-auto" style="width: 20%">
            <select class="form-control" id="periode-tampil" name="periode">
                <option value="">-- Pilih Tahun Periode --</option>
                @php
                    $tahun_now = \Carbon\Carbon::now()->format('Y');
                    $tahun_last = \Carbon\Carbon::now()->format('Y')-5;
                @endphp
    
                @for($i = $tahun_now; $i >= $tahun_last; $i--)
                    <option value="{{ $i }}">{{ $i }}</option>
                @endfor
            </select>
        </div>
    {{-- </form> --}}
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-striped mb-0" id="data-table">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Alamat</th>
                    <th>Asal Sekolah</th>
                    <th>Jenis Kelamin</th>
                    <th>Tanggal Lahir</th>
                    <th>No Telp</th>
                    <th style="width: 15%">Action</th>
                </tr>
                </thead>
                <tbody>                
                    @php
                        $no = 1;
                    @endphp     
                    
                    @foreach ($data_paskib as $data)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->alamat }}</td>
                        <td>{{ $data->asal_sekolah }}</td>
                        <td>{{ $data->jenis_kelamin }}</td>
                        <td>{{\Carbon\Carbon::parse($data->tgl_lahir)->isoFormat('D MMMM Y')}}</td>
                        <td>{{ $data->no_telp }}</td>
                        <td>
                            <a href="javascript:void(0)" id="edit-calon-paskib" data-toggle="modal" data-target="#modalAjax" data-id="{{ $data->id }}" class="btn btn-secondary btn-action mr-1" data-toggle="tooltip"><i class="fas fa-pencil-alt pt-1"></i></a>

                            <a href="javascript:void(0)" class="btn btn-danger btn-action delete-calon-paskib" data-toggle="modal" data-id="{{ $data->id }}" data-toggle="tooltip"><i class="fas fa-trash pt-1"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

{{-- modal edit --}}
    <form id="calon-paskib-form" enctype="multipart/form-data">
        @csrf
        {{-- @method('put') --}}
        {{-- id kriteria --}}
        <input type="hidden" id="calon-paskib-id">
        <div class="modal fade" id="modalAjax" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Tambah Calon Paskibra</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-size:15px" for="periode">Periode Penerimaan</label>
                            <select class="form-control" id="periode">
                                <option value="">-- Pilih Tahun Periode --</option>
                                @php
                                    $tahun_now = \Carbon\Carbon::now()->format('Y');
                                    $tahun_last = \Carbon\Carbon::now()->format('Y')-5;
                                @endphp

                                @for($i = $tahun_now; $i >= $tahun_last; $i--)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                            <p class="error" id="periode-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="name">Nama Lengkap</label>
                            <input type="text" class="form-control" value="" id="name">
                            <p class="error" id="name-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="alamat">Alamat</label>
                            <input type="text" class="form-control" value="" id="alamat">
                            <p class="error" id="alamat-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="asal_sekolah">Asal Sekolah</label>
                            <input type="text" class="form-control" value="" id="asal_sekolah">
                            <p class="error" id="asal_sekolah-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="jenis_kelamin">Jenis Kelamin</label>
                            <select class="form-control" id="jenis_kelamin">
                                <option value="">-- Pilih Kelas --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <p class="error" id="jenis_kelamin-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="" id="tgl_lahir">
                            <p class="error" id="tgl_lahir-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="no_telp">No Telp</label>
                            <input type="text" class="form-control" value="" id="no_telp">
                            <p class="error" id="no_telp-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save-calon-paskib" value="create" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>