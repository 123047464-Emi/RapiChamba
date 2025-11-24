<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleador - Constructora del Valle</title>
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

        /* Decorative wave */
        .wave-decoration {
            position: fixed;
            top: 0;
            right: 0;
            width: 600px;
            height: 500px;
            background: #1D40AE;
            z-index: 0;
            clip-path: ellipse(70% 50% at 100% 20%);
        }

        /* Header */
        .header {
            background: transparent;
            padding: 1.5rem 3rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            position: relative;
            z-index: 10;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .logo-circle {
            width: 70px;
            height: 70px;
            background: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        .logo-circle img {
            width: 100%;
            height: 100%;
            object-fit: contain;
            border-radius: 50%;
        }

        .user-type {
            color: #1D40AE;
            font-size: 1.8rem;
            font-weight: 700;
        }

        .nav-links {
            display: flex;
            gap: 3rem;
            align-items: center;
        }

        .nav-links a {
            color: #1D40AE;
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
            transition: opacity 0.3s;
        }

        .nav-links a:hover {
            opacity: 0.7;
        }

        /* Main Content */
        .main-content {
            max-width: 950px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        /* Profile Card */
        .profile-card {
            background: white;
            border-radius: 20px;
            padding: 3rem 2.5rem;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.08);
            text-align: center;
            margin-bottom: 2rem;
            position: relative;
        }

        .company-logo {
            width: 140px;
            height: 140px;
            background: white;
            border: 2px dashed #ddd;
            border-radius: 20px;
            margin: 0 auto 1.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #999;
            font-size: 0.8rem;
            text-align: center;
            line-height: 1.3;
        }

        .company-name {
            font-size: 2rem;
            color: #333;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .verified-badge {
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            background: #1D40AE;
            color: white;
            padding: 0.5rem 1.3rem;
            border-radius: 25px;
            font-size: 0.9rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
        }

        .briefcase-icon {
            font-size: 1rem;
        }

        .rating {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 0.3rem;
            margin-bottom: 0.5rem;
        }

        .star {
            color: #FFD700;
            font-size: 1.5rem;
        }

        .star.empty {
            color: #ddd;
        }

        .rating-text {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 2.5rem;
        }

        /* Stats */
        .stats {
            display: flex;
            justify-content: space-around;
            padding-top: 2rem;
            border-top: 1px solid #e8e8e8;
        }

        .stat-item {
            text-align: center;
            flex: 1;
        }

        .stat-value {
            font-size: 2.5rem;
            color: #1D40AE;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .stat-label {
            color: #666;
            font-size: 0.9rem;
        }

        /* Info Sections */
        .info-section {
            background: white;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 2px 12px rgba(0, 0, 0, 0.08);
            margin-bottom: 1.5rem;
            position: relative;
        }

        .section-header {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #1D40AE;
            font-weight: 700;
            font-size: 1.1rem;
            margin-bottom: 1.5rem;
            padding-bottom: 0.8rem;
            border-bottom: 2px solid #f0f0f0;
        }

        .section-icon {
            font-size: 1.2rem;
        }

        .info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        .info-item {
            display: flex;
            flex-direction: column;
            gap: 0.3rem;
        }

        .info-label {
            color: #999;
            font-size: 0.75rem;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .info-value {
            color: #333;
            font-size: 0.95rem;
        }

        .edit-link {
            color: #1D40AE;
            text-decoration: none;
            font-size: 0.85rem;
            position: absolute;
            top: 2rem;
            right: 2rem;
        }

        /* Skills */
        .skills-container {
            display: flex;
            flex-wrap: wrap;
            gap: 0.8rem;
            margin-top: 1rem;
        }

        .skill-badge {
            background: #1D40AE;
            color: white;
            padding: 0.6rem 1.2rem;
            border-radius: 25px;
            font-size: 0.85rem;
            font-weight: 600;
        }

        /* Description */
        .description-text {
            color: #666;
            line-height: 1.7;
            font-size: 0.95rem;
        }

        @media (max-width: 768px) {
            .header {
                padding: 1rem;
            }

            .nav-links {
                gap: 1.5rem;
            }

            .main-content {
                padding: 0 1rem;
            }

            .info-grid {
                grid-template-columns: 1fr;
            }

            .stats {
                flex-direction: column;
                gap: 1.5rem;
            }

            .wave-decoration {
                display: none;
            }
        }
    </style>
</head>
<body>
    <!-- Decorative wave -->
    <div class="wave-decoration"></div>

    <!-- Header -->
    <header class="header">
        <div class="logo-section">
            <div class="logo-circle">
                <img src="https://via.placeholder.com/70/1D40AE/FFFFFF?text=RC" alt="RapiChamba">
            </div>
            <span class="user-type">Empleador</span>
        </div>
        <nav class="nav-links">
            <a href="{{ route('empleado.dashboardEmpleado') }}">Inicio</a>
            <a href="{{ route('Empleador.SiTerminarEmpleador') }}">Notificaciones</a>
            <a href="home">Cerrar Sesión</a>
        </nav>
    </header>

    <!-- Main Content -->
    <div class="main-content">
        <!-- Profile Card -->
        <div class="profile-card">
            <div class="company-logo">
                Logo de la<br>Empresa
            </div>
            <h1 class="company-name">Constructora del Valle</h1>
            <span class="verified-badge">
                <span class="briefcase-icon">💼</span>
                Empleador Verificado
            </span>
            
            <div class="rating">
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star">★</span>
                <span class="star empty">★</span>
            </div>
            <p class="rating-text">(4.2 - 43 reseñas)</p>

            <div class="stats">
                <div class="stat-item">
                    <div class="stat-value">87</div>
                    <div class="stat-label">Trabajos publicados</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">95%</div>
                    <div class="stat-label">Tasa de finalización</div>
                </div>
                <div class="stat-item">
                    <div class="stat-value">1.8</div>
                    <div class="stat-label">Años en la plataforma</div>
                </div>

            </div>
        </div>

        <!-- Datos Personales -->
        <div class="info-section">
            <div class="section-header">
                <span class="section-icon">📋</span>
                Datos Personales
            </div>
            <a href="#" class="edit-link">Seleccionar para editar</a>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nombre Completo</span>
                    <span class="info-value">María Fernández López</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Teléfono</span>
                    <span class="info-value">+52 442 987 6543</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Email</span>
                    <span class="info-value">contacto@constructoradelvalle.com</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Miembro Desde</span>
                    <span class="info-value">Marzo 2023</span>
                </div>
            </div>
        </div>

        <!-- Información de la Empresa -->
        <div class="info-section">
            <div class="section-header">
                <span class="section-icon">🏢</span>
                Información de la Empresa
            </div>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Nombre de la Empresa</span>
                    <span class="info-value">Constructora del Valle S.A. de C.V.</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Industria</span>
                    <span class="info-value">Construcción y Remodelación</span>
                </div>
            </div>
        </div>

        <!-- Dirección -->
        <div class="info-section">
            <div class="section-header">
                <span class="section-icon">📍</span>
                Dirección
            </div>
            
            <div class="info-grid">
                <div class="info-item">
                    <span class="info-label">Calle</span>
                    <span class="info-value">Av. Constituyentes 245</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Colonia</span>
                    <span class="info-value">Centro Histórico</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Municipio</span>
                    <span class="info-value">Querétaro</span>
                </div>
                <div class="info-item">
                    <span class="info-label">Estado</span>
                    <span class="info-value">Querétaro, México</span>
                </div>
            </div>
        </div>

        <!-- Habilidades Buscadas -->
        <div class="info-section">
            <div class="section-header">
                <span class="section-icon">🔧</span>
                Habilidades Buscadas
            </div>
            
            <div class="skills-container">
                <span class="skill-badge">Albañilería</span>
                <span class="skill-badge">Carpintería</span>
                <span class="skill-badge">Pintura</span>
                <span class="skill-badge">Herrería</span>
                <span class="skill-badge">Electricidad</span>
                <span class="skill-badge">Carpintería</span>
                <span class="skill-badge">Instalaciones</span>
            </div>
        </div>

        <!-- Descripción -->
        <div class="info-section">
            <div class="section-header">
                <span class="section-icon">✏️</span>
                Descripción
            </div>
            
            <p class="description-text">
                Somos una empresa constructora con más de 15 años de experiencia en el mercado. Nos especializamos 
                en proyectos residenciales y comerciales de mediana y gran escala. Buscamos constantemente 
                profesionales comprometidos y calificados para unirse a nuestro equipo y ayudarnos a seguir brindando 
                servicios de calidad a nuestros clientes. Ofrecemos proyectos a largo plazo, pagos puntuales y 
                excelentes condiciones de trabajo.
            </p>
        </div>
    </div>
</body>
</html>