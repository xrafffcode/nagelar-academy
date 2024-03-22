<x-dashboard-user-layout title="Profil Saya" active="profil">
    @push('addonStyle')
        <style>
            body {
                background: #f2f0ff !important;
            }

            .card-training .card-body .card-title {
                font-size: 24px !important;
                font-weight: 600 !important;
                color: #131313;
            }

            .progress {
                display: flex;
                height: 0.5rem;
                overflow: hidden;
                font-size: .75rem;
                background-color: #e9ecef;
                border-radius: 0.25rem;
            }

            .card-training .card-body .card-text {
                font-size: 14px !important;
                font-weight: 600 !important;
                color: #131313;
            }

            input {
                border: 1px solid #e9ecef !important;
            }

            input:focus {
                border: 1px solid #e9ecef !important;
                box-shadow: none !important;
            }

            .profile-pic {
                width: 200px;
                height: 200px;
                background-position: inherit;
                background-size: cover;
                background-repeat: no-repeat;
                border-radius: 100%;
            }
        </style>
    @endpush
    <div class="d-flex justify-content-center p-5">
        <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            @method('put')
            <input type="hidden" name="id" id="id" value="{{ $user->id }}">
            <div class="text-center position-relative">
                <img src="{{ asset('storage/' . $user->profile_picture) }}" width="100" class="profile-pic"
                    id="previewImage">
                <div class="form-group position-absolute" style="left: 55%; top: 82%">
                    <input type="file" name="profile_picture" id="profile_picture" style="display: none;">
                    <label for="profile_picture"
                        class="form-label m-0 bg-white shadow-base py-1 px-2 rounded-circle baseColor"><i
                            class="fas fa-pencil-alt"></i></label>
                </div>
            </div>

            <div class="form-group mt-5">
                <label for="email" class="form-label fw-bold">Email Address</label>
                <input type="text" name="email" id="email" class="form-control   py-2 px-3 p"
                    value="{{ $user->email }}" required="" disabled>
            </div>
            <div class="form-group mt-3">
                <label for="full_name" class="form-label fw-bold">Nama Lengkap</label>
                <input type="text" name="full_name" id="full_name" class="form-control bg-white  py-2 px-3 p"
                    value="{{ $user->full_name }}" required="">
            </div>


            <button type="submit" class="btn bgTheme text-white  py-2 w-100 mt-4 fw-bold">Simpan</button>
        </form>
    </div>



    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');

            const previewImage = document.querySelector('#previewImage');
            const image = document.querySelector('#profile_picture');

            image.addEventListener('change', function() {
                const file = new FileReader();
                file.readAsDataURL(image.files[0]);

                file.onload = function(e) {
                    previewImage.src = e.target.result;
                }
            })
        </script>
    @endpush
</x-dashboard-user-layout>
