<button type="button"
    onclick="toggleMobileMenu()"
    aria-label="Buka menu"
    class="md:hidden fixed top-4 left-4 z-[60] bg-slate-800
        text-white p-3 rounded-lg shadow-lg">
        ☰
</button>

<div id="mobileBackdrop"
    onclick="toggleMobileMenu()"
    class="hidden fixed inset-0 bg-black/70 z-40 md:hidden">
</div>

<aside class="hidden md:block w-64 shrink-0 bg-slate-900 min-h-screen p-6">

    <h2 class="text-xl font-bold mb-8 text-white">
        SITEC
    </h2>

    <ul class="space-y-2">
        <li>
            <a href="/dashboard"
            class="block px-4 py-3 rounded-lg hover:bg-slate-700">
            Dashboard
        </a>
        </li>

        <li>
            <a href="/grafik-histori"
            class="block px-4 py-3 rounded-lg hover:bg-slate-700">
            Grafik Histori
        </a>
        </li>

        <li>
            <a href="/log-sensor"
            class="block px-4 py-3 rounded-lg hover:bg-slate-700">
            Log Sensor
        </a>
        </li>

        <li>
            <a href="/log-aktivitas"
            class="block px-4 py-3 rounded-lg hover:bg-slate-700">
            Log Aktivitas
        </a>
        </li>

         <li>
            <a href="/pengaturan"
            class="block px-4 py-3 rounded-lg hover:bg-slate-700">
            Pengaturan
        </a>
        </li>
    </ul>
</aside>

<aside id="mobileMenu"
    class="fixed top-0 left-0 z-50 h-screen w-72 max-w-[85vw]
            bg-slate-900 p-6 shadow-2xl text-white
            -translate-x-full transition-transform duration-300
            md:hidden">

    <div class="flex justify-between items-center mb-8">
        <h2 class="text-xl font-bold">SITEC</h2>

        <button type="button"
            onclick="toggleMobileMenu()"
            class="text-2xl text-white">
            &times;
        </button>
    </div>

    <ul class="space-y-2">
        <li>
            <a href="/dashboard"
                class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                Dashboard
            </a>
        </li>

        <li>
            <a href="/grafik-histori"
                class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                Grafik Histori
            </a>
        </li>

        <li>
            <a href="/log-sensor"
                class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                Log Sensor
            </a>
        </li>

        <li>
            <a href="/log-aktivitas"
                class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                Log Aktivitas
            </a>
        </li>

        <li>
            <a href="/pengaturan"
                class="block px-4 py-3 rounded-lg hover:bg-slate-700">
                Pengaturan
            </a>
        </li>
    </ul>
</aside>

<script>
    function toggleMobileMenu() {
        const menu = document.getElementById('mobileMenu');
        const backdrop = document.getElementById('mobileBackdrop');

        menu.classList.toggle('-translate-x-full');
        backdrop.classList.toggle('hidden');
    }
</script>
