<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RapiChamba - Mi Perfil</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: white;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Decorative circles */
        .circle-decoration {
            position: fixed;
            border-radius: 50%;
            background: transparent;
            border: 120px solid #1D40AE;
            z-index: 0;
        }

        .circle-1 {
            width: 800px;
            height: 800px;
            top: -400px;
            right: -400px;
        }

        .circle-2 {
            width: 700px;
            height: 700px;
            bottom: -350px;
            left: -350px;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 60px;
            background: white;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .logo-container {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-placeholder {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            background: #f5f5f5;
            border: 2px dashed #ddd;
            font-size: 10px;
            color: #999;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .brand-name {
            font-size: 24px;
            font-weight: bold;
            color: #1D40AE;
        }

        .nav-menu {
            display: flex;
            gap: 30px;
            align-items: center;
        }

        .nav-menu a {
            color: #333;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }

        .nav-menu a:hover {
            color: #1D40AE;
        }

        /* Profile Container */
        .profile-container {
            max-width: 900px;
            margin: 50px auto;
            padding: 0 30px;
            position: relative;
            z-index: 5;
        }

        .profile-header {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.1);
            margin-bottom: 30px;
            text-align: center;
        }

        .profile-avatar {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 48px;
            font-weight: bold;
            border: 5px solid white;
            box-shadow: 0 5px 20px rgba(29, 64, 174, 0.3);
        }

        .profile-name {
            font-size: 32px;
            color: #333;
            margin-bottom: 10px;
        }

        .profile-type {
            display: inline-block;
            background: #1D40AE;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 15px;
        }

        .profile-stats {
            display: flex;
            justify-content: center;
            gap: 50px;
            margin-top: 30px;
        }

        .stat-item {
            text-align: center;
        }

        .stat-number {
            font-size: 32px;
            font-weight: bold;
            color: #1D40AE;
        }

        .stat-label {
            color: #666;
            font-size: 14px;
            margin-top: 5px;
        }

        /* Profile Sections */
        .profile-section {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.1);
            margin-bottom: 20px;
        }

        .section-title {
            font-size: 24px;
            color: #1D40AE;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 20px;
        }

        .info-item {
            padding: 15px;
            background: #f8f9fa;
            border-radius: 10px;
        }

        .info-label {
            font-size: 12px;
            color: #666;
            text-transform: uppercase;
            margin-bottom: 5px;
        }

        .info-value {
            font-size: 16px;
            color: #333;
            font-weight: 500;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        .skill-tag {
            background: #1D40AE;
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }

        .btn {
            padding: 12px 30px;
            border-radius: 10px;
            border: none;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 500;
        }

        .btn-primary {
            background: #1D40AE;
            color: white;
        }

        .btn-primary:hover {
            background: #152f7f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.3);
        }

        .btn-secondary {
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            margin-top: 30px;
        }

        .rating {
            display: flex;
            align-items: center;
            gap: 5px;
            justify-content: center;
            margin-top: 10px;
        }

        .star {
            color: #FFD700;
            font-size: 20px;
        }

        .rating-value {
            color: #666;
            margin-left: 5px;
            font-size: 14px;
        }

        @media (max-width: 768px) {
            .header {
                padding: 20px 30px;
                flex-direction: column;
                gap: 20px;
            }

            .nav-menu {
                flex-direction: column;
                gap: 15px;
            }

            .profile-stats {
                flex-direction: column;
                gap: 20px;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .action-buttons {
                flex-direction: column;
            }

            .circle-1, .circle-2 {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative Circles -->
    <div class="circle-decoration circle-1"></div>
    <div class="circle-decoration circle-2"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-container">
            <div class="logo-placeholder">Logo</div>
            <div class="brand-name">RAPICHAMBA</div>
        </div>
        <nav class="nav-menu">
            <a href="#">Inicio</a>
            <a href="#">Mis Chambas</a>
            <a href="#">Mensajes</a>
            <a href="#">Perfil</a>
        </nav>
    </header>

    <!-- Profile Container -->
    <div class="profile-container">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="profile-avatar">JD</div>
            <h1 class="profile-name">Juan Domínguez</h1>
            <span class="profile-type">Trabajador Verificado</span>
            
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="rating-value">(4.9 - 127 reseñas)</span>
            </div>

            <div class="profile-stats">
                <div class="stat-item">
                    <div class="stat-number">156</div>
                    <div class="stat-label">Trabajos completados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Tasa de éxito</div>
                </div>
                <div class="stat-item">
                    <div class="stat-number">2.5</div>
                    <div class="stat-label">Años en la plataforma</div>
                </div>
            </div>

            <div class="action-buttons">
                <button class="btn btn-primary">Editar Perfil</button>
                <button class="btn btn-secondary">Compartir Perfil</button>
            </div>
        </div>

        <!-- Personal Info Section -->
        <div class="profile-section">
            <h2 class="section-title">📋 Información Personal</h2>
            <div class="info-grid">
                <div class="info-item">
                    <div class="info-label">Email</div>
                    <div class="info-value">juan.dominguez@email.com</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Teléfono</div>
                    <div class="info-value">+52 442 123 4567</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Ubicación</div>
                    <div class="info-value">Querétaro, México</div>
                </div>
                <div class="info-item">
                    <div class="info-label">Miembro desde</div>
                    <div class="info-value">Junio 2022</div>
                </div>
            </div>
        </div>

        <!-- Skills Section -->
        <div class="profile-section">
            <h2 class="section-title">💼 Habilidades</h2>
            <div class="skills-list">
                <span class="skill-tag">Plomería</span>
                <span class="skill-tag">Electricidad</span>
                <span class="skill-tag">Carpintería</span>
                <span class="skill-tag">Pintura</span>
                <span class="skill-tag">Jardinería</span>
                <span class="skill-tag">Mudanzas</span>
                <span class="skill-tag">Reparaciones generales</span>
            </div>
        </div>

        <!-- About Section -->
        <div class="profile-section">
            <h2 class="section-title">✍️ Sobre mí</h2>
            <p style="color: #666; line-height: 1.8;">
                Soy un profesional con más de 10 años de experiencia en trabajos de mantenimiento y reparaciones. Me apasiona ayudar a las personas a resolver sus problemas del hogar de manera rápida y eficiente. Cuento con todas las herramientas necesarias y estoy disponible de lunes a sábado. ¡Trabajo con garantía!
            </p>
        </div>
    </div>
</body>
</html>