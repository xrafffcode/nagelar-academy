<x-admin-layout active="articel" title="Artikel">
    <div class="card">
        <div class="card-header">
            Data Artikel
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Thumbnail</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articels as $articel)
                            <tr>
                                <td>{{ $articel->id }}</td>
                                <td>{{ $articel->title }}</td>
                                <td>
                                    <img src="{{ asset('storage/' . $articel->thumbnail) }}" alt="thumbnail"
                                        class="img-thumbnail" width="100">
                                </td>
                                <td nowrap>
                                    @if ($articel->status == 'on_review')
                                        <a href="{{ route('admin.artikel.show', $articel->id) }}"
                                            class="btn btn-info me-1 mb-1">
                                            Review
                                        </a>
                                    @endif


                                    <a href="{{ route('admin.artikel.edit', $articel->id) }}"
                                        class="btn btn-warning me-1 mb-1">Edit</a>
                                    <form action="{{ route('admin.artikel.destroy', $articel->id) }}" method="post"
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
            <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary me-1 mb-1 float-end">Tambah
                Artikel</a>
        </div>


    </div>


</x-admin-layout>
