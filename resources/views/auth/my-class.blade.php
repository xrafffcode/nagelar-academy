<x-dashboard-user-layout title="Kelas Saya" active="my-class">
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
        </style>
    @endpush





    @if ($ct != 0)
        <div class="row ">
            @foreach ($ut as $ut)
                <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="card card-training shadow-sm mt-4">
                        <a href="/training-playing/{{ $ut->training->slug }}" class="m-2 mb-1 border-0 position-relative">
                            <div class="card-img-top"
                                style="background-image: url('{{ asset('storage/' . $ut->training->thumbnail) }}');">
                            </div>
                        </a>
                        <a href="" class="card-body">
                            <h5 class="card-title">{{ $ut->training->title }}</h5>
                            <p>System: @if ($ut->training->system == 'Offline')
                                    <span class="off">Offline</span>
                                @endif
                                @if ($ut->training->system == 'Online')
                                    <span class="on">Online
                                    </span>
                                @endif
                            </p>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="col-12 text-center p-5 text-danger">
            <strong>Anda Belum Memiliki Pelatihan</strong>
        </div>
    @endif

    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');

            const previewImage = document.querySelector('#previewImage');
            const image = document.querySelector('#image');

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
