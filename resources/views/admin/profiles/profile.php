<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="csrf-token" content="EvAD2rYH7uBucgyUzkaJCiNYNfCH7MAPP6EpU45b">
	<meta name="description" content="">
	<meta name="author" content="">

	<title> CreateBlog </title>

	<!-- Fav Icon for this template-->
	<link rel="icon" type="image/x-icon" href="http://localhost:8000/backend/img/favicon.png " />

	<!-- Custom fonts for this template-->
	<link href="http://localhost:8000/backend/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

	<link rel="stylesheet" type="text/css" href="http://localhost:8000/backend/Nunito/nunito.css">


	<!-- Custom styles for this template-->
	<link href="http://localhost:8000/backend/css/sb-admin-2.min.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="http://localhost:8000/backend/DataTables/dataTables.bootstrap5.min.css">

	<!-- Bootstrap icons-->




		<!-- Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="http://localhost:8000/backend/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="http://localhost:8000/backend/select2.min.css">
	<style type="text/css">
		.ck-editor__editable {
			height: 300px;
		}
		/* .select2-selection.select2-selection--multiple {
			padding: 0.375rem 0.50rem;
			line-height: 1.0;
		} */
	</style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">


	<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="http://localhost:8000">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="http://localhost:8000/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>
    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000">

            <i class="far fa-eye"></i>
            <span>View Site</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/cms">

            <i class="fas fa-tasks"></i>
            <span>CMS</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/category">

            <i class="fab fa-cuttlefish"></i>
            <span>Categories</span>
        </a>

    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/tags">

            <i class="fas fa-tags"></i>
            <span>Tags</span>
        </a>

    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/createBlog">
            <i class="fas fa-plus-circle"></i>
            <span>Create Blog</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/approvedBlogs">
            <i class="fas fa-user-check"></i>
            <span>Approved Blogs</span>
        </a>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/awaitingApproval">
            <i class="fas fa-user-clock"></i>
            <span>Awaiting Approval</span>
        </a>
    </li>
    <hr class="sidebar-divider my-0">
    <li class="nav-item">
        <a class="nav-link collapsed" href="http://localhost:8000/contactMessages">
            <i class="fas fa-envelope"></i>
            <span>Contact Messages</span>
        </a>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->


    <!-- Divider -->


    <!-- Heading -->


    <!-- Nav Item - Pages Collapse Menu -->


    <!-- Nav Item - Charts -->


    <!-- Nav Item - Tables -->


    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of Sidebar -->


	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">


		<div id="content">


			<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    <!-- Sidebar Toggle (Topbar) -->
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>

    <!-- Topbar Search -->


    <!-- Topbar Navbar -->
    <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
        <li class="nav-item dropdown no-arrow d-sm-none">
            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
            </a>

            <!-- Dropdown - Messages -->
            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="form-inline mr-auto w-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </li>

        <!-- Nav Item - Alerts -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>

                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">3+</span>
            </a>

            <!-- Dropdown - Alerts -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                    Alerts Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 12, 2019</div>
                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 7, 2019</div>
                        $290.29 has been deposited into your account!
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="mr-3">
                        <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                        </div>
                    </div>
                    <div>
                        <div class="small text-gray-500">December 2, 2019</div>
                        Spending Alert: We've noticed unusually high spending for your account.
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
            </div>
        </li>

        <!-- Nav Item - Messages -->
        <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-envelope fa-fw"></i>

                <!-- Counter - Messages -->
                <span class="badge badge-danger badge-counter">7</span>
            </a>

            <!-- Dropdown - Messages -->
            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                <h6 class="dropdown-header">
                    Message Center
                </h6>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="http://localhost:8000/backend/img/undraw_profile_1.svg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div class="font-weight-bold">
                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                            problem I've been having.</div>
                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="http://localhost:8000/backend/img/undraw_profile_2.svg" alt="...">
                        <div class="status-indicator"></div>
                    </div>
                    <div>
                        <div class="text-truncate">I have the photos that you ordered last month, how
                            would you like them sent to you?</div>
                        <div class="small text-gray-500">Jae Chun · 1d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="http://localhost:8000/backend/img/undraw_profile_3.svg" alt="...">
                        <div class="status-indicator bg-warning"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Last month's report looks great, I am very happy with
                            the progress so far, keep up the good work!</div>
                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                    </div>
                </a>
                <a class="dropdown-item d-flex align-items-center" href="#">
                    <div class="dropdown-list-image mr-3">
                        <img class="rounded-circle" src="http://localhost:8000/backend/img/Mv9hjnEUHR4_60x60.jpg" alt="...">
                        <div class="status-indicator bg-success"></div>
                    </div>
                    <div>
                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                            told me that people say this to all dogs, even if they aren't good...</div>
                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                    </div>
                </a>
                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
            </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Qaisar74</span>
                <img class="img-profile rounded-circle" src="http://localhost:8000/backend/img/undraw_profile.svg">
            </a>

            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profile
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                    Settings
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                    Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                    Logout
                </a>
            </div>
        </li>
    </ul>
</nav>
<!-- End of Topbar -->




	<div class="container-fluid">





		<h1 class="h3 mb-4 text-gray-800">Create Blog
			<a href="http://localhost:8000/blogs" class="d-block btn btn-primary btn-sm float-right">Return to Blogs</a>
		</h1>
	</div>


	<div class="row">
	    <div class="col-xl-12 col-lg-8">
	        <div class="card shadow mb-4">


	            <div class="card-body">
					<form action="http://localhost:8000/blogCreate" method="POST" accept-charset="utf-8" enctype="multipart/form-data">
					    <input type="hidden" name="_token" value="EvAD2rYH7uBucgyUzkaJCiNYNfCH7MAPP6EpU45b">					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="title" class="ml-2">Blog Title</label>
					            <input type="text" name="title" id="title" value="" class="form-control" value="" placeholder="My First Blog">
					            					        </div>

					        <div class="form-group col-sm-12 col-md-6">
					            <label for="url" class="ml-2">Url</label>
					            <input type="text" name="url" id="url" value="" class="form-control" value="" placeholder="My First Blog">
					            					        </div>
					    </div>

					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="category" class="ml-2">Select Category</label>
					            <select name="category" id="category" value="" class="form-control">
					                <option value="">Select Category</option>
					                					                	<option  value="1">Sports</option>
					                					                	<option  value="2">Health</option>
					                					                	<option  value="3">Technology</option>
					                					                	<option  value="4">Education</option>
					                					                	<option  value="5">Motivational</option>
					                					                	<option  value="6">Soccer.</option>
					                					                	<option  value="7">Baseball</option>
					                					                	<option  value="8">Designer</option>
					                					                	<option  value="9">Motivational</option>
					                					                	<option  value="10">Motivational</option>
					                					            </select>
					            					        </div>

					        <div class="form-group col-sm-12 col-md-6">
					            <label for="tags" class="ml-2">Select Tags</label>
					            <select name="tags[]" id="tags[]" multiple="multiple" class="form-control tags">

					            		<option  value="1">Health</option>

					            		<option  value="2">New</option>

					            		<option  value="3">Top Rated</option>

					            		<option  value="4">Blogging Life</option>

					            		<option  value="5">Blogging</option>

					            		<option  value="6">Study</option>

					            		<option  value="7">Apple</option>

					            		<option  value="8">Samsung</option>

					            		<option  value="9">Huawei</option>

					            		<option  value="10">Vivo</option>
					            						            </select>
					            					        </div>
					    </div>

					    <div class="form-row">
					        <div class="form-group col-sm-12 col-md-6">
					            <label for="fileImage" class="ml-2">Upload Image</label>
					            <input type="file" name="fileImage" id="fileImage" value="" class="form-control">
					            					        </div>

					        <div class="form-group col-sm-12 col-md-6">
					            <label for="imageAlt" class="ml-2">Image Alt Text</label>
					            <input type="text" name="imageAlt" id="imageAlt" value="" class="form-control" placeholder="My Home Picture" value="">
					            					        </div>
					    </div>

					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="meta" class="ml-2">Meta Text</label>
					            <input type="text" name="meta" id="meta" value="" class="form-control" placeholder="For Ex : This was my first blog">
					            					        </div>

					    </div>
					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="shortDescription" class="ml-2">Short Description</label>
					            <textarea type="text" name="shortDescription" id="shortDescription" value="" class="form-control" style="height: 150px;" placeholder="For Ex : This was my first blog"></textarea>
					            					        </div>
					    </div>
					    <div class="form-row">
					        <div class="form-group col-sm-12">
					            <label for="description" class="ml-2">Description</label>
					            <textarea name="description" id="description" value="" class="form-control"></textarea>
					            					        </div>
					    </div>
					    <div class="form-check mb-2">


					    	<input type="checkbox" name="active" id="active" class="form-check-input" value="on" checked>

					    	<label for="active" class="form-check-label">Publish Blog</label>
					    </div>
					    <button type="submit" class="btn btn-success">Create</button>
					</form>

	            </div>
	        </div>
	    </div>
	</div>

		</div>



		<!-- Footer -->
<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website <span id=copyright_year></span></span>
        </div>
    </div>
</footer>
<!-- End of Footer -->


	</div>


</div>
<!-- End of Page Wrapper -->


	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	 <!-- Logout Modal Start -->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a  class="btn btn-primary" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout
					   <form id="logout-form" action="http://localhost:8000/logout" method="POST" class="d-none"> <input type="hidden" name="_token" value="EvAD2rYH7uBucgyUzkaJCiNYNfCH7MAPP6EpU45b">					   </form>
				   </a>
			   </div>
			</div>
		</div>
	</div>
	<!-- Logout Modal End -->





	<!-- Bootstrap core JavaScript-->
	<script src="http://localhost:8000/backend/vendor/jquery/jquery.min.js"></script>
	<script src="http://localhost:8000/backend/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

	<!-- Core plugin JavaScript-->
	<script src="http://localhost:8000/backend/vendor/jquery-easing/jquery.easing.min.js"></script>

	<!-- Custom scripts for all pages-->
	<script src="http://localhost:8000/backend/js/sb-admin-2.min.js"></script>

	<script src="http://localhost:8000/backend/sweetalert2.all.min.js"></script>


	<script type="text/javascript">
		$.ajaxSetup({
			headers : {
				'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
			}
		})
		baseUrl = "http:\/\/localhost:8000"
	// alert(baseUrl);
	</script>
	<script src="http://localhost:8000/backend\DataTables\jquery.dataTables.min.js" type="text/javascript"></script>
	<script src="http://localhost:8000/backend\DataTables\dataTables.bootstrap5.min.js" type="text/javascript"></script>
	<script>
		let d=new Date();
		document.getElementById('copyright_year').innerHTML=d.getFullYear();
	</script>


		<!-- Option 1: Bootstrap Bundle with Popper -->

	<script src="http://localhost:8000/backend/bootstrap.bundle.min.js" type="text/javascript"></script>
	<script src="http://localhost:8000/backend/select2.full.min.js" type="text/javascript"></script>
	<script type="text/javascript" src="http://localhost:8000/backend/cKEditor5/cKEditor.min.js"></script>
	<script type="text/javascript">
		$(".tags").select2({
			placeholder: "Select Tag(s)"
		});
		// CKEditor5
		ClassicEditor
		.create( document.querySelector( '#description' ) )
		.then( editor => {
			console.log( editor );
		} )
		.catch( error => {
			console.error( error );
		} );

		// Success Swal
		var success = ""; //success msg hai to Ok else assign emply '??' mean
		setTimeout(function(){
			if(success !== ''){
				Swal.fire({
					icon : 'success',
					title : 'Success',
					text : 'Blog Created Successfully.',
				})
			}
		},500); //Time should be in milliseconds
	</script>



</body>

</html>