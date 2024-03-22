<x-admin-layout active="mentor" title="Tambah Mentor">
    <div class="card">
        <div class="card-header">
            Tambah Mentor
        </div>
        <div class="card-body">
            <form action="{{ route('admin.mentor.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="form-group my-4">
                    <label for="name" class="form-label">Nama Lengkap</label>
                    <input type="text" class="form-control  @error('full_name') is-invalid @enderror"
                        placeholder="Masukan nama lengkap mu" name="full_name" value="{{ old('full_name') }}" />
                    @error('full_name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="image" class="form-label">Foto Mentor</label>
                    <input type="file" name="profile_picture"
                        class="form-control @error('profile_picture') is-invalid @enderror" id="profile_picture"
                        value="{{ old('profile_picture') }}">
                    @error('profile_picture')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="name" class="form-label">Jenis Kelamin</label>
                    <select class="form-select form-control  @error('gender') is-invalid @enderror" name="gender">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="Laki-Laki" @if (old('gender') == 'Laki-Laki') selected @endif>Laki Laki
                        </option>
                        <option value="Perempuan" @if (old('gender') == 'Perempuan') selected @endif>Perempuan
                        </option>

                    </select>
                    @error('gender')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="name" class="form-label">Email</label>
                    <input type="text" class="form-control  @error('email') is-invalid @enderror"
                        placeholder="Masukan email" name="email" value="{{ old('email') }}" />
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group my-4">
                    <label for="name" class="form-label">Password</label>
                    <input type="password" class="form-control  @error('password') is-invalid @enderror"
                        placeholder="Masukan password" name="password" value="{{ old('password') }}" />
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary me-1 mb-1 float-end">Tambah Mentor</button>
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
