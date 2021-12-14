@extends('layouts.admin')

@section('title', 'لوحه التحكم')
@section('admin_content')

<div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="info">850</h3>
                            <h6>Products Sold</h6>
                          </div>
                          <div>
                            <i class="icon-basket-loaded info font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-info" role="progressbar" style="width: 80%"
                          aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="warning">$748</h3>
                            <h6>Net Profit</h6>
                          </div>
                          <div>
                            <i class="icon-pie-chart warning font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-warning" role="progressbar" style="width: 65%"
                          aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="success">146</h3>
                            <h6>New Customers</h6>
                          </div>
                          <div>
                            <i class="icon-user-follow success font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-success" role="progressbar" style="width: 75%"
                          aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 col-12">
                  <div class="card pull-up">
                    <div class="card-content">
                      <div class="card-body">
                        <div class="media d-flex">
                          <div class="media-body text-left">
                            <h3 class="danger">99.89 %</h3>
                            <h6>Customer Satisfaction</h6>
                          </div>
                          <div>
                            <i class="icon-heart danger font-large-2 float-right"></i>
                          </div>
                        </div>
                        <div class="progress progress-sm mt-1 mb-0 box-shadow-2">
                          <div class="progress-bar bg-gradient-x-danger" role="progressbar" style="width: 85%"
                          aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            <!-- Candlestick Multi Level Control Chart -->

            <!-- Sell Orders & Buy Order -->
            <div class="row match-height">
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Sell Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total BTC available: 6542.56585</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-success bg-lighten-5">
                                        <td>10583.4</td>
                                        <td><i class="cc BTC-alt"></i> 0.45000000</td>
                                        <td>$ 4762.53</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Buy Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <p class="text-muted">Total USD available: 9065930.43</p>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Price per BTC</th>
                                        <th>BTC Ammount</th>
                                        <th>Total($)</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10599.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.02000000</td>
                                        <td>$ 211.99</td>
                                    </tr>
                                    <tr>
                                        <td>10583.5</td>
                                        <td><i class="cc BTC-alt"></i> 0.04000000</td>
                                        <td>$ 423.34</td>
                                    </tr>
                                    <tr>
                                        <td>10583.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.35000000</td>
                                        <td>$ 3704.33</td>
                                    </tr>
                                    <tr>
                                        <td>10595.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.30000000</td>
                                        <td>$ 3178.71</td>
                                    </tr>
                                    <tr class="bg-danger bg-lighten-5">
                                        <td>10583.7</td>
                                        <td><i class="cc BTC-alt"></i> 0.25100000</td>
                                        <td>$ 2656.51</td>
                                    </tr>
                                    <tr>
                                        <td>10595.8</td>
                                        <td><i class="cc BTC-alt"></i> 0.29697926</td>
                                        <td>$ 3146.74</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Sell Orders & Buy Order -->
            <!-- Active Orders -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Active Order</h4>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <td>
                                    <button class="btn btn-sm round btn-danger btn-glow"><i class="la la-close font-medium-1"></i> Cancel all</button>
                                </td>
                            </div>
                        </div>
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-de mb-0">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Type</th>
                                        <th>Amount BTC</th>
                                        <th>BTC Remaining</th>
                                        <th>Price</th>
                                        <th>USD</th>
                                        <th>Fee (%)</th>
                                        <th>Cancel</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:50:50</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 1.38647</td>
                                        <td><i class="cc BTC-alt"></i> 0.38647</td>
                                        <td>11905.09</td>
                                        <td>$ 4600.97</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:49:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td><i class="cc BTC-alt"></i> 0.45879</td>
                                        <td>11901.85</td>
                                        <td>$ 5460.44</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td><i class="cc BTC-alt"></i> 0.89877</td>
                                        <td>11899.25</td>
                                        <td>$ 10694.6</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="danger">Sell</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td><i class="cc BTC-alt"></i> 0.45712</td>
                                        <td>11908.58</td>
                                        <td>$ 5443.65</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>2018-01-31 06:51:51</td>
                                        <td class="success">Buy</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td><i class="cc BTC-alt"></i> 0.58647</td>
                                        <td>11900.12</td>
                                        <td>$ 6979.78</td>
                                        <td>0.2</td>
                                        <td>
                                            <button class="btn btn-sm round btn-outline-danger"> Cancel</button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Active Orders -->
        </div>
    </div>
</div>

@endsection