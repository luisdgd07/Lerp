<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('notification-count')->html();
} elseif ($_instance->childHasBeenRendered('HcKBu0I')) {
    $componentId = $_instance->getRenderedChildComponentId('HcKBu0I');
    $componentTag = $_instance->getRenderedChildComponentTagName('HcKBu0I');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('HcKBu0I');
} else {
    $response = \Livewire\Livewire::mount('notification-count');
    $html = $response->html();
    $_instance->logRenderedChild('HcKBu0I', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/partial/notifications.blade.php ENDPATH**/ ?>