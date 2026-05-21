<?php $__env->startSection('title', $owner->full_name . ' — Properties'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="<?php echo e(route('owners.show', $owner)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h5 class="fw-700 mb-0"><?php echo e($owner->full_name); ?> — Properties</h5>
        <small class="text-muted"><?php echo e($owner->owner_number); ?></small>
    </div>
</div>

<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <span><i class="bi bi-map me-2 text-primary"></i>Owned Properties (<?php echo e($properties->total()); ?>)</span>
        <a href="<?php echo e(route('properties.create')); ?>" class="btn btn-sm btn-outline-primary">Add Property</a>
    </div>
    <div class="table-responsive">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Survey No.</th>
                    <th>Type</th>
                    <th>Location</th>
                    <th>Area (Sq.ft)</th>
                    <th>Market Value</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $properties; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><a href="<?php echo e(route('properties.show', $p)); ?>" class="fw-600 text-decoration-none"><?php echo e($p->survey_number); ?></a></td>
                    <td><span class="badge bg-light text-dark border"><?php echo e($p->land_type_label); ?></span></td>
                    <td class="small"><?php echo e($p->district); ?>, <?php echo e($p->state); ?></td>
                    <td class="small"><?php echo e(number_format($p->area_sqft)); ?></td>
                    <td class="small fw-500">₹<?php echo e(number_format($p->market_value)); ?></td>
                    <td><span class="badge bg-<?php echo e($p->status_badge); ?>"><?php echo e(ucwords(str_replace('_',' ',$p->status))); ?></span></td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="<?php echo e(route('properties.show', $p)); ?>" class="btn btn-xs btn-outline-primary" style="padding:2px 7px;font-size:.75rem;"><i class="bi bi-eye"></i></a>
                            <a href="<?php echo e(route('properties.certificate', $p)); ?>" class="btn btn-xs btn-outline-success" style="padding:2px 7px;font-size:.75rem;" title="Download Certificate"><i class="bi bi-file-pdf"></i></a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="7" class="text-center text-muted py-4">No properties found for this owner.</td></tr>
            <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php if($properties->hasPages()): ?>
    <div class="card-footer"><?php echo e($properties->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\V Amruth Kumar\Desktop\MVC\land-registry\resources\views/owners/properties.blade.php ENDPATH**/ ?>