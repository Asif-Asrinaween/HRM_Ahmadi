<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>SB Admin 2 - Blank</title>



    <!-- Custom fonts for this template-->
    <link href="{{ asset('frontend/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet"
        type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('frontend/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <script src="{{ asset('frontend/tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script
        src="https://cdn.tiny.cloud/1/khu970cyp76e4ta3eo8yuja2opffb6m14yaet9djwu18bbvw/tinymce/4/tinymce.min.js"
        referrerpolicy="origin"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    {{-- offline delete confirmation sweetalert2  or using sweetalert2 offline via npm --}}

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <link href="{{ mix('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-icons/font/bootstrap-icons.min.css') }}">



    <style>
        svg {
            width: 20px;
        }
    </style>



</head>


<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
            id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center"
                href="#">
                <div class="sidebar-brand-icon rotate-n-15">
                    {{-- <img src="{{ Storage::url(Auth::user()->profile->profile_pic)}}" alt="" width="50px" height="50px" style="border-radius: 40%"> --}}

                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>


            <!-- Nav Item - Cust_Type -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('CustType.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Cust_Type</span></a>
            </li>



            <!-- Nav Item - Customer -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Customer.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Customer</span></a>
            </li>


            <!-- Nav Item - Customer -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('Transaction.index') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Transaction</span></a>
            </li>




            <!-- Nav Item - Thing -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="nav-link">Things</span>
                    <div class="dropdown-menu dropdown-menu-left">



                        <a class="dropdown-item" href="{{ route('Customer.thing') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Customer
                        </a>


                        <a class="dropdown-item" href="{{ route('things.create') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Add Transaction
                        </a>

                        <a class="dropdown-item" href="#">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Transaction List
                        </a>
                    </div>
                </a>
            </li>






            <!-- Nav Item - financial -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="nav-link">Financial</span>
                    <div class="dropdown-menu dropdown-menu-left">



                        <a class="dropdown-item" href="{{ route('Customer.financial') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Customer
                        </a>


                        <a class="dropdown-item" href="{{ route('financials.create') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Add Transaction
                        </a>

                        <a class="dropdown-item" href="#">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Transaction List
                        </a>
                    </div>
                </a>
            </li>




            <!-- Nav Item - Materials -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" role="button"
                    data-toggle="dropdown">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span class="nav-link">Material</span>
                    <div class="dropdown-menu dropdown-menu-left">


                        <a class="dropdown-item" href="{{ route('Material.create') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Add Material
                        </a>

                        <a class="dropdown-item" href="{{ route('Material.index') }}">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Material List
                        </a>
                        <a class="dropdown-item" href="#">
                            <i class=" fa-sm fa-fw mr-2 "></i>
                            Material Detail
                        </a>

                    </div>
                </a>
            </li>



            <!-- Divider -->
            <hr class="sidebar-divider">


            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav
                    class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop"
                        class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>


                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <a href="{{ route('things.create') }}"
                            class="btn btn-primary m-4 p-0">Add Thing</a>

                        <a href="{{ route('financials.create') }}"
                            class="btn btn-success m-4 p-0">Add Financial</a>

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#"
                                id="searchDropdown" role="button" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>
                        <div class="topbar-divider d-none d-sm-block"></div>


                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown"
                                role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Douglas
                                    McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('frontend/img/undraw_profile.svg') }}">
                            </a>

                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>

                                <a class="dropdown-item" href="/">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Home
                                </a>

                                <div class="dropdown-divider"></div>

                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf

                                    <a href="route('logout')"
                                        onclick="event.preventDefault();
                        this.closest('form').submit();"
                                        class="dropdown-item">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        {{ __('Log Out') }}
                                    </a>
                                </form>

                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->



                @yield('content')

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2024</span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your
                        current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button"
                            data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bootstrap core JavaScript-->
        <script src="{{ asset('frontend/vendor/jquery/jquery.min.js') }}"></script>
        <script src="{{ asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

        <!-- Core plugin JavaScript-->
        <script src="{{ asset('frontend/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

        <!-- Custom scripts for all pages-->
        <script src="{{ asset('frontend/js/sb-admin-2.min.js') }}"></script>

        {{-- tiny mce --}}
        <script>
            var editor_config = {
                path_absolute: "/",
                selector: "textarea.my-editor",
                plugins: [
                    "advlist autolink lists link image charmap print preview hr anchor pagebreak",
                    "searchreplace wordcount visualblocks visualchars code fullscreen",
                    "insertdatetime media nonbreaking save table contextmenu directionality",
                    "emoticons template paste textcolor colorpicker textpattern"
                ],
                toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
                relative_urls: false,
                file_browser_callback: function(field_name, url, type, win) {
                    var x = window.innerWidth || document.documentElement.clientWidth || document
                        .getElementsByTagName('body')[0].clientWidth;
                    var y = window.innerHeight || document.documentElement.clientHeight || document
                        .getElementsByTagName('body')[0].clientHeight;

                    var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' +
                        field_name;
                    if (type == 'image') {
                        cmsURL = cmsURL + "&type=Images";
                    } else {
                        cmsURL = cmsURL + "&type=Files";
                    }

                    tinyMCE.activeEditor.windowManager.open({
                        file: cmsURL,
                        title: 'Filemanager',
                        width: x * 0.8,
                        height: y * 0.8,
                        resizable: "yes",
                        close_previous: "no"
                    });
                }
            };

            tinymce.init(editor_config);
        </script>

        {{-- Message toast for showing an action is done successfully from sweetalert2 --}}
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: "top-end",
                showConfirmButton: false,
                timer: 2000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.onmouseenter = Swal.stopTimer;
                    toast.onmouseleave = Swal.resumeTimer;
                }
            });

            @if (Session::has('success'))
                {
                    Toast.fire({
                        icon: "success",
                        title: "{{ Session::get('success') }}"
                    });

                }
            @endif
        </script>

        {{-- offline deltete sweetalert --}}
        <script src="{{ mix('js/app.js') }}"></script>
        @yield('script')



</body>

</html>
