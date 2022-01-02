      @include('vendor.venheader')

      <div class="container">
          <div class="row">
              <div class="col">
                  <p class="text-white mt-5 mb-5">Welcome back, <b>{{$Username}}</b></p>
              </div>
          </div>
          <!-- row -->
          <div class="row tm-content-row">
              <div class="col-12 tm-block-col">
                  <div class="">
                      <h2 class="tm-block-title text-center">Orders List</h2>
                      @if(session()->has('success'))
                        <div class="alert alert-success alert-block d-flex justify-content-between">
                            <div> <strong>{{ session()->get('success') }}
                                </strong> </div>
                            <div><button type="button" class="close" data-dismiss="alert">×</button></div>
                        </div>
                        @endif

                      <table class="table">
                          <thead>
                              <tr>
                                  <th scope="col">ORDER NO.</th>
                                  <th scope="col">STATUS</th>
                                  <th scope="col">PRODUCTS</th>
                                  <th scope="col">LOCATION</th>
                                  <th scope="col">ORDER DATE</th>
                                  <th scope="col">Action</th>
                              </tr>
                          </thead>
                          <tbody>
                              <?php
                                $order_number = 1;
                                ?>
                              @foreach($orders as $order)
                              <tr>
                                  <td scope="row"><b>{{$order_number++}}</b></td>
                                  @if($order->status=='Cancelled' )
                                  <td>
                                      <div class="tm-status-circle cancelled">
                                      </div>{{$order->status}}
                                  </td>
                                  @elseif ($order->status == 'Completed')
                                  <td>
                                      <div class="tm-status-circle moving">
                                      </div>{{$order->status}}
                                  </td>
                                  @else
                                  <td>
                                      <div class="tm-status-circle pending">
                                      </div>{{$order->status}}
                                  </td>
                                  @endif
                                  <td><b>{{$order->product->name}}</b></td>
                                  <td>
                                      <b>Vill-</b> {{$order->userDetail->address_1}}<br>
                                      <b> City-</b> {{$order->userDetail->city_id}}<br>
                                      State- {{$order->userDetail->state_id}}<br>
                                      Country- {{$order->userDetail->country_id}}<br>
                                      Zip_code- {{$order->userDetail->zip_code}}
                                      </b>
                                  </td>
                                  <td>{{$order->created_at}}</td>
                                  @if($order->status=='Cancelled' )
                                  <td>
                                      <div class="tm-status-circle cancelled">
                                      </div>{{$order->status}}
                                  </td>
                                  @elseif ($order->status == 'Completed')
                                  <td>
                                      <div class="tm-status-circle moving">
                                      </div>{{$order->status}}
                                  </td>
                                  @else
                                  <td>
                                      <div>
                                          <a href="{{route('vendor.changeStatus',$order->id) }}" class="btn btn-primary btn-block text-uppercase">Completed</a>
                                      </div>
                                  </td>
                                  @endif

                              </tr>
                              @endforeach

                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
      </div>
      <footer class="tm-footer row tm-mt-small">
          <div class="col-12 font-weight-light">
              <p class="text-center text-white mb-0 px-4 small">
                  Copyright &copy; <b>2018</b> All rights reserved.

                  Design: <a rel="nofollow noopener" href="https://templatemo.com" class="tm-footer-link">Template Mo</a>
              </p>
          </div>
      </footer>
      </div>

      <script src="{{asset('js/jquery-3.3.1.min.js')}}"></script>
      <!-- https://jquery.com/download/ -->
      <script src="{{asset('js/moment.min.js')}}"></script>
      <!-- https://momentjs.com/ -->
      <script src="{{asset('js/Chart.min.js')}}"></script>
      <!-- http://www.chartjs.org/docs/latest/ -->
      <script src="{{asset('js/bootstrap.min.js')}}"></script>
      <!-- https://getbootstrap.com/ -->
      <script src="{{asset('js/tooplate-scripts.js')}}"></script>
      <script>
          Chart.defaults.global.defaultFontColor = 'white';
          let ctxLine,
              ctxBar,
              ctxPie,
              optionsLine,
              optionsBar,
              optionsPie,
              configLine,
              configBar,
              configPie,
              lineChart;
          barChart, pieChart;
          // DOM is ready
          $(function() {
              drawLineChart(); // Line Chart
              drawBarChart(); // Bar Chart
              drawPieChart(); // Pie Chart

              $(window).resize(function() {
                  updateLineChart();
                  updateBarChart();
              });
          })
      </script>
      </body>

      </html>