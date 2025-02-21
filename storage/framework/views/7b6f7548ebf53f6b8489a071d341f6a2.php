<?php
    $colorClasses = match($color) {
        'green' => 'bg-green-500 hover:bg-green-700 text-white',
        'blue' => 'bg-blue-500 hover:bg-blue-700 text-white',
        'red' => 'bg-red-500 hover:bg-red-700 text-white',
        'yellow' => 'bg-yellow-500 hover:bg-yellow-700 text-white',
        'cyan' => 'bg-cyan-500 hover:bg-cyan-700 text-white',
        default => 'bg-gray-500 hover:bg-gray-700 text-white',
    };
?>

<button class="<?php echo e($colorClasses); ?> inline-flex items-center px-4 py-2 border rounded-md font-semibold text-xs uppercase tracking-widest shadow-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150">
    <?php echo e($slot); ?>

</button>
<?php /**PATH C:\xampp\htdocs\tesis\resources\views/components/register-button.blade.php ENDPATH**/ ?>