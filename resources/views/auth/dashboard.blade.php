<x-dashboard-user-layout title="Dashboard" active="dashboard">
    @push('addonStyle')
        <style>
            body {
                background: #f2f0ff !important;
            }

            .small-box .fas {
                font-size: 2rem;

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
        </style>
    @endpush


    <div class="row justify-content-center align-items-center g-2">
        @hasrole('user')
            <div class="col">
                <div class="small-box">
                    <div class="inner">
                        <div class="d-flex">
                            <i class="fas fa-clipboard me-3"></i>
                            <h3>{{ $ct }}</h3>
                        </div>
                        <h6>Pelatihan terdaftar</h5>
                    </div>

                </div>
            </div>=
        @endhasrole
        @hasrole('mentor')
            <div class="col-6">
                <div class="small-box">
                    <div class="inner">
                        <div class="d-flex">
                            <i class="fas fa-clipboard me-3"></i>
                            <h3>{{ \App\Models\Training::where('mentor_id', Auth::user()->id)->count() }}</h3>
                        </div>
                        <h6>Kelas yang kamu buat</h5>
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="small-box">
                    <div class="inner">
                        <div class="d-flex">
                            <i class="fas fa-user-friends me-3"></i>
                            <h3>{{ \App\Models\UserTraining::whereHas('training', function ($query) {
                                $query->where('mentor_id', Auth::user()->id);
                            })->count() }}
                            </h3>
                        </div>
                        <h6>Peserta kelas kamu</h5>
                    </div>
                </div>
            </div>
        @endhasrole
    </div>

    @hasrole('user')
        <h4 class="mt-3">Progres Pelatihan</h4>
        @if ($ct != 0)
            @foreach ($ut as $ut)
                <div class="card card-training mt-4 border-0 ">
                    <div class="row g-0">
                        <div class="col-md-4 p-2">
                            <img src="{{ asset('storage/' . $ut->training->thumbnail) }}" class="img-fluid  rounded-3"
                                alt="...">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $ut->training->title }}</h5>

                                <div class="d-flex justify-content-between mt-5">
                                    <p class="card-text"><small class="text-muted">{{ $ut->training->meeting }}x
                                            Pertemuan</small></p>
                                    <p class="card-text">System: @if ($ut->training->system == 'Offline')
                                            <span class="off">Offline</span>
                                        @endif
                                        @if ($ut->training->system == 'Online')
                                            <span class="on">Online
                                            </span>
                                        @endif
                                    </p>
                                </div>
                                <div class="progress mt-3">
                                    <div class="progress-bar w-75" role="progressbar" aria-label="Basic example"
                                        aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
            <div class="col-12 text-center p-5 text-danger">
                <strong>Anda Belum Memiliki Pelatihan</strong>
            </div>
        @endif
    @endhasrole

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
