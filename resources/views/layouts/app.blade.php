@extends('layouts.master')
@section('main-master')
    <!-- Begin page -->
    <div id="layout-wrapper">

        <!--Start topbar header-->
        <x-partials.header></x-partials.header>
        <!--End topbar header-->

        <!--Start sidebar-wrapper-->
        <x-partials.sidebar></x-partials.sidebar>
        <!--End sidebar-wrapper-->

        <!--Swal-ifnormation-->
        <x-events.swal-success></x-events.swal-success>
        <x-events.swal-warning></x-events.swal-warning>
        <!--Swal-confirmation-->
        <x-events.swal-confirmation></x-events.swal-confirmation>



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">

                    <!-- Start Contetnt -->
                    @yield('content')
                    <!-- end Content -->



                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

            <!--Start footer-->
            <x-partials.footer></x-partials.footer>
            <!--End footer-->
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->
@endsection
