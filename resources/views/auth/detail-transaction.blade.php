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
    <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
        <thead class="bg-dark text-white text-center">
            <tr>
                <th colspan="2">
                    <h5 class="m-0 fw-bold">Data Transakasi {{ $data->transaction_code }}</h5>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th width="20%" class="align-middle">ID</th>
                <td class="align-middle">{{ $data->id }}</td>
            </tr>
            <tr>
                <th class="align-middle">Produk </th>
                <td class="align-middle">{{ $data->product->title }}</td>
            </tr>
            <tr>
                <th class="align-middle">Nama</th>
                <td class="align-middle">{{ $data->name }}</td>
            </tr>
            <tr>
                <th class="align-middle">Email Address</th>
                <td class="align-middle">{{ $data->email }}</td>
            </tr>
            <tr>
                <th class="align-middle">Nomer Hp</th>
                <td class="align-middle">{{ $data->phone_number }}</td>
            </tr>
            <tr>
                <th class="align-middle">Alamat</th>
                <td class="align-middle">{{ $data->address }}</td>
            </tr>
            <tr>
                <th class="align-middle">Notes</th>
                <td class="align-middle">{{ $data->transaction_message }}</td>
            </tr>
            <tr>
                <th class="align-middle">Bukti Pembyaran</th>
                <td class="align-middle">
                    @if (isset($data->product_payment->image))
                        <img src="{{ asset('storage/' . $data->product_payment->image) }}" alt="Bukti Pembayaran"
                            class="img-fluid">
                    @else
                        PENDING
                    @endif
                </td>
            </tr>
            <tr>
                <th class="align-middle">Jenis Pembayaran</th>
                <td class="align-middle">
                    {{ isset($data->product_payment->type) ? $data->product_payment->type : 'PENDING' }}
                </td>
            </tr>
            <tr>
                <th class="align-middle">Nama Pembayaran</th>
                <td class="align-middle">
                    {{ isset($data->product_payment->name) ? $data->product_payment->name : 'PENDING' }}
                </td>
            </tr>

            <tr>
                <th class="align-middle">Total Produk</th>
                <td class="align-middle">
                    {{ $data->item }} Item
                </td>
            </tr>
            <tr>
                <th class="align-middle">Total Harga</th>
                <td class="align-middle">
                    @idr($data->transaction_total)
                </td>
            </tr>
            <tr>
                <th class="align-middle">Status</th>
                <td class="align-middle">{{ $data->transaction_status }}</td>
            </tr>
            <tr>
                <th class="align-middle">Action</th>
                <td class="align-middle d-flex align-items-center">
                    @if ($data->transaction_status == 'PENDING' or $data->transaction_status == 'WAITING')
                        <form action="{{ route('profil.updatetransaction', $data->id) }}" method="POST">
                            @csrf
                            @method('put')

                            <button type="submit" class="btn btn-primary text-white fw-bolder">
                                Selesaikan Transaksi
                            </button>
                        </form>
                        <form action="" method="post">
                            @csrf

                            <button type="submit" class="btn btn-danger fw-bolder mx-3">
                                Batalkan Transaksi
                            </button>
                        </form>
                    @endif
                    <form action="" method="POST">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn btn-danger fw-bolder">
                            Hapus Transaksi
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    </table>







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
