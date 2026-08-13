<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title') - Admin Panel</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<link rel="stylesheet" href="/assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
	<link rel="stylesheet" href="/assets/css/ready.css">
	<link rel="stylesheet" href="/assets/css/demo.css">
	@yield('styles')
</head>
<body>
<div class="wrapper">
	<div class="main-header">
		<div class="logo-header">
			<a href="{{ route('admin.index') }}" class="logo">Ready Dashboard</a>
			<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse"><span class="navbar-toggler-icon"></span></button>
			<button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
		</div>
		<nav class="navbar navbar-header navbar-expand-lg">
			<div class="container-fluid">
				<form class="navbar-left navbar-form nav-search mr-md-3" action="">
					<div class="input-group">
						<input type="text" placeholder="Search ..." class="form-control">
						<div class="input-group-append"><span class="input-group-text"><i class="la la-search search-icon"></i></span></div>
					</div>
				</form>
				<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
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
				<div class="photo"><img id="sideProfilePhoto" src="/assets/img/profile.jpg"></div>
				<div class="info">
					<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
						<span><span id="sideProfileName">Admin</span><span class="user-level">Administrator</span><span class="caret"></span></span>
					</a>
					<div class="clearfix"></div>
					<div class="collapse in" id="collapseExample" aria-expanded="true">
						<ul class="nav">
							<li><a href="/admin/profile"><span class="link-collapse">My Profile</span></a></li>
							<li><a href="/admin/profile"><span class="link-collapse">Edit Profile</span></a></li>
						</ul>
					</div>
				</div>
			</div>
			<ul class="nav">
				<li class="nav-item {{ request()->is('admin') ? 'active' : '' }}">
					<a href="{{ route('admin.index') }}"><i class="la la-dashboard"></i><p>Dashboard</p></a>
				</li>
				
				<li class="nav-item {{ request()->is('admin/categories') ? 'active' : '' }}">
					<a href="{{ route('admin.categories') }}"><i class="la la-list"></i><p>Category</p></a>
				</li>
				<li class="nav-item {{ request()->is('admin/subcategories') ? 'active' : '' }}">
					<a href="{{ route('admin.subcategories') }}"><i class="la la-sitemap"></i><p>Sub-Category</p></a>
				</li>
				<li class="nav-item {{ request()->is('admin/brands') ? 'active' : '' }}">
					<a href="{{ route('admin.brands') }}"><i class="la la-trademark"></i><p>Brands</p></a>
				</li>
				<li class="nav-item {{ request()->is('admin/products') ? 'active' : '' }}">
					<a href="{{ route('admin.products') }}"><i class="la la-tag"></i><p>Products</p></a>
				</li>
				<li class="nav-item {{ request()->is('admin/product-images') ? 'active' : '' }}">
					<a href="{{ route('admin.product-images') }}"><i class="la la-image"></i><p>Products-Images</p></a>
				</li>
				<li class="nav-item {{ request()->is('admin/product-variants') ? 'active' : '' }}">
					<a href="{{ route('admin.product-variants') }}"><i class="la la-cubes"></i><p>Product-Variants</p></a>
				</li>
				<!-- <li class="nav-item {{ request()->is('admin/carts') ? 'active' : '' }}">
					<a href="{{ route('admin.carts') }}"><i class="la la-shopping-cart"></i><p>Carts</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/wishlists') ? 'active' : '' }}">
					<a href="{{ route('admin.wishlists') }}"><i class="la la-heart"></i><p>Wishlists</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/addresses') ? 'active' : '' }}">
					<a href="{{ route('admin.addresses') }}"><i class="la la-map-marker"></i><p>Address</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/orders') ? 'active' : '' }}">
					<a href="{{ route('admin.orders') }}"><i class="la la-file-text"></i><p>Orders</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/order-items') ? 'active' : '' }}">
					<a href="{{ route('admin.order-items') }}"><i class="la la-list-alt"></i><p>Orders-Items</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/coupons') ? 'active' : '' }}">
					<a href="{{ route('admin.coupons') }}"><i class="la la-ticket"></i><p>Coupons</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/reviews') ? 'active' : '' }}">
					<a href="{{ route('admin.reviews') }}"><i class="la la-star"></i><p>Reviews</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/settings') ? 'active' : '' }}">
					<a href="{{ route('admin.settings') }}"><i class="la la-cog"></i><p>Setting</p></a>
				</li> -->
				<!-- <li class="nav-item {{ request()->is('admin/payments') ? 'active' : '' }}">
					<a href="{{ route('admin.payments') }}"><i class="la la-credit-card"></i><p>Payments</p></a>
				</li> -->
				
			</ul>
		</div>
	</div>

	<div class="main-panel">
		<div class="content">
			<div class="container-fluid">
				<h4 class="page-title">@yield('page-title')</h4>
				@if (session('success'))
					<div class="alert alert-success alert-dismissible">
						<button type="button" class="close" data-dismiss="alert"><span>&times;</span></button>
						{{ session('success') }}
					</div>
				@endif
				@yield('content')
			</div>
		</div>
		
	</div>
</div>

<div class="modal fade" id="modalUpdate" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header bg-primary"><h6 class="modal-title">Under Development</h6><button type="button" class="close" data-dismiss="modal"><span>&times;</span></button></div>
			<div class="modal-body text-center"><p>Pro version is under development.</p></div>
			<div class="modal-footer"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></div>
		</div>
	</div>
</div>

<script src="/asssets/js/core/jquery.3.2.3.min.js"></script>
<script src="/assets/js/core/jquery.3.2.1.min.js"></script>
<script src="/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
<script src="/assets/js/core/popper.min.js"></script>
<script src="/assets/js/core/bootstrap.min.js"></script>
<script src="/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
<script src="/assets/js/ready.min.js"></script>
<script>
	const tokenKey = 'admin_token';
	const defaultPhoto = '/assets/img/profile.jpg';
	if (!localStorage.getItem(tokenKey)) { window.location.href = '/admin/login'; }
	function token() { return localStorage.getItem(tokenKey); }
	async function getProfile() {
		const r = await fetch('/api/profile', { headers: { Accept: 'application/json', Authorization: 'Bearer ' + token() } });
		if (!r.ok) { localStorage.removeItem(tokenKey); window.location.href = '/admin/login'; return; }
		const d = await r.json();
		const photo = d.url || (d.Data.profile_photo ? '/storage/' + d.Data.profile_photo : defaultPhoto);
		document.getElementById('topProfileName').innerText = d.Data.name;
		document.getElementById('menuProfileName').innerText = d.Data.name;
		document.getElementById('menuProfileEmail').innerText = d.Data.email;
		document.getElementById('sideProfileName').innerText = d.Data.name;
		['topProfilePhoto','menuProfilePhoto','sideProfilePhoto'].forEach(id => document.getElementById(id).src = photo);
	}
	document.getElementById('topLogoutBtn').addEventListener('click', function(e) { e.preventDefault(); localStorage.removeItem(tokenKey); window.location.href = '/admin/login'; });
	getProfile();
</script>
@yield('scripts')
</body>
</html>
