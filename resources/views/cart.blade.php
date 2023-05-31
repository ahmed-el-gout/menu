@extends('layouts.layout')

@section('content')
<div style='height:100px'></div>
<div class="page-content container my-6 py-6">
    <div class="page-header text-blue-d2 my-6 p-4">
        <h1 class="page-title text-secondary-d1">
            Invoice
            <small class="page-info">
                <i class="fa fa-angle-double-right text-80"></i>
                ID: #111-222
            </small>
        </h1>

        <div class="page-tools">
            <div class="action-buttons">
                <a class="btn bg-white btn-light m-3 text-95" href="#" data-title="Print">
                    <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                    Print
                </a>
                <a class="btn bg-white btn-light m-3 text-95" href="#" data-title="PDF">
                    <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                    Export
                </a>
                <a class="btn bg-white btn-light m-3 text-95" href="{{ route('destroy.all') }}" data-title="delete">
                    <i class="mr-1 fa fa-trash text-danger-m1 text-120 w-2"></i>
                    delete all 
                </a>
            </div>
        </div>
    </div>

    <div class="container px-0">
        <div class="row mt-4">
            <div class="col-12 col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="text-center text-150">
                            <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                            <span class="text-default-d3">yummy-invoice</span>
                        </div>
                    </div>
                </div>
                <!-- .row -->

                <hr class="row brc-default-l1 mx-n1 mb-4" />

                <div class="row">
                    <div class="col-sm-6">
                        <div>
                            <span class="text-sm text-grey-m2 align-middle">To:</span>
                            <span class="text-600 text-110 text-blue align-middle">Alex Doe</span>
                        </div>
                        <div class="text-grey-m2">
                            <div class="my-1">
                                Street, City
                            </div>
                            <div class="my-1">
                                State, Country
                            </div>
                            <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b class="text-600">111-111-111</b></div>
                        </div>
                    </div>
                    <!-- /.col -->

                    <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                        <hr class="d-sm-none" />
                        <div class="text-grey-m2">
                            <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                Invoice
                            </div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">ID:</span> #111-222</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Issue Date:</span> Oct 12, 2019</div>

                            <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Status:</span> <span class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                        </div>
                    </div>
                    <!-- /.col -->
                </div>

                <div class="mt-4">
                    {{-- <div class="row text-600 text-white bgc-default-tp1 py-25">
                        <div class="d-none d-sm-block col-1">#</div>
                        <div class="col-9 col-sm-5">name</div>
                        <div class="d-none d-sm-block col-4 col-sm-2">Qty</div>
                        <div class="d-none d-sm-block col-sm-2">Unit Price</div>
                        <div class="col-2">Amount</div>
                    </div>

                    <div class="text-95 text-secondary-d3">
                        @foreach (\Cart::getContent() as $key => $item)
                            <div class="row mb-2 mb-sm-0 py-25">
                                <div class="d-none d-sm-block col-1">{{$key}}</div>
                                <div class="col-9 col-sm-5">{{ $item->name }}</div>
                                <div class="d-none d-sm-block col-2">{{ $item->qty }}</div>
                                <div class="d-none d-sm-block col-2 text-95">{{ $item->price }}</div>
                                <div class="col-2 text-secondary-d2">$20</div>
                            </div>
                        @endforeach

                    </div>

                    <div class="row border-b-2 brc-default-l2"></div> --}}

                    <!-- or use a table instead -->
                    
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>name</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        @foreach (\Cart::getContent() as $key => $item)
                            <tr></tr>
                            <tr>
{{-- {{ \Cart::getContent() }} --}}

                                <td>{{ $key }}</td>
                                <td>{{ $item->name }}</td>
                                <td>
                                    <form action="{{ route('update.qty',['id'=> $item->id]) }}" method="post">
                                        @csrf
                                    <select class="form-select w-50" onchange="javascript:this.form.submit()" name="new_qty" >
                                        <option value="1" {{ ($item->quantity === 1 ? "selected":"") }}>1</option>
                                        <option value="2" {{ ($item->quantity === 2 ? "selected":"") }}>2</option>
                                        <option value="3" {{ ($item->quantity === 3 ? "selected":"") }}>3</option>
                                        <option value="4" {{ ($item->quantity === 4 ? "selected":"") }}>4</option>
                                      </select>
                                    </form>

                                </td>
                                <td class="text-95">{{ $item->price }} MAD</td>
                                <td class="text-secondary-d2">{{ $item->price * $item->quantity }} MAD</td>
                            </tr> 
                        @endforeach   
                    </tbody>
                </table>
            </div>
            

                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                            Extra note such as company or payment information...
                        </div>

                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    SubTotal
                                </div>
                                <div class="col-5 font-weight-bold">
                                    <span class="text-150 text-success-d3 opacity-2 font-weight-bold">{{ \Cart::getSubTotal() }} MAD</span>
                                </div>
                            </div>

                            <div class="row my-2">
                                <div class="col-7 text-right">
                                    Tax (10%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">$225</span>
                                </div>
                            </div>

                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">$2,475</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr />

                    <div class="d-flex justify-content-between my-2">
                        <span class="text-secondary-d1 text-105">Thank you for your business</span>
                        <a href="{{ route('store.order') }}" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">confirm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>