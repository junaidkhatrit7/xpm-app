@extends('layouts.app')

@section('title', 'Add Expense')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        @include('layouts.sidebar')

                        <!-- Form -->
                        <div class="d-flex col-lg-9 align-items-center auth-bg px-2 p-lg-5">

                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                <h2 class="card-title float-start mb-2">Welcome to HTCC</h2>
                                <div class="content-body">
                                    <!-- Horizontal Wizard -->
                                    <section class="horizontal-wizard">
                                        <div class="bs-stepper horizontal-wizard-example">
                                            <div class="bs-stepper-header">
                                                <div class="step" data-target="#personal-info">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-box">1</span>
                                                        <span class="bs-stepper-label">
                                                            <span class="bs-stepper-title">Personal Info</span>
                                                            <span class="bs-stepper-subtitle">Add Personal Info</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="line">
                                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                                </div>
                                                <div class="step" data-target="#event-step">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-box">2</span>
                                                        <span class="bs-stepper-label">
                                                            <span class="bs-stepper-title">Expense Details</span>
                                                            <span class="bs-stepper-subtitle">Add Expense Details</span>
                                                        </span>
                                                    </button>
                                                </div>
                                                <div class="line">
                                                    <i data-feather="chevron-right" class="font-medium-2"></i>
                                                </div>
                                                <div class="step" data-target="#social-links">
                                                    <button type="button" class="step-trigger">
                                                        <span class="bs-stepper-box">3</span>
                                                        <span class="bs-stepper-label">
                                                            <span class="bs-stepper-title">Review & Submit</span>
                                                            <span class="bs-stepper-subtitle">Display all expenses</span>
                                                        </span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="bs-stepper-content">
                                                <!-- form starts onSubmit="return false" -->
                                                <form action="/expense" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <input type="hidden" name="user_id" value="1" />
                                                    <div id="personal-info" class="content">
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label" for="first-name">First
                                                                    Name</label>
                                                                <input type="text" name="first-name" id="first-name"
                                                                    class="form-control" placeholder="John" />
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label" for="last-name">Last
                                                                    Name</label>
                                                                <input type="text" name="last-name" id="last-name"
                                                                    class="form-control" placeholder="Doe" />
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="form-group col-md-6">
                                                                <label class="form-label" for="email">Email</label>
                                                                <input type="email" name="email" id="email"
                                                                    class="form-control" placeholder="john.doe@email.com"
                                                                    aria-label="john.doe" />
                                                            </div>
                                                            <div class="col-md-6 mb-1">
                                                                <label class="form-label" for="contact-number">Contact
                                                                    number</label>
                                                                <input type="number" name="contact-number"
                                                                    id="contact-number"
                                                                    class="form-control mobile-number-mask"
                                                                    placeholder="(472) 765-3654" />
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end">
                                                            <a class="btn btn-primary btn-next">
                                                                <span
                                                                    class="align-middle d-sm-inline-block d-none">Next</span>
                                                                <i data-feather="check-circle"
                                                                    class="align-middle ml-sm-25 ml-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="event-step" class="content">
                                                        <!-- Invoice repeater -->
                                                        <div class="pt-75 pb-75">
                                                            <div class="invoice-repeater" novalidate="novalidate">
                                                                <div class="invoice-items" data-repeater-list="invoice">
                                                                    <div class="invoice-item" data-repeater-item
                                                                        data-index="0">
                                                                        <div class="row d-flex align-items-end">
                                                                            <div class="col-md-12 col-12">
                                                                                <div
                                                                                    class="form-group d-flex bg-grey mb-2 justify-content-between align-items-center">
                                                                                    <div class="form-group ">
                                                                                        <label for="formFile"
                                                                                            class="form-label">Upload or
                                                                                            drop
                                                                                            your Receipt</label>
                                                                                        <input class="inputfile"
                                                                                            type="file" id="formFile"
                                                                                            name="fromfile">
                                                                                    </div>
                                                                                    <div class="invoice-icon">
                                                                                        <img src="{{ asset('app-assets/images/svg/upload-file-icon.svg') }}"
                                                                                            width="70px">
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="e-category">Expenses
                                                                                        Category</label>
                                                                                    <select
                                                                                        class="select2 w-100 expense-catsel"
                                                                                        name="e-category" id="e-category">
                                                                                        <option label=" "></option>
                                                                                        <option>Navratri</option>
                                                                                        <option>Pooja</option>
                                                                                        <option>Ram Navmi</option>

                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="fp-default">Expense
                                                                                        Date</label>
                                                                                    <input type="text" id="fp-default"
                                                                                        class="form-control flatpickr-basic"
                                                                                        placeholder="YYYY-MM-DD"
                                                                                        name="expense-date" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-12">
                                                                                <div class="form-group">
                                                                                    <label class="form-label"
                                                                                        for="events">Merchant
                                                                                        Name</label>
                                                                                    <input type="text"
                                                                                        name="merchant-name"
                                                                                        id="merchant-name"
                                                                                        class="form-control"
                                                                                        placeholder="Merchant Name" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="expense-for">Expense
                                                                                        For</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="expense-for"
                                                                                        aria-describedby="expense-for"
                                                                                        placeholder="Expense Name"
                                                                                        name="expense-for" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="subtotal">Subtotal</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="subtotal"
                                                                                        aria-describedby="subtotal"
                                                                                        placeholder="Subtotal (Without Tax)"
                                                                                        name="subtotal" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="tax">Tax</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="tax"
                                                                                        aria-describedby="tax"
                                                                                        placeholder="$" name="tax" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group">
                                                                                    <label for="total">Total</label>
                                                                                    <input type="number"
                                                                                        class="form-control"
                                                                                        id="total"
                                                                                        aria-describedby="total"
                                                                                        placeholder="$" name="total" />
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <div class="form-group">
                                                                                    <label
                                                                                        for="expense-description">Expense
                                                                                        Description</label>
                                                                                    <textarea name="expense-description" class="form-control" id="expense-description" rows="3"
                                                                                        placeholder="Describe Expenses"></textarea>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row d-flex  space-between">
                                                                            <div class="col-md-3 col-12">
                                                                                <div class="form-group">
                                                                                    <button
                                                                                        class="btn btn-outline-danger text-nowrap px-1"
                                                                                        data-repeater-delete
                                                                                        type="button">
                                                                                        <i data-feather="x"
                                                                                            class="mr-25"></i>
                                                                                        <span>Delete</span>
                                                                                    </button>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <hr />
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <a class="btn btn-outline-primary" type="button"
                                                                            data-repeater-create>
                                                                            <span>Do you want to add more invoices, click
                                                                                here</span>
                                                                            <i data-feather="plus" class="mr-25"></i>
                                                                        </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <!-- /Invoice repeater -->
                                                        <div class="d-flex justify-content-between">
                                                            <a class="btn btn-primary btn-prev">
                                                                <i data-feather="arrow-left"
                                                                    class="align-middle mr-sm-25 mr-0"></i>
                                                                <span
                                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                                            </a>
                                                            <a class="btn btn-primary btn-next">
                                                                <span
                                                                    class="align-middle d-sm-inline-block d-none">Next</span>
                                                                <i data-feather="check-circle"
                                                                    class="align-middle ml-sm-25 ml-0"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div id="social-links" class="content">
                                                        <!-- Invoice -->
                                                        <div class="col-xl-12 col-md-12 col-12">
                                                            <div class="invoice-preview-card">
                                                                <!-- Persional Info -->
                                                                <div class="card-body invoice-padding pt-0">
                                                                    <div class="row invoice-spacing">
                                                                        <div class="col-xl-8 p-0">
                                                                            <h6 class="mb-2">Persional Info:</h6>
                                                                            <p class="card-text mb-25" id="first-name">
                                                                                First Name</p>
                                                                            <p class="card-text mb-25" id="last-name">Last
                                                                                Name</p>
                                                                            <p class="card-text mb-25"
                                                                                id="contact-number"></p>
                                                                            <p class="card-text mb-0" id="email">
                                                                                john@gmail.com</p>
                                                                        </div>
                                                                        <div class="col-xl-4 p-0 mt-xl-0 mt-2">
                                                                            <div class="invoice-date-wrapper">
                                                                                <p class="invoice-date-title">Expense Date:
                                                                                </p>
                                                                                <p class="invoice-date">{{ date('d/m/Y') }}
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Address and Contact ends -->
                                                                <!-- Invoice Description starts -->
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th class="py-1">Expenses Category</th>
                                                                                <th class="py-1">Merchant Name</th>
                                                                                <th class="py-1">Expense For</th>
                                                                                <th class="py-1">Subtotal</th>
                                                                                <th class="py-1">Tax</th>
                                                                                <th class="py-1">Total</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                                <div class="card-body invoice-padding pb-0">
                                                                    <div class="row invoice-sales-total-wrapper">
                                                                        <div
                                                                            class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">

                                                                        </div>
                                                                        <div
                                                                            class="col-md-6 d-flex justify-content-end order-md-2 order-1">
                                                                            <div class="invoice-total-wrapper">
                                                                                <div class="invoice-subtotal-item">
                                                                                    <span
                                                                                        class="invoice-subtotal-title">Subtotal:</span>
                                                                                    <span
                                                                                        class="invoice-subtotal-amount">$1800</span>
                                                                                </div>

                                                                                <div class="invoice-tax-item">
                                                                                    <span
                                                                                        class="invoice-tax-title">Tax:</span>
                                                                                    <span
                                                                                        class="invoice-tax-amount">21%</span>
                                                                                </div>
                                                                                <hr class="my-50" />
                                                                                <div class="invoice-total-item">
                                                                                    <span class="invoice-total-title">Grand
                                                                                        Total:</span>
                                                                                    <span
                                                                                        class="invoice-total-amount">$1690
                                                                                    </span>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- Invoice Description ends -->
                                                                <hr class="invoice-spacing" />
                                                            </div>
                                                        </div>
                                                        <!-- /Invoice -->
                                                        <div class="d-flex justify-content-between">
                                                            <a class="btn btn-primary btn-prev">
                                                                <i data-feather="arrow-left"
                                                                    class="align-middle mr-sm-25 mr-0"></i>
                                                                <span
                                                                    class="align-middle d-sm-inline-block d-none">Previous</span>
                                                            </a>
                                                            <button class="btn btn-success btn-submit">Submit</button>
                                                        </div>
                                                    </div>
                                                </form>
                                                <!-- form end -->
                                            </div><!-- bs stepper content end  -->
                                        </div><!-- h wizard end  -->
                                        <!-- </div>-->
                                    </section>
                                    <!-- /Horizontal Wizard -->
                                    <!-- Expense Policy Card -->
                                    <div class="card">
                                        <div class="card-header">
                                            <h4 class="card-title">HTCC Expense Policy</h4>
                                        </div>
                                        <div class="card-body">

                                            <ul class="list-style-square">
                                                <li> HTCC is a 501(c)(3) non-profit organization, we exempt ourselves from
                                                    federal and state taxes
                                                </li>
                                                <li> Taxes should not be paid on any expenses made on behalf of the HTCC
                                                </li>
                                                <li> If you are devotee, please submit your expenses within 60 days
                                                </li>
                                                <li> Everyone needs to attach 'ORIGINAL' copy of the receipt to the Expense
                                                    Report</li>
                                                <li> Once payment has been released, please deposit the check within 3
                                                    months to avoid&nbsp;further&nbsp;delays</li>

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Expense Policy Card -->
                                </div>
                            </div>
                        </div>
                        <!-- /Form-->
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- END: Content-->
@endsection
