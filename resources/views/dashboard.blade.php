<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Irigasi Tetes</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        body {
            background-color: #0f172a;
            color: white;
        }

        .log-wrapper::-webkit-scrollbar {
            height: 8px;
        }

        .log-wrapper::-webkit-scrollbar-thumb {
            background: #475569;
            border-radius: 10px;
        }
    </style>
</head>

<body>

<div class="flex">

    @include('sidebar')

    <div class="flex-1 p-3">

        <!-- Logout -->
        <div class="flex justify-end mb-4">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="bg-red-500 px-4 py-2 rounded">
                    Logout
                </button>
            </form>
        </div>

        <h1 class="text-3xl font-bold mb-6">
            Dashboard IoT Irigasi Tetes
        </h1>

        <!-- Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-10">

            <!-- Kelembapan Tanah -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Kelembapan Tanah
                </h2>

                <p class="text-3xl font-bold text-green-400">
                    {{ $latestSensor?->soil ?? '--' }} %
                </p>
            </div>

            <!-- Suhu -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Suhu Udara
                </h2>

                <p class="text-3xl font-bold text-yellow-400">
                    {{ $latestSensor?->temperature ?? '--' }} °C
                </p>
            </div>

            <!-- Kelembapan Udara -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Kelembapan Udara
                </h2>

                <p class="text-3xl font-bold text-blue-400">
                    {{ $latestSensor?->humidity ?? '--' }} %
                </p>
            </div>

            <!-- Jarak Air -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Jarak Permukaan Air
                </h2>

                <p class="text-3xl font-bold text-cyan-400">
                    {{ $latestSensor?->water_distance ?? '--' }} cm
                </p>
            </div>

            <!-- Flow Rate -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Debit Air
                </h2>

                <p class="text-3xl font-bold">
                    {{ $latestSensor?->flow_rate ?? '--' }} L/menit
                </p>
            </div>

            <!-- Status Katup -->
            <div class="p-5 rounded-xl bg-gray-800 shadow-lg">
                <h2 class="font-bold text-lg mb-1">
                    Status Katup
                </h2>

                <p class="text-xl font-bold">
                    Irigasi:
                    @if($latestSensor?->solenoid_irrigation)
                        <span class="text-green-400">🔓 ON</span>
                    @else
                        <span class="text-red-400">🔒 OFF</span>
                    @endif
                </p>

                <p class="text-sm mt-2 text-gray-300">
                    Refill:
                    @if($latestSensor?->solenoid_refill)
                        <span class="text-green-400">ON</span>
                    @else
                        <span class="text-gray-400">OFF</span>
                    @endif
                </p>
            </div>

        </div>

        <!-- Status Sistem -->
        <div class="p-5 rounded-xl bg-gray-800 shadow-lg mb-10">

            <h2 class="text-2xl font-bold mb-3">
                Status Sistem
            </h2>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div>
                    <p class="text-gray-400">
                        Mode
                    </p>

                    <p class="text-lg font-bold">
                        @if($latestSensor?->automatic_mode)
                            <span class="text-green-400">
                                OTOMATIS
                            </span>
                        @else
                            <span class="text-yellow-400">
                                MANUAL
                            </span>
                        @endif
                    </p>
                </div>

                <div>
                    <p class="text-gray-400">
                        Kondisi Sistem
                    </p>

                    <p class="text-lg font-bold">
                        @if($latestSensor?->abnormal_condition)
                            <span class="text-red-400">
                                ⚠️ TIDAK NORMAL
                            </span>
                        @else
                            <span class="text-green-400">
                                ✓ NORMAL
                            </span>
                        @endif
                    </p>
                </div>

            </div>

        </div>

        <!-- LOG SENSOR -->
        <h2 class="text-2xl font-bold mb-3">
            📜 Data Sensor Terakhir
        </h2>

        <div class="log-wrapper overflow-x-auto bg-gray-800 rounded-xl shadow-lg p-4">

            <table class="w-full min-w-[650px] text-left">

                <thead>
                    <tr class="border-b border-gray-600 text-gray-300">

                        <th class="py-2 px-1">Waktu</th>
                        <th class="py-2 px-1">Kelembapan Tanah</th>
                        <th class="py-2 px-1">Suhu</th>
                        <th class="py-2 px-1">Kelembapan Udara</th>
                        <th class="py-2 px-1">Jarak Air</th>
                        <th class="py-2 px-1">Debit</th>
                        <th class="py-2 px-1">Katup</th>

                    </tr>
                </thead>

                <tbody>

                    @if($latestSensor)

                    <tr class="border-b border-gray-700">

                        <td class="py-2 px-1">
                            {{ $latestSensor->created_at->format('H:i:s') }}
                        </td>

                        <td class="py-2 px-1">
                            {{ $latestSensor->soil }} %
                        </td>

                        <td class="py-2 px-1">
                            {{ $latestSensor->temperature }} °C
                        </td>

                        <td class="py-2 px-1">
                            {{ $latestSensor->humidity }} %
                        </td>

                        <td class="py-2 px-1">
                            {{ $latestSensor->water_distance }} cm
                        </td>

                        <td class="py-2 px-1">
                            {{ $latestSensor->flow_rate }} L/menit
                        </td>

                        <td class="py-2 px-1">

                            @if($latestSensor->solenoid_irrigation)
                                Terbuka
                            @else
                                Tertutup
                            @endif

                        </td>

                    </tr>

                    @else

                    <tr>
                        <td colspan="7"
                            class="py-4 text-center text-gray-400">
                            Belum ada data sensor.
                        </td>
                    </tr>

                    @endif

                </tbody>

            </table>

        </div>

    </div>

</div>

<!-- Pop-up Peringatan Sistem -->
<div id="alertPopup"
     class="hidden fixed inset-0 z-50 flex items-center justify-center
            bg-black/70 p-4">

    <div class="w-full max-w-md rounded-2xl border border-red-500
                bg-slate-900 p-6 shadow-2xl">

        <div class="flex items-center gap-3 mb-4">
            <span class="text-3xl">⚠️</span>
            <h2 class="text-xl font-bold text-red-400">
                Peringatan Sistem
            </h2>
        </div>

        <p class="text-white font-semibold mb-2">
            Kondisi Tidak Normal!
        </p>

        <p id="alertMessage" class="text-slate-300 mb-6">
            Sistem mendeteksi gangguan pada proses irigasi.
        </p>

        <button type="button"
                onclick="closeAlert()"
                class="w-full rounded-lg bg-red-600 px-4 py-3
                       font-semibold text-white hover:bg-red-500">
            Tutup
        </button>
    </div>
</div>

<script>
    const alertPopup = document.getElementById('alertPopup');
    const alertMessage = document.getElementById('alertMessage');

    let previousAbnormal = null;

    function showAlert(message) {
        alertMessage.textContent = message;
        alertPopup.classList.remove('hidden');
    }

    function closeAlert() {
        alertPopup.classList.add('hidden');
    }

    async function checkSystemStatus() {
        try {
            const response = await fetch('/status-notifikasi', {
                headers: {
                    'Accept': 'application/json'
                },
                cache: 'no-store'
            });

            if (!response.ok) {
                throw new Error('Gagal membaca status sistem');
            }

            const data = await response.json();

            // Belum ada data sensor
            if (data.id === null) return;

            const isAbnormal = data.abnormal_condition === true;

            // Pemeriksaan pertama: tampilkan jika sistem sedang abnormal.
            // Pemeriksaan berikutnya: tampilkan hanya saat berubah
            // dari normal menjadi tidak normal.
            if (
                (previousAbnormal === null && isAbnormal) ||
                (previousAbnormal === false && isAbnormal)
            ) {
                let message =
                    'Sistem mendeteksi kondisi tidak normal. ' +
                    'Periksa aliran air, sensor, dan katup irigasi.';

                if (
                    data.flow_rate !== null &&
                    Number(data.flow_rate) <= 0
                ) {
                    message =
                        'Aliran air tidak terdeteksi. ' +
                        'Periksa selang, sensor flow, dan katup irigasi.';
                }

                showAlert(message);
            }

            previousAbnormal = isAbnormal;

        } catch (error) {
            console.error('Pemeriksaan notifikasi gagal:', error);
        }
    }

    checkSystemStatus();
    setInterval(checkSystemStatus, 5000);
</script>

</body>
</html>
