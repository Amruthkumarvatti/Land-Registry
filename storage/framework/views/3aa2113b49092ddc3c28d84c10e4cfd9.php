<?php $__env->startSection('title', 'Registrations Report'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex justify-content-between align-items-center mb-4">
    <div class="d-flex align-items-center gap-3">
        <a href="<?php echo e(route('reports.index')); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
        <div>
            <h5 class="fw-700 mb-0">Registrations Report</h5>
            <small class="text-muted">All registration records</small>
        </div>
    </div>
    <a href="<?php echo e(route('reports.pdf', 'registrations')); ?>" class="btn btn-sm btn-danger">
        <i class="bi bi-file-pdf me-1"></i>Export PDF
    </a>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body py-3">
        <form method="GET" class="row g-2 align-items-end">
            <div class="col-md-3">
                <select name="status" class="form-select form-select-sm">
                    <option value="">All Statuses</option>
                    <option value="pending" <?php echo e(request('status') == 'pending' ? 'selected' : ''); ?>>Pending</option>
                    <option value="approved" <?php echo e(request('status') == 'approved' ? 'selected' : ''); ?>>Approved</option>
                    <option value="rejected" <?php echo e(request('status') == 'rejected' ? 'selected' : ''); ?>>Rejected</option>
                </select>
            </div>
            <div class="col-md-3">
                <select name="year" class="form-select form-select-sm">
                    <option value="">All Years</option>
                    <?php for($y = date('Y'); $y >= 2020; $y--): ?>
                        <option value="<?php echo e($y); ?>" <?php echo e(request('year') == $y ? 'selected' : ''); ?>><?php echo e($y); ?></option>
                    <?php endfor; ?>
                </select>
            </div>
            <div class="col-md-2 d-flex gap-2">
                <button type="submit" class="btn btn-sm btn-primary flex-fill">Filter</button>
                <a href="<?php echo e(route('reports.registrations')); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-x"></i></a>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">Registrations (<?php echo e($registrations->total()); ?>)</div>
    <div class="table-responsive">
        <table class="table table-hover mb-0" style="font-size:.84rem;">
            <thead class="table-light">
                <tr>
                    <th>Reg. No.</th>
                    <th>Property</th>
                    <th>Owner</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>Txn. Value</th>
                    <th>Stamp Duty</th>
                    <th>Reg. Fee</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $registrations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <tr>
                    <td><a href="<?php echo e(route('registrations.show', $reg)); ?>" class="fw-600 small"><?php echo e($reg->registration_number); ?></a></td>
                    <td><?php echo e($reg->property->survey_number); ?></td>
                    <td><?php echo e(Str::limit($reg->owner->full_name, 22)); ?></td>
                    <td class="text-muted"><?php echo e($reg->type_label); ?></td>
                    <td class="text-muted"><?php echo e($reg->registration_date->format('d M Y')); ?></td>
                    <td>₹<?php echo e(number_format($reg->transaction_value)); ?></td>
                    <td>₹<?php echo e(number_format($reg->stamp_duty)); ?></td>
                    <td>₹<?php echo e(number_format($reg->registration_fee)); ?></td>
                    <td><span class="badge bg-<?php echo e($reg->status_badge); ?>"><?php echo e(ucfirst($reg->status)); ?></span></td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <tr><td colspan="9" class="text-center text-muted py-4">No records found.</td></tr>
            <?php endif; ?>
            </tbody>
            <?php if($registrations->count()): ?>
            <tfoot class="table-light fw-600">
                <tr>
                    <td colspan="5" class="text-end">Totals (this page):</td>
                    <td>₹<?php echo e(number_format($registrations->sum('transaction_value'))); ?></td>
                    <td>₹<?php echo e(number_format($registrations->sum('stamp_duty'))); ?></td>
                    <td>₹<?php echo e(number_format($registrations->sum('registration_fee'))); ?></td>
                    <td></td>
                </tr>
            </tfoot>
            <?php endif; ?>
        </table>
    </div>
    <?php if($registrations->hasPages()): ?>
    <div class="card-footer"><?php echo e($registrations->links()); ?></div>
    <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\V Amruth Kumar\Desktop\MVC\land-registry\resources\views/reports/registrations.blade.php ENDPATH**/ ?>