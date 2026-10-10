<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Log Aktivitas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('sidebar')

    <div class="flex-1 p-8">

        <h1 class="text-3xl font-bold mb-8">
            Log Aktivitas
        </h1>

<form method="GET" action="{{ url('/log-sensor') }}"
      class="mb-6 flex flex-wrap items-end gap-3">

    <div>
        <label for="bulan" class="block text-sm text-slate-300 mb-2">
            Pilih Bulan dan Tahun
        </label>

        <input
            type="month"
            id="bulan"
            name="bulan"
            value="{{ $bulan ?? '' }}"
            class="rounded-lg bg-slate-800 border border-slate-600
                   text-white px-4 py-2"
        >
    </div>

    <button type="submit"
            class="rounded-lg bg-blue-600 hover:bg-blue-500
                   px-4 py-2 text-white">
        Tampilkan
    </button>

    <a href="{{ url('/log-sensor') }}"
       class="rounded-lg bg-slate-700 hover:bg-slate-600
              px-4 py-2 text-white">
        Reset
    </a>
</form>

<p class="text-sm text-slate-400 mb-4">
    @if(!empty($bulan))
        Menampilkan semua aktivitas bulan {{ $bulan }}.
    @else
        Menampilkan 10 aktivitas terbaru.
    @endif
</p>

        <div class="bg-slate-800 rounded-xl p-6 overflow-x-auto">

            <table class="w-full text-left">

                <thead>
                    <tr class="border-b border-slate-600 text-slate-300">
                        <th class="py-3 px-4">Waktu</th>
                        <th class="py-3 px-4">Aktivitas</th>
                        <th class="py-3 px-4">Status</th>
                        <th class="py-3 px-4">Keterangan</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse($sensorData as $data)

                        {{-- Aktivitas Irigasi --}}
                        @if($data->solenoid_irrigation)
                            <tr class="border-b border-slate-700">
                                <td class="py-3 px-4">
                                    {{ $data->created_at->format('d/m/Y H:i:s') }}
                                </td>

                                <td class="py-3 px-4">
                                    Irigasi
                                </td>

                                <td class="py-3 px-4">
                                    <span class="text-green-400 font-semibold">
                                        AKTIF
                                    </span>
                                </td>

                                <td class="py-3 px-4">
                                    Kelembapan tanah {{ $data->soil }}%
                                </td>
                            </tr>
                        @else
                            <tr class="border-b border-slate-700">
                                <td class="py-3 px-4">
                                    {{ $data->created_at->format('d/m/Y H:i:s') }}
                                </td>

                                <td class="py-3 px-4">
                                    Irigasi
                                </td>

                                <td class="py-3 px-4">
                                    <span class="text-red-400 font-semibold">
                                        NONAKTIF
                                    </span>
                                </td>

                                <td class="py-3 px-4">
                                    Irigasi tidak sedang berjalan
                                </td>
                            </tr>
                        @endif


                        {{-- Aktivitas Auto Refill --}}
                        @if($data->solenoid_refill)
                            <tr class="border-b border-slate-700">
                                <td class="py-3 px-4">
                                    {{ $data->created_at->format('d/m/Y H:i:s') }}
                                </td>

                                <td class="py-3 px-4">
                                    Auto-Refill Drum
                                </td>

                                <td class="py-3 px-4">
                                    <span class="text-blue-400 font-semibold">
                                        AKTIF
                                    </span>
                                </td>

                                <td class="py-3 px-4">
                                    Pengisian drum sedang berlangsung
                                </td>
                            </tr>
                        @endif


                        {{-- Kondisi Tidak Normal --}}
                        @if($data->abnormal_condition)
                            <tr class="border-b border-slate-700">
                                <td class="py-3 px-4">
                                    {{ $data->created_at->format('d/m/Y H:i:s') }}
                                </td>

                                <td class="py-3 px-4">
                                    Kondisi Tidak Normal
                                </td>

                                <td class="py-3 px-4">
                                    <span class="text-yellow-400 font-semibold">
                                        PERINGATAN
                                    </span>
                                </td>

                                <td class="py-3 px-4">
                                    Sistem mendeteksi kondisi tidak normal pada proses irigasi
                                </td>
                            </tr>
                        @endif

                    @empty

                        <tr>
                            <td colspan="4" class="text-center py-8 text-slate-400">
                                Belum ada aktivitas yang tercatat.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>
</div>

</body>
</html>
