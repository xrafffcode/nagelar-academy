<x-admin-layout active="training" title="Edit Pelatihan">
    <div class="card">
        <div class="card-header">
            Edit Pelatihan
        </div>
        <div class="card-body">
            <form action="{{ route('admin.pelatihan.update', $training->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group my-4">
                    <label for="title" class="form-label">Nama</label>
                    <input type="text" name="title" id="title"
                        class="form-control @error('title') is-invalid @enderror" value="{{ $training->title }}"
                        placeholder="Ex: Pelatihan Menjahit Baju Jas Proffesional">
                    @error('title')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="description" class="form-label">Deskripsi</label>
                    <textarea name="description" id="description" cols="30" rows="10"
                        class="form-control @error('description') is-invalid @enderror">{{ $training->description }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="thumbnail" class="form-label">Thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail"
                        class="form-control @error('thumbnail') is-invalid @enderror">
                    @error('thumbnail')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="trailer_url" class="form-label">Trailer Url</label>
                    <input type="text" name="trailer_url" id="trailer_url"
                        class="form-control @error('trailer_url') is-invalid @enderror"
                        value="{{ $training->trailer_url }}"
                        placeholder="Ex: https://www.youtube.com/watch?v=QH2-TGUlwu4">

                    @error('trailer_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="youtube_url" class="form-label">Youtube Url</label>
                    <input type="text" name="youtube_url" id="youtube_url"
                        class="form-control @error('youtube_url') is-invalid @enderror"
                        value="{{ $training->youtube_url }}"
                        placeholder="Ex: https://www.youtube.com/watch?v=QH2-TGUlwu4">
                    <div class="form-text">*Jika sistem pelatihan mu offline maka kosongkan saja</div>
                    @error('youtube_url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="map_location" class="form-label">Iframe Map</label>
                    <input type="text" name="map_location" id="map_location"
                        class="form-control @error('map_location') is-invalid @enderror"
                        value="{{ $training->map_location }}"
                        placeholder="Ex: <iframe src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.657148425989!2d106.82415831476932!3d-6.175660995496159!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f0f0f0f0f0f%3A0x2e69f0f0f0f0f0f!2sJl.%20Kebon%20Jeruk%20No.1%2C%20RT.1%2FRW.1%2C%20Kb.%20Jeruk%2C%20Kec.%20Kb.%20Jeruk%2C%20Kota%20Jakarta%20Barat%2C%20Daerah%20Khusus%20Ibukota%20Jakarta%2011210!5e0!3m2!1sid!2sid!4v1626331000000!5m2!1sid!2sid&quot; width=&quot;600&quot; height=&quot;450&quot; style=&quot;border:0;&quot; allowfullscreen=&quot;&quot; loading=&quot;lazy&quot;></iframe>">
                    <div class="form-text">*Jika sistem pelatihan mu online maka kosongkan saja</div>
                    @error('map_location')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="address" class="form-label">Alamat</label>
                    <input type="text" name="address" id="address"
                        class="form-control @error('address') is-invalid @enderror" value="{{ $training->address }}"
                        placeholder="Ex: Jl. Kebon Jeruk No.1, RT.1/RW.1, Kb. Jeruk, Kec. Kb. Jeruk, Kota Jakarta Barat, Daerah Khusus Ibukota Jakarta 11210">
                    @error('address')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="destination" class="form-label">Kategori</label>
                    <select name="category_id" class="form-select @error('category_id') is-invalid @enderror"
                        id="category_id">
                        <option value="">Pilih Kategori</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}"
                                {{ $training->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group my-4">
                    <label for="destination" class="form-label">Mentor</label>
                    <select name="mentor_id" class="form-select @error('mentor_id') is-invalid @enderror"
                        id="mentor_id">
                        <option value="">Pilih Mentor</option>
                        @foreach ($mentors as $mentor)
                            <option value="{{ $mentor->id }}"
                                {{ $training->mentor_id == $mentor->id ? 'selected' : '' }}>
                                {{ $mentor->full_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group my-4">
                    <label for="price" class="form-label">Harga</label>
                    <input type="number" name="price" id="price"
                        class="form-control @error('price') is-invalid @enderror" value="{{ $training->price }}"
                        placeholder="Ex: 100000">
                    @error('price')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="destination" class="form-label">Sistem Pembelajaran</label>
                    <select name="system" class="form-select @error('system') is-invalid @enderror" id="system">
                        <option value="">Pilih Sistem Pembelajaran</option>
                        <option value="Offline" {{ $training->system == 'Offline' ? 'selected' : '' }}>Offline
                        </option>
                        <option value="Online" {{ $training->system == 'Online' ? 'selected' : '' }}>Online</option>
                    </select>
                </div>
                <div class="form-group my-4">
                    <label for="destination" class="form-label">Level</label>
                    <select name="level" class="form-select @error('level') is-invalid @enderror" id="level">
                        <option value="">Pilih Tingkatan Pembelajaran</option>
                        <option value="Pemula" {{ $training->level == 'Pemula' ? 'selected' : '' }}>Pemula</option>
                        <option value="Menengah" {{ $training->level == 'Menengah' ? 'selected' : '' }}>Menengah
                        </option>
                        <option value="Profesional" {{ $training->level == 'Profesional' ? 'selected' : '' }}>
                            Profesional</option>
                    </select>
                </div>
                <div class="form-group my-4">
                    <label for="meeting" class="form-label">Pertemuan</label>
                    <input type="number" name="meeting" id="meeting"
                        class="form-control @error('meeting') is-invalid @enderror" value="{{ $training->meeting }}"
                        placeholder="Berapa Kali Pertemuan? Ex: 10">

                    @error('meeting')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="per_week" class="form-label">Perminggu</label>
                    <input type="number" name="per_week" id="per_week"
                        class="form-control @error('per_week') is-invalid @enderror"
                        value="{{ $training->per_week }}"
                        placeholder="Berapa
                        Kali Pertemuan Perminggu? Ex: 2">

                    @error('per_week')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="training_info" class="form-label">Info Pelatihan</label>
                    <input type="text" name="training_info" id="training_info"
                        class="form-control @error('training_info') is-invalid @enderror"
                        value="{{ $training->training_info }}"
                        placeholder="Ex: Pelatihan dilakukan secara offline, Setiap pertemuan berlangsung 2 jam.">

                    @error('training_info')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div class="col-12 d-flex justify-content-end">
                    <a href="{{ route('admin.pelatihan.index') }}" type="button"
                        class="btn btn-light-secondary me-1 mb-1">Kembali</a>
                    <button type="submit" class="btn btn-primary me-1 mb-1">
                        Edit Pelatihan
                    </button>
                </div>
            </form>

        </div>
    </div>


    @push('addonScript')
        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var konten = document.getElementById("description");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
    @endpush
</x-admin-layout>
