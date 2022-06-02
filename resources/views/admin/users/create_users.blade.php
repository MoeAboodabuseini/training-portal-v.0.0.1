<x-admin-master>


    @section('content')
    <form action="{{route('users.store')}}" method="post">
        @csrf
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4">
                <h5 class="card-header">Name</h5>
                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input type="text" class="form-control" id="floatingInput" placeholder="User Name" aria-describedby="floatingInputHelp" name="name" />
                        <label for="floatingInput">Name</label>
                         @error('name') <div style="color:red ;" id="floatingInputHelp" class="form-text">{{$message}}
                    </div>
                    @else
                    <div id="floatingInputHelp" class="form-text">Try To Add New student</div>
                    @enderror
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="form-floating">
                    <input type="number" class="form-control" id="floatingInput" placeholder="student ID" aria-describedby="floatingInputHelp" name="user_id" />
                    <label for="floatingInput">student ID</label>
                    @error('user_id')
                        <div style="color:red ;" id="floatingInputHelp" class="form-text">{{$message}}</div>
                        @else
                        <div id="floatingInputHelp" class="form-text">Should be unique for each student</div>
                        @enderror
                </div>
            </div>
            <div class="card-body pb-0">
                <div class="form-floating">
                    <input type="password" class="form-control" id="floatingInput" placeholder="Password" aria-describedby="floatingInputHelp" name="password" />
                    <label for="floatingInput">Password</label>
                    @error('password')
                        <div style="color:red ;" id="floatingInputHelp" class="form-text">{{$message}}</div>
                        @else
                        <div id="floatingInputHelp" class="form-text">Should be 8 or more characters</div>
                        @enderror
                </div>
            </div>

            <div class="row justify-content-center m-2 w-100">
                <div class="">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </div>
        </div>

        </div>

    </form>
    @endsection


</x-admin-master>