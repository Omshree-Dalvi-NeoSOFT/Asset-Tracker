<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Asset Tracker</title>
    <!-- plugins:css -->
    @include('includes.head')
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_navbar.html -->
      @include('includes.nav')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_sidebar.html -->
        @include('includes.sidebar')
        <!-- partial -->
        <div class="main-panel">
          <div class="content-wrapper">
            <div class="row" id="proBanner">
              
            </div>
            <div class="page-header">
              <h3 class="page-title">
                <span class="page-title-icon bg-gradient-primary text-white mr-2">
                  <i class="mdi mdi-chart-bar"></i>
                </span> Assets Type
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Assets Table</h4>
                    <table class="table table-hover">
                      <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Asset Type</th>
                            <th>Asset Description</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach ($assets as $asset)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$asset['asset_type']}}</td>
                                <td>{{$asset['asset_description']}}</td>
                            </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>

          <table>  
          <div>
              {{$assets->links()}}
          </div>
          <style>
              .w-5{
                  display: none;
              }
          </style>

          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->
         @include('includes.footer')
          <!-- partial -->
        </div>
        <!-- main-panel ends -->
      </div>
      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('includes.foot')
    <!-- End custom js for this page -->
  </body>
</html>