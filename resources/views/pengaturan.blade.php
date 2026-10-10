<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pengaturan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('sidebar')

    <div class="flex-1 p-8">

        <h1 class="text-3xl font-bold mb-8">
            Pengaturan Sistem
        </h1>

        {{-- Pesan berhasil --}}
        @if(session('success'))
            <div class="bg-green-600/20 border border-green-500 text-green-300 px-4 py-3 rounded-lg mb-6">
                {{ session('success') }}
            </div>
        @endif

        {{-- Pesan error --}}
        @if($errors->any())
            <div class="bg-red-600/20 border border-red-500 text-red-300 px-4 py-3 rounded-lg mb-6">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="/pengaturan" method="POST">

            @csrf

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                {{-- Kelembapan Tanah --}}
                <div class="bg-slate-800 rounded-xl p-6">

                    <h2 class="text-xl font-semibold mb-2">
                        Kelembapan Tanah
                    </h2>

                    <p class="text-slate-400 text-sm mb-5">
                        Menentukan batas kelembapan untuk mengaktifkan irigasi otomatis.
                    </p>

                    <label class="block text-sm text-slate-300 mb-2">
                        Batas Kelembapan
                    </label>

                    <div class="flex items-center gap-3">

                        <input
                            type="number"
                            name="soil_threshold"
                            value="{{ $setting->soil_threshold ?? 80 }}"
                            min="0"
                            max="100"
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                        >

                        <span class="text-slate-300">%</span>

                    </div>

                </div>


                {{-- Auto Refill --}}
                <div class="bg-slate-800 rounded-xl p-6">

                    <h2 class="text-xl font-semibold mb-2">
                        Auto-Refill Drum
                    </h2>

                    <p class="text-slate-400 text-sm mb-5">
                        Menentukan batas jarak permukaan air untuk mengaktifkan pengisian drum.
                    </p>

                    <label class="block text-sm text-slate-300 mb-2">
                        Batas Jarak Air
                    </label>

                    <div class="flex items-center gap-3">

                        <input
                            type="number"
                            name="refill_distance"
                            value="{{ $setting->refill_distance ?? 40 }}"
                            min="0"
                            step="0.01"
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                        >

                        <span class="text-slate-300">cm</span>

                    </div>

                </div>


                {{-- Kondisi Tidak Normal --}}
                <div class="bg-slate-800 rounded-xl p-6">

                    <h2 class="text-xl font-semibold mb-2">
                        Deteksi Kondisi Tidak Normal
                    </h2>

                    <p class="text-slate-400 text-sm mb-5">
                        Menentukan waktu pemantauan ketika irigasi aktif tetapi kelembapan tanah tidak meningkat.
                    </p>

                    <label class="block text-sm text-slate-300 mb-2">
                        Waktu Pemantauan
                    </label>

                    <div class="flex items-center gap-3">

                        <input
                            type="number"
                            name="abnormal_timeout"
                            value="{{ $setting->abnormal_timeout ?? 60 }}"
                            min="1"
                            class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                        >

                        <span class="text-slate-300">detik</span>

                    </div>

                </div>


                {{-- Mode Sistem --}}
                <div class="bg-slate-800 rounded-xl p-6">

                    <h2 class="text-xl font-semibold mb-2">
                        Mode Sistem
                    </h2>

                    <p class="text-slate-400 text-sm mb-5">
                        Menentukan mode kerja sistem irigasi.
                    </p>

                    <label class="block text-sm text-slate-300 mb-2">
                        Mode Operasi
                    </label>

                    <select
                        name="automatic_mode"
                        class="w-full bg-slate-700 border border-slate-600 rounded-lg px-4 py-2 focus:outline-none focus:border-blue-500"
                    >

                        <option
                            value="1"
                            {{ ($setting->automatic_mode ?? true) ? 'selected' : '' }}
                        >
                            Otomatis
                        </option>

                        <option
                            value="0"
                            {{ isset($setting) && !$setting->automatic_mode ? 'selected' : '' }}
                        >
                            Manual
                        </option>

                    </select>

                </div>

            </div>


            {{-- Tombol Simpan --}}
            <div class="mt-6">

                <button
                    type="submit"
                    class="bg-blue-600 hover:bg-blue-700 px-6 py-3 rounded-lg font-semibold transition"
                >
                    Simpan Pengaturan
                </button>

            </div>

        </form>

    </div>

</div>

</body>
</html>
