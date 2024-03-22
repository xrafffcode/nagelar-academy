<x-dashboard-user-layout title="Tambah Artikel" active="create-article">
    @push('addonStyle')
        <style>
            body {
                background: #f2f0ff !important;
            }

            .card-img-top {
                width: 100%;
                height: 280px;
                background-position: center;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 14px;
            }


            input {
                border: 1px solid #e9ecef !important;
            }

            input:focus {
                border: 1px solid #e9ecef !important;
                box-shadow: none !important;
            }
        </style>
    @endpush

    <div class="d-flex justify-content-center p-3">
        <form action="{{ route('profil.storearticel') }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf




            <div class="form-group ">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" name="title" id="title"
                    class="form-control py-2 px-3  @error('title') is-invalid @enderror" value="" required=""
                    value="{{ old('title') }}">

                @error('title')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group
                    mt-3">
                <label for="thumbnail" class="form-label fw-bold">Thumbnail</label>
                <input type="file" name="thumbnail" id="thumbnail"
                    class="form-control py-2 px-3  @error('thumbnail') is-invalid @enderror" value=""
                    required="" value="{{ old('thumbnail') }}">
                @error('thumbnail')
                    <div class="alert alert-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group mt-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" rows="6"
                    class="form-control py-2 px-3 @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                @error('content')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <button type="submit" class="btn bgTheme text-white  py-2 w-100 mt-4 fw-bold">Post Artikel</button>
        </form>
    </div>



    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');
        </script>


        <script src="https://cdn.ckeditor.com/4.16.0/standard/ckeditor.js"></script>

        <script>
            var konten = document.getElementById("content");
            CKEDITOR.replace(konten, {
                language: 'en-gb'
            });
            CKEDITOR.config.allowedContent = true;
        </script>
    @endpush
</x-dashboard-user-layout>
