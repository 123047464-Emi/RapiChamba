<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rapichamba - Detalle de Chamba</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, sans-serif;
            background: linear-gradient(135deg, #CADBE7 0%, #97BCCD7 50%);
            min-height: 100vh;
        }

        /* Header */
        .header {
            background: white;
            padding: 1rem 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(27, 71, 105, 0.1);
        }

        .back-btn {
            background: #CADBE7;
            border: none;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            font-size: 1.2rem;
            transition: all 0.3s;
        }

        .back-btn:hover {
            background: #97BCCD7;
            transform: scale(1.05);
        }

        .header-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #1B4769;
        }

        .share-btn {
            background: transparent;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            transition: transform 0.3s;
        }

        .share-btn:hover {
            transform: scale(1.1);
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 2rem 1.5rem;
        }

        /* Main Card */
        .detail-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(27, 71, 105, 0.15);
        }

        /* Header Section */
        .card-header {
            padding: 2rem;
            background: linear-gradient(135deg, #75A4C5 0%, #507FA9 100%);
            color: white;
        }

        .job-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .price-section {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .price {
            font-size: 3rem;
            font-weight: 800;
        }

        .price-label {
            font-size: 0.9rem;
            opacity: 0.9;
        }

        .meta-info {
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
        }

        .meta-item {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.95rem;
        }

        /* Status Bar (RF11) */
        .status-section {
            padding: 2rem;
            background: #CADBE7;
            border-bottom: 2px solid #97BCCD7;
        }

        .status-title {
            color: #1B4769;
            font-weight: 700;
            margin-bottom: 1.5rem;
            font-size: 1.1rem;
        }

        .progress-bar {
            display: flex;
            justify-content: space-between;
            position: relative;
            margin-bottom: 1rem;
        }

        .progress-line {
            position: absolute;
            top: 20px;
            left: 0;
            right: 0;
            height: 4px;
            background: #97BCCD7;
            z-index: 0;
        }

        .progress-fill {
            position: absolute;
            top: 20px;
            left: 0;
            height: 4px;
            background: #507FA9;
            z-index: 1;
            transition: width 0.5s ease;
        }

        .progress-step {
            display: flex;
            flex-direction: column;
            align-items: center;
            z-index: 2;
            position: relative;
        }

        .step-circle {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            border: 4px solid #97BCCD7;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
            margin-bottom: 0.5rem;
            transition: all 0.3s;
        }

        .step-circle.active {
            border-color: #507FA9;
            background: #507FA9;
            color: white;
            transform: scale(1.1);
        }

        .step-circle.completed {
            border-color: #507FA9;
            background: #507FA9;
            color: white;
        }

        .step-label {
            font-size: 0.8rem;
            color: #507FA9;
            font-weight: 600;
            text-align: center;
            max-width: 80px;
        }

        /* Content Section */
        .card-content {
            padding: 2rem;
        }

        .section {
            margin-bottom: 2rem;
        }

        .section-title {
            color: #1B4769;
            font-size: 1.2rem;
            font-weight: 700;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .description {
            color: #507FA9;
            line-height: 1.8;
            font-size: 1rem;
        }

        /* Location Map */
        .map-container {
            width: 100%;
            height: 250px;
            background: linear-gradient(135deg, #CADBE7, #97BCCD7);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #507FA9;
            font-size: 1rem;
            margin-bottom: 1rem;
            position: relative;
            overflow: hidden;
        }

        .map-placeholder {
            text-align: center;
        }

        .map-marker {
            position: absolute;
            font-size: 3rem;
            animation: bounce 2s infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }

        .address {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            color: #507FA9;
            font-size: 1rem;
            padding: 0.8rem;
            background: #CADBE7;
            border-radius: 10px;
        }

        /* Requirements & Details */
        .details-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
        }

        .detail-item {
            background: #CADBE7;
            padding: 1rem;
            border-radius: 10px;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .detail-icon {
            font-size: 1.5rem;
        }

        .detail-text {
            flex: 1;
        }

        .detail-label {
            font-size: 0.8rem;
            color: #75A4C5;
            font-weight: 600;
        }

        .detail-value {
            font-size: 1rem;
            color: #1B4769;
            font-weight: 700;
        }

        /* Tags */
        .tags {
            display: flex;
            gap: 0.5rem;
            flex-wrap: wrap;
        }

        .tag {
            background: linear-gradient(135deg, #75A4C5, #97BCCD7);
            color: white;
            padding: 0.5rem 1rem;
            border-radius: 20px;
            font-size: 0.9rem;
            font-weight: 600;
        }

        /* Employer Info */
        .employer-card {
            display: flex;
            gap: 1rem;
            padding: 1.5rem;
            background: #CADBE7;
            border-radius: 15px;
            align-items: center;
        }

        .employer-avatar {
            width: 70px;
            height: 70px;
            border-radius: 50%;
            background: linear-gradient(135deg, #507FA9, #75A4C5);
            border: 3px solid white;
        }

        .employer-info {
            flex: 1;
        }

        .employer-name {
            font-size: 1.2rem;
            font-weight: 700;
            color: #1B4769;
            margin-bottom: 0.3rem;
        }

        .employer-rating {
            color: #507FA9;
            font-size: 0.9rem;
        }

        .employer-stats {
            display: flex;
            gap: 1rem;
            margin-top: 0.5rem;
            font-size: 0.85rem;
            color: #75A4C5;
        }

        /* Action Buttons (RF08, RF10) */
        .action-buttons {
            padding: 2rem;
            background: white;
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .btn {
            flex: 1;
            min-width: 200px;
            padding: 1rem 2rem;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 700;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-secondary {
            background: white;
            border: 3px solid #507FA9;
            color: #507FA9;
        }

        .btn-secondary:hover {
            background: #CADBE7;
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(80, 127, 169, 0.3);
        }

        .btn-primary {
            background: linear-gradient(135deg, #507FA9, #75A4C5);
            border: none;
            color: white;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #1B4769, #507FA9);
            transform: translateY(-3px);
            box-shadow: 0 6px 20px rgba(27, 71, 105, 0.4);
        }

        /* User Type Toggle */
        .user-toggle {
            display: flex;
            justify-content: center;
            gap: 0.5rem;
            margin-bottom: 1.5rem;
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

        .toggle-btn.active {
            background: #507FA9;
            color: white;
        }

        /* Modal Styles */
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(27, 71, 105, 0.8);
            z-index: 1000;
            align-items: center;
            justify-content: center;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            padding: 2rem;
            border-radius: 20px;
            max-width: 500px;
            width: 90%;
            text-align: center;
        }

        .modal-icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        .modal-title {
            color: #1B4769;
            font-size: 1.5rem;
            font-weight: 700;
            margin-bottom: 1rem;
        }

        .modal-text {
            color: #507FA9;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .modal-buttons {
            display: flex;
            gap: 1rem;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <button class="back-btn">←</button>
        <div class="header-title">Detalle de Chamba</div>
        <button class="share-btn">⤴️</button>
    </header>

    <!-- Container -->
    <div class="container">
        <!-- User Type Toggle -->
        <div class="user-toggle">
            <button class="toggle-btn active" onclick="switchUserType('trabajador')">👷 Ver como Trabajador</button>
            <button class="toggle-btn" onclick="switchUserType('empleador')">💼 Ver como Empleador</button>
        </div>

        <!-- Main Detail Card -->
        <div class="detail-card">
            <!-- Card Header -->
            <div class="card-header">
                <h1 class="job-title">Limpieza de patio trasero</h1>
                <div class="price-section">
                    <div class="price">$400</div>
                    <div class="price-label">MXN</div>
                </div>
                <div class="meta-info">
                    <div class="meta-item">
                        <span>📅</span>
                        <span>Publicado hace 2 horas</span>
                    </div>
                    <div class="meta-item">
                        <span>⏰</span>
                        <span>Fecha: 22 Nov 2025</span>
                    </div>
                    <div class="meta-item">
                        <span>🕐</span>
                        <span>Duración: 3-4 horas</span>
                    </div>
                </div>
            </div>

            <!-- Status Section (RF11) -->
            <div class="status-section">
                <h3 class="status-title">📊 Estado del Servicio</h3>
                <div class="progress-bar">
                    <div class="progress-line"></div>
                    <div class="progress-fill" id="progressFill"></div>
                    
                    <div class="progress-step">
                        <div class="step-circle completed">📝</div>
                        <div class="step-label">Solicitado</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle active">✓</div>
                        <div class="step-label">Aceptado</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle">🔧</div>
                        <div class="step-label">En Progreso</div>
                    </div>
                    
                    <div class="progress-step">
                        <div class="step-circle">🎉</div>
                        <div class="step-label">Completado</div>
                    </div>
                </div>
            </div>

            <!-- Card Content -->
            <div class="card-content">
                <!-- Description Section (RF06) -->
                <div class="section">
                    <h3 class="section-title">📋 Descripción del Trabajo</h3>
                    <p class="description">
                        Necesito ayuda para limpiar mi patio trasero. El trabajo incluye barrer, recoger hojas, 
                        limpiar el área de jardín y organizar algunas macetas. El patio tiene aproximadamente 
                        30 metros cuadrados. Prefiero que el trabajo se realice el sábado por la mañana. 
                        Cuento con todas las herramientas necesarias (escoba, rastrillo, bolsas de basura).
                    </p>
                </div>

                <!-- Details Grid -->
                <div class="section">
                    <h3 class="section-title">📝 Detalles y Requisitos</h3>
                    <div class="details-grid">
                        <div class="detail-item">
                            <div class="detail-icon">👥</div>
                            <div class="detail-text">
                                <div class="detail-label">Personas</div>
                                <div class="detail-value">1 persona</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">🧰</div>
                            <div class="detail-text">
                                <div class="detail-label">Herramientas</div>
                                <div class="detail-value">Incluidas</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">📏</div>
                            <div class="detail-text">
                                <div class="detail-label">Área</div>
                                <div class="detail-value">30 m²</div>
                            </div>
                        </div>
                        <div class="detail-item">
                            <div class="detail-icon">💼</div>
                            <div class="detail-text">
                                <div class="detail-label">Experiencia</div>
                                <div class="detail-value">No requerida</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tags -->
                <div class="section">
                    <h3 class="section-title">🏷️ Categorías</h3>
                    <div class="tags">
                        <span class="tag">Limpieza</span>
                        <span class="tag">Jardinería</span>
                        <span class="tag">Fin de semana</span>
                        <span class="tag">Pago efectivo</span>
                    </div>
                </div>

                <!-- Location Section (RF06) -->
                <div class="section">
                    <h3 class="section-title">📍 Ubicación</h3>
                    <div class="map-container">
                        <div class="map-marker">📍</div>
                        <div class="map-placeholder">
                            Vista de Mapa<br>
                            <small>Integración con Google Maps / Mapbox</small>
                        </div>
                    </div>
                    <div class="address">
                        <span>📍</span>
                        <span><strong>Colonia Centro</strong>, a 2.5 km de tu ubicación</span>
                    </div>
                </div>

                <!-- Employer Info -->
                <div class="section">
                    <h3 class="section-title">👤 Publicado por</h3>
                    <div class="employer-card">
                        <div class="employer-avatar"></div>
                        <div class="employer-info">
                            <div class="employer-name">María González</div>
                            <div class="employer-rating">⭐ 4.8 estrellas (24 reseñas)</div>
                            <div class="employer-stats">
                                <span>✓ Verificado</span>
                                <span>📅 Miembro desde 2024</span>
                                <span>💼 12 trabajos publicados</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="action-buttons">
                <button class="btn btn-secondary" onclick="openChat()">
                    💬 Enviar Mensaje
                </button>
                <button class="btn btn-primary" id="mainActionBtn" onclick="handleMainAction()">
                    <span id="btnIcon">👍</span>
                    <span id="btnText">Postularme</span>
                </button>
            </div>
        </div>
    </div>

    <!-- Modal for Actions -->
    <div class="modal" id="actionModal">
        <div class="modal-content">
            <div class="modal-icon" id="modalIcon">✓</div>
            <h2 class="modal-title" id="modalTitle">¡Postulación Enviada!</h2>
            <p class="modal-text" id="modalText">
                Tu postulación ha sido enviada exitosamente. El empleador recibirá una notificación 
                y podrá contactarte pronto.
            </p>
            <div class="modal-buttons">
                <button class="btn btn-secondary" onclick="closeModal()">Cerrar</button>
                <button class="btn btn-primary" onclick="openChat()">Enviar Mensaje</button>
            </div>
        </div>
    </div>

    <script>
        let userType = 'trabajador';
        let currentStatus = 1; // 0: Solicitado, 1: Aceptado, 2: En Progreso, 3: Completado

        function switchUserType(type) {
            userType = type;
            const buttons = document.querySelectorAll('.user-toggle .toggle-btn');
            buttons.forEach(btn => btn.classList.remove('active'));
            event.target.classList.add('active');
            
            updateActionButton();
        }

        function updateActionButton() {
            const btnIcon = document.getElementById('btnIcon');
            const btnText = document.getElementById('btnText');
            
            if (userType === 'trabajador') {
                btnIcon.textContent = '👍';
                btnText.textContent = 'Postularme';
            } else {
                btnIcon.textContent = '💳';
                btnText.textContent = 'Pagar y Reservar';
            }
        }

        function handleMainAction() {
            const modal = document.getElementById('actionModal');
            const modalIcon = document.getElementById('modalIcon');
            const modalTitle = document.getElementById('modalTitle');
            const modalText = document.getElementById('modalText');
            
            if (userType === 'trabajador') {
                modalIcon.textContent = '✓';
                modalTitle.textContent = '¡Postulación Enviada!';
                modalText.textContent = 'Tu postulación ha sido enviada exitosamente. El empleador recibirá una notificación y podrá contactarte pronto.';
            } else {
                modalIcon.textContent = '💳';
                modalTitle.textContent = 'Iniciar Pago';
                modalText.textContent = 'Serás redirigido a la pasarela de pago segura para completar la transacción y reservar este servicio.';
            }
            
            modal.classList.add('active');
        }

        function openChat() {
            alert('Redirigiendo al chat (RF08)... 💬\nAquí se abriría la pantalla de mensajería.');
            closeModal();
        }

        function closeModal() {
            const modal = document.getElementById('actionModal');
            modal.classList.remove('active');
        }

        // Update progress bar based on status
        function updateProgress() {
            const progressFill = document.getElementById('progressFill');
            const percentage = (currentStatus / 3) * 100;
            progressFill.style.width = percentage + '%';
        }

        // Initialize
        updateProgress();
        updateActionButton();

        // Simulate progress change (for demo)
        function advanceStatus() {
            if (currentStatus < 3) {
                currentStatus++;
                updateProgress();
                
                const steps = document.querySelectorAll('.step-circle');
                steps[currentStatus].classList.add('active');
                if (currentStatus > 0) {
                    steps[currentStatus - 1].classList.remove('active');
                    steps[currentStatus - 1].classList.add('completed');
                }
            }
        }

        // Demo: Click on status section to advance (remove in production)
        document.querySelector('.status-section').addEventListener('click', advanceStatus);
    </script>
</body>
</html>