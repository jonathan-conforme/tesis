<br>
<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-success">
                    <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Nombre</th>
                        <th class="text-center py-4 px-6">Título</th>
                        <th class="text-center py-4 px-6">Temática</th>
                        <th class="text-center py-4 px-6">Twitter</th>
                        <th class="text-center py-4 px-6">LinkedIn</th>
                        <th class="text-center py-4 px-6">Imagen</th>
                        <th class="text-center py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__empty_1 = true; $__currentLoopData = $teamMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                    <tr class="border-t">
                    <td class="text-center py-4 px-6"><?php echo e($member->name); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($member->name); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($member->role); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($member->team); ?></td>

                        <td class="text-center py-4 px-6">
                            <?php if($member->twitter): ?>
                            <a href="<?php echo e($member->twitter); ?>" target="_blank">Twitter</a>
                            <?php endif; ?>
                        </td>
                        <td class="text-center py-4 px-6">
                            <?php if($member->linkedin): ?>
                            <a href="<?php echo e($member->linkedin); ?>" target="_blank">LinkedIn</a>
                            <?php endif; ?>
                        </td>

                        <td class="text-center py-4 px-6">

                            <?php if($member->image): ?>
                            <img src="<?php echo e(Storage::url($member->image)); ?>"
                                alt="foto"
                                class="w-12 h-12 rounded-full object-cover shadow-md">
                            <?php endif; ?>

                        <td class="d-flex text-center py-4 px-6">

                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($member->id); ?>"> <i class="fa-solid fa-pen-to-square"></i> </button>
                            <!-- Botón Eliminar -->

                            <form id="delete-form-<?php echo e($member->id); ?>" action="<?php echo e(route('team-members.destroy', $member->id)); ?>" method="POST" style="display:inline-block;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete(<?php echo e($member->id); ?>)"> <i class="fa-solid fa-trash"></i> </button>
                            </form>

                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-<?php echo e($member->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($member->id); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-<?php echo e($member->id); ?>">Editar Cronograma</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body">
                                    <form action="<?php echo e(route('team-members.update', $member->id)); ?>" method="POST" enctype="multipart/form-data">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>


                                        <!-- Campo Nombre -->

                                        <div class="mb-3">
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre y apellido</label>
                                            <input type="text" name="name" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($member->name); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="role" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-user-graduate"></i><span class="ml-2"></span> Título </label>
                                            <input type="text" name="role" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($member->role); ?>">
                                        </div>


                                        <div class="mb-3">
                                            <label for="team" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Temática</label>
                                            <input type="text" name="team" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"" value=" <?php echo e($member->team); ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="twitter" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-twitter"></i><span class="ml-2"></span> Twitter</label>
                                            <input type="url" name="twitter" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($member->twitter); ?>">
                                        </div>


                                        <div class="mb-3">
                                            <label for="linkedin" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-brands fa-linkedin"></i><span class="ml-2"></span> LinkedIn</label>
                                            <input type="url" name="linkedin" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($member->linkedin); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="bio" class="form-label"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Información Adicional</label>
                                            <textarea name="bio" id="bio" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4"><?php echo e($member->bio); ?></textarea>


                                        </div>

                                        <div class="mb-3">
                                            <label for="details" class="block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Detalles Personalizados</label>
                                            <textarea name="details" id="details" class="w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" rows="4"><?php echo e($member->details); ?>"</textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="image" class="form-label px-4 py-2 text-sm text-gray-800">Imagen</label>

                                            <?php if($member->image): ?>
                                            <img src="<?php echo e(Storage::url($member->image)); ?>" alt="Imagen" class="w-12 h-12 rounded-full object-cover shadow-md">
                                            <?php endif; ?>
                                        </div>



                                        <div class="modal-footer text-center">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
        </div>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
        <tr>
            <td colspan="7">No hay miembros del equipo registrados.</td>
        </tr>
        <?php endif; ?>
        </tbody>

        </table>
    </div>
</div>
</div>
</div><?php /**PATH C:\xampp\htdocs\tesis\resources\views/team-members/edit.blade.php ENDPATH**/ ?>