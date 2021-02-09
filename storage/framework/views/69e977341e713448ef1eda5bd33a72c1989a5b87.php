<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notifications')->html();
} elseif ($_instance->childHasBeenRendered('3WZ2gJ7')) {
    $componentId = $_instance->getRenderedChildComponentId('3WZ2gJ7');
    $componentTag = $_instance->getRenderedChildComponentTagName('3WZ2gJ7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3WZ2gJ7');
} else {
    $response = \Livewire\Livewire::mount('notifications');
    $html = $response->html();
    $_instance->logRenderedChild('3WZ2gJ7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/partial/notifier.blade.php ENDPATH**/ ?>