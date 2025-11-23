<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #C1D7E6 0%, #e8f1f7 100%);
            padding: 40px 20px;
            min-height: 100vh;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background: white;
            border-radius: 15px;
            box-shadow: 0 10px 40px rgba(29, 64, 174, 0.2);
            overflow: hidden;
        }

        .header {
            background: #1D40AE;
            color: white;
            padding: 30px;
            text-align: center;
        }

        .header h1 {
            font-size: 32px;
            margin-bottom: 10px;
        }

        .header p {
            font-size: 16px;
            opacity: 0.9;
        }

        .user-type-selector {
            display: flex;
            justify-content: center;
            gap: 20px;
            padding: 30px;
            background: #f8f9fa;
        }

        .type-btn {
            flex: 1;
            max-width: 250px;
            padding: 20px;
            border: 3px solid #C1D7E6;
            border-radius: 12px;
            background: white;
            color: #1D40AE;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
        }

        .type-btn:hover {
            border-color: #1D40AE;
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.2);
        }

        .type-btn.active {
            background: #1D40AE;
            color: white;
            border-color: #1D40AE;
        }

        .form-container {
            padding: 40px;
        }

        .form-section {
            display: none;
        }

        .form-section.active {
            display: block;
        }

        .section-title {
            color: #1D40AE;
            font-size: 24px;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 3px solid #C1D7E6;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 20px;
            margin-bottom: 30px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            color: #1D40AE;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        label .required {
            color: #d9534f;
        }

        input, select, textarea {
            padding: 12px;
            border: 2px solid #C1D7E6;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.3s;
            font-family: inherit;
        }

        input:focus, select:focus, textarea:focus {
            outline: none;
            border-color: #1D40AE;
            box-shadow: 0 0 0 3px rgba(29, 64, 174, 0.1);
        }

        textarea {
            resize: vertical;
            min-height: 100px;
        }

        .file-input-wrapper {
            position: relative;
            overflow: hidden;
            display: inline-block;
            width: 100%;
        }

        .file-input-wrapper input[type=file] {
            position: absolute;
            left: -9999px;
        }

        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 12px;
            background: #C1D7E6;
            color: #1D40AE;
            border: 2px dashed #1D40AE;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s;
            font-weight: 600;
        }

        .file-input-label:hover {
            background: #1D40AE;
            color: white;
        }

        .file-name {
            margin-top: 8px;
            font-size: 12px;
            color: #666;
        }

        .habilidades-container {
            display: flex;
            gap: 10px;
            margin-bottom: 10px;
        }

        .habilidades-container input {
            flex: 1;
        }

        .btn-add-skill {
            padding: 12px 20px;
            background: #C1D7E6;
            color: #1D40AE;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            transition: all 0.3s;
        }

        .btn-add-skill:hover {
            background: #1D40AE;
            color: white;
        }

        .skills-list {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 10px;
        }

        .skill-tag {
            background: #1D40AE;
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
        }

        .skill-tag button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            line-height: 1;
        }

        .btn-submit {
            width: 100%;
            padding: 15px;
            background: #1D40AE;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 18px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s;
            margin-top: 20px;
        }

        .btn-submit:hover {
            background: #152f7f;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(29, 64, 174, 0.3);
        }

        @media (max-width: 768px) {
            .form-grid {
                grid-template-columns: 1fr;
            }

            .user-type-selector {
                flex-direction: column;
            }

            .type-btn {
                max-width: 100%;
            }

            .form-container {
                padding: 20px;
            }
        }
    </style>
</head>

<body>

<div class="container">
    <div class="header">
        <h1>Registro de Usuario</h1>
        <p>Completa tus datos para crear tu cuenta</p>
    </div>
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="user-type-selector">
        <button type="button" class="type-btn active" onclick="selectUserType('empleado', this)">👤 Empleado</button>
        <button type="button" class="type-btn" onclick="selectUserType('empleador', this)">🏢 Empleador</button>
    </div>

    <div class="form-container">
        <form action="{{ route('registro.registrar') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="tipo_usuario" id="tipoUsuario" value="empleado">
            <input type="hidden" name="habilidades" id="habilidadesHidden">

            <!-- Datos Personales -->
            <div class="section-title">📋 Datos Personales</div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Nombre <span class="required">*</span></label>
                    <input type="text" name="nombre" value="{{ old('nombre') }}" required>
                    @error('nombre')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Apellido Paterno <span class="required">*</span></label>
                    <input type="text" name="apellido_paterno" value="{{ old('apellido_paterno') }}" required>
                    @error('apellido_paterno')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Apellido Materno <span class="required">*</span></label>
                    <input type="text" name="apellido_materno" value="{{ old('apellido_materno') }}" required>
                    @error('apellido_materno')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Teléfono <span class="required">*</span></label>
                    <input type="tel" name="telefono" value="{{ old('telefono') }}" pattern="[0-9]{10}" placeholder="10 dígitos" required>
                    @error('telefono')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group full-width">
                    <label>Correo Electrónico <span class="required">*</span></label>
                    <input type="email" name="correo" value="{{ old('correo') }}" required>
                    @error('correo')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group full-width">
                    <label>Contraseña <span class="required">*</span></label>
                    <input type="password" name="contrasena" minlength="8" required>
                    @error('contrasena')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Dirección -->
            <div class="section-title">📍 Dirección</div>
            <div class="form-grid">
                <div class="form-group">
                    <label>Código Postal <span class="required">*</span></label>
                    <input type="text" name="codigo_postal" value="{{ old('codigo_postal') }}" placeholder="5 dígitos" required>
                    @error('codigo_postal')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Estado <span class="required">*</span></label>
                    <input type="text" name="estado" value="{{ old('estado') }}" required>
                    @error('estado')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Municipio <span class="required">*</span></label>
                    <input type="text" name="municipio" value="{{ old('municipio') }}" required>
                    @error('municipio')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Colonia <span class="required">*</span></label>
                    <input type="text" name="colonia" value="{{ old('colonia') }}" required>
                    @error('colonia')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group full-width">
                    <label>Calle <span class="required">*</span></label>
                    <input type="text" name="calle" value="{{ old('calle') }}" required>
                    @error('calle')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Número Exterior <span class="required">*</span></label>
                    <input type="text" name="numero_exterior" value="{{ old('numero_exterior') }}" required>
                    @error('numero_exterior')<span class="error-text">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label>Número Interior</label>
                    <input type="text" name="numero_interior" value="{{ old('numero_interior') }}">
                    @error('numero_interior')<span class="error-text">{{ $message }}</span>@enderror
                </div>
            </div>

            <!-- Fotografía -->
            <div class="section-title">📷 Fotografía</div>
            <div class="form-group full-width">
                <div class="file-input-wrapper">
                    <input type="file" id="fotografia" name="fotografia" accept="image/*" onchange="updateFileName(this)">
                    <label for="fotografia" class="file-input-label">📁 Seleccionar Fotografía</label>
                </div>
                <div id="fileName" class="file-name">No se ha seleccionado ningún archivo</div>
                @error('fotografia')<span class="error-text">{{ $message }}</span>@enderror
            </div>

            <!-- SECCIÓN EMPLEADO -->
            <div id="empleadoSection" class="form-section active">
                <div class="section-title">💼 Información Profesional (Empleado)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Experiencia <span class="required">*</span></label>
                        <textarea name="experiencia" required>{{ old('experiencia') }}</textarea>
                        @error('experiencia')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group full-width">
                        <label>Habilidades <span class="required">*</span></label>
                        <div class="habilidades-container">
                            <input type="text" id="habilidadInput" placeholder="Escribe una habilidad">
                            <button type="button" class="btn-add-skill" onclick="addSkill()">+ Agregar</button>
                        </div>
                        <div id="skillsList" class="skills-list"></div>
                    </div>
                </div>
            </div>

            <!-- SECCIÓN EMPLEADOR -->
            <div id="empleadorSection" class="form-section">
                <div class="section-title">🏢 Información de la Empresa (Empleador)</div>
                <div class="form-grid">
                    <div class="form-group full-width">
                        <label>Nombre de la Empresa</label>
                        <input type="text" name="nombre_empresa" value="{{ old('nombre_empresa') }}">
                        @error('nombre_empresa')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group full-width">
                        <label>Descripción <span class="required">*</span></label>
                        <textarea name="descripcion">{{ old('descripcion') }}</textarea>
                        @error('descripcion')<span class="error-text">{{ $message }}</span>@enderror
                    </div>
                </div>
            </div>

            <button type="submit" class="btn-submit">Registrarse</button>
        </form>
    </div>
</div>
<script>
let currentUserType = 'empleado';
let skills = [];

function selectUserType(type, button) {
    currentUserType = type;
    document.getElementById('tipoUsuario').value = type;

    // Cambiar estilo de botones
    document.querySelectorAll('.type-btn').forEach(btn => btn.classList.remove('active'));
    button.classList.add('active');

    const empleadoSection = document.getElementById('empleadoSection');
    const empleadorSection = document.getElementById('empleadorSection');

    if (type === 'empleado') {
        empleadoSection.style.display = 'block';
        empleadorSection.style.display = 'none';
        empleadoSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = false);
        empleadorSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = true);
    } else {
        empleadorSection.style.display = 'block';
        empleadoSection.style.display = 'none';
        empleadorSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = false);
        empleadoSection.querySelectorAll('input, textarea, select').forEach(el => el.disabled = true);
    }
}

function updateFileName(input) {
    const name = input.files[0]?.name || "No se ha seleccionado ningún archivo";
    document.getElementById('fileName').textContent = name;
}

function addSkill() {
    const input = document.getElementById('habilidadInput');
    const skill = input.value.trim();
    if (skill && !skills.includes(skill)) {
        skills.push(skill);
        updateSkillsList();
        input.value = '';
    }
}

function removeSkill(skill) {
    skills = skills.filter(s => s !== skill);
    updateSkillsList();
}

function updateSkillsList() {
    const container = document.getElementById('skillsList');
    container.innerHTML = skills.map(skill =>
        `<div class="skill-tag">${skill}<button type="button" onclick="removeSkill('${skill}')">×</button></div>`
    ).join('');
    document.getElementById('habilidadesHidden').value = JSON.stringify(skills);
}

document.addEventListener('DOMContentLoaded', () => {
    const habilidadInput = document.getElementById('habilidadInput');
    if (habilidadInput) {
        habilidadInput.addEventListener('keypress', e => {
            if (e.key === 'Enter') {
                e.preventDefault();
                addSkill();
            }
        });
    }
});
</script>
</body>
</html>