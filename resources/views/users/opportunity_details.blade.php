<x-student-master>
    @section('content')
    <div class="container-xxl flex-grow-1 container-p-y">



        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-4">
                <div class="card invoice-preview-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                            <div class="row">
                                <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                                    <div class="bg-image hover-zoom ripple rounded ripple-surface">
                                        <img src='{{$opportunity->photo}}' class="w-100" />
                                        <a href="#!">
                                            <div class="hover-overlay">
                                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-6 col-xl-6">
                                    <h5>{{$opportunity->name}}</h5>
                                    <div class="d-flex flex-row">
                                        <div class=" mb-1 me-2">
                                            @if($opportunity->company->rate==1)
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            @elseif($opportunity->company->rate==2)
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            @elseif($opportunity->company->rate==3)
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star "></i>
                                            <i class="fa fa-star "></i>
                                            @elseif($opportunity->company->rate==4)
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star "></i>
                                            @elseif($opportunity->company->rate==5)
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            <i class="fa fa-star text-danger"></i>
                                            @else
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            @endif

                                        </div>
                                    </div>
                                    <div class="mt-1 mb-0 text-muted small">

                                        <span>{{$opportunity->company->name}}</span>
                                        <span class="text-primary"> • </span>
                                        <span>seats #{{$opportunity->seats}}</span>
                                        <span class="text-primary"> • </span>
                                        <span>{{$opportunity->major}}<br /></span>

                                        <div class="d-flex mb-1 mt-2" style=" flex-direction: column;">
                                            <h4 class="mb-1 me-1">{{$opportunity->starting_date}}</h4>
                                            <h6 class="{{$opportunity->status=='available'?'text-success':'text-danger'}}">{{$opportunity->status}}</h6>

                                        </div>
                                    </div>


                                </div>

                            </div>

                        </div>
                    </div>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row p-sm-3 p-0">
                            <div class="col-xl-6 col-md-12 col-sm-5 col-12 mb-xl-0 mb-md-4 mb-sm-0 mb-4">
                                <h6 class="pb-2">Details:</h6>
                                <p class="mb-1">{{$opportunity->details}}</p>

                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <a class="btn btn-primary d-grid w-100 mb-3"   href="{{route('clickRequest',$opportunity->id)}}" onclick="deleteConfirm('delele-product-form-39')" npm>
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-3"></i>Send Request</span>
                        </a>
                        <!-- <button class="btn btn-primary d-grid w-100 mb-3" data-bs-toggle="offcanvas" data-bs-target="#sendInvoiceOffcanvas">
                            <span class="d-flex align-items-center justify-content-center text-nowrap"><i class="bx bx-paper-plane bx-xs me-3"></i>Send Request</span>
                        </button> -->
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>

        <!-- Offcanvas -->
        <!-- Send Invoice Sidebar -->
        <div class="offcanvas offcanvas-end" id="sendInvoiceOffcanvas" aria-hidden="true">
            <div class="offcanvas-header mb-3">
                <h5 class="offcanvas-title">Send Invoice</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <form>
                    <div class="mb-3">
                        <label for="invoice-from" class="form-label">From</label>
                        <input type="text" class="form-control" id="invoice-from" value="shelbyComapny@email.com" placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-to" class="form-label">To</label>
                        <input type="text" class="form-control" id="invoice-to" value="qConsolidated@email.com" placeholder="company@email.com" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-subject" class="form-label">Subject</label>
                        <input type="text" class="form-control" id="invoice-subject" value="Invoice of purchased Admin Templates" placeholder="Invoice regarding goods" />
                    </div>
                    <div class="mb-3">
                        <label for="invoice-message" class="form-label">Message</label>
                        <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="8">Dear Queen Consolidated,
                      Thank you for your business, always a pleasure to work with you!
                      We have generated a new invoice in the amount of $95.59
                      We would appreciate payment of this invoice by 05/11/2021</textarea>
                    </div>
                    <div class="mb-4">
                        <span class="badge bg-label-primary">
                            <i class="bx bx-link bx-xs"></i>
                            <span class="align-middle">Invoice Attached</span>
                        </span>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Send Invoice Sidebar -->

        <!-- Add Payment Sidebar -->
        <div class="offcanvas offcanvas-end" id="addPaymentOffcanvas" aria-hidden="true">
            <div class="offcanvas-header mb-3">
                <h5 class="offcanvas-title">Add Payment</h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body flex-grow-1">
                <div class="d-flex justify-content-between bg-lighter p-2 mb-3">
                    <p class="mb-0">Invoice Balance:</p>
                    <p class="fw-bold mb-0">$5000.00</p>
                </div>
                <form>
                    <div class="mb-3">
                        <label class="form-label" for="invoiceAmount">Payment Amount</label>
                        <div class="input-group">
                            <span class="input-group-text">$</span>
                            <input type="text" id="invoiceAmount" name="invoiceAmount" class="form-control invoice-amount" placeholder="100" />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-date">Payment Date</label>
                        <input id="payment-date" class="form-control invoice-date" type="text" />
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="payment-method">Payment Method</label>
                        <select class="form-select" id="payment-method">
                            <option value="" selected disabled>Select payment method</option>
                            <option value="Cash">Cash</option>
                            <option value="Bank Transfer">Bank Transfer</option>
                            <option value="Debit Card">Debit Card</option>
                            <option value="Credit Card">Credit Card</option>
                            <option value="Paypal">Paypal</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="form-label" for="payment-note">Internal Payment Note</label>
                        <textarea class="form-control" id="payment-note" rows="2"></textarea>
                    </div>
                    <div class="mb-3 d-flex flex-wrap">
                        <button type="button" class="btn btn-primary me-3" data-bs-dismiss="offcanvas">Send</button>
                        <button type="button" class="btn btn-label-secondary" data-bs-dismiss="offcanvas">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- /Add Payment Sidebar -->

        <!-- /Offcanvas -->



    </div>
    @endsection
</x-student-master>