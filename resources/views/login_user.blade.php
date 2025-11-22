<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ asset('img/Klipaa Original.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Login Siswa/Guru - Klipaa Solusi Indonesia</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      background-image: url('/img/Kantor Pagi.png');
      background-size: cover;
      background-position: center;
      background-repeat: no-repeat;
      position: relative;
      overflow: hidden;
      transition: background 0.5s ease;
    }
    
    body::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: rgba(28, 61, 46, 0.3);
      z-index: 0;
    }

    /* Animated background shapes */
    .bg-shapes {
      position: absolute;
      width: 100%;
      height: 100%;
      overflow: hidden;
      z-index: 0;
    }

    .shape {
      position: absolute;
      border-radius: 50%;
      background: rgba(255, 255, 255, 0.1);
      animation: float 20s infinite ease-in-out;
    }

    .shape:nth-child(1) {
      width: 300px;
      height: 300px;
      top: -100px;
      left: -100px;
      animation-delay: 0s;
    }

    .shape:nth-child(2) {
      width: 200px;
      height: 200px;
      top: 50%;
      right: -50px;
      animation-delay: 2s;
    }

    .shape:nth-child(3) {
      width: 150px;
      height: 150px;
      bottom: -50px;
      left: 30%;
      animation-delay: 4s;
    }

    @keyframes float {
      0%, 100% { transform: translate(0, 0) rotate(0deg); }
      33% { transform: translate(30px, -50px) rotate(120deg); }
      66% { transform: translate(-20px, 20px) rotate(240deg); }
    }

    /* Main container */
    .login-container {
      position: relative;
      z-index: 1;
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(25px);
      -webkit-backdrop-filter: blur(25px);
      border-radius: 24px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.4);
      overflow: hidden;
      width: 90%;
      max-width: 900px;
      display: flex;
      min-height: 550px;
      border: 1px solid rgba(255, 255, 255, 0.3);
    }

    /* Left side - Welcome section */
    .welcome-section {
      flex: 1;
background: linear-gradient(135deg, #047857, #10b981);      padding: 60px 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      color: white;
      position: relative;
      overflow: hidden;
    }

    .welcome-section::before {
      content: '';
      position: absolute;
      width: 200%;
      height: 200%;
      background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
      animation: pulse 4s ease-in-out infinite;
    }

    @keyframes pulse {
      0%, 100% { transform: scale(1); opacity: 0.5; }
      50% { transform: scale(1.1); opacity: 0.8; }
    }

    .welcome-content {
      position: relative;
      z-index: 1;
      text-align: center;
    }

    .logo-circle {
      width: 120px;
      height: 120px;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(10px);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      margin: 0 auto 30px;
      border: 3px solid rgba(255, 255, 255, 0.4);
    }

    .logo-circle i {
      font-size: 60px;
      color: white;
    }

    .welcome-section h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 15px;
      text-shadow: 2px 2px 4px rgba(0,0,0,0.1);
    }

    .welcome-section p {
      font-size: 16px;
      opacity: 0.95;
      line-height: 1.6;
      max-width: 300px;
    }

    .features {
      margin-top: 40px;
      text-align: left;
    }

    .feature-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      font-size: 14px;
    }

    .feature-item i {
      margin-right: 12px;
      font-size: 18px;
      opacity: 0.9;
    }

    /* Right side - Form section */
    .form-section {
      flex: 1;
      padding: 60px 50px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(15px);
    }

    .form-header {
      margin-bottom: 40px;
    }

    .form-header h2 {
      color: #047857;
      font-size: 28px;
      font-weight: 700;
      margin-bottom: 10px;
text-shadow: 2px 2px 4px rgba(0,0,0,0.1);    }

    .form-header p {
      color: #047857;
      font-size: 14px;
text-shadow: 2px 2px 4px rgba(0,0,0,0.1);    }

    .input-group {
      margin-bottom: 25px;
      position: relative;
    }

    .input-group label {
      display: block;
      color: #047857;
      font-size: 14px;
      font-weight: 600;
      margin-bottom: 8px;
text-shadow: 2px 2px 4px rgba(0,0,0,0.1);    }

    .input-wrapper {
      position: relative;
    }

    .input-wrapper i {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: #047857;
      font-size: 16px;
    }

    .input-group input {
      width: 100%;
      padding: 14px 15px 14px 45px;
      border: 2px solid rgba(28, 61, 46, 0.3);
      border-radius: 12px;
      font-size: 15px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.6);
      backdrop-filter: blur(10px);
      color: #047857;
    }

    .input-group input::placeholder {
      color: rgba(28, 61, 46, 0.5);
    }

    .input-group input:focus {
      outline: none;
      border-color: #047857;
      background: rgba(255, 255, 255, 0.8);
box-shadow: 2px 2px 4px rgba(0,0,0,0.1);    }

    .forgot-password {
      text-align: right;
      margin-bottom: 25px;
    }

    .forgot-password a {
      color: #047857;
      font-size: 13px;
      text-decoration: none;
      font-weight: 600;
    }

    .forgot-password a:hover {
      text-decoration: underline;
    }

    .login-btn {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #047857, #10b981);   
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(28, 61, 46, 0.4);
    }

    .login-btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(28, 61, 46, 0.5);
    }

    .login-btn:active {
      transform: translateY(0);
    }

    .help-text {
      text-align: center;
      color: #047857;
      font-size: 13px;
      margin-top: 20px;
      font-weight: 500;
    }

    .help-text a {
      color: #047857;
      font-weight: 600;
      text-decoration: none;
    }

    .help-text a:hover {
      text-decoration: underline;
    }

    /* Footer */
    .footer {
      position: fixed;
      bottom: 0;
      left: 0;
      right: 0;
      text-align: center;
      padding: 15px;
      font-size: 12px;
      color: rgba(255, 255, 255, 0.9);
      background: rgba(0, 0, 0, 0.2);
      backdrop-filter: blur(10px);
      z-index: 2;
    }

    .footer a {
      color: white;
      font-weight: 600;
      text-decoration: none;
    }

    .footer a:hover {
      text-decoration: underline;
    }

    /* Info toggle button */
    .info-toggle {
      position: fixed;
      top: 20px;
      right: 20px;
      width: 50px;
      height: 50px;
      background: rgba(255, 255, 255, 0.95);
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
      transition: all 0.3s ease;
      z-index: 1000;
    }

    .info-toggle:hover {
      transform: scale(1.1) rotate(90deg);
      background: white;
    }

    .info-toggle i {
      font-size: 24px;
      color: #1c3d2e;
    }

    /* Info popup */
    .info-popup {
      position: fixed;
      top: 80px;
      right: 20px;
      background: white;
      border-radius: 16px;
      padding: 25px;
      box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
      max-width: 350px;
      opacity: 0;
      visibility: hidden;
      transform: translateY(-20px);
      transition: all 0.3s ease;
      z-index: 999;
    }

    .info-popup.show {
      opacity: 1;
      visibility: visible;
      transform: translateY(0);
    }

    .info-popup h4 {
      color: #333;
      margin-bottom: 20px;
      font-size: 16px;
      border-bottom: 2px solid #1c3d2e;
      padding-bottom: 10px;
    }

    .info-popup ul {
      list-style: none;
      padding: 0;
    }

    .info-popup li {
      margin-bottom: 15px;
      padding: 10px;
      background: #f8f9fa;
      border-radius: 8px;
      border-left: 3px solid #1c3d2e;
    }

    .info-popup li strong {
      color: #1c3d2e;
      display: block;
      margin-bottom: 4px;
    }

    .info-popup li small {
      color: #666;
      font-size: 12px;
    }

    /* Responsive */
    @media (max-width: 768px) {
      .login-container {
        flex-direction: column;
        max-width: 400px;
      }

      .welcome-section {
        padding: 40px 30px;
      }

      .welcome-section h1 {
        font-size: 24px;
      }

      .features {
        display: none;
      }

      .form-section {
        padding: 40px 30px;
      }

      .info-popup {
        right: 10px;
        left: 10px;
        max-width: none;
      }
    }
  </style>
</head>

<body>
  <!-- Animated background -->
  <div class="bg-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>

  <!-- Main login container -->
  <div class="login-container">
    <!-- Welcome Section -->
    <div class="welcome-section">
      <div class="welcome-content">
        <div class="logo-circle">
          <i class="fas fa-graduation-cap"></i>
        </div>
        <h1>Selamat Datang!</h1>
        <p>Masuk ke sistem pembelajaran Klipaa untuk mengakses materi, tugas, dan informasi akademik Anda.</p>
        
        <div class="features">
          <div class="feature-item">
            <i class="fas fa-check-circle"></i>
            <span>Akses Materi Pembelajaran</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-check-circle"></i>
            <span>Kelola Tugas & Nilai</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-check-circle"></i>
            <span>Komunikasi Real-time</span>
          </div>
        </div>
      </div>
    </div>

    <!-- Form Section -->
    <div class="form-section">
      <div class="form-header">
        <h2>Login Siswa/Guru</h2>
        <p>Masukkan kredensial Anda untuk melanjutkan</p>
      </div>

      <form method="POST" action="{{ route('login.user.post') }}">
        @csrf
        
        <div class="input-group">
          <label for="nis">NIS/NIP</label>
          <div class="input-wrapper">
            <i class="fas fa-user"></i>
            <input type="text" id="nis" name="nis" placeholder="Masukkan NIS/NIP Anda" required>
          </div>
        </div>

        <div class="input-group">
          <label for="password">Password</label>
          <div class="input-wrapper">
            <i class="fas fa-lock"></i>
            <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
          </div>
        </div>

        

        <button type="submit" class="login-btn">
          Masuk <i class="fas fa-arrow-right" style="margin-left: 8px;"></i>
        </button>

        <div class="help-text">
          <a href="{{ route('landing') }}">
          <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>Kembali            
          </a>
        </div>
      </form>
    </div>
  </div>

  <!-- Footer -->
  <div class="footer">
    <strong>Klipaa Students</strong> | 
    <a href="mailto:kesyapujiatmoko@gmail.com">Customer Service</a> | 
    &copy; 2025. Semua hak dilindungi.
  </div>

  <!-- Info toggle -->
  <div class="info-toggle" id="info-toggle" title="Tentang Tim">
    <i class="fas fa-info-circle"></i>
  </div>

  <!-- Info popup -->
  <div class="info-popup" id="info-popup">
    <h4><i class="fas fa-users"></i> Tim Pengembang</h4>
    <ul>
      <li>
        <strong>Kesya Apri Pujiatmoko</strong>
        <small>UI/UX & Backend Developer</small>
      </li>
      <li>
        <strong>Muhammad Zayyidan Al Kautsar</strong>
        <small>Backend & System Analyst</small>
      </li>
      <li>
        <strong>Alkayisa Nurhasya Lillah</strong>
        <small>UI/UX & Frontend Developer</small>
      </li>
    </ul>
  </div>

  <script>
    // Dynamic background based on time (same as original)
    const hour = new Date().getHours();
    let backgroundPath = '/img/Kantor Pagi.png';
    if (hour >= 4 && hour < 8) backgroundPath = '/img/Kantor Pagi.png';
    else if (hour >= 8 && hour < 15) backgroundPath = '/img/Kantor Siang.png';
    else if (hour >= 15 && hour < 18) backgroundPath = '/img/Kantor Sore.png';
    else backgroundPath = '/img/Kantor Malam.png';
    document.body.style.backgroundImage = `url('${backgroundPath}')`;

    // Alert for login failure
    @if($errors->any())
      Swal.fire({
        icon: 'error',
        title: 'Login Gagal',
        text: '{{ $errors->first() }}',
        background: '#fefefe',
        color: '#2d3436',
        confirmButtonColor: '#1c3d2e',
        confirmButtonText: 'Coba Lagi',
        showClass: { popup: 'animate__animated animate__shakeX' }
      });
    @endif

    // Alert for successful logout
    @if(session('logout_success'))
      Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: '{{ session("logout_success") }}',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true
      });
    @endif

    // Info popup toggle
    const infoToggle = document.getElementById('info-toggle');
    const infoPopup = document.getElementById('info-popup');
    
    infoToggle.addEventListener('click', e => {
      e.stopPropagation();
      infoPopup.classList.toggle('show');
    });
    
    window.addEventListener('click', e => {
      if (infoPopup.classList.contains('show') && 
          !infoPopup.contains(e.target) && 
          !infoToggle.contains(e.target)) {
        infoPopup.classList.remove('show');
      }
    });
  </script>
</body>
</html>