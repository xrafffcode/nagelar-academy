<x-dashboard-user-layout title="Artikel Saya" active="my-articel">
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

    <div class="row ">
        @forelse ($articels as $articel)
            <div class="col col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                <div class="card card-training shadow-sm mt-4">
                    <a href="/artikel/{{ $articel->slug }}" class="m-2 mb-1 border-0 position-relative">
                        <div class="card-img-top"
                            style="background-image: url('{{ asset('storage/' . $articel->thumbnail) }}');">
                        </div>
                    </a>
                    <a href="/artikel/{{ $articel->slug }}" class="card-body">
                        <h5 class="card-title">{{ $articel->title }}</h5>
                        <p>
                            <span class="off">{{ $articel->viewerArticels->count() }} Pengunjung</span>
                        </p>
                    </a>
                    <div class="footer-card p-3">
                        <form action="{{ route('admin.artikel.destroy', $articel->id) }}" method="post"
                            class="d-inline">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger me-1 mb-1"
                                onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus Artikel</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center p-5 text-danger">
                <strong>Anda Belum Membuat Artikel</strong>
                <br>

            </div>
        @endforelse
        <div class="p-3">
            <a href="{{ route('profil.createarticel') }}" class="btn bgTheme w-100 text-white p-3 rounded-12">Tambah
                Artikel</a>
        </div>
    </div>

    @push('addonScript')
        <script>
            document.querySelector('.navbar-expand-lg').classList.add('scrolled');
        </script>
    @endpush
</x-dashboard-user-layout>
