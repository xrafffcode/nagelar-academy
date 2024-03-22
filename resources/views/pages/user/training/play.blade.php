<x-dashboard-user-layout title="{{ $training->title }}" active="play-class">
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

            .embed-responsive {
                display: block;
                height: 50vh;
                overflow: hidden;
                padding: 0;
                position: relative;
                width: 100% !important;
            }

            .video-iframe {
                border-radius: 16px;
                transition: all .3s;
            }



            .embed-responsive:before {
                content: "";
                display: block;
            }

            .embed-responsive iframe {
                border-radius: 16px;
                width: 100%;
                height: 50vh;
            }


            .plyr__video-embed {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;

            }

            .img-thubmnail {
                width: 100%;
                border-radius: 20px;
            }

            .progress {
                display: flex;
                height: 0.5rem;
                overflow: hidden;
                font-size: .75rem;
                background-color: #e9ecef;
                border-radius: 0.25rem;
            }

            .card-progress {
                border-radius: 10px;
                border: 1px solid #D9D9D9 !important;
            }

            .card-progress .card-text {
                font-size: 16px !important;
                font-weight: 600 !important;

                color: #696C71;
            }

            body.modal-open .row {
                -webkit-filter: blur(4px);
                -moz-filter: blur(4px);
                -o-filter: blur(4px);
                -ms-filter: blur(4px);
                filter: blur(4px);
                filter: url("https://gist.githubusercontent.com/amitabhaghosh197/b7865b409e835b5a43b5/raw/1a255b551091924971e7dee8935fd38a7fdf7311/blur".svg#blur);
                filter: progid:DXImageTransform.Microsoft.Blur(PixelRadius='4');
            }

            .modal-content {
                border: none;
                border-radius: 16px;
            }

            .modal-content .modal-header {
                background-color: #f6f8fd;
                border-radius: 16px 16px 0 0;
            }

            .form-control {
                background-color: #e5e9f2;
                border: 0;
                border: 1px solid #e5e9f2;
                border-radius: 8px;
                color: #34364a;
                font-size: 16px;
                font-weight: 500;
                outline: none;
                padding: 11px 20px;
            }
        </style>


        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
        <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/rater-js.css') }}" />
    @endpush


    @if ($training->system == 'Online')
        <div class="embed-responsive embed-responsive-16by9 video-iframe ">
            <div class="plyr__video-embed" id="player">
                <iframe
                    src="{{ $training->youtube_url }}?autoplay=1&amp;?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                    allowfullscreen="" allowtransparency="" allow="autoplay" frameborder="0" id="__existing-iframe-id"
                    data-gtm-yt-inspected-5="true"></iframe>
            </div>
        </div>
    @endif

    @if ($training->system == 'Offline')
        <img src="{{ asset('storage/' . $training->thumbnail) }}" alt="" class="img-thubmnail">

        <div class="card card-progress  mt-3">
            <div class="card-body">
                <div class="d-flex justify-content-between ">
                    <p class="card-text"><small class="text-muted">{{ $training->meeting }}x
                            Pertemuan</small></p>
                    <p class="card-text">
                        1x Pertemuan Lagi
                    </p>
                </div>
                <div class="progress mt-3">
                    <div class="progress-bar w-75" role="progressbar" aria-label="Basic example" aria-valuenow="75"
                        aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
        <h4 class="mt-5">Jadwal Pelatihan</h4>
        <div id="calendar" class="mt-4"></div>
    @endif

    @if ($review != null)
        <button class="btn bgTheme text-white  py-3 w-100 mt-4 fw-bold border-12">Anda Sudah Memberi Review</button>
    @else
        <button class="btn bgTheme text-white  py-3 w-100 mt-4 fw-bold border-12" data-bs-toggle="modal"
            data-bs-target="#ratingModal">
            Beri Review
        </button>
    @endif



    @push('addonScript')
        <!-- Modal -->
        <div class="modal fade" id="ratingModal" tabindex="-1" aria-labelledby="ratingModalLabel" aria-hidden="true"
            style="   margin-top: 180px">
            <div class="modal-dialog">
                <form class="modal-content" action="
                {{ route('training.review') }}" method="POST">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tuliskan Review Kamu</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body py-4">
                        @csrf
                        <center>
                            <div id="rating"></div>
                        </center>
                        <input type="hidden" name="rating" id="rating-input">
                        <input type="hidden" name="training_id" value="{{ $training->id }}">
                        <textarea name="review" class="form-control mt-3" placeholder="Ketik pesan ..." id="exampleFormControlTextarea1"
                            rows="3"></textarea>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" class="btn bgTheme py-2 text-white ">Submit Rating</button>
                    </div>
                </form>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        <script src="{{ asset('assets/backend/extensions/rater-js/index.js') }}"></script>

        <script>
            raterJs({
                element: document.querySelector("#rating"),
                starSize: 32,
                rateCallback: function rateCallback(rating, done) {
                    this.setRating(rating);
                    document.querySelector('#rating-input').value = rating;
                    done();
                },

            })
        </script>

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
        <script>
            $(document).ready(function() {
                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '{{ Carbon\Carbon::now()->toDateString() }}',
                    navLinks: true,
                    editable: true,
                    eventLimit: true,
                    events: '/api/meetings'
                });
            });
        </script>
    @endpush
</x-dashboard-user-layout>
