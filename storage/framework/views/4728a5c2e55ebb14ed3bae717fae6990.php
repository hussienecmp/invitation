<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Erra | Registration </title>
    <!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
<link rel="shortcut icon" href="<?php echo e(asset('images/logo.png')); ?>" />
  <style>
         @font-face {
            font-family: 'Cairo';
            src: url('<?php echo e(asset('fonts/Cairo-Regular.ttf')); ?>') format('truetype');
            font-weight: normal;
        }
        body{
            font-family: 'Cairo';
        }
  </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="POST" action="<?php echo e(route('visitors.store')); ?>" class="p-4 border rounded bg-light shadow">
                    <?php echo csrf_field(); ?>
                    <h2 class="text-center mb-4 "><img class='w-50'src="<?php echo e(asset('images/logo.png')); ?>"></h2>
                  <?php if(session('msg')): ?>
    <div class="alert alert-success">
        <?php echo e(session('msg')); ?>

    </div>
<?php endif; ?>
                    <!-- Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label"> الاسم - Your name</label>
                        <input type="text" name="name" id="name" class="form-control" value="<?php echo e(old('name')); ?>" placeholder="الاسم" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
        <span class="text-danger"><?php echo e($message); ?></span>
    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        <br /><label for="email" class="form-label"> البريد الالكتروني - Email</label>
                        <input type="email" name="email" id="email" class="form-control" value="<?php echo e(old('email')); ?>" placeholder="بريدك الالكتروني" required>
                    </div>

                    <!-- Address -->
                    <div class="mb-3">
                        <label for="address" class="form-label"> الفئه - Category</label>
                        <select name='cat' class='form-control'>
                            <option>كاتب | ناشر - Writer Publisher</option>
                            <option>ممثل جامعه - Univirsty Representativ</option>
                            <option>ممثل مكتبه - Library Representativ</option>
                            <option>اعلام - Media</option>


                        </select>
                    </div>
                     <!-- Email -->
                    <div class="mb-3">
                        <label for="org" class="form-label">اسم المؤسسه (اختياري ) - Organization Name </label>
                        <input type="text" value="<?php echo e(old('org')); ?>" name="org" id="org" class="form-control" placeholder="(اختياري)اسم المؤسسه " >
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">سجل الان</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php /**PATH C:\invitation\resources\views/form.blade.php ENDPATH**/ ?>