<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Daftar Buku Populer') }}
        </h2>
    </x-slot>

    <div class="container" style="margin-top: 5%">
        @if(Session::has('pesan'))
            <div class="alert alert-success fade show" id="success-alert" role="alert">{{ Session::get('pesan') }}</div>
        @endif

        <div class="card">
            <div class="card-body">

                <table class="table table-striped table-bordered table-fixed">
                    <thead>
                        <tr>
                            <th scope="col" style="width: 50px;">No.</th>
                            <th scope="col">Judul Buku</th>
                            <th scope="col">Penulis</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($data_buku as $buku)
                        <tr>
                            <td>{{ ++$no }}</td>
                            <td>
                                <a href="{{ route('buku.galeri', $buku->id) }}">
                                    <div class="flex items-center">
                                        @if ($buku->filepath)
                                            <div class="relative h-10 w-10">
                                                <img
                                                    class="h-full w-full rounded-full object-cover object-center"
                                                    src="{{ asset($buku->filepath) }}"
                                                    alt="thumbnail"
                                                />
                                            </div>
                                        @endif
                                        <span class="ml-2">{{ $buku->judul }}</span>
                                    </div>
                                </a>
                            </td>
                            <td>{{ $buku->penulis }}</td>
                            <td>{{ $buku->harga }}</td>
                            <td>{{ $buku->avg_rating }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>                
                
                <div>{{ $data_buku->links('vendor.pagination.bootstrap-5') }}</div>

            </div>
        </div>
    </div>

</x-app-layout>
