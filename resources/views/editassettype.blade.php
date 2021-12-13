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
                  <i class="mdi mdi-plus"></i>
                </span> Add Asset Type
              </h3>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb">
                  <li class="breadcrumb-item active" aria-current="page">
                    <span></span>Overview <i class="mdi mdi-alert-circle-outline icon-sm text-primary align-middle"></i>
                  </li>
                </ul>
              </nav>
            </div>

            <div class="row">
            @if(Session::has('success'))
                <div class="alert alert-success"> {{Session::get('success')}} </div>
            @endif
            @if(Session::has('error'))
                <div class="alert alert-danger"> {{Session::get('error')}} </div>
            @endif
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Asset Type</h4>
                    <p class="card-description"> Add Asset Type </p>
                    <form class="forms-sample" action="{{route('postEditAssetType')}}" method="post">
                        @csrf()
                        <input type="hidden" value="{{$assettype['id']}}" name="id">
                      <div class="form-group">
                        <label for="exampleInputName1">Asset Type</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Asset Type" name="assettype" value="{{$assettype['asset_type']}}">
                      </div>
                      @if($errors->has('assettype'))
                            <label class="alert alert-danger">{{$errors->first('assettype')}}</label>
                        @endif

                      <div class="form-group">
                        <label for="exampleTextarea1">Asset Description</label>
                        <textarea class="form-control" id="exampleTextarea1" rows="4" name="assettypedescription">{{$assettype['asset_description']}}</textarea>
                      </div>
                      @if($errors->has('assettypedescription'))
                            <label class="alert alert-danger">{{$errors->first('assettypedescription')}}</label>
                        @endif

                      <button type="submit" class="btn btn-gradient-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>
                </div>
              </div>



            </div>
          </div>
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