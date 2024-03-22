<x-admin-layout active="mentor" title="Mentor">
    <div class="card">
        <div class="card-header">
            Data Mentor
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nama Mentor</th>
                            <th>Email</th>

                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($mentors as $mentor)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $mentor->full_name }}</td>
                                <td>{{ $mentor->email }}</td>

                                <td>

                                    <form action="{{ route('admin.pelatihan.destroy', $mentor->id) }}" method="post"
                                        class="d-inline">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger me-1 mb-1"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <a href="{{ route('admin.mentor.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Mentor</a>
        </div>
    </div>


</x-admin-layout>
