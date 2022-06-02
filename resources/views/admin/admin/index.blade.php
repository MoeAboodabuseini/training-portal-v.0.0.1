<x-admin-master>
    @section('style')
    <!-- <link rel="stylesheet" href="{{asset('assets/vendor/fonts/boxicons.css')}}" /> -->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Department-Chief /</span> View All Department-Chiefs
        </h4>
        <a href="{{route('admins.create')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Department-Chief</button> </a>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Department-Chief Table</h5>
  
            <div class="card-datatable text-nowrap">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $admin)
                        <tr>
                            <td>{{$admin->user_id}}</td>
                            <td>{{$admin->name}}</td>
                            <td>{{$admin->email?$admin->email:''}}</td>
                            <td>{{$admin->Phone?$admin->phone:''}}</td>
                            <td>{{$admin->role?$admin->role:''}}</td>
                         
                            <td>
                                <a href="{{route('admins.edit',$admin->id)}}">
                                    <button type="button" class="btn rounded-pill btn-label-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                {{-- avoid delete himself --}}
                                @if(auth()->user()->id == $admin->id )

                                @else
                                <form action="{{route('admins.destroy',$admin->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn rounded-pill btn-label-danger">Delete</button>
                                </form>
                            </td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                        <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Role</th>
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
