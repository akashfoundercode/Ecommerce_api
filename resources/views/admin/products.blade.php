<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Products - Ready Bootstrap Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/assets/css/ready.css">
	<link rel="stylesheet" href="/assets/css/demo.css">
	<style>
		#editPanel {
			position: fixed;
			top: 0;
			right: -440px;
			width: 420px;
			height: 100%;
			background: #fff;
			box-shadow: -4px 0 20px rgba(0,0,0,0.15);
			z-index: 9999;
			transition: right 0.3s ease;
			overflow-y: auto;
		}
		#editPanel.open { right: 0; }
		#editOverlay {
			display: none;
			position: fixed;
			top: 0; left: 0;
			width: 100%; height: 100%;
			background: rgba(0,0,0,0.4);
			z-index: 9998;
		}
		#editOverlay.open { display: block; }
		.edit-panel-header {
			background: #1a2035;
			color: #fff;
			padding: 18px 20px;
			display: flex;
			justify-content: space-between;
			align-items: center;
		}
		.edit-panel-body { padding: 20px; }
	</style>
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<div class="logo-header">
				<a href="{{ route('admin.index') }}" class="logo">
					Ready Dashboard
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
			</div>
			<nav class="navbar navbar-header navbar-expand-lg">
				<div class="container-fluid">
					<form class="navbar-left navbar-form nav-search mr-md-3" action="">
						<div class="input-group">
							<input type="text" placeholder="Search ..." class="form-control">
							<div class="input-group-append">
								<span class="input-group-text">
									<i class="la la-search search-icon"></i>
								</span>
							</div>
						</div>
					</form>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-envelope"></i>
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#">Something else here</a>
							</div>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<i class="la la-bell"></i>
								<span class="notification">3</span>
							</a>
							<ul class="dropdown-menu notif-box" aria-labelledby="navbarDropdown">
								<li>
									<div class="dropdown-title">You have 4 new notification</div>
								</li>
								<li>
									<div class="notif-center">
										<a href="#">
											<div class="notif-icon notif-primary"> <i class="la la-user-plus"></i> </div>
											<div class="notif-content">
												<span class="block">New user registered</span>
												<span class="time">5 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-success"> <i class="la la-comment"></i> </div>
											<div class="notif-content">
												<span class="block">Rahmad commented on Admin</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-img">
												<img src="/assets/img/profile2.jpg" alt="Img Profile">
											</div>
											<div class="notif-content">
												<span class="block">Reza send messages to you</span>
												<span class="time">12 minutes ago</span>
											</div>
										</a>
										<a href="#">
											<div class="notif-icon notif-danger"> <i class="la la-heart"></i> </div>
											<div class="notif-content">
												<span class="block">Farrah liked Admin</span>
												<span class="time">17 minutes ago</span>
											</div>
										</a>
									</div>
								</li>
								<li>
									<a class="see-all" href="javascript:void(0);"> <strong>See all notifications</strong> <i class="la la-angle-right"></i> </a>
								</li>
							</ul>
						</li>
						<li class="nav-item dropdown">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<img id="topProfilePhoto" src="/assets/img/profile.jpg" alt="user-img" width="36" class="img-circle">
								<span id="topProfileName">Admin</span>
							</a>
							<ul class="dropdown-menu dropdown-user">
								<li>
									<div class="user-box">
										<div class="u-img"><img id="menuProfilePhoto" src="/assets/img/profile.jpg" alt="user"></div>
										<div class="u-text">
											<h4 id="menuProfileName">Admin</h4>
											<p class="text-muted" id="menuProfileEmail">admin@example.com</p>
											<a href="/admin/profile" class="btn btn-rounded btn-danger btn-sm">View Profile</a>
										</div>
									</div>
								</li>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="/admin/profile"><i class="ti-user"></i> My Profile</a>
								<a class="dropdown-item" href="#"> My Balance</a>
								<a class="dropdown-item" href="#"><i class="ti-email"></i> Inbox</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#"><i class="ti-settings"></i> Account Setting</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item" href="#" id="topLogoutBtn"><i class="fa fa-power-off"></i> Logout</a>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
		</div>

		<div class="sidebar">
			<div class="scrollbar-inner sidebar-wrapper">
				<div class="user">
					<div class="photo">
						<img id="sideProfilePhoto" src="/assets/img/profile.jpg">
					</div>
					<div class="info">
						<a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
							<span>
								<span id="sideProfileName">Admin</span>
								<span class="user-level">Administrator</span>
								<span class="caret"></span>
							</span>
						</a>
						<div class="clearfix"></div>
						<div class="collapse in" id="collapseExample" aria-expanded="true">
							<ul class="nav">
								<li>
									<a href="/admin/profile">
										<span class="link-collapse">My Profile</span>
									</a>
								</li>
								<li>
									<a href="/admin/profile">
										<span class="link-collapse">Edit Profile</span>
									</a>
								</li>
								<li>
									<a href="#settings">
										<span class="link-collapse">Settings</span>
									</a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<ul class="nav">
					<li class="nav-item">
						<a href="/admin">
							<i class="la la-dashboard"></i>
							<p>Dashboard</p>
							<span class="badge badge-count">5</span>
						</a>
					</li>
					<li class="nav-item active">
						<a href="{{ route('admin.products') }}">
							<p>Products</p>
						</a>
					</li>
					<li class="nav-item">
						<a href="components.html">
							<i class="la la-table"></i>
							<p>Components</p>
							<span class="badge badge-count">14</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="forms.html">
							<i class="la la-keyboard-o"></i>
							<p>Forms</p>
							<span class="badge badge-count">50</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="tables.html">
							<i class="la la-th"></i>
							<p>Tables</p>
							<span class="badge badge-count">6</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="notifications.html">
							<i class="la la-bell"></i>
							<p>Notifications</p>
							<span class="badge badge-success">3</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="typography.html">
							<i class="la la-font"></i>
							<p>Typography</p>
							<span class="badge badge-danger">25</span>
						</a>
					</li>
					<li class="nav-item">
						<a href="icons.html">
							<i class="la la-fonticons"></i>
							<p>Icons</p>
						</a>
					</li>
					<li class="nav-item update-pro">
						<button data-toggle="modal" data-target="#modalUpdate">
							<i class="la la-hand-pointer-o"></i>
							<p>Update To Pro</p>
						</button>
					</li>
				</ul>
			</div>
		</div>

		<div class="main-panel">
			<div class="content">
				<div class="container-fluid">
					<h4 class="page-title">Products</h4>

					@if (session('success'))
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
							{{ session('success') }}
						</div>
					@endif

					<div class="row">
						<div class="col-md-4">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Add Product</div>
								</div>
								<div class="card-body">
									<form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
										@csrf
										<div class="form-group">
											<label>Product Name</label>
											<input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
										</div>
										<div class="form-group">
											<label>Price</label>
											<input type="number" name="price" class="form-control" value="{{ old('price') }}" min="0" step="0.01" required>
										</div>
										<div class="form-group">
											<label>Image</label>
											<input type="file" name="image" class="form-control" accept="image/*">
										</div>
										<div class="form-group">
											<label>Description</label>
											<textarea name="description" rows="3" class="form-control">{{ old('description') }}</textarea>
										</div>
										<button type="submit" class="btn btn-success btn-block">Add Product</button>
									</form>
								</div>
							</div>
						</div>

						<div class="col-md-8">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Product List</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table class="table table-head-bg-success table-striped table-hover">
											<thead>
												<tr>
													<th>#</th>
													<th>Image</th>
													<th>Name</th>
													<th>Price</th>
													<th>Description</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												@forelse ($products as $product)
													<tr>
														<td>{{ $product->id }}</td>
														<td>
															@if ($product->image_url)
																<img src="{{ asset('storage/' . $product->image_url) }}" alt="{{ $product->name }}" style="width:50px;height:50px;object-fit:cover;border-radius:4px;">
															@else
																<span class="text-muted">—</span>
															@endif
														</td>
														<td>{{ $product->name }}</td>
														<td>Rs. {{ number_format($product->price, 2) }}</td>
														<td>{{ Str::limit($product->description, 40) }}</td>
														<td>
															<button type="button" class="btn btn-warning btn-sm btn-edit"
																data-id="{{ $product->id }}"
																data-name="{{ $product->name }}"
																data-price="{{ $product->price }}"
																data-description="{{ $product->description }}"
																data-image="{{ $product->image_url ? asset('storage/' . $product->image_url) : '' }}">
																<i class="la la-edit"></i> Edit
															</button>
															<form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Delete karna hai?')">
																@csrf
																@method('DELETE')
																<button type="submit" class="btn btn-danger btn-sm">
																	<i class="la la-trash"></i> Delete
																</button>
															</form>
														</td>
													</tr>
												@empty
													<tr><td colspan="6" class="text-center text-muted">Koi product nahi hai.</td></tr>
												@endforelse
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="http://www.themekita.com">ThemeKita</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">Help</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="https://themewagon.com/license/#free-item">Licenses</a>
							</li>
						</ul>
					</nav>
					<div class="copyright ml-auto">
						2018, made with <i class="la la-heart heart text-danger"></i> by <a href="http://www.themekita.com">ThemeKita</a>
					</div>
				</div>
			</footer>
		</div>
	</div>

	<!-- Edit Side Panel -->
	<div id="editOverlay"></div>
	<div id="editPanel">
		<div class="edit-panel-header">
			<h6 class="mb-0">Edit Product</h6>
			<button id="closePanel" style="background:none;border:none;color:#fff;font-size:22px;cursor:pointer;line-height:1;">&times;</button>
		</div>
		<div class="edit-panel-body">
			<div id="edit_current_image" class="mb-3"></div>
			<form id="editForm" method="POST" enctype="multipart/form-data">
				@csrf
				@method('PUT')
				<div class="form-group">
					<label>Product Name</label>
					<input type="text" name="name" id="edit_name" class="form-control" required>
				</div>
				<div class="form-group">
					<label>Price</label>
					<input type="number" name="price" id="edit_price" class="form-control" min="0" step="0.01" required>
				</div>
				<div class="form-group">
					<label>New Image (optional)</label>
					<input type="file" name="image" class="form-control" accept="image/*">
				</div>
				<div class="form-group">
					<label>Description</label>
					<textarea name="description" id="edit_description" rows="4" class="form-control"></textarea>
				</div>
				<button type="submit" class="btn btn-success btn-block">Update Product</button>
			</form>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-labelledby="modalUpdatePro" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered" role="document">
			<div class="modal-content">
				<div class="modal-header bg-primary">
					<h6 class="modal-title"><i class="la la-frown-o"></i> Under Development</h6>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					<p>Currently the pro version of the <b>Ready Dashboard</b> Bootstrap is in progress development</p>
					<p><b>We'll let you know when it's done</b></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>

</body>
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assets/js/ready.min.js"></script>
<script src="/assets/js/demo.js"></script>
<script>
	const tokenKey = 'admin_token';
	const defaultPhoto = '/assets/img/profile.jpg';

	if (!localStorage.getItem(tokenKey)) {
		window.location.href = '/admin/login';
	}

	function token() {
		return localStorage.getItem(tokenKey);
	}

	function photoUrl(user, url) {
		return url || (user.profile_photo ? '/storage/' + user.profile_photo : defaultPhoto);
	}

	function showProfile(user, url) {
		const photo = photoUrl(user, url);
		document.getElementById('topProfileName').innerText = user.name;
		document.getElementById('menuProfileName').innerText = user.name;
		document.getElementById('menuProfileEmail').innerText = user.email;
		document.getElementById('sideProfileName').innerText = user.name;
		document.getElementById('topProfilePhoto').src = photo;
		document.getElementById('menuProfilePhoto').src = photo;
		document.getElementById('sideProfilePhoto').src = photo;
	}

	async function getProfile() {
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

	document.getElementById('topLogoutBtn').addEventListener('click', function (e) {
		e.preventDefault();
		localStorage.removeItem(tokenKey);
		window.location.href = '/admin/login';
	});

	getProfile();

	// Edit Side Panel
	$('.btn-edit').on('click', function () {
		var id = $(this).data('id');
		$('#edit_name').val($(this).data('name'));
		$('#edit_price').val($(this).data('price'));
		$('#edit_description').val($(this).data('description'));
		var img = $(this).data('image');
		$('#edit_current_image').html(img ? '<img src="' + img + '" style="width:80px;height:80px;object-fit:cover;border-radius:6px;border:1px solid #eee;">' : '');
		$('#editForm').attr('action', '/admin/products/' + id);
		$('#editPanel').addClass('open');
		$('#editOverlay').addClass('open');
	});

	$('#closePanel, #editOverlay').on('click', function () {
		$('#editPanel').removeClass('open');
		$('#editOverlay').removeClass('open');
	});
</script>
</html>
