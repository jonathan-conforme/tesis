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
            <?php echo e(__('Usuarios')); ?>

        </h2>
     <?php $__env->endSlot(); ?>


    <div class="flex flex-col items-center mt-8">
        <div class="overflow-x-auto w-full max-w-6xl">
            <div class="container">

                <br>
                <h1 class="text-center py-4 px-6">Lista de Usuarios</h1>
                <form method="GET" action="<?php echo e(route('usuarios.index')); ?>" class="mb-4">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Buscar por correo" value="<?php echo e(request('search')); ?>">
                        <button type="submit" class="btn btn-primary">Buscar</button>
                    </div>
                </form>

                <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                    <thead class="bg-gray-50">
                        <tr class="table-info">
                            <th class="text-center py-4 px-6">ID</th>
                            <th class="text-center py-4 px-6">Nombre</th>
                            <th class="text-center py-4 px-6">Email</th>
                            <th class="text-center py-4 px-6">Rol</th>
                            <th class="text-center py-4 px-6">Creado</th>
                            <th class="text-center py-4 px-6">Aciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr class="border-t">
                            <td class="text-center py-4 px-6"><?php echo e($user->id); ?></td>
                            <td class="text-center py-4 px-6"><?php echo e($user->name); ?></td>
                            <td class="text-center py-4 px-6"><?php echo e($user->email); ?></td>
                            <td class="text-center py-4 px-6">
                                <?php if($user->role == 1): ?>
                                Administrador
                                <?php elseif($user->role == 2): ?>
                                Profesor
                                <?php else: ?>
                                Estudiante
                                <?php endif; ?>
                            </td>
                            <td class="text-center py-4 px-6"><?php echo e($user->created_at->format('d/m/Y')); ?></td>
                            <td class="d-flex py-4 px-6">
                                <!-- Botón para editar -->
                                <button class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo e($user->id); ?>"> <i class="fa-solid fa-pen-to-square"></i> </button>

                                <div class="modal fade" id="editUserModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="<?php echo e(route('usuarios.update', $user->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <?php echo method_field('PUT'); ?>
                                            <!-- Campo oculto para preservar la página -->
                                            <input type="hidden" name="page" value="<?php echo e(request()->query('page')); ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="editUserModalLabel">Editar Usuario</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label"><i class="fa-solid fa-user-tie"></i> Nombre</label>
                                                        <input type="text" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="name" name="name" value="<?php echo e($user->name); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="email" class="form-label"> <i class="fa-solid fa-at"></i> Correo</label>
                                                        <input type="email" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="email" name="email" value="<?php echo e($user->email); ?>" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="role" class="form-label"><i class="fa-solid fa-user-tie"></i> Rol</label>
                                                        <select id="role" name="role" class="form-control w-full px-3 py-2 rounded-lg border border-gray-300 shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"">
                                                            <option value=" 1" <?php echo e($user->role == 1 ? 'selected' : ''); ?>>Administrador</option>
                                                            <option value="2" <?php echo e($user->role == 2 ? 'selected' : ''); ?>>Profesor</option>
                                                            <option value="3" <?php echo e($user->role == 3 ? 'selected' : ''); ?>>Estudiante</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-dark">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <!-- Botón para eliminar -->
                                <form id="delete-form-<?php echo e($user->id); ?>" method="POST" action="<?php echo e(route('usuarios.destroy', $user->id)); ?>" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <!-- Campo oculto para preservar la página -->
                                    <input type="hidden" name="page" value="<?php echo e(request()->query('page')); ?>">
                                    <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete(<?php echo e($user->id); ?>)"> <i class="fa-solid fa-trash"></i> </button>
                                </form>

                                <!-- Botón para restablecer contraseña -->

                                <button class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#resetPasswordModal<?php echo e($user->id); ?>"> <i class="fa-solid fa-lock"></i> </button>

                                <div class="modal fade" id="resetPasswordModal<?php echo e($user->id); ?>" tabindex="-1" aria-labelledby="resetPasswordModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <form method="POST" action="<?php echo e(route('usuarios.reset_password', $user->id)); ?>">
                                            <?php echo csrf_field(); ?>
                                            <!-- Campo oculto para preservar la página -->
                                            <input type="hidden" name="page" value="<?php echo e(request()->query('page')); ?>">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="resetPasswordModalLabel">Restablecer Contraseña</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    ¿Estás seguro de que deseas restablecer la contraseña del usuario <strong><?php echo e($user->name); ?></strong>? <br>
                                                    La contraseña será restablecida a: <code>123456789</code>.
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                                    <button type="submit" class="btn btn-info">Restablecer</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                            </td>
                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="mt-4 flex justify-center">
        <div class="pagination">
            <?php echo e($users->links('pagination::tailwind', ['activeClass' => 'bg-blue-500 text-white'])); ?>

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
<?php endif; ?><?php /**PATH C:\xampp\htdocs\tesis\resources\views/usuarios/index.blade.php ENDPATH**/ ?>