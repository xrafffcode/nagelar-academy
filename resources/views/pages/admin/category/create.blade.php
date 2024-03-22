<x-admin-layout active="category" title="Tambah Kategori Pelatihan">
    <div class="card">
        <div class="card-header">
            Tambah Kategori Pelatihan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.kategori-pelatihan.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group my-4">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" name="name" id="name"
                        class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                        placeholder="Ex: Fashion">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="form-group
                    my-4">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" name="slug" id="slug"
                        class="form-control @error('slug') is-invalid @enderror" value="{{ old('slug') }}"
                        placeholder="Ex: fashion">
                    @error('slug')
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
    <script>
        const title = document.querySelector('#name');
        const slug = document.querySelector('#slug');

        title.addEventListener('keyup', function() {
            const titleValue = title.value;
            slug.value = titleValue.toLowerCase().split(' ').join('-');
        });
    </script>
@endpush
</x-admin-layout>
