<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>会員情報登録</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/stylesheet.css')); ?>">
    </head>
    <body>
        <header>

        </header>
        <main>
            <h1 class="page-title">会員情報登録</h1>
            <form action="<?php echo e(route('regist_post')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">氏名</td>
                        <td class="form-item-input">            
                            <span>姓<input class="name" type="text" name="name_sei" value="<?php echo e(old('name_sei')); ?>"></span>
                            <span>名<input class="name" type="text" name="name_mei" value="<?php echo e(old('name_mei')); ?>"></span>
                        </td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <?php $__errorArgs = ['name_sei'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    <?php $__errorArgs = ['name_mei'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="form-label">ニックネーム</td>
                        <td class="form-item-input"><input class="nickname" type="text" name="nickname" value="<?php echo e(old('nickname')); ?>"></td>
                    </tr>
                    <tr>
                    <td></td>
                    <td>
                    <?php $__errorArgs = ['nickname'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <div class="error"><?php echo e($message); ?></div>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                    </td>
                    </tr>
                    <tr>
                        <td class="form-label">性別</td>
                        <td class="form-item-input">
                            <input type="radio" name="gender" value="1" <?php echo e(old ('gender') == '1' ? 'checked' : ''); ?>> 男性
                            <input type="radio" name="gender" value="2" <?php echo e(old ('gender') == '2' ? 'checked' : ''); ?>> 女性
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <?php $__errorArgs = ['gender'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    <tr>
                        <td class="form-label">パスワード</td>
                        <td class="form-item-input"><input class="password" type="password" name="password" value="<?php echo e(old('password')); ?>"></td>
                    </tr>
                    <tr>
                        <td></td> 
                        <td>
                        <?php $__errorArgs = ['password'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    <tr>
                        <td class="form-label">パスワード確認</td>
                        <td class="form-item-input"><input class="password" type="password" name="password_confirmation" value="<?php echo e(old('password_confirmation')); ?>"></td>
                    </tr>
                    
                    <tr>
                        <td></td>
                        <td>
                            
                        <?php $__errorArgs = ['password_confirmation'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                    <tr>
                    
                        <td class="form-label">メールアドレス</td>
                        <td class="form-item-input"><input class="email" type="text" name="email" value="<?php echo e(old('email')); ?>"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <?php $__errorArgs = ['email'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <div class="error"><?php echo e($message); ?></div>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                        </td>
                </table>
            </div>
            <div class="bottun">
            <input class="btn confirm" type="submit" value="確認画面へ">
            </div>
            </form> 
            <div class="bottun">
                <a class="btn former" href="<?php echo e(route('top')); ?>">トップへ戻る</a>
            </div>
        </main>
    </body>
</html>
<?php /**PATH /var/www/laravel/resources/views/member_regist.blade.php ENDPATH**/ ?>