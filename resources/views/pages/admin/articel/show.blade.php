<x-admin-layout active="articel" title="Review Artikel">
    <div class="card">
        <div class="card-header">
            Review Artikel
        </div>
        <div class="card-body">
            <h1 class="text-center">{{ $articel->title }}</h1>

            <img src="{{ asset('storage/' . $articel->thumbnail) }}" alt="thumbnail"
                class="img-fluid border-12 mt-3 w-100">
            <div class="mt-3">
                {!! $articel->content !!}
            </div>
            <form action="{{ route('admin.artikel.destroy', $articel->id) }}" method="post" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger me-1 mb-1"
                    onclick="return confirm('Yakin ingin menghapus data ini?')">Tolak Artikel</button>
            </form>

            <form action="{{ route('admin.artikel.accept') }}" method="post" class="d-inline">
                @csrf
                @method('post')
                <input type="hidden" name="id" value="{{ $articel->id }}">
                <button type="submit" class="btn btn-success me-1 mb-1"
                    onclick="return confirm('Yakin ingin menerima artikel ini?')">Terima Artikel</button>
            </form>
        </div>
    </div>



</x-admin-layout>
