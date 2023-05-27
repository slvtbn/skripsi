@extends('master')

@section('title', 'Aspek Penilaian')

@section('content')

    <a href="#" data-toggle="modal" data-target="#modalAjax" class="btn btn-primary btn-action mb-3" style="width: 10%" data-toggle="tooltip" title="" data-original-title="Tambah"><i class="fas fa-plus pt-1"></i></a>
    <div class="card" style="width:50%">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                <tr>
                    <th>No</th>
                    <th>Aspek</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody>        
                @php
                    $no = 1;  
                @endphp
                @foreach ($data as $d)                 
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $d->aspek }}</td>
                    <form action="{{ route('delete-aspek', $d->id) }}" method="post" id="formDelete-{{ $d->id }}">
                        <td>
                            @csrf
                            @method('delete')
                            <a href="javascript:void(0)" id="edit-aspek" data-toggle="modal" data-target="#modalAjax" data-id="{{ $d->id }}" class="btn btn-secondary btn-action mr-1" data-toggle="tooltip" title="" data-original-title="{{ $d->id }}"><i class="fas fa-pencil-alt pt-1"></i></a>
                            <a class="btn btn-danger btn-action" data-toggle="tooltip" title="" data-confirm="Anda Yakin Ingin Menghapus Data?" data-confirm-yes="submitDelete({{ $d->id }})" data-original-title="{{ $d->id }}"><i class="fas fa-trash pt-1"></i>
                            </a>
                            
                        </td>
                    </form>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection

{{-- modal input --}}
    <form id="aspek-form">
        @csrf
        <input type="hidden" id="aspek-id">
        <div class="modal fade" id="modalAjax" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modal-title">Tambah Aspek Penilaian</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label style="font-size:15px" for="aspek">Aspek</label>
                            <input type="text" class="form-control" name="aspek" id="aspek">
                            <p class="error" id="aspek-error" style="color:red; margin: 0; font-style:italic; font-size:8px "></p>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="save-aspek" value="create" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </form>