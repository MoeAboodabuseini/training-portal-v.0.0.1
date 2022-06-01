<x-company-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Requests /</span> View Requests
        </h4>


        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Users Table</h5>

            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Company</th>
                            <th>User</th>
                            <th>Opportunity</th>
                            <th>Status</th>
                            <th>Send At</th>
                            <th>Status edit</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($requests as $request)
                        <tr>
                            <td>{{$request->id}}</td>
                            <td>{{$request->opportunity->company->name}}</td>
                            <td>{{$request->user->name}}</td>
                            <td>{{$request->opportunity->name}}</td>
                            <td>
                                @if($request->status == 2)
                                Accepted by admin
                                @endif
                                @if($request->status == 'waiting to assign a supervisor')
                                waiting to assign a supervisor
                                @endif
                                @if($request->status == 3)
                                Rejected
                                @endif

                            </td>
                            <td>{{$request->created_at}}</td>
                            <td>
                                <form action="{{route('update_request',$request->id)}}" method="post" id="status_form">
                                    @csrf
                                    @method('PUT')
                                    @if($request->status==2)
                                    <select name="status" id="" onchange="formSubmit()">
                                        <option selected disabled>Choose one</option>
                                        <option value="waiting to assign a supervisor">ACCEPT</option>
                                        <option value="3">REJECT</option>
                                    </select>
                                    @else
                                    You cant Edit This
                                    @endif
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>#id</th>
                            <th>Company</th>
                            <th>User</th>
                            <th>Opportunity</th>
                            <th>Status</th>
                            <th>Send At</th>
                            <th>Status edit</th>
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

</x-company-master>