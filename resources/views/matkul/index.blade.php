@extends('layouts.app')

@section('title', 'Halaman matkul')
@section('content')
    @include('layouts.alert')
    <h3>Data Mata Kuliah</h3>
    <a href="/mata-kuliah/create" class="btn btn-success px-2 py-1 mb-2">Tambah Data</a>
    <table class="table table-striped" id="tbl-matkul">
      <thead class="thead-inverse">
        <tr>
          <th>No</th>
          <th>Kode Matkul</th>
          <th>Nama Matkul</th>
          <th>sks</th>
          <th>Semester</th>
          <th>Pilihan</th>
        </tr>
        </thead>
      
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
    $(function() {
      $('#tbl-matkul').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('datatablesmatkul')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'No'},
            {data: 'kode_matkul', name: 'kode_matkul'},
            {data: 'nama_matkul', name: 'nama_matkul'},
            {data: 'sks', name: 'sks'},
            {data: 'semester', name: 'semester'},
            {data: 'action', name:'action'}
        ]
    });
});
    </script>
@endpush