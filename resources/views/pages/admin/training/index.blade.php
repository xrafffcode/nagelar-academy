<x-admin-layout active="training" title="Pelatihan">
    <div class="card">
        <div class="card-header">
            Data Pelatihan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Kategori</th>
                            <th>Mentor</th>
                            <th>Rating</th>
                            <th>Harga</th>
                            <th>Sistem</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainings as $training)
                            <tr>
                                <td>{{ $training->id }}</td>
                                <td>{{ $training->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $training->thumbnail) }}" alt="thumbnail"
                                        class="img-thumbnail" width="100">
                                </td>
                                <td>{{ $training->category->name }}</td>
                                <td>{{ $training->mentor->full_name }}</td>
                                <td>{{ $training->rating }}</td>
                                <td>{{ $training->price }}</td>
                                <td>{{ $training->system }}</td>
                                <td>
                                    <a href="{{ route('admin.pelatihan.edit', $training->id) }}"
                                        class="btn btn-warning me-1 mb-1">Edit</a>
                                    <form action="{{ route('admin.pelatihan.destroy', $training->id) }}" method="post"
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
            <a href="{{ route('admin.pelatihan.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Pelatihan</a>
        </div>
    </div>


</x-admin-layout>
