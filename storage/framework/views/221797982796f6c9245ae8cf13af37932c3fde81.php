<?php if(get_option('htmleditor') == 'easyMDE'): ?>
<?php if (isset($component)) { $__componentOriginalaadda7f062f1775da67a1ad48f0b4cb6cf47e4b3 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Editors\EasyMDE::class, ['name' => ''.e($name).'','id' => ''.e($id).'']); ?>
<?php $component->withName('editors.easyMDE'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge(['class' => 'form-control']))]); ?>
    <?php echo e(old($name, $slot)); ?>

 <?php if (isset($__componentOriginalaadda7f062f1775da67a1ad48f0b4cb6cf47e4b3)): ?>
<?php $component = $__componentOriginalaadda7f062f1775da67a1ad48f0b4cb6cf47e4b3; ?>
<?php unset($__componentOriginalaadda7f062f1775da67a1ad48f0b4cb6cf47e4b3); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php if(get_option('htmleditor') == 'summernoteEditor'): ?>
<?php if (isset($component)) { $__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Textarea::class, ['name' => ''.e($name).'','id' => ''.e($id).'']); ?>
<?php $component->withName('inputs.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge(['class' => 'form-control']))]); ?>
    <?php echo e(old($name, $slot)); ?>

 <?php if (isset($__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315)): ?>
<?php $component = $__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315; ?>
<?php unset($__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?>
<?php if(get_option('htmleditor') == 'markdownEditor'): ?>
<?php if (isset($component)) { $__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315 = $component; } ?>
<?php $component = $__env->getContainer()->make(App\View\Components\Inputs\Textarea::class, ['name' => ''.e($name).'','id' => ''.e($id).'']); ?>
<?php $component->withName('inputs.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['attributes' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($attributes->merge(['class' => 'form-control']))]); ?>
    <?php echo e(old($name, $slot)); ?>

 <?php if (isset($__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315)): ?>
<?php $component = $__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315; ?>
<?php unset($__componentOriginaldb9aec5ed52db553e78ff106ad53aa912aa15315); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php endif; ?><?php /**PATH C:\xampp2\htdocs\NETIC360APP\resources\views/components/inputs/wysiwyg.blade.php ENDPATH**/ ?>