<x-admin-master>


    @section('content')
    <h3 style="text-align: center;">Create Company</h3>
    <form action="{{route('adminCompanies.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4 p-3">
                <div class="row g-3">
                    <div class="col-sm-6">
                        <label class="form-label" for="user_id">Company ID</label>
                        <input type="text" name="user_id" id="user_id" class="form-control" placeholder="IT Company" required="" onchange="handleId()">
                        <span id="user_id_err" style="color: red;font-size: small;margin: 3px"></span>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="multiStepsEmail">Email</label>
                        <input type="email" name="email" id="multiStepsEmail" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe">
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                        <label class="form-label" for="pass">Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="pass" name="password" class="form-control" placeholder="············" aria-describedby="multiStepsPass2">
                            <span class="input-group-text cursor-pointer" id="multiStepsPass2"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="col-sm-6 form-password-toggle">
                        <label class="form-label" for="passConf">Confirm Password</label>
                        <div class="input-group input-group-merge">
                            <input type="password" id="passConf" name="password_confirmation" class="form-control" placeholder="············" aria-describedby="multiStepsConfirmPass2" onkeyup="handlePass()">
                            <span class="input-group-text cursor-pointer" id="multiStepsConfirmerr"><i class="bx bx-hide"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multiStepsURL">Website(optional)</label>
                        <input type="text" name="website" id="multiStepsURL" class="form-control" placeholder="johndoe/profile" aria-label="johndoe">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control" placeholder="John">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="major">Major</label>
                        <input type="text" id="major" name="major" class="form-control" placeholder="Doe">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="multiStepsMobile">Mobile</label>
                        <div class="input-group input-group-merge">
                            <span class="input-group-text">JO(+962)</span>
                            <input type="text" id="multiStepsMobile" name="phone" class="form-control multi-steps-mobile" placeholder="77/79/78">
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label" for="multiStepsPincode">Zipcode</label>
                        <input type="text" id="multiStepsPincode" name="zip" class="form-control multi-steps-pincode" placeholder="Postal Code" maxlength="6">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label" for="multiStepsAddress">Address</label>
                        <input type="text" id="multiStepsAddress" name="location" class="form-control" placeholder="Address">
                    </div>
                    <div class="mb-3">
                        <label for="formFile" class="form-label">Company Cover</label>
                        <input class="form-control" type="file" id="formFile" name="photo">
                    </div>
                    <div>
                        <label for="exampleFormControlTextarea1" class="form-label">Description</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
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