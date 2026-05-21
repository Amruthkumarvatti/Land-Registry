<?php $__env->startSection('title', 'Edit Property: ' . $property->survey_number); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="<?php echo e(route('properties.show', $property)); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    <div>
        <h5 class="fw-700 mb-0">Edit Property: <?php echo e($property->survey_number); ?></h5>
        <small class="text-muted"><?php echo e($property->full_location); ?></small>
    </div>
</div>

<form action="<?php echo e(route('properties.update', $property)); ?>" method="POST" enctype="multipart/form-data">
<?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
<div class="row g-4">
    <div class="col-lg-8">
        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-map me-2 text-primary"></i>Land Details</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-500">Land Type <span class="text-danger">*</span></label>
                        <select name="land_type" class="form-select" required>
                            <?php $__currentLoopData = ['agricultural','residential','commercial','industrial','forest','government','other']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($t); ?>" <?php echo e($property->land_type == $t ? 'selected' : ''); ?>><?php echo e(ucfirst($t)); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">Land Use <span class="text-danger">*</span></label>
                        <select name="land_use" class="form-select" required>
                            <?php $__currentLoopData = ['vacant'=>'Vacant','built_up'=>'Built Up','semi_built'=>'Semi Built']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $v => $l): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($v); ?>" <?php echo e($property->land_use == $v ? 'selected' : ''); ?>><?php echo e($l); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">Plot Number</label>
                        <input type="text" name="plot_number" class="form-control" value="<?php echo e(old('plot_number', $property->plot_number)); ?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-geo-alt me-2 text-primary"></i>Location</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-500">Village</label>
                        <input type="text" name="village" class="form-control" value="<?php echo e(old('village', $property->village)); ?>">
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">Taluka <span class="text-danger">*</span></label>
                        <input type="text" name="taluka" class="form-control" value="<?php echo e(old('taluka', $property->taluka)); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">District <span class="text-danger">*</span></label>
                        <input type="text" name="district" class="form-control" value="<?php echo e(old('district', $property->district)); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">State</label>
                        <input type="text" name="state" class="form-control" value="<?php echo e(old('state', $property->state)); ?>" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">Pincode</label>
                        <input type="text" name="pincode" class="form-control" value="<?php echo e(old('pincode', $property->pincode)); ?>" required>
                    </div>
                    <div class="col-12">
                        <label class="form-label fw-500">Address Description</label>
                        <textarea name="address_description" class="form-control" rows="2"><?php echo e(old('address_description', $property->address_description)); ?></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-rulers me-2 text-primary"></i>Dimensions</div>
            <div class="card-body">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label fw-500">Area (Sq.ft) <span class="text-danger">*</span></label>
                        <input type="number" name="area_sqft" class="form-control" value="<?php echo e(old('area_sqft', $property->area_sqft)); ?>" step="0.01" min="1" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label fw-500">Area (Acres)</label>
                        <input type="number" name="area_acres" class="form-control" value="<?php echo e(old('area_acres', $property->area_acres)); ?>" step="0.0001">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-currency-rupee me-2 text-primary"></i>Valuation</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-500">Market Value (₹)</label>
                    <input type="number" name="market_value" class="form-control" value="<?php echo e(old('market_value', $property->market_value)); ?>" min="0" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-500">Government Value (₹)</label>
                    <input type="number" name="government_value" class="form-control" value="<?php echo e(old('government_value', $property->government_value)); ?>" min="0" required>
                </div>
                <div>
                    <label class="form-label fw-500">Valuation Year</label>
                    <input type="number" name="valuation_year" class="form-control" value="<?php echo e(old('valuation_year', $property->valuation_year)); ?>" min="2000" max="<?php echo e(date('Y')); ?>">
                </div>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-person-check me-2 text-primary"></i>Status</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-500">Status</label>
                    <select name="status" class="form-select" required>
                        <?php $__currentLoopData = ['available','registered','disputed','mortgaged','government_acquired']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($s); ?>" <?php echo e($property->status == $s ? 'selected' : ''); ?>><?php echo e(ucwords(str_replace('_',' ',$s))); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
                <div class="form-check mb-2">
                    <input type="checkbox" name="has_disputes" class="form-check-input" id="has_disputes" value="1" <?php echo e($property->has_disputes ? 'checked' : ''); ?>>
                    <label class="form-check-label" for="has_disputes">Has Disputes</label>
                </div>
                <textarea name="dispute_notes" class="form-control form-control-sm" rows="2" placeholder="Dispute details"><?php echo e(old('dispute_notes', $property->dispute_notes)); ?></textarea>
            </div>
        </div>

        <div class="card mb-4">
            <div class="card-header"><i class="bi bi-paperclip me-2 text-primary"></i>Update Documents</div>
            <div class="card-body">
                <div class="mb-3">
                    <label class="form-label fw-500">Site Plan</label>
                    <?php if($property->site_plan_url): ?><a href="<?php echo e($property->site_plan_url); ?>" target="_blank" class="d-block small text-primary mb-1">Current file</a><?php endif; ?>
                    <input type="file" name="site_plan" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png">
                </div>
                <div>
                    <label class="form-label fw-500">Survey Document</label>
                    <?php if($property->survey_document): ?><span class="d-block small text-primary mb-1">Current file</span><?php endif; ?>
                    <input type="file" name="survey_document" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png">
                </div>
            </div>
        </div>

        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary"><i class="bi bi-check-circle me-2"></i>Update Property</button>
            <a href="<?php echo e(route('properties.show', $property)); ?>" class="btn btn-outline-secondary">Cancel</a>
        </div>
    </div>
</div>
</form>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\V Amruth Kumar\Desktop\MVC\land-registry\resources\views/properties/edit.blade.php ENDPATH**/ ?>