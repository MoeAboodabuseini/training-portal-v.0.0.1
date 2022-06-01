<x-company-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Opportunities /</span> View All Opportunities
        </h4>
        <a href="{{route('create_opp')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Opportunity</button> </a>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Opportunities Table</h5>

            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Seats</th>
                            <th>SuperVisor Name</th>
                            <th>SuperVisor Email</th>
                            <th>Starting Date</th>
                            <th>Status</th>
                            <th>Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($opportunities as $opportunity)
                        <tr>
                            <td>{{$opportunity->id}}</td>
                            <td>{{$opportunity->name}}</td>
                            <td>{{$opportunity->major?$opportunity->major:''}}</td>
                            <td>{{$opportunity->seats}}</td>
                            <td>{{$opportunity->supervisor_name?$opportunity->supervisor_name:''}}</td>
                            <td>{{$opportunity->supervisor_email?$opportunity->supervisor_email:''}}</td>
                            <td>{{$opportunity->starting_date?$opportunity->starting_date:''}}</td>
                            <td>{{$opportunity->status?$opportunity->status:''}}</td>

                            <td>
                                <a href="{{route('edit_opp',$opportunity->id)}}">
                                    <button type="button" class="btn rounded-pill btn-label-info">Edit</button>
                                </a>
                            </td>

                        </tr>
                        @endforeach

                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Seats</th>
                            <th>SuperVisor Name</th>
                            <th>SuperVisor Email</th>
                            <th>Starting Date</th>
                            <th>Status</th>
                            <th>Edit</th>
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