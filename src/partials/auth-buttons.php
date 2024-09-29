<?php if (isLoggedIn()): ?>
    <li id="link_conta">
        <a href="" id="user_link"><i class="fa fa-user-o"></i> <span id="user_name"><?php echo $_SESSION['user_name'] ?></span></a>
    </li>
    <li>
        <a href="admin.php"><span><i class="fa fa-lock" aria-hidden="true"></i>Admin</span></a>
    </li>
    <li>
        <a href="controllers/formLogoutController.php"><span id="exit_user"><i class="fa fa-sign-out" aria-hidden="true"></i>Sair</span></a>
    </li>
<?php else: ?>
    <li id="link_conta">
        <a href="formLogin.php" id="user_link"><i class="fa fa-user-o"></i> <span id="user_name">Login</span></a>
    </li>
<?php endif; ?>
?>