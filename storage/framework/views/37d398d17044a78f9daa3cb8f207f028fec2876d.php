<?php echo $__env->make('partial.base_currency', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoice.stats')->html();
} elseif ($_instance->childHasBeenRendered('gMGHMeY')) {
    $componentId = $_instance->getRenderedChildComponentId('gMGHMeY');
    $componentTag = $_instance->getRenderedChildComponentTagName('gMGHMeY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('gMGHMeY');
} else {
    $response = \Livewire\Livewire::mount('invoice.stats');
    $html = $response->html();
    $_instance->logRenderedChild('gMGHMeY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('invoice.chart')->html();
} elseif ($_instance->childHasBeenRendered('ZqIE7BI')) {
    $componentId = $_instance->getRenderedChildComponentId('ZqIE7BI');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZqIE7BI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZqIE7BI');
} else {
    $response = \Livewire\Livewire::mount('invoice.chart');
    $html = $response->html();
    $_instance->logRenderedChild('ZqIE7BI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\Modules\Dashboard\Providers/../Resources/views/_includes/invoices.blade.php ENDPATH**/ ?>