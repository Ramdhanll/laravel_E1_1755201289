@extends('layouts.app')

@section('title', 'Halaman mahasiswa')

@section('content')
    <table class="table table-striped" id="tbl-mhs">
      <thead class="thead-inverse">
        <tr>
          <th>No</th>
          <th>NIM</th>
          <th>Nama</th>
          <th>Jurusan</th>
          <th>Alamat</th>
        </tr>
        </thead>
        <tbody>
          <tr>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
    </table>
@endsection

@push('scripts')
    <script>
    $(function() {
      $('#tbl-mhs').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{route('datatablesmhs')}}",
        columns: [
            {data: 'DT_RowIndex', name: 'No'},
            {data: 'nim', name: 'nim'},
            {data: 'nama_lengkap', name: 'nama_lengkap'},
            {data: 'prodi', name: 'prodi'},
            {data: 'alamat', name: 'alamat'},
        ]
    });
});
    </script>
@endpush