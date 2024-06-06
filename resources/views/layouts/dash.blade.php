<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>AUSAA KENYA - {{$title}}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <link href="{{asset('storage/dash/css/sb-admin-2.min.css')}}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/dashboard">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">{{Auth()->user()->role}} PANEL</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            
            <hr class="sidebar-divider">

            <!-- Engineers Heading -->
            <div class="sidebar-heading">
                My Department
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#leader" aria-expanded="true" aria-controls="log">
                    <i class="bi bi-person-vcard"></i>
                    <span>Leaders</span>
                </a>
                <div id="leader" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('role.index')}}">Roles</a>
                        <a class="collapse-item" href="" data-bs-toggle="modal" data-bs-target="#new">New Leader</a>
                        <a class="collapse-item" href="{{route('leader.index')}}">Leaders</a>

                    </div>
                </div>
            </li>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#actreport" aria-expanded="true" aria-controls="actreport">
                    <i class="bi bi-activity"></i>
                    <span>Activity Reports</span>
                </a>
                <div id="actreport" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">My Department</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#finance" aria-expanded="true" aria-controls="finance">
                    <i class="bi bi-bar-chart"></i>
                    <span>Finance Reports</span>
                </a>
                <div id="finance" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Latest Expenses</a>
                        <a class="collapse-item" href="">Monthly Report</a>
                        <a class="collapse-item" href="">Annual Report</a>
                        <a class="collapse-item" href="">Aggregate</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!--Loan Client Heading -->
            <div class="sidebar-heading">
                Missions
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#missions" aria-expanded="true" aria-controls="missions">
                    <i class="bi bi-window-stack"></i>
                    <span>Pre-excecution</span>
                </a>
                <div id="missions" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-gradient-light py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('mission.index')}}">Missions</a>
                        <a class="collapse-item" href="{{route('m_application.index')}}">Mission Applications</a>
                        <a class="collapse-item" href="">Registrations</a>
                        <a class="collapse-item" href="">Other</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postApplication" aria-expanded="true" aria-controls="postApplication">
                    <i class="bi bi-window-plus"></i>
                    <span>Post Application</span>
                </a>
                <div id="postApplication" class="collapse" aria-labelledby="headingMyLoans" data-parent="#accordionSidebar">
                    <div class="bg-gradient-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Manage</h6>
                        <a class="collapse-item" href="">Sites</a>
                        <a class="collapse-item" href="">Site Reports</a>
                        <a class="collapse-item" href="">Mission Report</a>
                        <a class="collapse-item" href="">Mission Files</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <div class="sidebar-heading">
                Finances
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#revenues" aria-expanded="true" aria-controls="revenues">
                    <i class="fas fa-fw fa-bank"></i>
                    <span>Revenues</span>
                </a>
                <div id="revenues" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-gradient-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Department Revenues:</h6>
                        <a class="collapse-item" href="{{route('account.index')}}">Accounts</a>
                        <a class="collapse-item" href="{{route('transaction.index')}}">Contributions</a>
                        <a class="collapse-item" href="">Report</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExpe" aria-expanded="true" aria-controls="collapseExpe">
                    <i class="fas fa-fw fa-credit-card"></i>
                    <span>Expenses</span>
                </a>
                <div id="collapseExpe" class="collapse" aria-labelledby="headingMyLoans" data-parent="#accordionSidebar">
                    <div class="bg-gradient-light py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Department Expenses:</h6>
                        <a class="collapse-item" href="{{route('expense.index')}}">Expenses</a>
                        <a class="collapse-item" href="">Reports</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Engineers Heading -->
            <div class="sidebar-heading">
                Articles
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#uploads" aria-expanded="true" aria-controls="uploads">
                    <i class="bi bi-cloud-arrow-up-fill"></i>
                    <span>Uploads</span>
                </a>
                <div id="uploads" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Discover Guides</a>
                        <a class="collapse-item" href="">Ugunduzi</a>
                        <a class="collapse-item" href="">Health</a>
                        <a class="collapse-item" href="">Others</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#writings" aria-expanded="true" aria-controls="writings">
                    <i class="bi bi-vector-pen"></i>
                    <span>Writings</span>
                </a>

                <div id="writings" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="{{route('article.index')}}">All Article</a>
                        <a class="collapse-item" href="{{route('article.create')}}">Write</a>
                    </div>
                </div>
            </li>
            <hr class="sidebar-divider">

            <!-- Engineers Heading -->
            <div class="sidebar-heading">
                Developer
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#tickets" aria-expanded="true" aria-controls="tickets">
                    <i class="bi bi-ticket"></i>
                    <span>Tickets</span>
                </a>
                <div id="tickets" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Unhandles Tickets</a>
                        <a class="collapse-item" href="">All Tickets</a>
                        <a class="collapse-item" href="">Others</a>
                    </div>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#log" aria-expanded="true" aria-controls="log">
                    <i class="bi bi-code-slash"></i>
                    <span>Logs</span>
                </a>
                <div id="log" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="">Error Logs</a>
                        <a class="collapse-item" href="">Account Logs</a>
                        <a class="collapse-item" href="">Others</a>
                    </div>
                </div>
            </li>
            
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

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
                                @if(Auth()->user()->notifications->where('isRead',false)->count()>0)
                                <span class="badge badge-danger badge-counter">{{Auth()->user()->notifications->where('isRead',false)->count()}}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Notification Center
                                </h6>
                                @foreach (Auth()->user()->notifications->where('isRead',false) as $note)
                                <a class="dropdown-item d-flex align-items-center" href="">
                                    <div class="mr-3">
                                        <div class="icon-circle {{$note->category=='Finance'?'bg-success':($note->category=='Alert'?'bg-warning':'bg-primary')}}">
                                            <i class="fas {{$note->category=='Finance'?'fa-donate':($note->category=='Alert'?'fa-exclamation-triangle':'fa-file-alt')}} text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">{{date_format($note->created_at,'F jS, Y')}}</div>
                                        {{mb_substr($note->message,0,50)}}...
                                    </div>
                                </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li>

                        <!-- Nav Item - Messages -->
                        <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                @if(Auth()->user()->messages->where('isRead',false)->count()>0)
                                <span class="badge badge-danger badge-counter">{{Auth()->user()->messages->where('isRead',false)->count()}}</span>
                                @endif
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                @foreach(Auth()->user()->messages->where('isRead',false) as $message)
                                <a class="dropdown-item d-flex align-items-center" href="{{route('chat.show',$message->sender->id)}}">
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">{{mb_substr($message->message,0,50)}}...</div>
                                        <div class="small text-gray-500">{{$message->sender->sname}} {{$message->sender->fname}} · {{$message->created_at->diffForHumans()}}</div>
                                    </div>
                                    
                                </a>
                                @endforeach
                                <a class="dropdown-item text-center small text-gray-500" href="/chat">Read More Messages</a>
                            </div>
                        </li>

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{Auth()->user()->fname}} {{Auth()->user()->lname}}
                                </span>
                                <img class="img-profile rounded-circle" src="{{asset('storage/avatar/'.(Auth()->user()->avatar))}}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="/profile">
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
                <!-- Begin Page Content -->
                <div class="container-fluid">
                    @if (Session::has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @if (Session::has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                    @yield('dashboard')
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; AUSAA KENYA SOCIETY. 2019 - {{date('Y')}}</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    Select "Logout" below if you are ready to end your current session.
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-danger" style="text-decoration: none;overflow:hidden; text-wrap:nowrap" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" aria-expanded="false">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="new" tabindex="-1" aria-labelledby="roleLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="roleLabel">Add Leader</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{route('leader.store')}}" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-floating mb-2">
                            <select name="user_id" id="" class="form-select">
                                @foreach (App\Models\User::select('id','fname','lname')->get() as $user )
                                <option value="{{$user->id}}">{{$user->fname}} {{$user->lname}}</option>
                                @endforeach
                            </select>
                            <label for="location" class="text-capitalize">Name</label>
                        </div>
                        <div class="form-floating mb-2">
                            <select name="role" id="" class="form-select">
                                @foreach (App\Models\AKRole::select('id','title')->get() as $role )
                                <option value="{{$role->id}}">{{$role->title}}</option>
                                @endforeach
                            </select>
                            <label for="location" class="text-capitalize">Office</label>
                        </div>
                        <div class="form-floating">
                        <select id="from" class="form-control" name="from" required>
                            <?php $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990)); ?>
                            @foreach($years as $year)
                            <option value="{{$year-1}}" class="form-control">{{$year-1}}</option>
                            @endforeach
                        </select>
                        <label for="">Service From</label>
                        </div>
                        <div class="form-floating">
                        <select id="intake" class="form-control" name="to" required>
                            <?php $years = array_combine(range(date("Y"), 1990), range(date("Y"), 1990)); ?>
                            <option value="Now" class="form-control">Now</option>
                            @foreach($years as $year)
                            <option value="{{$year}}" class="form-control">{{$year}}</option>
                            @endforeach
                        </select>
                        <label for="">Service To</label>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="{{asset('storage/dash/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('storage/dash/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('storage/dash/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{asset('storage/dash/js/sb-admin-2.min.js')}}"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.0/super-build/ckeditor.js"></script>
    <script>
        var i = 50;
        for (j = 0; j < i; j++) {
            CKEDITOR.ClassicEditor
                .create(document.getElementById("editor" + j), {
                    list: {
                        properties: {
                            styles: true,
                            startIndex: true,
                            reversed: true
                        }
                    },
                    heading: {
                        options: [{
                                model: 'paragraph',
                                title: 'Paragraph',
                                class: 'ck-heading_paragraph'
                            },
                            {
                                model: 'heading1',
                                view: 'h1',
                                title: 'Heading 1',
                                class: 'ck-heading_heading1'
                            },
                            {
                                model: 'heading2',
                                view: 'h2',
                                title: 'Heading 2',
                                class: 'ck-heading_heading2'
                            },
                            {
                                model: 'heading3',
                                view: 'h3',
                                title: 'Heading 3',
                                class: 'ck-heading_heading3'
                            },
                            {
                                model: 'heading4',
                                view: 'h4',
                                title: 'Heading 4',
                                class: 'ck-heading_heading4'
                            },
                            {
                                model: 'heading5',
                                view: 'h5',
                                title: 'Heading 5',
                                class: 'ck-heading_heading5'
                            },
                            {
                                model: 'heading6',
                                view: 'h6',
                                title: 'Heading 6',
                                class: 'ck-heading_heading6'
                            }
                        ]
                    },

                    fontFamily: {
                        options: [
                            'default',
                            'Arial, Helvetica, sans-serif',
                            'Courier New, Courier, monospace',
                            'Georgia, serif',
                            'Lucida Sans Unicode, Lucida Grande, sans-serif',
                            'Tahoma, Geneva, sans-serif',
                            'Times New Roman, Times, serif',
                            'Trebuchet MS, Helvetica, sans-serif',
                            'Verdana, Geneva, sans-serif'
                        ],
                        supportAllValues: true
                    },
                    fontSize: {
                        options: [10, 12, 14, 'default', 18, 20, 22],
                        supportAllValues: true
                    },
                    htmlSupport: {
                        allow: [{
                            name: /.*/,
                            attributes: true,
                            classes: true,
                            styles: true
                        }]
                    },
                    htmlEmbed: {
                        showPreviews: true
                    },
                    link: {
                        decorators: {
                            addTargetToExternalLinks: true,
                            defaultProtocol: 'https://',
                            toggleDownloadable: {
                                mode: 'manual',
                                label: 'Downloadable',
                                attributes: {
                                    download: 'file'
                                }
                            }
                        }
                    },
                    mention: {
                        feeds: [{
                            marker: '@',
                            feed: [
                                '@apple', '@bears', '@brownie', '@cake', '@cake', '@candy', '@canes', '@chocolate', '@cookie', '@cotton', '@cream',
                                '@cupcake', '@danish', '@donut', '@dragée', '@fruitcake', '@gingerbread', '@gummi', '@ice', '@jelly-o',
                                '@liquorice', '@macaroon', '@marzipan', '@oat', '@pie', '@plum', '@pudding', '@sesame', '@snaps', '@soufflé',
                                '@sugar', '@sweet', '@topping', '@wafer'
                            ],
                            minimumCharacters: 1
                        }]
                    },
                    removePlugins: [
                        'CKBox',
                        'CKFinder',
                        'EasyImage',
                        'RealTimeCollaborativeComments',
                        'RealTimeCollaborativeTrackChanges',
                        'RealTimeCollaborativeRevisionHistory',
                        'PresenceList',
                        'Comments',
                        'TrackChanges',
                        'TrackChangesData',
                        'RevisionHistory',
                        'Pagination',
                        'WProofreader',
                    ]
                }).then(editor => {
                    editor.editing.view.change(writer => {
                        writer.setStyle('min-height', '60vh', editor.editing.view.document.getRoot());
                        writer.setStyle('background-color', 'transparent', editor.editing.view.document.getRoot());
                    });
                });
        }
    </script>


</body>

</html>