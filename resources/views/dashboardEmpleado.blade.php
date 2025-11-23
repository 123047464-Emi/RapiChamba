<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Trabajador</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

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

        .header {
            background: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(29, 64, 174, 0.1);
            position: relative;
            z-index: 10;
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1D40AE;
        }

        .logo span { color: #000; }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: #f5f5f5;
            border: 1px solid #ddd;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s;
        }

        .notification-btn:hover {
            background: #e8e8e8;
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #1D40AE;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            cursor: pointer;
            border: 2px solid #ddd;
            transition: transform 0.3s;
        }

        .avatar:hover { transform: scale(1.1); }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
            position: relative;
            z-index: 1;
        }

        .search-section {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .search-container { display: flex; gap: 0.5rem; }

        .search-input {
            flex: 1;
            padding: 12px 16px;
            border: 1px solid #ddd;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        .filter-btn {
            background: #000;
            color: white;
            border: none;
            padding: 12px 24px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 15px;
        }

        .filter-btn:hover { 
            background: #333;
            transform: translateY(-2px);
        }

        .view-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            background: white;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .view-btn {
            padding: 12px 32px;
            border: none;
            background: white;
            color: #333;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
            font-size: 15px;
        }

        .view-btn.active { 
            background: #1D40AE;
            color: white;
        }

        .categories-section { margin-bottom: 2rem; }

        .section-title {
            color: #333;
            font-size: 28px;
            margin-bottom: 1rem;
            font-weight: 600;
        }

        .categories-carousel {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scrollbar-width: thin;
            scrollbar-color: #1D40AE #f5f5f5;
        }

        .category-card {
            min-width: 100px;
            background: white;
            border-radius: 20px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            border: 1px solid #ddd;
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(29, 64, 174, 0.2);
            border-color: #1D40AE;
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #1D40AE, #4169E1);
            border-radius: 50%;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .category-name {
            color: #333;
            font-size: 0.9rem;
            font-weight: 600;
        }

        .feed-section {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 1.5rem;
        }

        .job-card {
            background: white;
            border-radius: 20px;
            padding: 1.5rem;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            transition: all 0.3s;
            cursor: pointer;
            border: 1px solid #ddd;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(29, 64, 174, 0.2);
            border-color: #1D40AE;
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .card-title {
            color: #333;
            font-size: 1.1rem;
            font-weight: 600;
        }

        .card-price {
            color: #1D40AE;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .card-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #666;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .card-description {
            color: #666;
            margin-bottom: 1rem;
            line-height: 1.5;
        }

        .card-tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
            margin-bottom: 1rem;
        }

        .tag {
            background: #f5f5f5;
            color: #333;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
            border: 1px solid #ddd;
        }

        .rating {
            color: #1D40AE;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .apply-btn {
            width: 100%;
            padding: 12px;
            background: #000;
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            font-size: 15px;
        }

        .apply-btn:hover { 
            background: #333;
            transform: translateY(-2px);
        }

        .map-container {
            display: none;
            background: white;
            border-radius: 20px;
            padding: 2rem;
            height: 500px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            text-align: center;
            align-items: center;
            justify-content: center;
            color: #666;
            font-size: 1.2rem;
            flex-direction: column;
            border: 1px solid #ddd;
        }

        .map-container.active { display: flex; }

        .feed-section.hidden { display: none; }

        @media (max-width: 768px) {
            .container {
                padding: 1rem;
            }

            .section-title {
                font-size: 24px;
            }

            .feed-section {
                grid-template-columns: 1fr;
            }

            .circle-top-right,
            .circle-top-right-second,
            .circle-bottom-left {
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

    <header class="header">
        <div class="logo">Rapi<span>chamba</span></div>
        <div class="header-actions">
            <button class="notification-btn">🔔<span class="notification-badge">3</span></button>
            <div class="avatar"></div>
        </div>
    </header>

    <div class="container">
        <div class="search-section">
            <div class="search-container">
                <input type="text" class="search-input" id="searchInput" placeholder="Busca chambas cercanas" />
                <button class="filter-btn">🔍 Filtros</button>
            </div>
        </div>

        <div class="view-toggle">
            <button class="view-btn active" onclick="switchView('lista')">📋 Lista</button>
            <button class="view-btn" onclick="switchView('mapa')">🗺️ Mapa</button>
        </div>

        <div class="categories-section">
            <h2 class="section-title">Categorías Populares</h2>
            <div class="categories-carousel">
                <div class="category-card"><div class="category-icon">🧹</div><div class="category-name">Limpieza</div></div>
                <div class="category-card"><div class="category-icon">🔧</div><div class="category-name">Reparación</div></div>
                <div class="category-card"><div class="category-icon">🚚</div><div class="category-name">Mudanza</div></div>
                <div class="category-card"><div class="category-icon">💻</div><div class="category-name">Tecnología</div></div>
                <div class="category-card"><div class="category-icon">🎨</div><div class="category-name">Pintura</div></div>
                <div class="category-card"><div class="category-icon">⚡</div><div class="category-name">Electricidad</div></div>
                <div class="category-card"><div class="category-icon">🪴</div><div class="category-name">Jardinería</div></div>
            </div>
        </div>

        <div class="map-container" id="mapView">
            🗺️ Vista de Mapa - Trabajos en Tiempo Real<br />
            <small>(Integración con mapa interactivo)</small>
        </div>

        <div class="feed-section" id="feedView">
            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Reparación de fuga</h3><div class="card-price">$500</div></div>
                <div class="card-info">📍 A 2km de ti</div>
                <div class="card-info">⏰ Publicado hace 15 min</div>
                <p class="card-description">Necesito reparar una fuga en el baño urgentemente. Preferencia para hoy.</p>
                <div class="card-tags"><span class="tag">Urgente</span><span class="tag">Plomería</span></div>
                <button class="apply-btn">Postularme</button>
            </div>

            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Limpieza profunda</h3><div class="card-price">$800</div></div>
                <div class="card-info">📍 A 5km de ti</div>
                <div class="card-info">⏰ Publicado hace 1 hora</div>
                <p class="card-description">Limpieza completa de casa de 3 habitaciones para el fin de semana.</p>
                <div class="card-tags"><span class="tag">Limpieza</span><span class="tag">Fin de semana</span></div>
                <button class="apply-btn">Postularme</button>
            </div>

            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Instalación de ventilador</h3><div class="card-price">$350</div></div>
                <div class="card-info">📍 A 1km de ti</div>
                <div class="card-info">⏰ Publicado hace 2 horas</div>
                <p class="card-description">Instalar ventilador de techo en sala. Incluye materiales.</p>
                <div class="card-tags"><span class="tag">Electricidad</span></div>
                <div class="rating">⭐ Cliente verificado</div>
                <button class="apply-btn">Postularme</button>
            </div>

            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Pintura de habitación</h3><div class="card-price">$1,200</div></div>
                <div class="card-info">📍 A 3km de ti</div>
                <div class="card-info">⏰ Publicado hace 3 horas</div>
                <p class="card-description">Pintar habitación de aprox. 15m². Pintura incluida.</p>
                <div class="card-tags"><span class="tag">Pintura</span><span class="tag">Materiales incluidos</span></div>
                <button class="apply-btn">Postularme</button>
            </div>

            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Reparación de PC</h3><div class="card-price">$400</div></div>
                <div class="card-info">📍 A 4km de ti</div>
                <div class="card-info">⏰ Publicado hace 5 horas</div>
                <p class="card-description">PC no enciende. Diagnóstico y reparación necesaria.</p>
                <div class="card-tags"><span class="tag">Tecnología</span><span class="tag">Diagnóstico</span></div>
                <div class="rating">⭐ 4.9 estrellas</div>
                <button class="apply-btn">Postularme</button>
            </div>

            <div class="job-card">
                <div class="card-header"><h3 class="card-title">Mudanza pequeña</h3><div class="card-price">$1,500</div></div>
                <div class="card-info">📍 A 6km de ti</div>
                <div class="card-info">⏰ Publicado hace 6 horas</div>
                <p class="card-description">Mudanza de departamento 1 habitación. Necesito 2 personas.</p>
                <div class="card-tags"><span class="tag">Mudanza</span><span class="tag">2 personas</span></div>
                <button class="apply-btn">Postularme</button>
            </div>
        </div>
    </div>

    <script>
        function switchView(view) {
            const buttons = document.querySelectorAll('.view-toggle .view-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            const mapView = document.getElementById('mapView');
            const feedView = document.getElementById('feedView');

            if (view === 'mapa') {
                mapView.classList.add('active');
                feedView.classList.add('hidden');
            } else {
                mapView.classList.remove('active');
                feedView.classList.remove('hidden');
            }
        }
    </script>
</body>
</html>