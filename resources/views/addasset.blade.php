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
                </span> Add Asset 
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
              

            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                  <div class="card-body">
                    <h4 class="card-title">Asset</h4>
                    <p class="card-description"> Add Asset </p>
                    <form class="forms-sample" action="{{route('postAddAsset')}}" method="post" enctype="multipart/form-data">
                        @csrf()
                      <div class="form-group">
                        <label for="exampleInputName1">Asset Name</label>
                        <input type="text" class="form-control" id="exampleInputName1" placeholder="Asset Name" name="assetname">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectAssetType">Asset Type</label>
                        <select class="form-control" id="exampleSelectAssetType" name="assettype">
                            <!-- foreach render types  -->
                            <option default>Select </option>
                          @foreach ($types as $type)
                            <option value="{{$type['id']}}">{{$type['asset_type']}}</option>
                          @endforeach
                          
                        </select>
                      </div>                      
                      <div class="form-group">
                        <label>File upload</label>
                        <input type="file" name="img[]" class="form-control file-upload-info" multiple>
                      </div>
                      <div class="form-group">
                        <label for="exampleSelectGender">Is Active</label>
                        <select class="form-control" id="exampleSelectGender" name="isactive">
                            <!-- foreach render types  -->
                          <option value="1" selected>Active</option>
                          <option value="0">In Active</option>
                        </select>
                      </div>
                      
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