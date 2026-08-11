<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
	<form id="profileForm" enctype="multipart/form-data">
	    <div class="form-group">
		       <label>Name</label>
		        <input type="text" name="name" id="profileNameInput" class="form-control">
  
		</div>

		 <div class="form-group">
		<label>Email</label>
	    <input type="email" id="profileEmailInput" class="form-control" readonly>
		</div>
		<div class="form-group">
		<label>Profile Photo</label>
	    <input type="file" name="profile_photo" class="form-control" accept="image/*">
		</div>
		        <button type="submit" class="btn btn-primary">Update Profile</button>
	          </form>
	           
</body>
</html>										