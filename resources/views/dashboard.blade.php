<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Rapichamba - Home</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #CADBE7 0%, #97BCCD7 50%);
            min-height: 100vh;
        }

        .header {
            background: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(27, 71, 105, 0.1);
        }

        .logo {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1B4769;
        }

        .logo span { color: #507FA9; }

        .header-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .notification-btn {
            position: relative;
            background: #CADBE7;
            border: none;
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
            background: #97BCCD7;
            transform: scale(1.05);
        }

        .notification-badge {
            position: absolute;
            top: -2px;
            right: -2px;
            background: #507FA9;
            color: white;
            font-size: 0.7rem;
            padding: 2px 6px;
            border-radius: 10px;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #507FA9, #75A4C5);
            cursor: pointer;
            border: 2px solid #97BCCD7;
            transition: transform 0.3s;
        }

        .avatar:hover { transform: scale(1.1); }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        .user-type-toggle {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }

        .toggle-btn {
            padding: 0.5rem 1.5rem;
            border: 2px solid #507FA9;
            background: white;
            color: #507FA9;
            border-radius: 20px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .toggle-btn.active { background: #507FA9; color: white; }

        .search-section {
            background: white;
            border-radius: 15px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            box-shadow: 0 4px 12px rgba(27, 71, 105, 0.15);
        }

        .search-container { display: flex; gap: 0.5rem; }

        .search-input {
            flex: 1;
            padding: 1rem;
            border: 2px solid #CADBE7;
            border-radius: 10px;
            font-size: 1rem;
            transition: border 0.3s;
        }

        .search-input:focus {
            outline: none;
            border-color: #507FA9;
        }

        .filter-btn {
            background: #507FA9;
            color: white;
            border: none;
            padding: 1rem 1.5rem;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .filter-btn:hover { background: #1B4769; transform: translateY(-2px); }

        .view-toggle {
            display: flex;
            justify-content: center;
            margin-bottom: 2rem;
            background: white;
            width: fit-content;
            margin-left: auto;
            margin-right: auto;
            border-radius: 25px;
            overflow: hidden;
            box-shadow: 0 2px 8px rgba(27, 71, 105, 0.1);
        }

        .view-btn {
            padding: 0.75rem 2rem;
            border: none;
            background: white;
            color: #507FA9;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }

        .view-btn.active { background: #507FA9; color: white; }

        .categories-section { margin-bottom: 2rem; }

        .section-title {
            color: #1B4769;
            font-size: 1.3rem;
            margin-bottom: 1rem;
            font-weight: 700;
        }

        .categories-carousel {
            display: flex;
            gap: 1rem;
            overflow-x: auto;
            padding-bottom: 1rem;
            scrollbar-width: thin;
            scrollbar-color: #507FA9 #CADBE7;
        }

        .category-card {
            min-width: 100px;
            background: white;
            border-radius: 15px;
            padding: 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            box-shadow: 0 2px 8px rgba(27, 71, 105, 0.1);
        }

        .category-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(27, 71, 105, 0.2);
        }

        .category-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #75A4C5, #97BCCD7);
            border-radius: 50%;
            margin: 0 auto 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
        }

        .category-name {
            color: #1B4769;
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
            border-radius: 15px;
            padding: 1.5rem;
            box-shadow: 0 2px 12px rgba(27, 71, 105, 0.1);
            transition: all 0.3s;
            cursor: pointer;
        }

        .job-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(27, 71, 105, 0.2);
        }

        .card-header {
            display: flex;
            justify-content: space-between;
            align-items: start;
            margin-bottom: 1rem;
        }

        .card-title {
            color: #1B4769;
            font-size: 1.1rem;
            font-weight: 700;
        }

        .card-price {
            color: #507FA9;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .card-info {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #75A4C5;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .card-description {
            color: #507FA9;
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
            background: #CADBE7;
            color: #1B4769;
            padding: 0.3rem 0.8rem;
            border-radius: 15px;
            font-size: 0.8rem;
        }

        .rating {
            color: #507FA9;
            font-weight: 600;
        }

        .apply-btn {
            width: 100%;
            padding: 0.8rem;
            background: #507FA9;
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }

        .apply-btn:hover { background: #1B4769; transform: translateY(-2px); }

        .map-container {
            display: none;
            background: white;
            border-radius: 15px;
            padding: 2rem;
            height: 500px;
            box-shadow: 0 4px 12px rgba(27, 71, 105, 0.15);
            text-align: center;
            align-items: center;
            justify-content: center;
            color: #507FA9;
            font-size: 1.2rem;
        }

        .map-container.active { display: flex; }

        .feed-section.hidden { display: none; }
    </style>
</head>
<body>
    <header class="header">
        <div class="logo">Rapi<span>chamba</span></div>
        <div class="header-actions">
            <button class="notification-btn">🔔<span class="notification-badge">3</span></button>
            <div class="avatar"></div>
        </div>
    </header>

    <div class="container">
        <div class="user-type-toggle">
            <button class="toggle-btn active" onclick="switchUserType('trabajador')">👷 Trabajador</button>
            <button class="toggle-btn" onclick="switchUserType('empleador')">💼 Empleador</button>
        </div>

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
            <small>(RF12: Integración con mapa interactivo)</small>
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
        function switchUserType(type) {
            const buttons = document.querySelectorAll('.user-type-toggle .toggle-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');

            const searchInput = document.getElementById('searchInput');
            searchInput.placeholder = type === 'trabajador'
                ? 'Busca chambas cercanas'
                : '¿Qué necesitas solucionar hoy?';
        }

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
