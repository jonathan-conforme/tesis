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
   <?php $__env->slot('header', null, []); ?> 
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      <?php if(auth()->guard()->check()): ?>
      <div>¡Hola <?php echo e(Auth::user()->name); ?>, Bienvenido al proceso de entrega de Ponencias!</div>
      <?php endif; ?>
    </h2>

   <?php $__env->endSlot(); ?>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 text-gray-900 dark:text-gray-100">
          <!-- Contenedor del texto -->
          <div>
            <h1 class="mb-2 text-xl font-medium leading-tight"><i class="fa-solid fa-layer-group"></i> Cronongramas</h1>
          </div>

          <div class="flex flex-wrap gap-6 justify-center p-6">
    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <!-- Tarjeta -->
    
    

<div class="card text-center mb-3" style="width: 18rem;">
  <div class="card-body">
  <div class="flex justify-center mb-3">
  <i class="fa-solid fa-calendar"></i>
            </div>
    <!-- Título -->
    <h5 class="text-lg font-semibold text-gray-800 truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                <?php echo e($item->descripcion); ?>

            </h5>
     
        </div>
        <!-- Pie de tarjeta -->
        <div class="py-2 bg-gray-100 text-center text-sm text-gray-600">
            <?php echo e($item->fecha); ?>

        </div>
  </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
        </div>









        </div>
      </div>
    </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tesis\resources\views/items/items.blade.php ENDPATH**/ ?>