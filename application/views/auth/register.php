<!-- File: application/views/auth/register.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrasi</title>
</head>
<body>
    <h2>Registrasi</h2>

    <?php echo validation_errors(); ?>

    <?php echo form_open('auth/register'); ?>
        <label for="username">Username:</label>
        <input type="text" name="username" id="username">

        <label for="password">Password:</label>
        <input type="password" name="password" id="password">

        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" name="confirm_password" id="confirm_password">

        <input type="submit" name="register" value="Register">
    <?php echo form_close(); ?>
</body>
</html>
