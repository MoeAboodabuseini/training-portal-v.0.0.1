<x-company-master>
        @section('content')
    <form action="{{route('companyUploadFile')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6 m-auto mt-5 ">
            <div class="card mb-4">
                <div class="card-body pb-0">
                    <label for="defaultSelect" class="form-label">select opportunity</label>
                    <select name="opportunity_id" id="defaultSelect" class="form-select">
                        <option value=""> select opportunity</option>
                        @foreach($opportunities as $opportunity)
                        <option value="{{$opportunity->id}}">{{$opportunity->name}}</option>
                        
                        @endforeach
                    </select>
                </div>
                <div class="card-body pb-0">
                    <label for="defaultSelect" class="form-label">select student</label>
                    <select name="user_id" id="defaultSelect" class="form-select">
                        <option value=""> select student</option>
                        @foreach($students as $student)
                        <option value="{{$student->id}}">{{$student->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="card-body pb-0">
                    <div class="form-floating">
                        <input name="report" type="file" class="form-control" id="floatingInput" placeholder="png/jpg/any" aria-describedby="floatingInputHelp" name="photo" />
                        <label for="floatingInput">Report</label>
                        <div id="floatingInputHelp" class="form-text">Report</div>
                    </div>
                </div>
                <div class="row justify-content-center m-2 w-100">
                    <div class="">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </div>
            </div>

        </div>

    </form>
    @endsection
</x-company-master>