<x-admin-layout active="articel" title="Tambah Artikel">
    <div class="card">
        <div class="card-header">
            Tambah Artikel
        </div>
        <div class="card-body">
            <form action="{{ route('admin.artikel.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group my-4">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ old('title') }}"
                        placeholder="Ex: Pelatihan Menjahit Baju Jas Proffesional">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="image" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror"
                        id="thumbnail" value="{{ old('thumbnail') }}">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group my-4">
                    <label for="content" class="form-label">Content</label>
                    <textarea name="content" id="content" rows="6" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                    @error('content')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary me-1 mb-1 float-end">Tambah Artikel</button>
            </form>

        </div>
    </div>


    @push('addonScript')
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var konten = document.getElementById("content");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
    @endpush
</x-admin-layout>
