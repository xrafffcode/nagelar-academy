<x-admin-layout active="category" title="Kategori Pelathian">
    <div class="card">
        <div class="card-header">
            Data Kategori Pelatihan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.kategori-pelatihan.edit', $category->id) }}"
                                        class="btn btn-warning me-1 mb-1">Edit</a>


                                    <form action="{{ route('admin.kategori-pelatihan.destroy', $category->id) }}" method="post"
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
            <a href="{{ route('admin.kategori-pelatihan.create') }}" class="btn btn-primary me-1 mb-1 float-end">
                Tambah Kategori
            </a>
        </div>
    </div>


</x-admin-layout>
