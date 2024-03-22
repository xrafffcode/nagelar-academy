<x-user-layout title="Checkout {{ $training->title }}" active="checkout">
    @push('addonStyle')
        <link rel="stylesheet" href="{{ asset('assets/frontend/css/checkout.css') }}">

        <style>
        </style>
    @endpush
    <section class="py-5" style="margin-top: 90px">
        <div class="container">
            <div class="row">
                <div class="text-center col-lg-12">
                    <h1 class="mb-3 header-primary">
                        Checkout Kelas
                    </h1>

                </div>
            </div>
            <div class="mt-5 row pricing testimonials mentors checkout gy-4" id="reviews">
                <div class="col-lg-4 col-md-5 col-12 p-md-0 offset-lg-1">
                    <div class="d-block" id="courseCardCheckout"
                        style="position: relative; transition: all 600ms ease-in-out 0s; top: 0px;">
                        <div class="course-card">
                            <div class="embed-responsive embed-responsive-16by9 video-iframe ">
                                <div class="plyr__video-embed" id="player">
                                    <iframe
                                        src="{{ $training->trailer_url }}?autoplay=1&amp;?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                                        allowfullscreen="" allowtransparency="" allow="autoplay" frameborder="0"
                                        id="__existing-iframe-id" data-gtm-yt-inspected-5="true"></iframe>
                                </div>
                            </div>
                            <div class="course-detail">
                                <a>
                                    <h2 class="course-name line-clamp-2">
                                        {{ $training->title }}
                                    </h2>
                                </a>
                                <div class="d-flex mt-2 align-items-center gap-1">
                                    @if ($training->discount_price != null)
                                        <p class="discount">@idr($training->price)</p>
                                    @endif
                                    @idr($training->discount_price)
                                </div>
                            </div>
                            <div class="course-footer mt-auto">
                                <div class="star-rating">
                                    @php
                                        $rating = $training->testimonialTrainings()->avg('rating');
                                    @endphp

                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($rating >= $i)
                                            <p class="text-warning text-sm me-1"><i class="fas fa-star"></i></p>
                                        @else
                                            <p class="text-secondary-light text-sm me-1"><i class="fas fa-star"></i></p>
                                        @endif
                                    @endfor
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-7 col-12 ">
                    <div class="payment-details">
                        <div class="item-pricing item-mentor d-flex flex-column gap-3">
                            <h5 class="header-title mb-0">
                                Keuntungan yang kamu dapatkan
                            </h5>
                            <div class="d-flex justify-content-between gap-2 align-items-center benefits-for-you">
                                <div class="d-flex gap-3 align-items-center">

                                    <div class="d-flex flex-column">
                                        <h5 class="header-title mb-1">
                                            Grup Diskusi Belajar
                                        </h5>
                                        <p>Bonus dari kami</p>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/frontend/image/ic_check.svg') }}" alt="Check">
                            </div>
                            <div class="d-flex justify-content-between gap-2 align-items-center benefits-for-you">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="d-flex flex-column">
                                        <h5 class="header-title mb-1">
                                            Akses Free Template Web/Design
                                        </h5>
                                        <p>Bonus dari kami</p>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/frontend/image/ic_check.svg') }}" alt="Check">
                            </div>
                            <div class="d-flex justify-content-between gap-2 align-items-center benefits-for-you">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="d-flex flex-column">
                                        <h5 class="header-title mb-1">
                                            Portfolio Berkelas
                                        </h5>
                                        <p>Bonus dari kami</p>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/frontend/image/ic_check.svg') }}" alt="Check">
                            </div>
                            <div class="d-flex justify-content-between gap-2 align-items-center benefits-for-you">
                                <div class="d-flex gap-3 align-items-center">
                                    <div class="d-flex flex-column">
                                        <h5 class="header-title mb-1">
                                            Sertifikat Kelulusan
                                        </h5>
                                        <p>Bonus dari kami</p>
                                    </div>
                                </div>
                                <img src="{{ asset('assets/frontend/image/ic_check.svg') }}" alt="Check">
                            </div>
                        </div>
                    </div>
                    <form id="form-manual" method="post" action="{{ route('checkout.checkout') }}">
                        @csrf
                        <div class="payment-details  mt-4">
                            <div class="item-pricing item-mentor">

                                <input id="training_id" type="hidden" name="training_id" value="{{ $training->id }}">

                                <h5 class="header-title">
                                    Detail Pembelian
                                </h5>

                                <div class="tab-content" id="pills-tabContent">
                                    <div class="item">
                                        <p class="title">
                                            Harga kelas
                                        </p>
                                        <p class="value">
                                            @if ($training->discount_price != null)
                                                <span class="discount">@idr($training->price)</span>
                                                @idr($training->discount_price)
                                            @else
                                                @idr($training->price)
                                            @endif
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <p class="title">
                                            Biaya Admin
                                        </p>
                                        <p class="value text-green">
                                            @idr(5000)
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item" style="display: none;" id="discountArea">
                                        <p class="title">
                                            Total Diskon
                                        </p>

                                        <p class="value">
                                            <strong id="discountAmount">

                                            </strong>
                                        </p>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="item">
                                        <p class="title">
                                            Total transfer
                                        </p>
                                        <p class="value">
                                            @if ($training->discount_price != null)
                                                <strong id="midtransPrice">
                                                    @idr($training->discount_price + 5000)
                                                </strong>
                                            @else
                                                <strong id="midtransPrice">
                                                    @idr($training->price + 5000)
                                                </strong>
                                            @endif
                                        </p>
                                        <div class="clear"></div>
                                    </div>



                                    <button class="mt-4 mb-2 btn bgTheme w-100 text-white border-12 py-3"
                                        type="submit">
                                        Bayar
                                    </button>


                                </div>
                            </div>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </section>
    @push('addonScript')
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function formatRupiah(number) {
                return new Intl.NumberFormat('id-ID', {
                    style: 'currency',
                    currency: 'IDR'
                }).format(number);
            }
        </script>
    @endpush
</x-user-layout>
