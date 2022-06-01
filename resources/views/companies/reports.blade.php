<x-company-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Reports /</span> View All Reports
        </h4>
        {{-- <a href="{{route('create_opp')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Opportunity</button> </a>--}}

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Reports Table</h5>
           
            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>user name</th>
                            <th>opportunity name</th>
                            <th>Report</th>
                            <th>uploaded from</th>
                            <th>Data Send</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reports as $report)
                        <tr>
                            <td>{{$report->id}}</td>
                            <td>{{$report->user->name}}</td>
                            <td>{{$report->opportunity->name}}</td>
                            <td><a download href="/files/{{$report->report}}">{{$report->report}}</a></td>
                            <td>{{$report->created_at?$report->created_at:''}}</td>
                            <td>{{$report->uploaded_from?$report->uploaded_from:''}}</td>
                            <td>{{$report->status?$report->status:''}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>user name</th>
                            <th>opportunity name</th>
                            <th>Report</th>
                            <th>uploaded from</th>
                            <th>Data Send</th>
                            <th>Status</th>
                        </tr>
                    </tfoot>
                </table>
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
        @endsection

</x-company-master>