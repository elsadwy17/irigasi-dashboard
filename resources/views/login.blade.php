
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SITEC - Sistem Informasi Irigasi Tetes Cerdas</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">

    <form method="POST" action="{{ route('login.process') }}">
        @csrf
        <input type="text" name="username" required>
        <input type="password" name="password" required>
        <button type="submit">Login</button>
    </form>

    <style>
        :root {
            --primary-green: #1e824c;
            --primary-green-hover: #17693d;
            --accent-green: #4ade80;
            --bright-green: #69c972;
            --dark-bg: #11231b;
            --text-dark: #111827;
            --text-muted: #4b5563;
            --text-light: #9ca3af;
            --border-color: #d1d5db;
            --error-bg: #fbe9e9;
            --error-text: #dc2626;
            --surface-bg: #f8fafc;
        }
        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--surface-bg);
            color: var(--text-dark);
            min-height: 100vh;
            overflow-x: hidden;
        }

        .login-wrapper {
            display: flex;
            min-height: 100vh;
            width: 100%;
        }

        .left-panel {
            position: relative;
            width: 56%;
            background-color: var(--dark-bg);
            background-image: linear-gradient(155deg, rgba(16, 37, 27, 0.92) 0%, rgba(20, 48, 35, 0.72) 55%, rgba(12, 28, 20, 0.85) 100%),
            url('https://images.unsplash.com/photo-1592982537447-7440770cbfc9?auto=format&fit=crop&w=1400&q=80');
            background-size: cover;
            background-position: center bottom;
            color: #ffffff;
            padding: 4rem 5rem;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            overflow: hidden;
        }

        .left-panel::before {
            content: '';
            position: absolute;
            top: -120px;
            left: -80px;
            width: 380px;
            height: 280px;
            background: rgba(74, 222, 128, 0.08);
            border-radius: 50%;
            pointer-events: none;
        }

        .left-panel::after {
            content: '';
            position: absolute;
            bottom: -140px;
            left: -60px;
            width: 420px;
            height: 260px;
            background: rgba(34, 197, 94, 0.16);
            border-radius: 50%;
            pointer-events: none;
        }

        .curve-divider {
            position: absolute;
            top: 0;
            right: -1px;
            height: 100%;
            width: 90px;
            z-index: 3;
            pointer-events: none;
        }

        .brand-header {
            position: relative;
            z-index: 2;
            display: flex;
            align-items: center;
            gap: 1.1rem;
            margin-top: 0.5rem;
        }

        .brand-logo-svg {
            width: 58px;
            height: 58px;
            flex-shrink: 0;
        }

        .brand-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.35rem;
            font-weight: 800;
            letter-spacing: 0.02em;
            line-height: 1.1;
        }

        .brand-title span {
            color: var(--bright-green);
        }

        .brand-subtitle {
            font-size: 0.92rem;
            color: #e5e7eb;
            margin-top: 0.25rem;
            font-weight: 400;
        }

        .accent-line {
            position: relative;
            z-index: 2;
            width: 56px;
            height: 3px;
            background-color: var(--bright-green);
            border-radius: 2px;
            margin: 2.2rem 0 2.4rem 0;
        }

        .hero-content {
            position: relative;
            z-index: 2;
            max-width: 500px;
        }

        .hero-heading {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 2.75rem;
            font-weight: 700;
            line-height: 1.2;
            letter-spacing: -0.01em;
            margin-bottom: 1.25rem;
        }

        .hero-heading span {
            color: var(--bright-green);
            display: inline-block;
        }

        .hero.description {
            font-size: 1.08rem;
            line-height: 1.6;
            color: #e5e7eb;
            max-width: 420px;
            font-weight: 400;
        }

        .right-panel {
            width: 44%;
            background-color: var(--surface-bg);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
            position: relative;
            z-index: 4;
        }

        .login-card {
            background: #ffffff;
            width: 100%;
            max-width: 430px;
            border-radius: 20px;
            padding: 2.75rem 2.5rem 2.25rem;
            box-shadow: 0 15px 40px -10px rgba(0, 0, 0, 0.08), 0 4px 12px -2px rgba(0, 0, 0, 0.03);
            text-align: center;
        }

        .card-icon-wrapper {
            width: 82px;
            height: 82px;
            background-color: #e6f3ea;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.4rem;
        }

        .card-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.65rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 0.45rem;
        }

        .card-subtitle {
            font-size: 0.92rem;
            color: var(--text-muted);
            margin-bottom: 1.35rem;
        }

        .card-divider-line {
            width: 64px;
            height: 2.5px;
            background-color: var(--primary-green);
            margin: 0 auto 1.5rem;
            border-radius: 2px;
        }

        .alert-error {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            background-color: var(--error-bg);
            color: var(--error-bg);
            padding: 0.85rem 1rem;
            border-radius: 10px;
            font-size: 0.88rem;
            font-weight: 500;
            margin-bottom: 1.25rem;
            text-align: left;
        }

        .alert-error svg {
            width: 20px;
            height: 20px;
            flex-shrink: 0;
        }

        .form-group {
            position: relative;
            margin-bottom: 1rem;
        }

        .input-icon {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #4b5563;
            width: 19px;
            height: 19px;
            pointer-events: none;
        }

        .form-input {
            width: 100%;
            padding: 0.85rem 2.75rem 0.85rem 2.85rem;
            border: 1px solid var(--border-color);
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.92rem;
            color: var(--text-dark);
            background-color: #ffffff;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
        }

        .form-input::placeholder {
            color: var(--text-light);
        }

        .form-input::focus {
            border-color: var(--primary-green);
            box-shadow: 0 0 0 3px rgba(30,130, 76, 0.12);
        }

        .toggle-password {
            position: absolute;
            right: 0.95rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #4b5563;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4px;
            transition: color 0.2s;
        }

        .toggle-password:hover {
            color: var(--text-dark);
        }

        .btn-submit {
            width: 100%;
            margin-top: 0.4rem;
            padding: 0.88rem 1.5rem;
            background-color: var(--primary-green);
            color: #ffffff;
            border: none;
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.96rem;
            font-weight: 600;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.55rem;
            transition: background-color 0.2s transform 0.1s;
        }

        .btn-submit:hover {
            background-color: var(--primary-green-hover);
        }

        .btn-submit:active {
            transform: scale(0.99);
        }

        .card-footer {
            margin-top: 1.75rem;
        }

        .footer-leaf-divider {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.75rem;
            margin-bottom: 0.75rem;
        }

        .footer-leaf-divider::before,
        .footer-leaf-divider::after {
            content: '';
            flex: 1;
            height: 1px;
            background-color: #e5e7eb;
        }

        .footer-leaf-divider svg {
            width: 18px;
            height: 19px;
            color: var(--primary-green);
        }

        .footer-text {
            font-size: 0.78rem;
            color: var(--text-muted);
            line-height: 1.5;
        }

        @media (max-width: 992px) {
            .login-wrapper {
                flex-direction: column;
            }
            .left-panel {
                width: 100%;
                padding: 3rem 2rem 4 rem;
            }
            .curve-divider {
                display: none;
            }
            .hero-heading {
                font-size: 2.1rem;
            }
            .right-panel {
                width: 100%;
                padding: 2rem 1.25rem 3rem;
                margin-top: -2rem;
                border-top-left-radius: 28px;
                border-top-right-radius: 28px;
            }
        }
        </style>
</head>
<body>
    <div class="login-wrapper">
    <!-- PANEL KIRI: HERO & BRANDING -->
    <section class="left-panel">
      <header class="brand-header">
        <!-- Logo Tetes Air & Daun -->
        <svg class="brand-logo-svg" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
          <!-- Tetes Air -->
          <path d="M32 6C32 6 20 20.5 20 28C20 34.6274 25.3726 40 32 40C38.6274 40 44 34.6274 44 28C44 20.5 32 6 32 6Z" fill="#a7f3d0"/>
          <path d="M32 10C32 10 23 21.5 23 27.5C23 32.4706 27.0294 36.5 32 36.5C36.9706 36.5 41 32.4706 41 27.5C41 21.5 32 10 32 10Z" fill="#6ee7b7" fill-opacity="0.4"/>
          <path d="M26.5 26C26.5 22.5 29.5 17.5 31 15.5" stroke="#ffffff" stroke-width="2.2" stroke-linecap="round"/>
          <!-- Daun Kiri -->
          <path d="M31 58C31 44 22 36 8 36C8 49 16 58 31 58Z" fill="#86efac"/>
          <path d="M33 58C33 44 42 36 56 36C56 49 48 58 33 58Z" fill="#69c972"/>
        </svg>

        <div>
          <h1 class="brand-title">SIT<span>EC</span></h1>
          <p class="brand-subtitle">Sistem Informasi Irigasi Tetes Cerdas</p>
        </div>
      </header>

      <div class="accent-line"></div>

      <div class="hero-content">
        <h2 class="hero-heading">
          Irigasi Cerdas<br>
          untuk <span>Pertanian Modern</span>
        </h2>
        <p class="hero-description">
          Pantau dan kendalikan sistem irigasi tetes secara efisien dengan teknologi IoT.
        </p>
      </div>

      <!-- SVG Gelombang Organik Pemisah Tengah -->
      <svg class="curve-divider" viewBox="0 0 100 1000" preserveAspectRatio="none">
        <!-- Lapisan Aksen Hijau Melengkung -->
        <path d="M35,0 C5,220 25,420 55,620 C75,780 45,900 15,1000 L100,1000 L100,0 Z" fill="#2e7d46" opacity="0.85"/>
        <!-- Lapisan Putih/Surface Kanan -->
        <path d="M62,0 C20,230 25,430 58,640 C78,780 48,900 20,1000 L100,1000 L100,0 Z" fill="#f8fafc"/>
      </svg>
    </section>

    <!-- PANEL KANAN: KARTU LOGIN -->
    <main class="right-panel">
      <div class="login-card">
        <!-- Ikon Lingkaran Atas -->
        <div class="card-icon-wrapper">
          <svg width="44" height="44" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M32 7C32 7 21 20.5 21 27.5C21 33.5751 25.9249 38.5 32 38.5C38.0751 38.5 43 33.5751 43 27.5C43 20.5 32 7 32 7Z" fill="#1e824c"/>
            <path d="M27 26C27 22.8 29.8 18 31.2 16" stroke="#a7f3d0" stroke-width="2.2" stroke-linecap="round"/>
            <path d="M31 56C31 43 22.5 35.5 9.5 35.5C9.5 47.5 17 56 31 56Z" fill="#69c972"/>
            <path d="M33 56C33 43 41.5 35.5 54.5 35.5C54.5 47.5 47 56 33 56Z" fill="#156338"/>
          </svg>
        </div>

        <h2 class="card-title">Selamat Datang</h2>
        <p class="card-subtitle">Masuk untuk mengakses dashboard SITEC</p>
        <div class="card-divider-line"></div>

        <!--
          Pesan Error (Pada Laravel Blade, gunakan kondisi berikut):
          @if(session('error'))
          <div class="alert-error">... {{ session('error') }}</div>
          @endif
        -->
        <div class="alert-error" id="errorBox">
          <svg viewBox="0 0 24 24" fill="currentColor">
            <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25zm-1.72 6.97a.75.75 0 10-1.06 1.06L10.94 12l-1.72 1.72a.75.75 0 101.06 1.06L12 13.06l1.72 1.72a.75.75 0 101.06-1.06L13.06 12l1.72-1.72a.75.75 0 10-1.06-1.06L12 10.94l-1.72-1.72z" clip-rule="evenodd" />
          </svg>
          <span>{{ session('error') }}</span>
        </div>

        <form action="{{ route('login.process') }}" method="POST">
          @csrf

          <!-- Input Username -->
          <div class="form-group">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
              <circle cx="12" cy="7" r="4"></circle>
            </svg>
            <input
              type="text"
              name="username"
              class="form-input"
              placeholder="Username"
              required
              autocomplete="username"
            />
          </div>

          <!-- Input Password -->
          <div class="form-group">
            <svg class="input-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
              <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
              <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
            </svg>
            <input
              type="password"
              name="password"
              id="passwordInput"
              class="form-input"
              placeholder="Password"
              required
              autocomplete="current-password"
            />
            <button type="button" class="toggle-password" id="togglePassword" aria-label="Tampilkan atau sembunyikan password">
              <!-- Ikon Mata Tertutup (Default) -->
              <svg id="eyeOffIcon" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M17.94 17.94A10.07 10.07 0 0 1 12 20c-7 0-11-8-11-8a18.45 18.45 0 0 1 5.06-5.94M9.9 4.24A9.12 9.12 0 0 1 12 4c7 0 11 8 11 8a18.5 18.5 0 0 1-2.16 3.19m-6.72-1.07a3 3 0 1 1-4.24-4.24"></path>
                <line x1="1" y1="1" x2="23" y2="23"></line>
              </svg>
              <!-- Ikon Mata Terbuka -->
              <svg id="eyeOnIcon" style="display: none;" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                <circle cx="12" cy="12" r="3"></circle>
              </svg>
            </button>
          </div>

          <!-- Tombol Masuk -->
          <button type="submit" class="btn-submit">
            <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4"></path>
              <polyline points="10 17 15 12 10 7"></polyline>
              <line x1="15" y1="12" x2="3" y2="12"></line>
            </svg>
            Masuk
          </button>
        </form>

        <!-- Footer Kartu -->
        <footer class="card-footer">
          <div class="footer-leaf-divider">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
              <path d="M12 22v-9"></path>
              <path d="M12 13C12 8 8 5 3 5c0 5 3 8 9 8Z"></path>
              <path d="M12 13c0-5 4-8 9-8 0 5-3 8-9 8Z"></path>
            </svg>
          </div>
          <p class="footer-text">
            Sistem Informasi Irigasi Tetes Cerdas<br>
            &copy; 2026 SITEC
          </p>
        </footer>
      </div>
    </main>
  </div>

  <script>
    // Fitur Toggle Lihat/Sembunyikan Password
    const togglePasswordBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('passwordInput');
    const eyeOffIcon = document.getElementById('eyeOffIcon');
    const eyeOnIcon = document.getElementById('eyeOnIcon');

    togglePasswordBtn.addEventListener('click', () => {
      const isPassword = passwordInput.getAttribute('type') === 'password';
      passwordInput.setAttribute('type', isPassword ? 'text' : 'password');
      eyeOffIcon.style.display = isPassword ? 'none' : 'block';
      eyeOnIcon.style.display = isPassword ? 'block' : 'none';
    });
  </script>
</body>
</html>

