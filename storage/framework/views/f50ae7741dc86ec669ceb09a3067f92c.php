<br>
<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-success">
                    <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Descripción</th>
                        <th class="text-center py-4 px-6">Fecha</th>
                        <th class="text-left py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $items; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                    <td class="text-center py-4 px-6"><?php echo e($item->id); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($item->descripcion); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($item->fecha); ?></td>
                        <td class="text-center py-4 px-6">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($item->id); ?>"> <i class="fa-solid fa-pen-to-square"> </i></button>
                            <form id="delete-form-<?php echo e($item->id); ?>" action="<?php echo e(route('items.destroy', $item->id)); ?>" method="POST" style="display:inline ;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>

                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete(<?php echo e($item->id); ?>)"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </div>
                        </td>
                    </tr>

                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-<?php echo e($item->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($item->id); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-<?php echo e($item->id); ?>">Editar Fecha de interes</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulario de edición -->
                                    <form action="<?php echo e(route('items.update', $item->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>

                                        <div class="mb-3">
                                            <label class="form-label form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-circle-info"></i> Descripción</label>
                                            <input type="text" name="descripcion" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($item->descripcion); ?>" required>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label form-label block text-sm font-medium text-gray-700 mb-2"><i class="fa-solid fa-calendar-days"></i> Fecha</label>
                                            <input type="date" name="fecha" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" value="<?php echo e($item->fecha); ?>" required>
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




                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


                </tbody>
            </table>
        </div>
    </div>
</div><?php /**PATH C:\xampp\htdocs\tesis\resources\views/items/index.blade.php ENDPATH**/ ?>