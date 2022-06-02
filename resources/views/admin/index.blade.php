<x-admin-master>            <!-- / Navbar -->


@section('content')
    <!-- Content wrapper -->
        <div class="content-wrapper">

            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">


                <h4 class="fw-bold py-3 mb-4">
                    Welcome {{auth()->user()->name}} to Department-Chief Dashboard
                </h4>

                


            </div>
            <!-- / Content -->


            <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->



        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>


        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>






    @endsection
</x-admin-master>
