<html lang="id">

<head>

    <script type="text/javascript" async="" src="https://www.google-analytics.com/analytics.js"></script>
    <script type="text/javascript" async=""
        src="https://www.googletagmanager.com/gtag/js?id=G-WCYD3HR7G7&amp;l=dataLayer&amp;cx=c"></script>
    <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-146603038-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-146603038-1');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Invoice</title>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://class.buildwithangga.com/css/style.css">
    <style>
        p {
            max-width: 100%;
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&amp;display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="https://class.buildwithangga.com/themes/front/css/nd.css">


    <link rel="shortcut icon" href="{{ asset('assets/frontend/image/favicon.png') }}" type="image/x-icon">


    <style type="text/css">
        #_copy {
            align-items: center;
            background: #4494d5;
            border-radius: 3px;
            color: #fff;
            cursor: pointer;
            display: flex;
            font-size: 13px;
            height: 30px;
            justify-content: center;
            position: absolute;
            width: 60px;
            z-index: 1000
        }

        #select-tooltip,
        #sfModal,
        .modal-backdrop,
        div[id^=reader-helper] {
            display: none !important
        }

        .modal-open {
            overflow: auto !important
        }

        ._sf_adjust_body {
            padding-right: 0 !important
        }

        .super_copy_btns_div {
            position: fixed;
            width: 154px;
            left: 10px;
            top: 45%;
            background: #e7f1ff;
            border: 2px solid #4595d5;
            font-weight: 600;
            border-radius: 2px;
            font-family: -apple-system, BlinkMacSystemFont, Segoe UI, PingFang SC, Hiragino Sans GB, Microsoft YaHei, Helvetica Neue, Helvetica, Arial, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol;
            z-index: 5000
        }

        .super_copy_btns_logo {
            width: 100%;
            background: #4595d5;
            text-align: center;
            font-size: 12px;
            color: #e7f1ff;
            line-height: 30px;
            height: 30px
        }

        .super_copy_btns_btn {
            display: block;
            width: 128px;
            height: 28px;
            background: #7f5711;
            border-radius: 4px;
            color: #fff;
            font-size: 12px;
            border: 0;
            outline: 0;
            margin: 8px auto;
            font-weight: 700;
            cursor: pointer;
            opacity: .9
        }

        .super_copy_btns_btn:hover {
            opacity: .8
        }

        .super_copy_btns_btn:active {
            opacity: 1
        }
    </style>
</head>

<body>
    <main class="main-wrapper d-none d-sm-block d-print-none">
        <div class="container">
            <div class="row mb-4">
                <div class="col-lg-12">
                    <h1 class="header-primary mb-3">
                        Invoice Kelas
                    </h1>
                    <p class="subtitle-primary">
                        Unduh bukti pembayaran <br class="desktop"> sebagai dokumentasi pribadi
                    </p>
                </div>
            </div>
            <div class="affiliate-box" style="max-width: 800px;">
                <div class="row invoice-box">
                    <div class="col-lg-12 col-12">
                        <div class="content">
                            <div class="information">
                                <div class="row mb-4">
                                    <div class="col-lg-8 col-12">
                                        <img src="{{ asset('assets/frontend/image/logo.svg') }}" class="mb-4"
                                            height="30">
                                        <h3 class="mb-0">#{{ $transaction->transaction_code }}</h3>
                                        <p class="mt-1 mb-0">
                                            Pelatihan: <strong>{{ $transaction->training->title }}</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-4 text-right col-12">
                                        <p class="mb-0 mt-2">
                                            Issued: {{ $transaction->updated_at }}
                                        </p>
                                        <p>
                                            Status: <strong>SUCCESS</strong>
                                        </p>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="row mb-4">
                                    <div class="col-lg-6 col-12">
                                        <p class="mb-0 text-blue">
                                            Bill From:
                                        </p>
                                        <p class="mb-0">
                                            <strong>PT. Skill Shop</strong>
                                        </p>
                                        <p class="mb-0">
                                            SMK TELKOM PURWOKERTO
                                        </p>
                                        <p class="mb-0">
                                            (081) 2345678
                                        </p>
                                        <p class="mb-0">
                                            skillshop.xyz
                                        </p>
                                    </div>
                                    <div class="col-lg-6 col-12 text-right">
                                        <p class="mb-0 text-blue">
                                            Bill To:
                                        </p>
                                        <p class="mb-0">
                                            <strong>{{ $transaction->user->full_name }}</strong>
                                        </p>
                                        <p class="mb-0">
                                            {{ $transaction->user->email }}
                                        </p>
                                        <p class="mb-0">
                                            {{ $transaction->user->job }}
                                        </p>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-lg-12 col-12">
                                        <table class="table">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nama Produk</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Qty</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <th scope="row">1</th>
                                                    <td width="45%">{{ $transaction->training->title }}</td>
                                                    <td>
                                                        @idr($transaction->training->price)
                                                    </td>
                                                    <td>1</td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">

                                    <p class="text-center">
                                        <a href="javascript:window.print();" class="btn btn-primary mt-4">Print
                                            Invoice</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.4.1.js" integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
            crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

    </main>
    <section class="mobile-layout-nd d-block d-sm-none">
        <div class="pb-5 mb-5">
            <div class="row header-wrapper text-center mb-3">
                <div class="col-12">
                    <img src="https://class.buildwithangga.com/themes/front/images/ic_no_support_device.svg"
                        class="my-5 img-fluid">
                    <h1 class="header mb-3">
                        Invoice
                    </h1>
                    <p class="subtitle">
                        Halaman ini hanya dapat diakses melalui tampilan Desktop
                    </p>
                    <a class="btn btn-primary my-3" href="{{ route('profil.myorder') }}">Back to
                        Home</a>
                </div>
            </div>
        </div>

    </section>
    <div class="row invoice-box d-none d-print-block">
        <div class="col-lg-12 col-12">
            <div class="content">
                <div class="information">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <img src="{{ asset('assets/frontend/image/logo.svg') }}" class="mb-4"
                                        height="30" alt="logo buildwith angga">
                                    <h3 class="mb-0">#{{ $transaction->transaction_code }}</h3>
                                    <p class="mt-1 mb-0">
                                        Pelatihan: <strong>{{ $transaction->training->title }}</strong>
                                    </p>
                                </td>
                                <td style="width: 50%;" class="text-right">
                                    <br><br><br><br>
                                    <p class="mb-0 mt-2">
                                        Issued: {{ $transaction->updated_at }}
                                    </p>
                                    <p>
                                        Status: <strong>SUCCESS</strong>
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr class="mb-2">
                    <table style="width: 100%">
                        <tbody>
                            <tr>
                                <td style="width: 50%;">
                                    <p class="mb-0 text-blue">
                                        Bill From:
                                    </p>
                                    <p class="mb-0">
                                        <strong>PT. Skill Shop</strong>
                                    </p>
                                    <p class="mb-0">
                                        SMK TELKOM PURWOKERTO
                                    </p>
                                    <p class="mb-0">
                                        (081) 2345678
                                    </p>
                                    <p class="mb-0">
                                        skillshop.xyz
                                    </p>
                                </td>
                                <td style="width: 50%;" class="text-right">
                                    <p class="mb-0 text-blue">
                                        Bill To:
                                    </p>
                                    <p class="mb-0">
                                        <strong>{{ $transaction->user->full_name }}</strong>
                                    </p>
                                    <p class="mb-0">
                                        {{ $transaction->user->email }}
                                    </p>
                                    <p class="mb-0">
                                        {{ $transaction->user->job }}
                                    </p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-12">
                            <table class="table">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Produk</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Qty</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td width="45%">{{ $transaction->training->title }}</td>
                                        <td>
                                            @idr($transaction->training->price)
                                        </td>
                                        <td>1</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <hr>

                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js"
        integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js"
        integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous">
    </script>
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>


</body>

</html>
