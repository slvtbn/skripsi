@extends('master')

@section('title', 'Kriteria Penilaian')

@section('content')

    <a href="#" data-toggle="modal" data-target="#modalAjax" class="btn btn-primary btn-action mb-3" style="width: 10%" data-toggle="tooltip" title="" data-original-title="Tambah"><i class="fas fa-plus pt-1"></i></a>
    <div class="card">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Simbol</th>
                    <th>Kriteria</th>
                    <th>Nilai Target</th>
                    <th>Kelas</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>                
                @php
                    $no = 1;
                @endphp     
                
                @foreach ($data_kriteria as $kriteria)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $kriteria->aspek->aspek }}</td>
                    <td>{{ $kriteria->simbol }}</td>
                    <td>{{ $kriteria->kriteria }}</td>
                    <td>{{ $kriteria->nilai_target }}</td>
                    <td>{{ $kriteria->kelas }}</td>
                    <td>
                        <a href="javascript:void(0)" id="edit-kriteria" data-toggle="modal" data-target="#modalAjax" data-id="{{ $kriteria->id }}" class="btn btn-secondary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="{{ $kriteria->id }}"><i class="fas fa-pencil-alt pt-1"></i></a>
                        
                        <a href="javascript:void(0)" class="btn btn-danger btn-action delete-kriteria" data-toggle="modal" data-id="{{ $kriteria->id }}" data-toggle="tooltip"><i class="fas fa-trash pt-1"></i>
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
    <form id="kriteria-form" enctype="multipart/form-data">
        @csrf
        {{-- @method('put') --}}
        {{-- id kriteria --}}
        <input type="hidden" id="kriteria-id">
        <div class="modal fade" id="modalAjax" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Tambah Kriteria Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-size:15px" for="aspek_id">Aspek</label>
                            <select class="form-control" id="aspek_id">
                                <option value="">-- Pilih Aspek --</option>
                                @foreach ($data_aspek as $aspek)
                                    <option value="{{ $aspek->id }}">{{ $aspek->aspek }}</option>
                                @endforeach
                            </select>
                            <p class="error" id="aspek_id-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="simbol">Simbol</label>
                            <input type="text" class="form-control" value="" id="simbol">
                            <p class="error" id="simbol-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="kriteria">Kriteria</label>
                            <input type="text" class="form-control" value="" id="kriteria">
                            <p class="error" id="kriteria-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="nilai_target">Nilai Target</label>
                            <select class="form-control" id="nilai_target">
                                <option value="">-- Pilih Nilai Target --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                            <p class="error" id="nilai_target-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                        <div class="form-group">
                            <label style="font-size:15px" for="kelas">Kelas</label>
                            <select class="form-control" id="kelas">
                                <option value="">-- Pilih Kelas --</option>
                                <option value="Core Factor">Core Factor</option>
                                <option value="Secondary Factor">Secondary Factor</option>
                            </select>
                            <p class="error" id="kelas-error" style="color:red; margin: 0; font-size:12px"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save-kriteria" value="create" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>