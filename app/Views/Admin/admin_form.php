<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('css/admin/style_adminform.css') ?>">

</head>

<body>
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="login-container">
                    <h2>Login Admin</h2>
                    <form method="POST" action="<?= base_url('admin/login/login_action'); ?>" method="post">
                        <div class="form-group">
                            <label for="email_admin">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>
                        <div class="form-group" style="">
                            <label for="password_admin">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-success btn-block">Login</button>
                    </form>
                    <?php if (!empty(session()->getFlashdata('gagal'))) { ?>
                        <div class="alert alert-danger mt-3" role="alert">
                            <?php echo session()->getFlashdata('gagal') ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>