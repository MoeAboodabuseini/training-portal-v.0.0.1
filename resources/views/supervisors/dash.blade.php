<x-supervisor-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Requests /</span> View Requests
        </h4>


        <!-- Ajax Sourced Server-side -->
        <div class="card">
            <h5 class="card-header">Users Table</h5>

            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Email</th>
                            <th>Phone</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <td>{{$student->id}}</td>
                            <td>{{$student->name}}</td>
                            <td>{{$student->user_id}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->phone}}</td>

                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Student Name</th>
                            <th>Student Id</th>
                            <th>Email</th>
                            <th>Phone</th>
                        </tr>
                    </tfoot>
                </table>

            </div>
        </div>

        @endsection
        @section('script')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
        <script>
            const form = document.getElementById('status_form');
            const formSubmit = () => {
                form.submit();
            }
        </script>
        @endsection

</x-supervisor-master>