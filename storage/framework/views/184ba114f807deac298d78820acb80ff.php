<?php $__env->startSection('title', 'Edit User'); ?>

<?php $__env->startSection('content'); ?>
<div class="d-flex align-items-center gap-3 mb-4">
    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-sm btn-outline-secondary"><i class="bi bi-arrow-left"></i></a>
    <h5 class="fw-700 mb-0">Edit User: <?php echo e($user->name); ?></h5>
</div>

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header"><i class="bi bi-person-gear me-2 text-primary"></i>User Details</div>
            <div class="card-body">
                <form action="<?php echo e(route('users.update', $user)); ?>" method="POST">
                <?php echo csrf_field(); ?> <?php echo method_field('PUT'); ?>
                <div class="mb-3">
                    <label class="form-label fw-500">Full Name <span class="text-danger">*</span></label>
                    <input type="text" name="name" class="form-control" value="<?php echo e(old('name', $user->name)); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-500">Email Address <span class="text-danger">*</span></label>
                    <input type="email" name="email" class="form-control" value="<?php echo e(old('email', $user->email)); ?>" required>
                </div>
                <div class="mb-3">
                    <label class="form-label fw-500">Phone</label>
                    <input type="text" name="phone" class="form-control" value="<?php echo e(old('phone', $user->phone)); ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label fw-500">Role <span class="text-danger">*</span></label>
                    <select name="role" class="form-select" required>
                        <option value="admin" <?php echo e($user->role == 'admin' ? 'selected' : ''); ?>>Administrator</option>
                        <option value="registrar" <?php echo e($user->role == 'registrar' ? 'selected' : ''); ?>>Registrar</option>
                        <option value="viewer" <?php echo e($user->role == 'viewer' ? 'selected' : ''); ?>>Viewer</option>
                    </select>
                </div>
                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" <?php echo e($user->is_active ? 'checked' : ''); ?>>
                        <label class="form-check-label fw-500" for="is_active">Account Active</label>
                    </div>
                </div>
                <hr>
                <p class="text-muted small">Leave password blank to keep existing password.</p>
                <div class="mb-3">
                    <label class="form-label fw-500">New Password</label>
                    <input type="password" name="password" class="form-control" minlength="8">
                </div>
                <div class="mb-4">
                    <label class="form-label fw-500">Confirm New Password</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>
                <div class="d-flex gap-2">
                    <button type="submit" class="btn btn-primary flex-fill"><i class="bi bi-check-circle me-2"></i>Update User</button>
                    <a href="<?php echo e(route('users.index')); ?>" class="btn btn-outline-secondary">Cancel</a>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\Users\V Amruth Kumar\Desktop\MVC\land-registry\resources\views/users/edit.blade.php ENDPATH**/ ?>