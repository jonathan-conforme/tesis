<!-- resources/views/team_member_form.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        <!-- Formulario para ingresar los datos -->
        <div class="col-12">
            <div class="card rounded-0">
                <div class="card-body">
                    <h5 class="card-title mb-4">Ingresar Información del Miembro del Equipo</h5>
                    <form action="{{ route('team.store') }}" method="POST" id="team-member-form" enctype="multipart/form-data">
                        @csrf
                        <!-- Nombre -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Ingrese el nombre" value="{{ old('name') }}">
                        </div>
                        <!-- Título -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Título</label>
                            <input type="text" class="form-control" id="title" name="title" placeholder="Ingrese el título" value="{{ old('title') }}">
                        </div>
                        <!-- Equipo -->
                        <div class="mb-3">
                            <label for="team" class="form-label">Equipo</label>
                            <input type="text" class="form-control" id="team" name="team" placeholder="Ingrese el equipo" value="{{ old('team') }}">
                        </div>
                        <!-- Enlaces de redes sociales -->
                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Ingrese el enlace a Twitter" value="{{ old('twitter') }}">
                        </div>
                        <div class="mb-3">
                            <label for="linkedin" class="form-label">LinkedIn</label>
                            <input type="url" class="form-control" id="linkedin" name="linkedin" placeholder="Ingrese el enlace a LinkedIn" value="{{ old('linkedin') }}">
                        </div>
                        <div class="mb-3">
                            <label for="github" class="form-label">GitHub</label>
                            <input type="url" class="form-control" id="github" name="github" placeholder="Ingrese el enlace a GitHub" value="{{ old('github') }}">
                        </div>
                        <!-- Imagen -->
                        <div class="mb-3">
                            <label for="image" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <!-- Botón para enviar -->
                        <button type="submit" class="btn btn-primary">Crear Miembro</button>
                    </form>
                </div>
            </div>
        </div>
        
        <!-- Vista previa del miembro del equipo -->
        <div class="col-6 col-lg-3 mb-4 mt-5" id="team-member-preview">
            <div class="card rounded-0">
                <img src="{{ old('image') ? asset('storage/' . old('image')) : 'assets/images/speakers/speaker-1.jpg' }}" class="card-img-top rounded-0" alt="" id="preview-image">
                <div class="card-body">
                    <h5 class="card-title mb-2" id="preview-name">{{ old('name') ?? 'James Doe' }}</h5>
                    <div class="card-text mb-3">
                        <div class="meta" id="preview-title">{{ old('title') ?? 'Senior Software Developer' }}</div>
                        <div class="meta" id="preview-team">{{ old('team') ?? 'Angular Core Team' }}</div>
                    </div>
                    <a href="#modal-speaker-1" data-bs-toggle="modal" data-bs-target="#modal-speaker-1">Read more &rarr;</a>
                </div><!--//card-body-->
                <div class="card-footer text-muted">
                    <ul class="social-list list-inline mb-0">
                        <li class="list-inline-item"><a href="{{ old('twitter') }}" id="preview-twitter"><i class="fab fa-twitter fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="{{ old('linkedin') }}" id="preview-linkedin"><i class="fab fa-linkedin-in fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="{{ old('github') }}" id="preview-github"><i class="fab fa-github fa-fw"></i></a></li>
                    </ul><!--//social-list-->
                </div><!--//card-footer-->
            </div><!--//card-->
        </div>
    </div><!--//row-->
</div><!--//container-->

<!-- Modal de detalle del miembro -->
<div class="modal fade" id="modal-speaker-1" tabindex="-1" aria-labelledby="modal-speaker-1-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-speaker-1-label">{{ old('name', 'James Doe') }} - {{ old('title', 'Senior Software Developer') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ old('name', 'James Doe') }} es un experto en desarrollo de software con un enfoque en Angular. Forma parte del equipo principal de Angular y ha contribuido significativamente a su crecimiento.</p>
                <p><strong>Experiencia:</strong></p>
                <ul>
                    <li>Desarrollador principal de Angular</li>
                    <li>Contribuciones al desarrollo de nuevas características</li>
                    <li>Asesor en tecnologías frontend</li>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>
@endsection
