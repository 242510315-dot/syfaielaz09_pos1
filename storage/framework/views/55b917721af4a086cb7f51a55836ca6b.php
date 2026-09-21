

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('content'); ?>

<style>
body {
    background:
        radial-gradient(circle at top left, #eef2ea 0%, transparent 35%),
        radial-gradient(circle at bottom right, #e3ebe1 0%, transparent 35%),
        linear-gradient(135deg, #f7f5f2, #f1f4ee, #f7f5f2);
    min-height: 100vh;
    font-family: 'Poppins', 'Segoe UI', sans-serif;
}

.login-card {
    width: 410px;
    border-radius: 30px;
    background: rgba(255, 255, 255, .95);
    overflow: hidden;
    border: 1px solid rgba(255, 255, 255, .9);
    box-shadow: 0 25px 60px rgba(90, 110, 90, .16);
    backdrop-filter: blur(10px);
}

.login-header {
    position: relative;
    background: linear-gradient(
        135deg,
        #7C9885,
        #8FAE8B,
        #A8B5C7
    );
    padding: 38px 30px;
    text-align: center;
    color: white;
    overflow: hidden;
}

.login-header::before {
    content: "";
    position: absolute;
    width: 150px;
    height: 150px;
    border-radius: 50%;
    background: rgba(255,255,255,.12);
    top: -70px;
    right: -50px;
}

.login-header::after {
    content: "";
    position: absolute;
    width: 100px;
    height: 100px;
    border-radius: 50%;
    background: rgba(255,255,255,.08);
    bottom: -45px;
    left: -35px;
}

.cute-icon {
    position: relative;
    z-index: 2;
    width: 78px;
    height: 78px;
    margin: 0 auto 16px;
    border-radius: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255,255,255,.22);
    border: 1px solid rgba(255,255,255,.35);
    font-size: 34px;
    box-shadow: 0 10px 25px rgba(60, 90, 70, .18);
}

.login-header h2 {
    position: relative;
    z-index: 2;
    font-size: 25px;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0;
}

.login-header p {
    position: relative;
    z-index: 2;
    margin: 9px 0 0;
    font-size: 13px;
    color: #f2f7f0;
}

.login-form-label {
    color: #4A5A4E;
    font-size: 13px;
    font-weight: 600;
    margin-bottom: 8px;
}

.login-form-label i {
    color: #7C9885;
    margin-right: 5px;
}

.form-control {
    border-radius: 15px;
    padding: 13px 17px;
    border: 1.5px solid #e2e8de;
    color: #4A5A4E;
    background: #fbfcfa;
    transition: all .25s ease;
}

.form-control:hover {
    border-color: #c3d3c0;
}

.form-control:focus {
    border-color: #7C9885;
    background: #ffffff;
    color: #4A5A4E;
    box-shadow: 0 0 0 4px rgba(124, 152, 133, .12);
}

.form-control::placeholder {
    color: #a8b3a5;
}

.btn-login {
    width: 100%;
    padding: 13px;
    border: none;
    border-radius: 16px;
    background: linear-gradient(
        135deg,
        #6C8E75,
        #7C9885,
        #97AEA0
    );
    color: white;
    font-weight: 600;
    letter-spacing: .3px;
    box-shadow: 0 9px 20px rgba(108, 142, 117, .22);
    transition: all .25s ease;
}

.btn-login:hover:not(:disabled) {
    transform: translateY(-3px);
    color: white;
    background: linear-gradient(
        135deg,
        #5D7C65,
        #6C8E75,
        #87A091
    );
    box-shadow: 0 14px 25px rgba(108, 142, 117, .28);
}

.btn-login:active:not(:disabled) {
    transform: translateY(-1px);
}

.btn-login:disabled {
    opacity: .6;
    cursor: not-allowed;
    box-shadow: none;
}

.btn-login i {
    margin-right: 7px;
}

.login-alert {
    background: #f1f6ef;
    border: 1px solid #dbe6d8;
    color: #4A5A4E;
    border-radius: 14px;
    font-size: 13px;
}

.login-alert i {
    margin-right: 5px;
}

.login-lockout {
    background: #fff4e5;
    border: 1px solid #f2d09b;
    color: #76551e;
    border-radius: 14px;
    font-size: 13px;
}

.login-lockout strong {
    font-size: 16px;
}

.footer-text {
    text-align: center;
    color: #a3ada0;
    font-size: 12px;
    margin-top: 22px;
}

.footer-text i {
    color: #7C9885;
    margin-right: 4px;
}

@media (max-width: 576px) {
    .login-card {
        width: 92%;
        border-radius: 24px;
    }

    .login-header {
        padding: 30px 20px;
    }

    .cute-icon {
        width: 68px;
        height: 68px;
        font-size: 29px;
    }

    .login-header h2 {
        font-size: 22px;
    }
}
</style>

<div class="container d-flex justify-content-center align-items-center min-vh-100">

```
<div class="login-card">

    <div class="login-header">

        <div class="cute-icon">
            <i class="bi bi-cart-fill"></i>
        </div>

        <h2>VeggieGo</h2>

        <p>
            Selamat datang kembali
        </p>

    </div>

    <div class="p-5">

        
        <?php if(session('error')): ?>
            <div class="alert alert-danger rounded-4">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <?php echo e(session('error')); ?>

            </div>
        <?php endif; ?>

        
        <?php if($errors->any()): ?>
            <div class="alert login-alert">
                <i class="bi bi-exclamation-triangle-fill"></i>
                <?php echo e($errors->first()); ?>

            </div>
        <?php endif; ?>

        
        <?php if(session('lockout_seconds')): ?>
            <div class="alert login-lockout" role="status">

                <i class="bi bi-hourglass-split"></i>

                Login dikunci sementara.
                Coba lagi dalam

                <strong id="lockout-countdown">
                    <?php echo e(session('lockout_seconds')); ?>

                </strong>

                detik.

            </div>
        <?php endif; ?>


        <form
            action="<?php echo e(route('auth')); ?>"
            method="POST"
            id="login-form"
        >

            <?php echo csrf_field(); ?>


            
            <div class="mb-3">

                <label class="login-form-label">
                    <i class="bi bi-envelope-fill"></i>
                    Email
                </label>

                <input
                    type="email"
                    name="email"
                    class="form-control"
                    placeholder="Masukkan email"
                    value="<?php echo e(old('email')); ?>"
                    required
                    <?php if(session('lockout_seconds')): ?> disabled <?php endif; ?>
                >

            </div>


            
            <div class="mb-4">

                <label class="login-form-label">
                    <i class="bi bi-lock-fill"></i>
                    Password
                </label>

                <input
                    type="password"
                    name="password"
                    class="form-control"
                    placeholder="Masukkan password"
                    required
                    <?php if(session('lockout_seconds')): ?> disabled <?php endif; ?>
                >

            </div>


            
            <button
                type="submit"
                class="btn-login"
                id="login-submit"
                <?php if(session('lockout_seconds')): ?> disabled <?php endif; ?>
            >

                <i class="bi bi-box-arrow-in-right"></i>

                <span id="login-text">
                    Login
                </span>

            </button>

        </form>


        <div class="footer-text">
            © VeggieGO
        </div>

    </div>

</div>
```

</div>


<?php if(session('lockout_seconds')): ?>

<script>
document.addEventListener('DOMContentLoaded', function () {

    const countdown = document.getElementById('lockout-countdown');
    const submitButton = document.getElementById('login-submit');
    const loginText = document.getElementById('login-text');
    const emailInput = document.querySelector('input[name="email"]');
    const passwordInput = document.querySelector('input[name="password"]');

    let seconds = Number(countdown.textContent.trim());

    const timer = setInterval(function () {

        seconds--;

        if (seconds <= 0) {

            clearInterval(timer);

            countdown.textContent = '0';

            if (submitButton) {
                submitButton.disabled = false;
            }

            if (emailInput) {
                emailInput.disabled = false;
            }

            if (passwordInput) {
                passwordInput.disabled = false;
            }

            if (loginText) {
                loginText.textContent = 'Login';
            }

            // Refresh agar session lockout juga hilang
            setTimeout(function () {
                window.location.reload();
            }, 500);

            return;
        }

        countdown.textContent = seconds;

        if (loginText) {
            loginText.textContent = 'Tunggu ' + seconds + ' detik';
        }

    }, 1000);

});
</script>

<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\syfaielaz09_pos1\resources\views/login.blade.php ENDPATH**/ ?>