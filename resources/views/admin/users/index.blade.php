<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Users /</span> View All Users
        </h4>
        <a href="{{route('users.create')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New User</button> </a>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Users Table</h5>
            @if(Session('user_deleted'))
            <div class="alert alert-danger alert-dismissible col-6" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">User Deleted!!</h6>
                <p class="mb-0">Aww yeah, you successfully Deleted the user.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>

            </div>
            @elseif(Session('user_updated'))
            <div class="alert alert-primary alert-dismissible" role="alert">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Edit User</h6>
                <p class="mb-0">You successfully Edited the user.</p>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                </button>
            </div>
            @endif
            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>type</th>
                            <th>skillw</th>
                            <th>Major</th>
                            <th>Hours</th>
                            <th>GPA</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->user_id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email?$user->email:''}}</td>
                            <td>{{$user->Phone?$user->phone:''}}</td>
                            <td>{{$user->type?$user->type:''}}</td>
                            <td>{{$user->skills?$user->skills:''}}</td>
                            <td>{{$user->major?$user->major:''}}</td>
                            <td>{{$user->hours?$user->hours:''}}</td>
                            <td>{{$user->GPA?$user->GPA:''}}</td>

                            <td>
                                <a href="{{route('users.edit',$user->id)}}">
                                    <button type="button" class="btn rounded-pill btn-label-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('users.destroy',$user->id)}}" method="post">
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
                            <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>type</th>
                            <th>skillw</th>
                            <th>Major</th>
                            <th>Hours</th>
                            <th>GPA</th>
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
