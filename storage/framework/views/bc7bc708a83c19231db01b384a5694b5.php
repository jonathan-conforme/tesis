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
        <h2 class="font-semibold text-2xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            <?php echo e(__('Gestionar Cronograma')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container">
                    <!-- Botón para abrir el modal -->
                    <div class="flex justify-end">
                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg','dataBsToggle' => 'modal','dataBsTarget' => '#modalRegistrar']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg','data-bs-toggle' => 'modal','data-bs-target' => '#modalRegistrar']); ?>
                            <?php echo e(__(' Agregar')); ?>

                         <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                    </div>
                    <?php echo $__env->make('cronogramas.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                    <!-- Modal -->
                    <div class="modal fade" id="modalRegistrar" tabindex="-1" aria-labelledby="modalRegistrarLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalRegistrarLabel">Registrar Cronograma</h5>
                                    <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo e(route('cronogramas.store')); ?>" method="POST" enctype="multipart/form-data" class="space-y-6">
                                        <?php echo csrf_field(); ?>
                                        <div class="mb-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre:</label>
                                            <input type="text" name="nombre" id="nombre" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellido" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i> Apellido:</label>
                                            <input type="text" name="apellido" id="apellido" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tema_exposicion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tema de Exposición:</label>
                                            <input type="text" name="tema_exposicion" id="tema_exposicion" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lugar" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-location-dot"></i><span class="ml-2"></span> Lugar:</label>
                                            <input type="text" name="lugar" id="lugar" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>


                                        <div class="mb-3">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Descripción:</label>
                                            <textarea name="descripcion" id="descripcion" rows="3" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required></textarea>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <label for="dia"><i class="fa-solid fa-calendar-days"></i><span class="ml-2"></span> Día de la Semana:</label>
                                            <select id="dia" name="dia" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                                <option value="" disabled selected><?php echo e(__('Selecciona un día')); ?></option>
                                                <option value="Lunes"><?php echo e(__('Lunes')); ?></option>
                                                <option value="Martes"><?php echo e(__('Martes')); ?></option>
                                                <option value="Miércoles"><?php echo e(__('Miércoles')); ?></option>
                                                <option value="Jueves"><?php echo e(__('Jueves')); ?></option>
                                                <option value="Viernes"><?php echo e(__('Viernes')); ?></option>
                                            </select>
                                            <label for="dia_numero"><i class="fa-solid fa-calendar-day"></i><span class="ml-2"></span> Día (número):</label>
                                            <input type="number" name="dia_numero" id="dia_numero" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            <!-- Selección de Mes -->
                                            <label for="mes"><i class="fa-solid fa-calendar-week"></i><span class="ml-"></span> Mes:</label>
                                            <select id="mes" name="mes" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                                <option value="" disabled selected><?php echo e(__('Selecciona un mes')); ?></option>
                                                <option value="Enero"><?php echo e(__('Enero')); ?></option>
                                                <option value="Febrero"><?php echo e(__('Febrero')); ?></option>
                                                <option value="Marzo"><?php echo e(__('Marzo')); ?></option>
                                                <option value="Abril"><?php echo e(__('Abril')); ?></option>
                                                <option value="Mayo"><?php echo e(__('Mayo')); ?></option>
                                                <option value="Junio"><?php echo e(__('Junio')); ?></option>
                                                <option value="Julio"><?php echo e(__('Julio')); ?></option>
                                                <option value="Agosto"><?php echo e(__('Agosto')); ?></option>
                                                <option value="Septiembre"><?php echo e(__('Septiembre')); ?></option>
                                                <option value="Octubre"><?php echo e(__('Octubre')); ?></option>
                                                <option value="Noviembre"><?php echo e(__('Noviembre')); ?></option>
                                                <option value="Diciembre"><?php echo e(__('Diciembre')); ?></option>
                                            </select>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                        <div>
                                            <label for="hora_inicio" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-start"></i><span class="ml-2"></span> Hora de Inicio:</label>
                                            <input type="time" name="hora_inicio" id="hora_inicio" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        <div>
                                            <label for="hora_fin" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-end"></i><span class="ml-2"></span> Hora de Fin:</label>
                                            <input type="time" name="hora_fin" id="hora_fin" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                        </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="foto" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-image"></i><span class="ml-"></span> Foto:</label>
                                            <input type="file" name="foto" id="foto" class="w-full px-4 py-2 border rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                        </div>
                                        <div class="mt-6 flex justify-center">
                                            <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-teal-500 hover:bg-teal-600 text-white py-2 px-6 rounded-lg']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-teal-500 hover:bg-teal-600 text-white py-2 px-6 rounded-lg']); ?>
                                                <?php echo e(__('Guardar Cronograma')); ?>

                                             <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $attributes = $__attributesOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__attributesOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
<?php if (isset($__componentOriginald411d1792bd6cc877d687758b753742c)): ?>
<?php $component = $__componentOriginald411d1792bd6cc877d687758b753742c; ?>
<?php unset($__componentOriginald411d1792bd6cc877d687758b753742c); ?>
<?php endif; ?>
                                        </div>
                                    </form>
                                </div>
                            </div>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tesis\resources\views/cronogramas/create.blade.php ENDPATH**/ ?>