<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notifications')->html();
} elseif ($_instance->childHasBeenRendered('HfRkotV')) {
    $componentId = $_instance->getRenderedChildComponentId('HfRkotV');
    $componentTag = $_instance->getRenderedChildComponentTagName('HfRkotV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HfRkotV');
} else {
    $response = \Livewire\Livewire::mount('notifications');
    $html = $response->html();
    $_instance->logRenderedChild('HfRkotV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/partial/notifier.blade.php ENDPATH**/ ?>