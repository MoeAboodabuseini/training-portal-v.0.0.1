<x-admin-master>
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
            <h5 class="card-header">Requests Table</h5>

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
                            <th>Supervisor</th>
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
                                @if($request->status == 4)
                                Accepted
                                @else
                                {{$request->status}}
                                @endif
                            </td>
                            <td>{{$request->created_at}}</td>
                            <td>
                                <form action="{{route('assignSupervisor',$request->id)}}" method="post" id="status_form">
                                    @csrf

                                    <input hidden name="user_id" type="text" value="{{$request->user_id}}">
                                    <input hidden name="opportunity_id" type="text" value="{{$request->opportunity_id}}">
                                    <input hidden name="company_id" type="text" value="{{$request->company_id}}">
                                    @if($request->status=='waiting to assign a supervisor')
                                    <select name="supervisor_id" onchange="this.form.submit()">
                                        <option selected disabled>Choose one</option>
                                        @foreach($supervisors as $supervisor)

                                        <option value="{{$supervisor->id}}">{{$supervisor->name}}</option>
                                        @endforeach
                                    </select>
                                    @else
                                    <div class="mt-3">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalCenter{{$request->id}}">
                                        Supervisor info
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="modalCenter{{$request->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="modalCenterTitle">Supervisor information</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col mb-3">
                                                                <label for="nameWithTitle" class="form-label">Name</label>
                                                                <input disabled type="text" id="nameWithTitle" class="form-control"

                                                                 value="
                                                                 @if(!empty($request->agreed[0]) )
                                                                 {{$request->agreed[0]->user->name}}
                                                                 @endif
                                                                 "
                                                                 >
                                                            </div>
                                                        </div>
                                                        <div class="row g-2">
                                                            <div class="col mb-0">
                                                                <label for="emailWithTitle" class="form-label">Email</label>
                                                                <input disabled type="text" id="emailWithTitle" class="form-control"
                                                                 value="
                                                                 @if(!empty($request->agreed[0]) )
                                                                 {{$request->agreed[0]->user->email}}
                                                                 @endif
                                                                 " >
                                                            </div>
                                                            <div class="col mb-0">
                                                                <label for="dobWithTitle" class="form-label">Phone</label>
                                                                <input disabled type="text" id="emailWithTitle" class="form-control"
                                                                
                                                                value="
                                                                @if(!empty($request->agreed[0]) )
                                                                {{$request->agreed[0]->user->phone}}
                                                                 @endif
                                                                " >
                                                            </div>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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
                            <th>Supervisor</th>
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

</x-admin-master>