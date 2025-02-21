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
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight text-center">
            ✍️ <?php echo e(__('Agregar Exponentes')); ?>

        </h2>
     <?php $__env->endSlot(); ?>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-50 overflow-hidden shadow-lg sm:rounded-lg p-6">
                <div class="container mt-5">
                <div class="container">
                    <div class="flex justify-end">
                        <?php if (isset($component)) { $__componentOriginald411d1792bd6cc877d687758b753742c = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginald411d1792bd6cc877d687758b753742c = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.primary-button','data' => ['class' => 'bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg','dataBsToggle' => 'modal','dataBsTarget' => '#modalteam']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('primary-button'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => 'bg-teal-500 hover:bg-teal-600 text-black font-bold py-2 px-6 rounded-lg shadow-lg','data-bs-toggle' => 'modal','data-bs-target' => '#modalteam']); ?>
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

                    <!-- Modal -->
                    <div class="modal fade" id="modalteam" tabindex="-1" aria-labelledby="modalteamLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title" id="modalteamLabel">Registrar</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?php echo e(route('team-members.store')); ?>" method="POST" enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>

                                            <div class="mb-3">
                                                <label for="name" class="block text-sm font-medium text-gray-700 mb-2""><i class=" fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre y Apellido</label>
                                                <input id="name" type="text" name="name" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>

                                            <div class="mb-3">
                                                <label for="role" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-graduate"></i><span class="ml-2"></span> Título</label>
                                                <input id="role" type="text" name="role" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="team" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tematica</label>
                                                <input id="team" type="text" name="team" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" required>
                                            </div>


                                            <div class="mb-3">
                                                <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-twitter"></i><span class="ml-2"></span> Twitter</label>
                                                <input id="twitter" type="url" name="twitter" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>

                                            <div class="mb-3">
                                                <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-linkedin"></i><span class="ml-2"></span> LinkedIn</label>
                                                <input id="linkedin" type="url" name="linkedin" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>



                                            <div class="mb-3">
                                                <UserCircleIcon class="size-12 text-gray-300" aria-hidden="true" />
                                                <label for="image" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-regular fa-image"></i><span class="ml-2"></span> Imagen</label>
                                                <input id="image" type="file" name="image" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>

                                            <div class="mb-3">
                                                <label for="bio" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Información Adicional</label>
                                                <textarea id="bio" name="bio" class="form-control" rows="4"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <label for="details" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Detalles Personalizados</label>
                                                <textarea name="details" class="form-control" rows="4"></textarea>
                                            </div>




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
                                                    <?php echo e(__('Agregar')); ?>

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
                                    </div>
                                </div>
                            </div>
                        </div>

                        </form>
                    </div>
                    <?php echo $__env->make('team-members.edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                </div>
            </div>
            </div>
        </div>
    </div>

    <?php if($errors->has('image')): ?>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            Swal.fire({
                icon: 'error',
                title: 'Error en la imagen',
                text: '<?php echo e($errors->first('
                image ')); ?>',
                confirmButtonText: 'Aceptar',
                confirmButtonColor: '#d33',
            });
        });
    </script>
    <?php endif; ?>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $attributes = $__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__attributesOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54)): ?>
<?php $component = $__componentOriginal9ac128a9029c0e4701924bd2d73d7f54; ?>
<?php unset($__componentOriginal9ac128a9029c0e4701924bd2d73d7f54); ?>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tesis\resources\views/team-members/create.blade.php ENDPATH**/ ?>