<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Log Sensor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f172a;
            color: white;
        }
    </style>
</head>

<body class="bg-slate-950 text-white">

<div class="flex min-h-screen">

    @include('sidebar')

    <div class="flex-1 p-8">

        <h1 class="text-3xl font-bold mb-8">
            Log Sensor
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
        Menampilkan semua data sensor bulan {{ $bulan }}.
    @else
        Menampilkan 10 data sensor terbaru.
    @endif
</p>

        <div class="bg-slate-800 rounded-xl p-4 overflow-x-auto">

            <table class="w-full text-left">

                <thead>
                    <tr class="border-b border-slate-600">

                        <th class="p-3">Waktu</th>
                        <th class="p-3">Kelembapan Tanah</th>
                        <th class="p-3">Suhu Udara</th>
                        <th class="p-3">Kelembapan Udara</th>
                        <th class="p-3">Jarak Air</th>
                        <th class="p-3">Debit Air</th>
                        <th class="p-3">Irigasi</th>
                        <th class="p-3">Refill</th>
                        <th class="p-3">Kondisi</th>

                    </tr>
                </thead>

                <tbody>

                    @forelse($sensorData as $data)

                        <tr class="border-b border-slate-700 hover:bg-slate-700">

                            <td class="p-3">
                                {{ $data->created_at->format('d/m/Y H:i:s') }}
                            </td>

                            <td class="p-3">
                                {{ $data->soil }} %
                            </td>

                            <td class="p-3">
                                {{ $data->temperature }} °C
                            </td>

                            <td class="p-3">
                                {{ $data->humidity }} %
                            </td>

                            <td class="p-3">
                                {{ $data->water_distance }} cm
                            </td>

                            <td class="p-3">
                                {{ $data->flow_rate }} L/menit
                            </td>

                            <td class="p-3">
                                @if($data->solenoid_irrigation)
                                    <span class="text-green-400 font-bold">
                                        ON
                                    </span>
                                @else
                                    <span class="text-red-400">
                                        OFF
                                    </span>
                                @endif
                            </td>

                            <td class="p-3">
                                @if($data->solenoid_refill)
                                    <span class="text-green-400 font-bold">
                                        ON
                                    </span>
                                @else
                                    <span class="text-red-400">
                                        OFF
                                    </span>
                                @endif
                            </td>

                            <td class="p-3">
                                @if($data->abnormal_condition)
                                    <span class="text-red-400 font-bold">
                                        ⚠ Tidak Normal
                                    </span>
                                @else
                                    <span class="text-green-400">
                                        Normal
                                    </span>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="9"
                                class="p-6 text-center text-slate-400">
                                Belum ada data sensor.
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
