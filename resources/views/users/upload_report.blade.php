<x-student-master>
    @section('content')
    @if(Session('Reports_status')== true)
    <form action="{{route('userUploadFile')}}" method="post" enctype="multipart/form-data">
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
    @else
    <div class="alert alert-danger d-flex col-lg-6 mt-3" style="margin: auto;" role="alert">
        <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i class="bx bx-store fs-6"></i></span>
        <div class="d-flex flex-column ps-1">
            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
            <span>You can't upload reports until  finishing your current training.</span>
        </div>
    </div>
    @endif

    @endsection
</x-student-master>