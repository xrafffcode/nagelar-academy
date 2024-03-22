<x-dashboard-user-layout title="Pesanan Saya" active="my-order">
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





    <div class="table-responsive w-100">
        <table class="table table-striped" id="table1">
            <thead>
                <tr>
                    <th>Transacation Code</th>
                    <th>Nama Pelatihan</th>
                    <th>Thumbnail</th>
                    <th>Transakti Total</th>
                    <th>
                        Tanggal Transakasi
                    </th>
                    <th>
                        Status Transaksi
                    </th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                    <tr>
                        <td>{{ $transaction->transaction_code }}</td>
                        <td>
                            {{ $transaction->training->title }}
                        </td>
                        <td>
                            <img src="{{ asset('storage/' . $transaction->training->thumbnail) }}" alt="thumbnail"
                                class="img-thumbnail" width="100">
                        </td>
                        <td>
                            @idr($transaction->transaction_total)
                        </td>
                        <td>
                            {{ $transaction->created_at }}
                        </td>

                        <td>
                            @if ($transaction->transaction_status == 'PENDING')
                                <span class="badge bg-warning text-dark">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @elseif($transaction->transaction_status == 'WAITING')
                                <span class="badge bg-info">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @elseif($transaction->transaction_status == 'SUCCESS')
                                <span class="badge bg-success">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @elseif($transaction->transaction_status == 'FAILED')
                                <span class="badge bg-danger">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @endif
                        </td>

                        <td>
                            @if ($transaction->transaction_status == 'PENDING')
                                <a href="{{ route('checkout.payment', $transaction->transaction_code) }}"
                                    class="btn btn-success me-1 mb-1">Bayar</a>
                            @endif
                            @if ($transaction->transaction_status == 'SUCCESS')
                                <a href="{{ route('invoice', $transaction->transaction_code) }}"
                                    class="btn btn-success me-1 mb-1">Invoice</a>
                            @endif
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>


    @push('addonScript')
        <link rel="stylesheet" href="{{ asset('assets/backend/css/pages/datatables.css') }}">
        <script src="{{ asset('assets/backend/js/pages/datatables.js') }}"></script>

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
