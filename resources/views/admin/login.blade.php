<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ready.css">
</head>
<body class="login">
    <div class="container" style="max-width: 440px; padding-top: 80px;">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Admin Login</h4>
            </div>
            <div class="card-body">
                <form id="loginForm">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </form>
                <p id="message" class="text-danger mt-3"></p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const message = document.getElementById('message');
            const response = await fetch('/api/login', {
                method: 'POST',
                headers: { Accept: 'application/json' },
                body: new FormData(this)
            });

            const data = await response.json();

            if (!response.ok) {
                message.innerText = data.message || 'Login failed';
                return;
            }

            localStorage.setItem('admin_token', data.token);
            window.location.href = '/admin';
        });
    </script>
</body>
</html>
