<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/png" href="{{ asset('img/Klipaa Original.png') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <title>Login Page - Klipaa Solusi Indonesia</title>
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

    .container {
      position: relative;
      z-index: 10;
      background: rgba(255, 255, 255, 0.25);
      backdrop-filter: blur(15px);
      padding: 50px 45px;
      border-radius: 24px;
      box-shadow: 
        0 20px 60px rgba(0, 0, 0, 0.3),
        0 0 0 1px rgba(255, 255, 255, 0.2),
        inset 0 1px 0 rgba(255, 255, 255, 0.3);
      max-width: 450px;
      width: 90%;
      animation: slideInUp 0.6s ease-out;
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(30px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    .circle {
      width: 140px;
      height: 140px;
      background: linear-gradient(135deg, #047857, #10b981);
      border-radius: 50%;
      margin: 0 auto 30px;
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 
        0 10px 30px rgba(5, 150, 105, 0.4),
        inset 0 -5px 20px rgba(0, 0, 0, 0.1);
      position: relative;
      overflow: hidden;
    }

    .circle i {
      color: white;
      font-size: 64px;
    }
    .circle::before {
      content: '';
      position: absolute;
      width: 100%;
      height: 100%
    }

    @keyframes pulse {
      0%, 100% {
        transform: scale(1);
      }
      50% {
        transform: scale(1.05);
      }
    }

    .marquee {
      background: linear-gradient(90deg, #047857, #059669, #10b981);
      color: white;
      padding: 15px 20px;
      border-radius: 12px;
      margin-bottom: 30px;
      overflow: hidden;
      position: relative;
      box-shadow: 0 4px 15px rgba(5, 150, 105, 0.3);
    }

    .marquee span {
      display: inline-block;
      font-weight: 600;
      font-size: 15px;
      letter-spacing: 0.3px;
      text-align: center;
      width: 100%;
      animation: marqueeText 3s ease-in-out infinite;
    }

    @keyframes marqueeText {
      0%, 100% {
        opacity: 1;
      }
      45%, 55% {
        opacity: 0.7;
      }
    }

    form {
      display: flex;
      flex-direction: column;
      gap: 20px;
    }

    input[type="text"],
    input[type="password"] {
      width: 100%;
      padding: 16px 20px;
      border: 2px solid #e5e7eb;
      border-radius: 12px;
      font-size: 15px;
      transition: all 0.3s ease;
      background: #ffffff;
      color: #1f2937;
      font-weight: 500;
    }

    input[type="text"]:focus,
    input[type="password"]:focus {
      outline: none;
      border-color: #10b981;
      box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1);
      background: #ffffff;
    }

    input::placeholder {
      color: #9ca3af;
      font-weight: 400;
    }

    button[type="submit"] {
      width: 100%;
      padding: 16px;
      background: linear-gradient(135deg, #047857, #059669);
      color: white;
      border: none;
      border-radius: 12px;
      font-size: 16px;
      font-weight: 700;
      cursor: pointer;
      transition: all 0.3s ease;
      text-transform: uppercase;
      letter-spacing: 1px;
      box-shadow: 0 8px 20px rgba(5, 150, 105, 0.4);
      margin-top: 10px;
    }

    button[type="submit"]:hover {
      transform: translateY(-2px);
      box-shadow: 0 12px 30px rgba(5, 150, 105, 0.5);
      background: linear-gradient(135deg, #065f46, #047857);
    }

    button[type="submit"]:active {
      transform: translateY(0);
    }

    .help-text {
      text-align: center;
      color: #047857;
      font-size: 13px;
      margin-top: 5px;
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

    .info-toggle {
      position: fixed;
      bottom: 100px;
      right: 30px;
      width: 56px;
      height: 56px;
      background: linear-gradient(135deg, #047857, #059669);
      color: white;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      cursor: pointer;
      box-shadow: 0 8px 24px rgba(5, 150, 105, 0.4);
      z-index: 100;
      transition: all 0.3s ease;
      animation: bounce 2s ease-in-out infinite;
    }

    @keyframes bounce {
      0%, 100% {
        transform: translateY(0);
      }
      50% {
        transform: translateY(-8px);
      }
    }

    .info-toggle:hover {
      transform: scale(1.1) translateY(0) !important;
      box-shadow: 0 12px 32px rgba(5, 150, 105, 0.5);
      animation: none;
    }

    .info-toggle i {
      font-size: 24px;
    }

    .info-popup {
      position: fixed;
      bottom: 170px;
      right: 30px;
      background: rgba(255, 255, 255, 0.98);
      backdrop-filter: blur(15px);
      padding: 30px;
      border-radius: 20px;
      box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
      max-width: 350px;
      z-index: 99;
      opacity: 0;
      visibility: hidden;
      transform: translateY(20px) scale(0.9);
      transition: all 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55);
      border: 1px solid rgba(229, 231, 235, 0.5);
    }

    .info-popup.show {
      opacity: 1;
      visibility: visible;
      transform: translateY(0) scale(1);
    }

    .info-popup h4 {
      color: #047857;
      margin-bottom: 20px;
      font-size: 16px;
      font-weight: 700;
      text-align: center;
      padding-bottom: 15px;
      border-bottom: 2px solid #e5e7eb;
    }

    .info-popup ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .info-popup li {
      margin-bottom: 18px;
      padding: 15px;
      background: #f9fafb;
      border-radius: 12px;
      border-left: 4px solid #10b981;
      transition: all 0.3s ease;
    }

    .info-popup li:hover {
      background: #f0fdf4;
      transform: translateX(5px);
      box-shadow: 0 4px 12px rgba(5, 150, 105, 0.1);
    }

    .info-popup li:last-child {
      margin-bottom: 0;
    }

    .info-popup strong {
      color: #047857;
      font-size: 15px;
      font-weight: 700;
    }

    .info-popup small {
      color: #6b7280;
      font-size: 13px;
      font-weight: 500;
    }

    @media (max-width: 768px) {
      .container {
        padding: 40px 30px;
        margin: 20px;
      }

      .circle {
        width: 120px;
        height: 120px;
      }

      .info-popup {
        right: 20px;
        left: 20px;
        max-width: none;
        bottom: 160px;
      }

      .info-toggle {
        bottom: 90px;
        right: 20px;
        width: 50px;
        height: 50px;
      }

      .footer {
        padding: 15px;
        font-size: 13px;
      }
    }

    /* Loading Animation */
    @keyframes spin {
      to {
        transform: rotate(360deg);
      }
    }
  </style>
</head>

<body>
<div class="bg-shapes">
    <div class="shape"></div>
    <div class="shape"></div>
    <div class="shape"></div>
  </div>
  <div class="container">
    <div class="circle"><i class="fas fa-graduation-cap"></i>
</div>
    <div class="marquee">
      
      <span>Selamat Datang Di Halaman Admin!! Silakan login untuk melanjutkan.</span>
    </div>

    <form method="POST" action="{{ route('login.post') }}">
      @csrf
      <input type="text" name="nis" placeholder="Masukkan NIP" required>
      <input type="password" name="password" placeholder="Masukkan Password" required>
      <button type="submit">Masuk</button>
      <div class="help-text">
          <a href="{{ route('landing') }}">
          <i class="fas fa-arrow-left" style="margin-right: 8px;"></i>Kembali            
          </a>
        </div>
    </form>
  </div>

  <div class="footer">
    <strong>Klipaa Students</strong><br>
    Jika ada kendala, hubungi
    <a href="mailto:kesyapujiatmoko@gmail.com?subject=Laporan Masalah Login&body=Nama/NIS/NIP: [isi di sini]%0D%0A%0D%0ADeskripsi masalah: [isi di sini]" title="Hubungi Customer Service"><strong>Customer Service</strong></a><br>
    <strong>&copy; 2025. Semua hak dilindungi.</strong>
  </div>

  <div class="info-toggle" id="info-toggle" title="Tentang Kami">
    <i class="fas fa-info-circle"></i>
  </div>

  <div class="info-popup" id="info-popup">
    <h4>Dibuat oleh Tim PKL SMK Wikrama 1 Garut dan SMKN 1 Garut</h4>
    <ul>
      <li>
        <strong>Kesya Apri Pujiatmoko</strong><br>
        <small>UI/UX & Backend</small>
      </li>
      <li>
        <strong>Muhammad Zayyidan Al Kautsar</strong><br>
        <small>Backend & System Analyst</small>
      </li>
      <li>
        <strong>Alkayisa Nurhasya Lillah</strong><br>
        <small>UI/UX & Frontend</small>
      </li>
    </ul>
  </div>

  <script>
    // Ganti background berdasarkan waktu
    const hour = new Date().getHours();
    let backgroundPath = '/img/Kantor Pagi.png';
    if (hour >= 4 && hour < 8) backgroundPath = '/img/Kantor Pagi.png';
    else if (hour >= 8 && hour < 15) backgroundPath = '/img/Kantor Siang.png';
    else if (hour >= 15 && hour < 18) backgroundPath = '/img/Kantor Sore.png';
    else backgroundPath = '/img/Kantor Malam.png';
    document.body.style.backgroundImage = `url('${backgroundPath}')`;

    // Popup Info tim
    const infoToggle = document.getElementById('info-toggle');
    const infoPopup = document.getElementById('info-popup');
    
    infoToggle.addEventListener('click', e => {
      e.stopPropagation();
      infoPopup.classList.toggle('show');
    });
    
    window.addEventListener('click', e => {
      if (infoPopup.classList.contains('show') && !infoPopup.contains(e.target)) {
        infoPopup.classList.remove('show');
      }
    });

    // Smooth scroll and animations
    document.addEventListener('DOMContentLoaded', () => {
      const container = document.querySelector('.container');
      container.style.animation = 'slideInUp 0.6s ease-out';
    });
  </script>
</body>
</html>