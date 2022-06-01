<x-admin-master>
    @section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
    @endsection
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">


        <h4 class="fw-bold py-3 mb-4">
            <span class="text-muted fw-light">Manage Opportunities /</span> View All Opportunities
        </h4>
        <a href="{{route('create.Opportunity')}}"> <button class="btn rounded-pill btn-dark mb-2">Create New Opportunity</button> </a>

        <!-- Ajax Sourced Server-side -->
        <div class="card" style="padding: 25px;">
            <h5 class="card-header">Opportunities Table</h5>

            <div class="card-datatable text-nowrap" style="overflow-x: scroll;">
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Major</th>
                            <th>Seats</th>
                            <th>SuperVisor Name</th>
                            <th>SuperVisor Email</th>
                            <th>Starting Date</th>
                            <th>Status</th>
                            <th>Change Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($opportunities as $opportunity)
                        <tr>
                            <td>{{$opportunity->name}}</td>
                            <td>{{$opportunity->major?$opportunity->major:''}}</td>
                            <td>{{$opportunity->seats?$opportunity->seats:''}}</td>
                            <td>{{$opportunity->supervisor_name?$opportunity->supervisor_name:''}}</td>
                            <td>{{$opportunity->supervisor_email?$opportunity->supervisor_email:''}}</td>
                            <td>{{$opportunity->starting_date?$opportunity->starting_date:''}}</td>
                            <td>{{$opportunity->status?$opportunity->status:''}}</td>
                            <td>
                                <form action="{{route('ChangeStatus',$opportunity->id)}}" method="post" id="status_form">
                                    @csrf
                                    @method('PUT')
                                    <div>
                                        <select name="status" onchange="this.form.submit()" id="smallSelect" class="form-select form-select-sm">
                                        <option selected disabled>Choose one</option>
                                        <option value="available">Available</option>
                                        <option value="unavailable">unavailable</option>
                                        </select>
                                    </div>
                                  

                                </form>
                            </td>
                            <td>
                                <a href="{{route('edit.Opportunity',$opportunity->id)}}">
                                    <button type="button" class="btn rounded-pill btn-label-info">Edit</button>
                                </a>
                            </td>
                            <td>
                                <form action="{{route('destroy.Opportunity',$opportunity->id)}}" method="post">
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
                            <th>Name</th>
                            <th>Major</th>
                            <th>Seats</th>
                            <th>SuperVisor Name</th>
                            <th>SuperVisor Email</th>
                            <th>Starting Date</th>
                            <th>Status</th>
                            <th>Change Status</th>
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

        </x-company-master>