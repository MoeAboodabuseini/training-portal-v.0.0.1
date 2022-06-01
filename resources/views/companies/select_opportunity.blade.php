<x-company-master>
    @section('content')
    <!-- <form action="{{route('companyUploadPage')}}" method="post"> -->
    <!-- @csrf -->
    <div class="col-md-6 m-auto mt-5 ">
        <div class="card mb-4">
            <h4>select opportunity</h4>
            <div class="btn-group">
                <button type="button" class="btn btn-label-secondary dropdown-toggle show" data-bs-toggle="dropdown" aria-expanded="true">Secondary</button>
                <ul class="dropdown-menu show" data-popper-placement="top-start" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -40.625px);">
                    @foreach($opportunities as $opportunity)
                    <li><a class="dropdown-item" href="company/Report/Upload/page/{{$opportunity->id}}">{{$opportunity->name}}</a></li>
                    @endforeach

                </ul>
            </div>



        </div>

    </div>

    <!-- </form> -->
    @endsection
</x-company-master>