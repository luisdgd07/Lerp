<?php echo $__env->make('partial.base_currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoice.stats')->html();
} elseif ($_instance->childHasBeenRendered('XRb0Yds')) {
    $componentId = $_instance->getRenderedChildComponentId('XRb0Yds');
    $componentTag = $_instance->getRenderedChildComponentTagName('XRb0Yds');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('XRb0Yds');
} else {
    $response = \Livewire\Livewire::mount('invoice.stats');
    $html = $response->html();
    $_instance->logRenderedChild('XRb0Yds', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoice.chart')->html();
} elseif ($_instance->childHasBeenRendered('nDkqmT8')) {
    $componentId = $_instance->getRenderedChildComponentId('nDkqmT8');
    $componentTag = $_instance->getRenderedChildComponentTagName('nDkqmT8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nDkqmT8');
} else {
    $response = \Livewire\Livewire::mount('invoice.chart');
    $html = $response->html();
    $_instance->logRenderedChild('nDkqmT8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Dashboard\Providers/../Resources/views/_includes/invoices.blade.php ENDPATH**/ ?>