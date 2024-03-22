<x-admin-layout active="transaction" title="Transaksi">
    <div class="card">
        <div class="card-header">
            Detail Transaksi {{ $data->transaction_code }}
        </div>
        @if ($data->type == 'pay_now')
            <div class="card-body">
                <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
                    <thead class="bgTheme text-white text-center">
                        <tr>
                            <th colspan="2">
                                <h5 class="m-0 fw-bold">Data Transaksi Pay Now</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th width="20%" class="align-middle">ID</th>
                            <td class="align-middle">{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <th class="align-middle">Pelatihan</th>
                            <td class="align-middle">{{ $data->training->title }}</td>
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
                            <th class="align-middle">Bukti Pembyaran</th>
                            <td class="align-middle">
                                @if (isset($data->payment->image))
                                    <a href="{{ asset('storage/' . $data->payment->image) }}" data-lightbox="example-1">
                                        <img id="zoom-img" class="img-fluid mb-3"
                                            src="{{ asset('storage/' . $data->payment->image) }}" width="100">
                                    </a>
                                @else
                                    PENDING
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th class="align-middle">Tanggal Transaksi</th>
                            <td class="align-middle">
                                {{ Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}
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
                                    <form action="{{ route('admin.transaksi.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('put')

                                        <button type="submit" class="btn btn-primary text-white fw-bolder me-2">
                                            Selesaikan Transaksi
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.transaksi.destroy', $data->id) }}" method="POST">
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

            </div>
        @endif

        @if ($data->type == 'pay_later')
            <div class="card-body">
                <table class="table table-bordered rounded-3 bg-white my-0 mx-auto">
                    <thead class="bgTheme text-white text-center">
                        <tr>
                            <th colspan="2">
                                <h5 class="m-0 fw-bold">Data Transaksi Pay Later</h5>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th width="20%" class="align-middle">ID</th>
                            <td class="align-middle">{{ $data->id }}</td>
                        </tr>
                        <tr>
                            <th class="align-middle">Pelatihan</th>
                            <td class="align-middle">{{ $data->training->title }}</td>
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
                            <th class="align-middle">Foto KTP</th>
                            <td class="align-middle">
                                @if (isset($data->pay_later->id_card_image))
                                    <a href="{{ asset('storage/' . $data->pay_later->id_card_image) }}"
                                        data-lightbox="example-1">
                                        <img id="zoom-img" class="img-fluid mb-3"
                                            src="{{ asset('storage/' . $data->pay_later->id_card_image) }}"
                                            width="100">
                                    </a>
                                @else
                                    PENDING
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th class="align-middle">Foto Selfie</th>
                            <td class="align-middle">
                                @if (isset($data->pay_later->selfie_photo))
                                    <a href="{{ asset('storage/' . $data->pay_later->selfie_photo) }}"
                                        data-lightbox="example-1">
                                        <img id="zoom-img" class="img-fluid mb-3"
                                            src="{{ asset('storage/' . $data->pay_later->selfie_photo) }}"
                                            width="100">
                                    </a>
                                @else
                                    PENDING
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th class="align-middle">Tanggal Transaksi</th>
                            <td class="align-middle">
                                {{ Carbon\Carbon::parse($data->date)->translatedFormat('d F Y') }}
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
                                    <form action="{{ route('admin.transaksi.update', $data->id) }}" method="POST">
                                        @csrf
                                        @method('put')

                                        <button type="submit" class="btn btn-primary text-white fw-bolder me-2">
                                            Selesaikan Transaksi
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.transaksi.destroy', $data->id) }}" method="POST">
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

            </div>
        @endif
    </div>
</x-admin-layout>
