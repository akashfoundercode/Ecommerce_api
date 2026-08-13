@extends('admin.partials.layout')
@section('title', 'My Profile')
@section('page-title', 'My Profile')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Edit Profile</div>
			</div>
			<div class="card-body">
				<div id="profileAlert" class="alert d-none"></div>
				<form id="profileForm" enctype="multipart/form-data">
					<div class="row">
						<div class="form-group col-md-6">
							<label>Name</label>
							<input type="text" name="name" id="profileNameInput" class="form-control" required>
						</div>
						<div class="form-group col-md-6">
							<label>Email</label>
							<input type="email" name="email" id="profileEmailInput" class="form-control" required>
						</div>
						<div class="form-group col-md-6">
							<label>New Password</label>
							<input type="password" name="password" id="profilePasswordInput" class="form-control" minlength="6" maxlength="12" placeholder="Leave blank to keep the current password">
						</div>
						<div class="form-group col-md-6">
							<label>Profile Photo</label>
							<input type="file" name="profile_photo" id="profilePhotoInput" class="form-control-file" accept="image/*">
						</div>
					</div>
					<button type="submit" class="btn btn-primary" id="profileSubmitBtn">Update Profile</button>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card">
			<div class="card-header">
				<div class="card-title">Preview</div>
			</div>
			<div class="card-body text-center">
				<img id="profilePreview" src="/assets/img/profile.jpg" alt="Profile photo" style="width:130px;height:130px;object-fit:cover;border-radius:50%;margin-bottom:16px;">
				<h5 id="profilePreviewName" class="mb-1">Admin</h5>
				<p id="profilePreviewEmail" class="text-muted mb-0">admin@example.com</p>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	const profileAlert = document.getElementById('profileAlert');
	const profileForm = document.getElementById('profileForm');
	const profileNameInput = document.getElementById('profileNameInput');
	const profileEmailInput = document.getElementById('profileEmailInput');
	const profilePasswordInput = document.getElementById('profilePasswordInput');
	const profilePhotoInput = document.getElementById('profilePhotoInput');
	const profilePreview = document.getElementById('profilePreview');
	const profilePreviewName = document.getElementById('profilePreviewName');
	const profilePreviewEmail = document.getElementById('profilePreviewEmail');
	const profileSubmitBtn = document.getElementById('profileSubmitBtn');

	function showProfileAlert(type, message) {
		profileAlert.className = 'alert alert-' + type;
		profileAlert.innerText = message;
	}

	function setProfileData(data) {
		const user = data.Data || {};
		const photo = data.url || (user.profile_photo ? '/storage/' + user.profile_photo : '/assets/img/profile.jpg');
		profileNameInput.value = user.name || '';
		profileEmailInput.value = user.email || '';
		profilePreview.src = photo;
		profilePreviewName.innerText = user.name || 'Admin';
		profilePreviewEmail.innerText = user.email || '';
	}

	async function loadProfilePage() {
		const response = await fetch('/api/profile', {
			headers: { Accept: 'application/json', Authorization: 'Bearer ' + localStorage.getItem('admin_token') }
		});
		const data = await response.json();
		if (!response.ok) {
			showProfileAlert('danger', data.message || 'Profile could not be loaded.');
			return;
		}
		setProfileData(data);
	}

	profilePhotoInput.addEventListener('change', function () {
		const file = this.files[0];
		if (file) {
			profilePreview.src = URL.createObjectURL(file);
		}
	});

	profileForm.addEventListener('submit', async function (e) {
		e.preventDefault();
		profileSubmitBtn.disabled = true;
		profileSubmitBtn.innerText = 'Updating...';

		const formData = new FormData(profileForm);
		if (!profilePasswordInput.value) {
			formData.delete('password');
		}

		const response = await fetch('/api/profile', {
			method: 'POST',
			headers: { Accept: 'application/json', Authorization: 'Bearer ' + localStorage.getItem('admin_token') },
			body: formData
		});
		const data = await response.json();

		profileSubmitBtn.disabled = false;
		profileSubmitBtn.innerText = 'Update Profile';

		if (!response.ok) {
			const errors = data.errors ? Object.values(data.errors).flat().join(' ') : '';
			showProfileAlert('danger', errors || data.message || 'Profile could not be updated.');
			return;
		}

		profilePasswordInput.value = '';
		setProfileData(data);
		if (typeof getProfile === 'function') {
			getProfile();
		}
		showProfileAlert('success', data.message || 'Profile updated successfully.');
	});

	loadProfilePage();
</script>
@endsection
