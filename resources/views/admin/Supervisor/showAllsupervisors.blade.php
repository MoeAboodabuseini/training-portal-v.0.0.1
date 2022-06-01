<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Supervisors /</span> View All Supervisors
        </h4>
        <a href="{{route('Supervisors.create')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Supervisor</button> </a>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Supervisors Table</h5>

            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Supervisor Id</th>
                            <th>Supervisor Name</th>
                            <th>Supervisor Email</th>
                            <th>Supervisor Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($Supervisors as $Supervisor)
                        <tr>
                            <td>{{$Supervisor->user_id}}</td>
                            <td>{{$Supervisor->name?$Supervisor->name:''}}</td>
                            <td>{{$Supervisor->email?$Supervisor->email:''}}</td>
                            <td>{{$Supervisor->phone?$Supervisor->phone:''}}</td>
                       
                            <td>
                                <a href="{{route('Supervisors.edit',$Supervisor->id)}}">
                                    <button type="button" class="btn rounded-pill btn-label-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('Supervisors.destroy',$Supervisor->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn rounded-pill btn-label-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>Supervisor Id</th>
                            <th>Supervisor Name</th>
                            <th>Supervisor Email</th>
                            <th>Supervisor Phone</th>
                            <th>Edit</th>
                            <th>Delete</th>
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

        </x-admin-master>