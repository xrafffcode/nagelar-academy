<x-dashboard-user-layout title="Transaksi" active="my-transaction">
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
                    <th>Nama Produk</th>

                    <th>Transaksi Total</th>
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
                            {{ $transaction->product->title }}
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
                            @elseif($transaction->transaction_status == 'SUCCESSFUL')
                                <span class="badge bg-success">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @elseif($transaction->transaction_status == 'FAILED')
                                <span class="badge bg-danger">
                                    {{ $transaction->transaction_status }}
                                </span>
                            @endif
                        </td>

                        <td nowrap>
                            <a href="{{ route('profil.transactiondetail', $transaction->id) }}"
                                class="btn btn-primary btn-sm me-2">
                                <i class="fas fa-eye
                                        ">
                                </i>

                            </a>
                            {{-- @if ($transaction->transaction_status == 'SUCCESSFUL')
                                <form action="{{ route('myorder.voucher.tour', $transaction->id) }}" target="_blank"
                                    method="post">
                                    @csrf

                                    <input type="hidden" name="kode" id="kode"
                                        value="{{ $transaction->transaction_code }}">
                                    <button class="btn btn-primary btn-sm ml-2">
                                        <p class="m-0"><i class="fas fa-file-alt"></i></p>
                                    </button>
                                </form>
                            @else
                                <button class="btn btn-primary btn-sm ml-2 disabled">
                                    <p class="m-0"><i class="fas fa-file-alt"></i></p>
                                </button>
                            @endif --}}
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
