<div class="flex flex-col items-center mt-8">
    <div class="overflow-x-auto w-full max-w-6xl">
        <div class="container">
            <h3>Cronograma</h3>
            <br>
            <table class="table table-striped table-hover w-full bg-white dark:bg-gray-800 shadow-md rounded-lg border border-gray-300 dark:border-gray-700">
                <thead class="bg-gray-50">
                    <tr class="table-primary">
                        <th class="text-center py-4 px-6">ID</th>
                        <th class="text-center py-4 px-6">Nombre</th>
                        <th class="text-center py-4 px-6">Tema</th>
                        <th class="text-center py-4 px-6">Lugar</th>
                        <th class="text-center py-4 px-6">Dia</th>
                        <th class="text-center py-4 px-6">Descripción</th>
                        <th class="text-center py-4 px-6">Imagen</th>
                        <th class="text-center py-4 px-6">Acciones</th>
                    </tr>
                </thead>
                <tbody>

                    <?php $__currentLoopData = $cronogramas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cronograma): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="border-t">
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->id); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->nombre); ?> <?php echo e($cronograma->apellido); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->tema_exposicion); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->lugar); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->dia); ?> <?php echo e($cronograma->dia_numero); ?> de <?php echo e($cronograma->mes); ?> a las <?php echo e(\Carbon\Carbon::parse($cronograma->hora_inicio)->format('H:i')); ?> - <?php echo e(\Carbon\Carbon::parse($cronograma->hora_fin)->format('H:i')); ?></td>
                        <td class="text-center py-4 px-6"><?php echo e($cronograma->descripcion); ?></td>
                        <td class="text-center py-4 px-6"><!-- Imagen circular -->
                            <?php if($cronograma->foto): ?>
                            <img src="<?php echo e(Storage::url($cronograma->foto)); ?>"
                                alt="Foto"
                                class="w-12 h-12 rounded-full object-cover shadow-md">
                            <?php endif; ?>
                        </td>
                        <td class="d-flex text-center py-4 px-6">

                            <!-- Botón para abrir el modal de edición -->
                            <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal" data-bs-target="#editModal-<?php echo e($cronograma->id); ?>"> <i class="fa-solid fa-pen-to-square"></i> </button>

                            <!-- Botón de Eliminar -->

                            <form id="delete-form-<?php echo e($cronograma->id); ?>" action="<?php echo e(route('cronogramas.destroy', $cronograma->id)); ?>" method="POST" style="display: inline;">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="button" class="btn btn-danger btn-sm me-2" onclick="confirmDelete(<?php echo e($cronograma->id); ?>)"> <i class="fa-solid fa-trash"></i> </button>
                            </form>
                        </td>
                    </tr>
                    <!-- Modal de edición -->
                    <div class="modal fade" id="editModal-<?php echo e($cronograma->id); ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editModalLabel-<?php echo e($cronograma->id); ?>" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editModalLabel-<?php echo e($cronograma->id); ?>">Editar Cronograma</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                                </div>

                                <div class="modal-body">
                                    <!-- Formulario de edición -->
                                    <form action="<?php echo e(route('cronogramas.update', $cronograma->id)); ?>" method="POST">
                                        <?php echo csrf_field(); ?>
                                        <?php echo method_field('PUT'); ?>
                                        <div class="mb-3">
                                            <label for="nombre" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Nombre:</label>
                                            <input type="text" name="nombre" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="<?php echo e($cronograma->nombre); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="apellido" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-user-tie"></i></i><span class="ml-2"></span> Apellido:</label>
                                            <input type="text" name="apellido" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="<?php echo e($cronograma->apellido); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="tema_exposicion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-thumbtack"></i><span class="ml-2"></span> Tema de Esposicion:</label>
                                            <input type="text" name="tema_exposicion" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="<?php echo e($cronograma->tema_exposicion); ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="lugar" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-location-dot"></i><span class="ml-2"></span> Lugar:</label>
                                            <input type="text" name="lugar" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300" id="nombre" value="<?php echo e($cronograma->lugar); ?>">
                                        </div>
                                        <div class="flex flex-cols-3 gap-4 mb-3">
                                            <div>
                                                <label for="dia" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-days"></i><span class="ml-2"></span> Día:</label>
                                                <select name="dia" id="dia" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                                    <option value="" disabled><?php echo e(__('Selecciona un día')); ?></option>
                                                    <option value="Lunes" <?php echo e($cronograma->dia == 'Lunes' ? 'selected' : ''); ?>>Lunes</option>
                                                    <option value="Martes" <?php echo e($cronograma->dia == 'Martes' ? 'selected' : ''); ?>>Martes</option>
                                                    <option value="Miércoles" <?php echo e($cronograma->dia == 'Miércoles' ? 'selected' : ''); ?>>Miércoles</option>
                                                    <option value="Jueves" <?php echo e($cronograma->dia == 'Jueves' ? 'selected' : ''); ?>>Jueves</option>
                                                    <option value="Viernes" <?php echo e($cronograma->dia == 'Viernes' ? 'selected' : ''); ?>>Viernes</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label for="dia_numero" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-day"></i><span class="ml-2"></span> Día (número):</label>
                                                <input type="number" name="dia_numero" id="dia_numero" value="<?php echo e($cronograma->dia_numero); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                            <div>
                                                <label for="mes" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-calendar-week"></i><span class="ml-"></span> Mes:</label>
                                                <select name="mes" id="mes" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                                    <option value="" disabled><?php echo e(__('Selecciona un mes')); ?></option>
                                                    <option value="Enero" <?php echo e($cronograma->mes == 'Enero' ? 'selected' : ''); ?>>Enero</option>
                                                    <option value="Febrero" <?php echo e($cronograma->mes == 'Febrero' ? 'selected' : ''); ?>>Febrero</option>
                                                    <option value="Marzo" <?php echo e($cronograma->mes == 'Marzo' ? 'selected' : ''); ?>>Marzo</option>
                                                    <option value="Abril" <?php echo e($cronograma->mes == 'Abril' ? 'selected' : ''); ?>>Abril</option>
                                                    <option value="Mayo" <?php echo e($cronograma->mes == 'Abril' ? 'selected' : ''); ?>>Abril</option>
                                                    <option value="Junio" <?php echo e($cronograma->mes == 'Junio' ? 'selected' : ''); ?>>Junio</option>
                                                    <option value="Julio" <?php echo e($cronograma->mes == 'Julio' ? 'selected' : ''); ?>>Julio</option>
                                                    <option value="Agosto" <?php echo e($cronograma->mes == 'Agosto' ? 'selected' : ''); ?>>Agosto</option>
                                                    <option value="Septiembre" <?php echo e($cronograma->mes == 'Septiembre' ? 'selected' : ''); ?>>Septiembre</option>
                                                    <option value="Octubre" <?php echo e($cronograma->mes == 'Octubre' ? 'selected' : ''); ?>>Octubre</option>
                                                    <option value="Noviembre" <?php echo e($cronograma->mes == 'Noviembre' ? 'selected' : ''); ?>>Noviembre</option>
                                                    <option value="Diciembre" <?php echo e($cronograma->mes == 'Diciembre' ? 'selected' : ''); ?>>Diciembre</option>
                                                    <!-- Agregar más meses... -->
                                                </select>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="descripcion" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-circle-info"></i><span class="ml-2"></span> Descripción:</label>
                                            <textarea name="descripcion" id="descripcion" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300"><?php echo e($cronograma->descripcion); ?></textarea>
                                        </div>
                                        <div class="grid grid-cols-2 gap-4">
                                            <div>
                                                <label for="hora_inicio" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-start"></i><span class="ml-2"></span> Hora de Inicio:</label>
                                                <input type="time" name="hora_inicio" id="hora_inicio" value="<?php echo e($cronograma->hora_inicio); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                            <div>
                                                <label for="hora_fin" class="block text-sm font-medium text-gray-700"><i class="fa-solid fa-hourglass-end"></i><span class="ml-2"></span> Hora de Fin:</label>
                                                <input type="time" name="hora_fin" id="hora_fin" value="<?php echo e($cronograma->hora_fin); ?>" class="w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-teal-300">
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <label for="image" class="form-label">Imagen</label>

                                            <?php if($cronograma->foto): ?>
                                            <img src="<?php echo e(Storage::url($cronograma->foto)); ?>" alt="Imagen" class="w-12 h-12 rounded-full object-cover shadow-md">
                                            <?php endif; ?>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-secondary">Guardar Cambios</button>
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
</div><?php /**PATH C:\xampp\htdocs\tesis\resources\views/cronogramas/edit.blade.php ENDPATH**/ ?>