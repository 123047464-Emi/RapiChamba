<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Dashboard Empleador</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: #f5f5f5;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        /* Círculos decorativos */
        .circle-decoration {
            position: fixed;
            border-radius: 50%;
            z-index: 0;
        }

        .circle-top-right {
            width: 450px;
            height: 450px;
            top: -100px;
            right: -300px;
            background: transparent;
            border: 50px solid #1D40AE;
        }

        .circle-top-right-second {
            width: 500px;
            height: 500px;
            top: -100px;
            right: -100px;
            background: transparent;
            border: 50px solid #1D40AE;
        }

        .circle-bottom-left {
            width: 550px;
            height: 550px;
            bottom: -225px; 
            left: -200px;
            background: transparent;
            border: 60px solid #1D40AE;
        }

        /* Header */
        .header {
            background: white;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 10;
            border-bottom: 3px solid #1D40AE;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo-icon {
            width: 50px;
            height: 50px;
            border: 3px solid #1D40AE;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
            text-transform: uppercase;
        }

        .nav-menu {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-link {
            color: #1D40AE;
            text-decoration: none;
            font-weight: 500;
            font-size: 16px;
            transition: opacity 0.3s;
        }

        .nav-link:hover {
            opacity: 0.7;
        }

        /* Container */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 3rem 2rem;
            position: relative;
            z-index: 1;
        }

        /* Hero Section */
        .employer-hero {
            text-align: center;
            margin-bottom: 3rem;
        }

        .employer-title {
            font-size: 2rem;
            color: #333;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .employer-subtitle {
            color: #666;
            font-size: 1rem;
            margin-bottom: 2rem;
        }

        .publish-btn {
            background: #1D40AE;
            color: white;
            border: none;
            padding: 14px 32px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 16px;
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.3);
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }

        .publish-btn:hover {
            background: #152e7f;
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(29, 64, 174, 0.4);
        }

        /* Stats Section */
        .stats-section {
            display: flex;
            justify-content: center;
            gap: 3rem;
            margin-bottom: 3rem;
        }

        .stat-card {
            text-align: center;
            background: white;
            padding: 2rem 3rem;
            border-radius: 15px;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            color: #1D40AE;
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .stat-description {
            color: #666;
            font-size: 0.9rem;
        }

        /* Professionals Section */
        .professionals-section {
            margin-top: 3rem;
        }

        .section-title {
            color: #333;
            font-size: 1.8rem;
            font-weight: 700;
            margin-bottom: 2rem;
            text-align: center;
        }

        .professionals-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }

        .professional-card {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            text-align: center;
        }

        .professional-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
        }

        .professional-avatar {
            width: 90px;
            height: 90px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            font-weight: 700;
            border: 4px solid #f5f5f5;
            box-shadow: 0 4px 12px rgba(29, 64, 174, 0.2);
        }

        .professional-name {
            color: #333;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 0.3rem;
        }

        .verified-badge {
            color: #27ae60;
            font-size: 1rem;
        }

        .professional-specialty {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 0.8rem;
        }

        .professional-rating {
            color: #1D40AE;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.2rem;
        }

        .professional-btn {
            width: 100%;
            padding: 12px;
            background: white;
            color: #1D40AE;
            border: 2px solid #1D40AE;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 15px;
        }

        .professional-btn:hover {
            background: #1D40AE;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .container {
                padding: 2rem 1rem;
            }

            .nav-menu {
                gap: 1rem;
            }

            .nav-link {
                font-size: 14px;
            }

            .employer-title {
                font-size: 1.5rem;
            }

            .stats-section {
                flex-direction: column;
                gap: 1.5rem;
            }

            .stat-card {
                padding: 1.5rem 2rem;
            }

            .stat-value {
                font-size: 2rem;
            }

            .professionals-grid {
                grid-template-columns: 1fr;
            }

            .circle-decoration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Círculos decorativos -->
    <div class="circle-decoration circle-top-right"></div>
    <div class="circle-decoration circle-top-right-second"></div>
    <div class="circle-decoration circle-bottom-left"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-section">
            <div class="logo-icon">🏃</div>
            <div class="logo-text">Rapichamba</div>
        </div>
        <nav class="nav-menu">
            <a href="#" class="nav-link">Inicio</a>
            <a href="#" class="nav-link">Perfil</a>
            <a href="#" class="nav-link">Notificaciones</a>
        </nav>
    </header>

    <!-- Container -->
    <div class="container">
        <!-- Hero Section -->
        <div class="employer-hero">
            <h1 class="employer-title">¿Tienes algo que reparar hoy?</h1>
            <p class="employer-subtitle">Publica tu chamba en segundos y recibe ofertas de trabajadores verificados.</p>
            <button class="publish-btn">+ Publicar Chamba Gratis</button>
        </div>

        <!-- Stats Section -->
        <div class="stats-section">
            <div class="stat-card">
                <div class="stat-label">En espera</div>
                <div class="stat-value">2</div>
                <div class="stat-description">Solicitudes</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">En progreso</div>
                <div class="stat-value">1</div>
                <div class="stat-description">Chamba activa</div>
            </div>
        </div>

        <!-- Professionals Section -->
        <div class="professionals-section">
            <h2 class="section-title">Profesionales Recomendados</h2>
            <div class="professionals-grid">
                <div class="professional-card">
                    <div class="professional-avatar">JP</div>
                    <div class="professional-name">Juan Pérez <span class="verified-badge">✓</span></div>
                    <div class="professional-specialty">Plomero Experto</div>
                    <div class="professional-rating">⭐ 4.9 (123 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>

                <div class="professional-card">
                    <div class="professional-avatar">MG</div>
                    <div class="professional-name">María García <span class="verified-badge">✓</span></div>
                    <div class="professional-specialty">Limpieza Profunda</div>
                    <div class="professional-rating">⭐ 5.0 (89 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>

                <div class="professional-card">
                    <div class="professional-avatar">CR</div>
                    <div class="professional-name">Carlos Ruiz</div>
                    <div class="professional-specialty">Electricista</div>
                    <div class="professional-rating">⭐ 4.8 (76 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>

                <div class="professional-card">
                    <div class="professional-avatar">LH</div>
                    <div class="professional-name">Luis Hernández <span class="verified-badge">✓</span></div>
                    <div class="professional-specialty">Pintor Profesional</div>
                    <div class="professional-rating">⭐ 4.7 (64 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>

                <div class="professional-card">
                    <div class="professional-avatar">AR</div>
                    <div class="professional-name">Ana Rodríguez <span class="verified-badge">✓</span></div>
                    <div class="professional-specialty">Jardinería</div>
                    <div class="professional-rating">⭐ 5.0 (92 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>

                <div class="professional-card">
                    <div class="professional-avatar">RS</div>
                    <div class="professional-name">Roberto Silva</div>
                    <div class="professional-specialty">Técnico en Computación</div>
                    <div class="professional-rating">⭐ 4.9 (58 Reseñas)</div>
                    <button class="professional-btn">Ver Perfil</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>