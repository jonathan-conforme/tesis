<?php if (isset($component)) { $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54 = $attributes; } ?>
<?php $component = App\View\Components\AppLayout::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\AppLayout::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <?php $__env->startSection('content'); ?>
    <div class="container mt-4">
        <h1 class="text-center lg text-primary mb-4">Ponencias Aceptadas</h1>

        <!-- Formulario de búsqueda -->
        <div class="mb-4 d-flex justify-content-center">
            <form method="GET" action="<?php echo e(route('ponencias.aceptadas')); ?>" class="w-50">
                <div class="input-group input-group-lg">
                    <input type="text" name="search" class="form-control rounded-pill" placeholder="Buscar por Título, Autor o Temática" value="<?php echo e(request('search')); ?>">
                    <button type="submit" class="btn btn-primary ms-2 rounded-pill px-4">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Verificar si hay ponencias -->
        <?php if($ponencias->isEmpty()): ?>
        <div class="alert alert-info text-center">
            No hay ponencias aceptadas aún.
        </div>
        <?php else: ?>
        <div class="row">
            <?php $__currentLoopData = $ponencias; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ponencia): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6 mb-4">
                <div class="card shadow-sm border-0 rounded">
                    <div class="card-body">
                        <h5 class="card-title text-muted mb-2">Tema: <?php echo e($ponencia->titulo); ?></h5>
                        <h6 class="card-subtitle text-muted mb-2">Autor: <?php echo e($ponencia->autor); ?></h6>
                        <span class="badge bg-success">Tematica: <?php echo e($ponencia->tematica); ?></span>
                        <p class="card-text mt-2">Resumen: <?php echo e(Str::limit($ponencia->descripcion, 100)); ?></p>
                        <p class="card-text"><small class="text-muted">Vistas: <?php echo e($ponencia->vistas); ?> | Citas: <?php echo e($ponencia->citas); ?></small></p>
                        <a href="<?php echo e(asset('storage/' . $ponencia->archivo)); ?>" target="_blank" class="btn btn-outline-info">
                            <i class="fa-solid fa-file-pdf"></i> Ver </a>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <!-- Agregar paginación -->
        <div class="d-flex justify-content-center mt-4">
            <?php echo e($ponencias->links()); ?>

        </div>
        <?php endif; ?>
    </div>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH /home/vol1_4/infinityfree.com/if0_38212519/htdocs/resources/views/ponencia/aceptadas.blade.php ENDPATH**/ ?>