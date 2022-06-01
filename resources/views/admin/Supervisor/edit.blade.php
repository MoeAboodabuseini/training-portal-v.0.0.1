<x-admin-master>


    @section('content')
    <h3 style="text-align: center;">Create Supervisor</h3>
    <form action="{{route('Supervisors.update',$supervisor->id)}}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="col-md-6 col-sm-9 m-auto">
            <div class="card mb-4">
                <div class="row g-3">
                    <div class="col-sm-12 col-lg-6">
                        <label class="form-label" for="user_id">Supervisor ID</label>
                        <input value="{{$supervisor->user_id}}" type="text" name="user_id" id="user_id" class="form-control" placeholder="IT Company" onchange="handleId()">
                        @error('user_id')
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px">{{$message}}</span>
                        @enderror

                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label class="form-label" for="name">Name</label>
                        <input value="{{$supervisor->name}}" type="text" id="name" name="name" class="form-control" placeholder="John">
                        @error('name')
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label class="form-label" for="multiStepsEmail">Email</label>
                        <input value="{{$supervisor->email}}" type="email" name="email" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe">
                        @error('email')
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-lg-6">
                        <label class="form-label" for="multiStepsMobile">Mobile</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">JO(+962)</span>
                            <input value="{{$supervisor->phone}}" type="text" id="multiStepsMobile" name="phone" class="form-control multi-steps-mobile" placeholder="77/79/78">

                        </div>
                        @error('phone')
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="col-sm-12 col-lg-12 form-password-toggle">
                        <label class="form-label" for="pass">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="pass" name="password" class="form-control" placeholder="············" aria-describedby="multiStepsPass2">
                            <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                        </div>
                        @error('password')
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px">{{$message}}</span>
                        @enderror
                    </div>
                </div>
                <div class="row justify-content-center mt-2 w-100">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
    @endsection


</x-admin-master>