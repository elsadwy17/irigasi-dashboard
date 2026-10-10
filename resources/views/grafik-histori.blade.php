<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Grafik Histori</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

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

        <h1 class="text-3xl font-bold mb-6">
            📈 Grafik Histori Sensor
        </h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

            <!-- KELEMBAPAN TANAH -->
            <div class="bg-slate-800 p-5 rounded-xl shadow-lg">
                <h2 class="text-lg font-semibold mb-3">
                    Kelembapan Tanah
                </h2>

                <div class="relative h-[220px]">
                    <canvas id="soilChart"></canvas>
                </div>
            </div>

            <!-- SUHU UDARA -->
            <div class="bg-slate-800 p-5 rounded-xl shadow-lg">
                <h2 class="text-lg font-semibold mb-3">
                    Suhu Udara
                </h2>

                <div class="relative h-[220px]">
                    <canvas id="tempChart"></canvas>
                </div>
            </div>

            <!-- KELEMBAPAN UDARA -->
            <div class="bg-slate-800 p-5 rounded-xl shadow-lg">
                <h2 class="text-lg font-semibold mb-3">
                    Kelembapan Udara
                </h2>

                <div class="relative h-[220px]">
                    <canvas id="humidityChart"></canvas>
                </div>
            </div>

            <!-- JARAK AIR -->
            <div class="bg-slate-800 p-5 rounded-xl shadow-lg">
                <h2 class="text-lg font-semibold mb-3">
                    Jarak Permukaan Air
                </h2>

                <div class="relative h-[220px]">
                    <canvas id="waterChart"></canvas>
                </div>
            </div>

            <!-- DEBIT AIR -->
            <div class="bg-slate-800 p-5 rounded-xl shadow-lg">
                <h2 class="text-lg font-semibold mb-3">
                    Debit Air
                </h2>

                <div class="relative h-[220px]">
                    <canvas id="flowChart"></canvas>
                </div>
            </div>

        </div>

    </div>

</div>


<script>

// Data dari database Laravel
const sensorData = @json($sensorData);

// Label waktu
const labels = sensorData.map(data => {
    const date = new Date(data.created_at);

    return date.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
    });
});


// =========================
// KELEMBAPAN TANAH
// =========================

new Chart(document.getElementById('soilChart'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Kelembapan Tanah (%)',

            data: sensorData.map(data => data.soil),

            borderWidth: 2,
            tension: 0.3
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false
    }

});


// =========================
// SUHU UDARA
// =========================

new Chart(document.getElementById('tempChart'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Suhu Udara (°C)',

            data: sensorData.map(data => data.temperature),

            borderWidth: 2,
            tension: 0.3
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false
    }

});


// =========================
// KELEMBAPAN UDARA
// =========================

new Chart(document.getElementById('humidityChart'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Kelembapan Udara (%)',

            data: sensorData.map(data => data.humidity),

            borderWidth: 2,
            tension: 0.3
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false
    }

});


// =========================
// JARAK AIR
// =========================

new Chart(document.getElementById('waterChart'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Jarak Permukaan Air (cm)',

            data: sensorData.map(data => data.water_distance),

            borderWidth: 2,
            tension: 0.3
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false
    }

});


// =========================
// DEBIT AIR
// =========================

new Chart(document.getElementById('flowChart'), {

    type: 'line',

    data: {
        labels: labels,

        datasets: [{
            label: 'Debit Air (L/menit)',

            data: sensorData.map(data => data.flow_rate),

            borderWidth: 2,
            tension: 0.3
        }]
    },

    options: {
        responsive: true,
        maintainAspectRatio: false
    }

});

</script>

</body>
</html>
