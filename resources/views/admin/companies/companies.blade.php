<x-admin-master>
    @section('style')
        <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
        <div class="container-xxl flex-grow-1 container-p-y">


            <h4 class="fw-bold py-3 mb-4">
                <span class="text-muted fw-light">Manage companies /</span> View All companies
            </h4>
            <a href="{{route('adminCompanies.create')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Company</button> </a>

            <!-- Ajax Sourced Server-side -->
            <div class="card" style="padding: 25px;     overflow: overlay;">
                <h5 class="card-header">Companies Table</h5>
              
                <div class="card-datatable text-nowrap">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>#id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>type</th>
                            <th>Location</th>
                            <th>photo</th>
                            <th>Rate</th>
                            <th>Description</th>
                            <th>Website</th>
                            <th>Delete</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($companies as $user)
                            <tr>
                                <td>{{$user->user_id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email?$user->email:''}}</td>
                                <td>{{$user->phone?$user->phone:''}}</td>
                                <td>{{$user->major?$user->major:''}}</td>
                                <td>{{$user->location?$user->location:''}}</td>
                                <td><img src="{{$user->photo}}" alt="img" width="50px" height="50px"/></td>
                                <td>{{$user->rate?$user->rate:''}}</td>
                                <td>{{$user->description?$user->description:''}}</td>
                                <td>{{$user->website?$user->website:''}}</td>

                               
                                <td>
                                    <form action="{{route('adminCompanies.destroy',$user->id)}}" method="post">
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
                            <th>Location</th>
                            <th>photo</th>
                            <th>Rate</th>
                            <th>Description</th>
                            <th>Website</th>
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
