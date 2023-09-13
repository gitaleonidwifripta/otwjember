<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.1.2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 p-5">
    <h4 class="font-bold text-center">Destinasi Wisata</h4>
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-5">
        @foreach ($destinasi as $items)
        <div class="card p-3 shadow-lg">
            <div class="mb-3">
                @if ($items->gambar_des)
                <img src="{{ $message->embed(asset('/upload/' . $items->gambar_des)) }}" alt="Image" class="w-full h-56 object-cover">
                @else
                <img src="assets/pict/sample-1.png" alt="Image" class="w-full h-56 object-cover">
                @endif
            </div>
            <h5 class="text-xl mb-2">{{ $items->nama_des }}</h5>
            <div class="flex space-x-1 mb-3">
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star text-yellow-400"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <span class="text-gray-600">(3)</span>
            </div>
            <p class="mb-3 flex items-center text-gray-600"><i class="fas fa-location-arrow"></i> {{ $items->alamat }}</p>
            <hr class="mb-3">
            <div class="grid grid-cols-3 text-center border-t border-b py-2 mb-3">
                <div>
                    <p class="text-sm text-gray-600">Jam Buka</p>
                    <p>08.00</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Jam Tutup</p>
                    <p>17.00</p>
                </div>
                <div>
                    <p class="text-sm text-gray-600">Status</p>
                    <p class="text-xs px-2 py-1 rounded {{ $items->status_des == 'Buka' ? 'bg-green-500' : 'bg-red-500' }} text-white">
                        {{ $items->status_des == 'Buka' ? 'buka' : 'Tutup' }}
                    </p>
                </div>
            </div>
            <div class="flex justify-between items-center">
                <div>
                    <p class="text-sm text-gray-600">Harga Tiket</p>
                    <p class="text-gray-700">Rp7.000 s/d Rp15.000</p>
                </div>
                <a href="{{ route('cari_wisata', ['destinasi' => $items->id_destinasi]) }}" class="bg-blue-500 text-white text-sm px-4 py-2 rounded">Pesan</a>
            </div>
        </div>
        @endforeach
    </div>

</body>

</html>
