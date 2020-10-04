<?php
   require_once("header.php");
?>
      <!-- Page Content  -->
      <div id="content-page" class="content-page">
         <div class="container-fluid">
            <div class="row">
               <div class="col-sm-12">
                  <div class="iq-card">
                     <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                           <h4 class="card-title">Add Category</h4>
                        </div>
                     </div>
                     <div class="iq-card-body">
                        <div class="row">
                           <div class="col-lg-12">
                              <form action="category-list.html">
                                 <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Name">
                                 </div>
                                 <div class="form-group">
                                    <textarea id="text" name="text" rows="5" class="form-control"
                                    placeholder="Description"></textarea>
                                 </div>
                                 <div class="form-group radio-box">
                                    <label>Status</label>
                                    <div class="radio-btn">
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadio6" name="customRadio-1" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio6">enable</label>
                                       </div>
                                       <div class="custom-control custom-radio custom-control-inline">
                                          <input type="radio" id="customRadio7" name="customRadio-1" class="custom-control-input">
                                          <label class="custom-control-label" for="customRadio7">disable </label>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="form-group ">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-danger">cancel</button>
                                 </div>
                              </form>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Wrapper END -->
<?php
   require_once("footer.php");
?>