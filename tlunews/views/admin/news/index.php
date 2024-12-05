<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Tin Tức - Đăng nhập & Đăng ký</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="container">
        <div class="auth-box">
            <!-- Logo -->
            <div class="logo">
                <h1>Website Tin Tức</h1>
            </div>

            <!-- Vai trò -->
            <div id="role-selection">
                <h2>Chọn Vai trò</h2>
                <div class="role-buttons">
                    <button id="admin-btn" class="role-btn" data-role="admin">Admin</button>
                    <button id="user-btn" class="role-btn" data-role="user">User</button>
                </div>
            </div>

            <!-- Tabs -->
            <div class="tabs" id="tabs" style="display: none;">
                <button id="login-tab" class="tab active">Đăng nhập</button>
                <button id="register-tab" class="tab">Đăng ký</button>
            </div>

            <!-- Đăng nhập -->
            <div id="login-form" class="form active" style="display: none;">
                <form action="auth.php" method="POST">
                    <h2>Đăng nhập</h2>
                    <input type="hidden" id="login-role" name="role">
                    <div class="form-group">
                        <label for="login-phone">Số điện thoại:</label>
                        <input type="tel" id="login-phone" name="phone" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group">
                        <label for="login-password">Mật khẩu:</label>
                        <input type="password" id="login-password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <button type="submit" name="login" class="btn-auth">Đăng nhập</button>
                    <p class="other-link">Quên mật khẩu? <a href="#">Khôi phục</a></p>
                </form>
            </div>

            <!-- Đăng ký -->
            <div id="register-form" class="form" style="display: none;">
                <form action="auth.php" method="POST">
                    <h2>Đăng ký</h2>
                    <input type="hidden" id="register-role" name="role">
                    <div class="form-group">
                        <label for="register-name">Họ và tên:</label>
                        <input type="text" id="register-name" name="name" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group">
                        <label for="register-phone">Số điện thoại:</label>
                        <input type="tel" id="register-phone" name="phone" placeholder="Nhập số điện thoại" 
                               pattern="0[0-9]{9}" maxlength="10" required>
                    </div>
                    <div class="form-group">
                        <label for="register-password">Mật khẩu:</label>
                        <input type="password" id="register-password" name="password" placeholder="Nhập mật khẩu" required>
                    </div>
                    <button type="submit" name="register" class="btn-auth">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const roleSelection = document.getElementById("role-selection");
            const tabs = document.getElementById("tabs");
            const loginForm = document.getElementById("login-form");
            const registerForm = document.getElementById("register-form");

            const adminBtn = document.getElementById("admin-btn");
            const userBtn = document.getElementById("user-btn");

            const loginTab = document.getElementById("login-tab");
            const registerTab = document.getElementById("register-tab");

            const loginRoleInput = document.getElementById("login-role");
            const registerRoleInput = document.getElementById("register-role");

            let selectedRole = null;

            // Chọn vai trò
            adminBtn.addEventListener("click", () => {
                selectedRole = "admin";
                loginRoleInput.value = selectedRole;
                registerRoleInput.value = selectedRole;
                roleSelection.style.display = "none";
                tabs.style.display = "flex";
                loginForm.style.display = "block";
            });

            userBtn.addEventListener("click", () => {
                selectedRole = "user";
                loginRoleInput.value = selectedRole;
                registerRoleInput.value = selectedRole;
                roleSelection.style.display = "none";
                tabs.style.display = "flex";
                loginForm.style.display = "block";
            });

            // Chuyển đổi giữa Đăng nhập và Đăng ký
            loginTab.addEventListener("click", () => {
                loginTab.classList.add("active");
                registerTab.classList.remove("active");
                loginForm.style.display = "block";
                registerForm.style.display = "none";
            });

            registerTab.addEventListener("click", () => {
                registerTab.classList.add("active");
                loginTab.classList.remove("active");
                loginForm.style.display = "none";
                registerForm.style.display = "block";
            });
        });
    </script>
     <style>
        /* Tổng quan */
body {
    font-family: Arial, sans-serif;
    background-color: #f4f4f4;
    margin: 0;
    padding: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.container {
    width: 100%;
    max-width: 400px;
    background: #fff;
    border-radius: 10px;
    box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

/* Logo */
.logo {
    text-align: center;
    background-color: #0078ff;
    color: #fff;
    padding: 20px 10px;
}

.logo h1 {
    margin: 0;
    font-size: 24px;
}

/* Vai trò */
#role-selection {
    text-align: center;
    padding: 30px;
}

.role-buttons {
    display: flex;
    justify-content: center;
    gap: 20px;
}

.role-btn {
    padding: 10px 20px;
    background-color: #0078ff;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-weight: bold;
}

.role-btn:hover {
    background-color: #005bbb;
}

/* Tabs */
.tabs {
    display: flex;
    background-color: #f4f4f4;
}

.tab {
    flex: 1;
    text-align: center;
    padding: 15px 0;
    cursor: pointer;
    border: none;
    background-color: #f4f4f4;
    color: #333;
    font-size: 16px;
    font-weight: bold;
    transition: background-color 0.3s;
}

.tab.active {
    background-color: #0078ff;
    color: #fff;
}

/* Form */
.form {
    display: none;
    padding: 20px 30px;
}

.form.active {
    display: block;
}

.form h2 {
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold;
    color: #555;
}

.form-group input,
.form-group select {
    width: 100%;
    padding: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
    font-size: 14px;
}

.btn-auth {
    width: 100%;
    padding: 12px;
    background-color: #0078ff;
    color: #fff;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    font-weight: bold;
}

.btn-auth:hover {
    background-color: #005bbb;
}

.other-link {
    text-align: center;
    margin-top: 15px;
    font-size: 14px;
}

.other-link a {
    color: #0078ff;
    text-decoration: none;
}

.other-link a:hover {
    text-decoration: underline;
}

    </style>
    
</body>
</html>