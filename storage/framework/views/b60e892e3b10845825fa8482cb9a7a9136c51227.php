<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>会員情報確認</title>
        <link rel="stylesheet" href="<?php echo e(asset('css/stylesheet.css')); ?>">
    </head>
    <body>
        <header>

        </header>
        <main>
            <h1 class="page-title">会員情報確認</h1>
            <form action="<?php echo e(route('confirmation_add')); ?>" method="post">
            <?php echo csrf_field(); ?>
            <div class="table">
                <table>
                    <tr>
                        <td class="form-label">氏名</td>
                        <td class="form-item-input">
                            <?php echo e($input["name_sei"]); ?><?php echo e($input["name_mei"]); ?>            
                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">ニックネーム</td>
                        <td class="form-item-input"><?php echo e($input["nickname"]); ?></td>
                    </tr>
                    <tr>
                        <td class="form-label">性別</td>
                        <td class="form-item-input">
                            <?php echo e($seibetsu); ?>

                        </td>
                    </tr>
                    <tr>
                        <td class="form-label">パスワード</td>
                        <td class="form-item-input">セキュリティのため非表示</td>
                    </tr>
                    <tr>
                        <td class="form-label">メールアドレス</td>
                        <td class="form-item-input"><?php echo e($input["email"]); ?></td>
                    </tr>
                </table>
            </div>
            <div class="bottun">
            <input class="btn confirm" type="submit" value="登録完了">
            </div>
            <div class="bottun">
            <button class="btn former" type="button" onclick="history.back()">前に戻る</button>
            </div>
            </form> 
        </main>
    </body>
</html>
<?php /**PATH /var/www/laravel/resources/views/member_confirmation.blade.php ENDPATH**/ ?>