@extends('layouts.app')

@section('title', 'Halaman prodi')
@section('content')
    @include('layouts.alert')
    <h3>Data Program Studi</h3>
    <a href="/prodi/create" class="btn btn-success px-2 py-1 mb-2">Tambah Data</a>
    <table class="table table-striped" id="tbl-prodi">
      <thead class="thead-inverse">
        <tr>
          <th>No</th>
          <th>Kode Prodi</th>
          <th>Nama Prodi</th>
          <th>Kaprodi</th>
          <th>Pilihan</th>
        </tr>
        </thead>
      
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
    $(function() {
      $('#tbl-prodi').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('datatablesprodi')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'No'},
            {data: 'kode_prodi', name: 'kode_prodi'},
            {data: 'nama_prodi', name: 'nama_prodi'},
            {data: 'kaprodi', name: 'prodi'},
            {data: 'action', name:'action'}
        ]
    });
});
    </script>
@endpush