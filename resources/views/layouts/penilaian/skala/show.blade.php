@extends('master')

@section('title', 'Skala Penilaian')

@section('content')
{{-- tabel skala penilaian --}}
    <div class="card" style="width:30%">
        <div class="card-body p-0">
            <div class="table-responsive">
            <table class="table table-striped mb-0">
                <thead>
                    <tr>
                        <th colspan="2">Skala Penilaian</th>
                    </tr>
                </thead>
                <tbody>      
                    @foreach ($data_skala as $data)
                        <tr>
                            <td>{{ $data->bobot }}</td>
                            <td>{{ $data->status }}</td>
                        </tr>
                    @endforeach          
                </tbody>
            </table>
            </div>
        </div>
    </div>
@endsection