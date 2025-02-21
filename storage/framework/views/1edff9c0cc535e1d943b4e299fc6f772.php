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
        <h2 class="font-semibold text-xl leading-tight">
            ✍️ <?php echo e(__('Enviar Recurso')); ?>

        </h2>
     <?php $__env->endSlot(); ?>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <!-- Button trigger modal -->
                <div class="flex ">
                    <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg','dataBsToggle' => 'modal','dataBsTarget' => '#staticBackdrop']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-teal-500 hover:bg-teal-600 text-white font-bold py-2 px-6 rounded-lg shadow-lg','data-bs-toggle' => 'modal','data-bs-target' => '#staticBackdrop']); ?>
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
                <br>
                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fechas </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">

                                <form action="<?php echo e(route('recurso.store')); ?>" method="POST" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>

                                    <!-- Campo Título -->
                                    <div class="mb-3">
                                        <label for="titulo" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-pen"></i> <span class="ml-2"><?php echo e(__('Título del recurso')); ?>

                                        </label>
                                        <input id="titulo" type="text" name="titulo"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            value="<?php echo e(old('titulo')); ?>" required />
                                    </div>

                                    <!-- Campo Archivo -->
                                    <div class="mb-3">
                                        <label for="archivo" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-box-archive"></i> <span class="ml-2"></span><?php echo e(__('Subir archivo (PDF o DOCX)')); ?>

                                        </label>
                                        <input id="archivo" type="file" name="archivo"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            accept=".pdf,.doc,.docx,.pptx,.ppt" required />
                                    </div>


                                    <!-- Campo Descripción -->
                                    <div class="mb-3">
                                        <label for="descripcion" class="block text-sm font-medium text-gray-700 mb-2">
                                            <i class="fa-solid fa-file-pen"></i> <span class="ml-2"></span> <?php echo e(__('Descripción')); ?>

                                        </label>
                                        <textarea id="descripcion" name="descripcion" rows="4"
                                            class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"
                                            required><?php echo e(old('descripcion')); ?></textarea>
                                    </div>

                                    <!-- Botón de Envío -->
                                    <div class="mb-3">
                                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'ms-3 flex items-center bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg shadow-md']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3 flex items-center bg-teal-500 hover:bg-teal-600 text-white py-2 px-4 rounded-lg shadow-md']); ?>
                                            <?php echo e(__('Subir Recurso')); ?>

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


                <hr class="my-6 border-gray-300">

                <!-- Lista de Recursos -->
                <div id="lista-recursos" class="mt-8">
                    <br>
                    <br>
                    <h3 class="text-lg font-bold mb-4">Recursos Subidos</h3>
                    <ul class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        <?php $__currentLoopData = $recursos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $recurso): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li class="bg-white p-4 rounded-lg shadow-md flex flex-col justify-between">
                            <div>
                                <h4 class="text-gray-800 font-semibold mb-1"> <i class="fa-solid fa-file-lines"></i> <?php echo e($recurso->titulo); ?></h4>
                                <p class="text-gray-500 text-sm mb-1"><?php echo e($recurso->descripcion); ?></p>
                            </div>
                            <div class="flex mt-4 space-x-2">
                                <!-- Botón para Ver Documento -->
                                <a href="<?php echo e(Storage::url($recurso->archivo)); ?>"

                                    target="_blank">
                                    <?php if (isset($component)) { $__componentOriginal27ff36ee3d009794ba9f337ca44c5c52 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal27ff36ee3d009794ba9f337ca44c5c52 = $attributes; } ?>
<?php $component = App\View\Components\RegisterButton::resolve([] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('register-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\App\View\Components\RegisterButton::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3']); ?>
                                        📄 Ver
                                     <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal27ff36ee3d009794ba9f337ca44c5c52)): ?>
<?php $attributes = $__attributesOriginal27ff36ee3d009794ba9f337ca44c5c52; ?>
<?php unset($__attributesOriginal27ff36ee3d009794ba9f337ca44c5c52); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal27ff36ee3d009794ba9f337ca44c5c52)): ?>
<?php $component = $__componentOriginal27ff36ee3d009794ba9f337ca44c5c52; ?>
<?php unset($__componentOriginal27ff36ee3d009794ba9f337ca44c5c52); ?>
<?php endif; ?>
                                </a>

                                <!-- Botón de Eliminar -->
                                <form id="delete-form-<?php echo e($recurso->id); ?>" action="<?php echo e(route('recurso.destroy', $recurso->id)); ?>" method="POST" style="display: none;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                </form>
                                <?php if (isset($component)) { $__componentOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal656e8c5ea4d9a4fa173298297bfe3f11 = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.danger-button','data' => ['class' => 'ms-3','onclick' => 'confirmDelete('.e($recurso->id).')']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('danger-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'ms-3','onclick' => 'confirmDelete('.e($recurso->id).')']); ?>
                                    🗑️ Eliminar
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

                            </div>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tesis\resources\views/recurso/create.blade.php ENDPATH**/ ?>