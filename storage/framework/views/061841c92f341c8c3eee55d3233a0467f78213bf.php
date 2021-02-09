<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notification-count')->html();
} elseif ($_instance->childHasBeenRendered('UNIixv8')) {
    $componentId = $_instance->getRenderedChildComponentId('UNIixv8');
    $componentTag = $_instance->getRenderedChildComponentTagName('UNIixv8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('UNIixv8');
} else {
    $response = \Livewire\Livewire::mount('notification-count');
    $html = $response->html();
    $_instance->logRenderedChild('UNIixv8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/partial/notifications.blade.php ENDPATH**/ ?>