@extends('layouts.app-admin')

@section('navbar-admin')
    <main>
        <div class="container-xxl flex-grow-1 container-p-y">
            <a class="btn btn-primary mb-3" href="{{ url('dashboard-article/create') }}">Tambah Menu</a>
            @include('layouts.message')
            <!-- Responsive Table -->
            <div class="card">
                <h5 class="card-header">Artikel</h5>
                <div class="table-responsive">
                    <table class="table table-bordered vw-100">
                        <thead>
                            <tr class="text-center">
                                <th>No</th>
                                <th>Gambar</th>
                                <th>Nama Menu</th>
                                <th>Deskripsi Menu</th>
                                <th>Nama Resto</th>
                                <th>Link</th>
                                <th>Kota</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = $data->firstItem(); ?>
                            @foreach ($data as $item)
                                <tr>
                                    <th scope="row">{{ $i }}</th>
                                    <th scope="row">
                                        <img src="{{ asset('storage/images/' . $item->image) }}" class="rounded"
                                            style="width: 150px">
                                    </th>
                                    <th scope="row">{{ $item->judul_artikel }}</th>
                                    <th scope="row">{!! substr($item->isi_artikel, 0, 400) !!}</th>
                                    <th scope="row">{{ $item->nama_resto }}</th>
                                    <th scope="row">{{ $item->link }}</th>
                                    <th scope="row"
                                        class=" text-center badge {{ $item->status_publish === 'publish' ? 'bg-primary text-white' : 'bg-warning text-white' }} m-2">
                                        {{ $item->status_publish }}
                                    </th>
                                    <td scope="row">
                                        <a href="{{ url('dashboard-article/' . $item->id) . '/edit' }}"
                                            class="btn btn-warning mb-2"><i class=" fa fa-solid fa-pen-to-square"
                                                style="color:white;"></i></a>
                                        <form action="{{ url('dashboard-article/' . $item->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger mb-2"><i
                                                    class="fa fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                        </tbody>
                        @endforeach
                    </table>
                </div>
                {{ $data->links() }}
            </div>
            <!--/ Responsive Table -->
        </div>
        <!-- / Content -->
        @include('layouts.footer-admin')

        <script defer src="https://use.fontawesome.com/releases/v5.15.4/js/fontawesome.js"
            integrity="sha384-dPBGbj4Uoy1OOpM4+aRGfAOc0W37JkROT+3uynUgTHZCHZNMHfGXsmmvYTffZjYO" crossorigin="anonymous">
        </script>

    </main>
@endsection
<!-- Content -->
