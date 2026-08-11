<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Profile</title>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/ready.css">
    <style>
        .profile-photo {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 50%;
            border: 3px solid #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, .15);
        }
    </style>
</head>
<body>
    <div class="container" style="max-width: 760px; padding-top: 50px;">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>My Profile</h3>
            <div>
                <a href="/admin" class="btn btn-secondary btn-sm">Dashboard</a>
                <button type="button" id="logoutBtn" class="btn btn-danger btn-sm">Logout</button>
            </div>
        </div>

        <div class="row">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-body text-center">
                        <img id="profilePhoto" src="/assets/img/profile.jpg" class="profile-photo" alt="Profile">
                        <h4 class="mt-3 mb-1" id="profileName">Admin</h4>
                        <p class="text-muted" id="profileEmail">admin@example.com</p>
                    </div>
                </div>
            </div>

            <div class="col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Update Profile</h4>
                    </div>
                    <div class="card-body">
                        <form id="profileForm" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" id="nameInput" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" id="emailInput" class="form-control" readonly>
                            </div>
                            <div class="form-group">
                                <label>Profile Photo</label>
                                <input type="file" name="profile_photo" class="form-control" accept="image/*">
                            </div>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>
                        <p id="message" class="mt-3"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const tokenKey = 'admin_token';
        const defaultPhoto = '/assets/img/profile.jpg';

        if (!localStorage.getItem(tokenKey)) {
            window.location.href = '/admin/login';
        }

        function token() {
            return localStorage.getItem(tokenKey);
        }

        function showMessage(text, error = false) {
            const message = document.getElementById('message');
            message.className = error ? 'mt-3 text-danger' : 'mt-3 text-success';
            message.innerText = text;
        }

        function showProfile(user, url) {
            const photo = url || (user.profile_photo ? '/storage/' + user.profile_photo : defaultPhoto);

            document.getElementById('profilePhoto').src = photo;
            document.getElementById('profileName').innerText = user.name;
            document.getElementById('profileEmail').innerText = user.email;
            document.getElementById('nameInput').value = user.name;
            document.getElementById('emailInput').value = user.email;
        }

        async function loadProfile() {
            const response = await fetch('/api/profile', {
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + token()
                }
            });

            if (!response.ok) {
                localStorage.removeItem(tokenKey);
                window.location.href = '/admin/login';
                return;
            }

            const data = await response.json();
            showProfile(data.Data, data.url);
        }

        document.getElementById('profileForm').addEventListener('submit', async function (e) {
            e.preventDefault();

            const formData = new FormData(this);

            if (!formData.get('profile_photo') || !formData.get('profile_photo').name) {
                formData.delete('profile_photo');
            }

            const response = await fetch('/api/profile', {
                method: 'POST',
                headers: {
                    Accept: 'application/json',
                    Authorization: 'Bearer ' + token()
                },
                body: formData
            });

            const data = await response.json();

            if (!response.ok) {
                showMessage(data.message || 'Update failed', true);
                return;
            }

            showProfile(data.Data, data.url);
            this.querySelector('input[name="profile_photo"]').value = '';
            showMessage('Profile updated');
        });

        document.getElementById('logoutBtn').addEventListener('click', function () {
            localStorage.removeItem(tokenKey);
            window.location.href = '/admin/login';
        });

        loadProfile();
    </script>
</body>
</html>
