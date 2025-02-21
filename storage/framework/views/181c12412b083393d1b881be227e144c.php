<!-- Lista de Revisores -->
<div id="lista-revisores" class="mt-8">
                    <h3 class="text-lg font-bold mb-4"><?php echo e(__('Revisores Registrados')); ?></h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php $__currentLoopData = $profesores; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $profesor): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                                <div>
                                    <h4 class="text-gray-800 font-semibold mb-1"> <?php echo e($profesor->user->name ?? 'N/A'); ?></h4>
                                    <p class="text-gray-500 text-sm mb-1"><i class="fa-solid fa-file-pen"></i> <?php echo e($profesor->tematica); ?></p>
                                    <p class="text-gray-500 text-sm"><i class="fa-solid fa-at"></i> <?php echo e($profesor->user->email); ?></p>
                                </div>
                                <div class="flex mt-4 space-x-2">
                                    <!-- Botón para Editar -->
                                  
                                    <button type="button" class="btn btn-warning text-sm" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($profesor->id); ?>">
    Editar
</button>
<?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['onclick' => 'confirmDelete('.e($profesor->id).')','class' => 'ms-3']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['onclick' => 'confirmDelete('.e($profesor->id).')','class' => 'ms-3']); ?>
                                        <?php echo e(__('Eliminar')); ?>

                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $attributes = $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11)): ?>
<?php $component = $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11; ?>
<?php unset($__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11); ?>
<?php endif; ?>
                                    <form id="delete-form-<?php echo e($profesor->id); ?>" action="<?php echo e(route('revisor.destroy', $profesor->id)); ?>" method="POST" style="display: none;">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('DELETE'); ?>
                                    </form>

                                
<!-- Modal de edición -->
<div class="modal fade" id="editModal-<?php echo e($profesor->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($profesor->id); ?>" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel-<?php echo e($profesor->id); ?>">Editar Revisor</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <!-- Formulario de edición -->
        <form action="<?php echo e(route('revisor.update', $profesor->id)); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Nombre y Apelligo</label>
                <input type="text" name="nombre" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($profesor->user->name); ?>" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-2">Correo</label>
                <input type="email" name="correo" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($profesor->user->email); ?>" required>
            </div>

<!-- Campo Temática -->
<div class="mb-4">
                                <label for="tematica" class="block text-sm font-medium text-gray-700 mb-2">
                                <i class="fa-regular fa-pen-to-square"></i><span class="ml-2"></span> <?php echo e(__('Temática')); ?>

                                </label>
                                <select id="tematica" name="tematica"
                                        class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" 
                                        required>
                                    <option value="" disabled selected><?php echo e(__('Selecciona una temática')); ?></option>
                                    <option value="Tecnologias de la informacion y comunicacion" <?php echo e($profesor->tematica == 'Tecnologias de la informacion y comunicacion' ? 'selected' : ''); ?>><?php echo e(__('Tecnologías de la información y comunicación')); ?></option>
                                    <option value="Ciudades inteligentes e IoT" <?php echo e($profesor->tematica == 'Ciudades inteligentes e IoT' ? 'selected' : ''); ?>><?php echo e(__('Ciudades inteligentes e IoT')); ?></option>
                                    <option value="Electronica" <?php echo e($profesor->tematica == 'Electronica' ? 'selected' : ''); ?>><?php echo e(__('Electrónica')); ?></option>
                                    <option value="Inteligencia artificial" <?php echo e($profesor->tematica == 'Inteligencia artificial' ? 'selected' : ''); ?>><?php echo e(__('Inteligencia artificial')); ?></option>
                                    <option value="Robotica" <?php echo e($profesor->tematica == 'Robotica' ? 'selected' : ''); ?>><?php echo e(__('Robótica')); ?></option>
                                    <option value="Ciencias de datos"  <?php echo e($profesor->tematica == 'Ciencias de datos' ? 'selected' : ''); ?>><?php echo e(__('Ciencias de datos')); ?></option>
                                    <option value="Innovacion educativa"<?php echo e($profesor->tematica == 'Innovacion educativa' ? 'selected' : ''); ?>> <?php echo e(__('Innovación educativa')); ?></option>
                                </select>
                            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-secondary">Guardar cambios</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>

    
                                </div>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div><?php /**PATH C:\xampp\htdocs\tesis\resources\views/agg_revisor/edit.blade.php ENDPATH**/ ?>