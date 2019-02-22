<!-- ADD DONATION MODAL START -->
<div class="modal fade" id="DonationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Add donation
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="register-form">
                    <form action="javascript:void(0)" method="post" enctype="multipart/form-data" class="AddData">
                        @csrf
                        <div class="fields-grid">
                            <div class="styled-input">
                                <input type="hidden" name="user_id" value="{{ Auth::id() }}" readonly="" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="styled-input">
                                <select name="category_id" class="form-control cat-data">
                                  
                                </select>
                            </div>
                            <div class="styled-input">
                                <input type="text" name="city"  class="form-control" id="city" placeholder="City">
                            </div>
                            <div class="styled-input">
                                <input type="text" name="state" placeholder="State"  class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="styled-input">
                                <input type="file" name="image[]" multiple=""   id="exampleInputPassword1" >
                            </div>                            
                            <button type="submit" class="btn btn-default sb_bttn  mt-3 " name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--  modal end -->

<!-- EDIT DONATION DATA MODAL START -->
<div class="modal fade" id="EditDonationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Edit Donation Data
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="register-form">
                    <form action="javascript:void(0)" method="post" enctype="multipart/form-data" class="UpdateData">
                        @csrf
                        <div class="fields-grid">
                            <div class="styled-input">
                                <input type="hidden" name="id" id="donation-id" readonly="" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="styled-input">
                                <input type="hidden" name="user_id" id="user-id" value="{{ Auth::id() }}" readonly="" class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="styled-input">
                                <select name="category_id" id="category-id" class="form-control cat-data">
                                  
                                </select>
                            </div>
                            <div class="styled-input">
                                <input type="text" name="city" id="user-city"  class="form-control"  placeholder="City">
                            </div>
                            <div class="styled-input">
                                <input type="text" name="state" id="state" placeholder="State"  class="form-control" id="exampleInputPassword1" >
                            </div>
                            <div class="styled-input" class="DonationImage">
                                <input type="file" name="image[]" multiple=""   id="exampleInputPassword1" >
                                <div class="viewimages">
                                    
                                </div>
                             </div>                            
                            <button type="submit" class="btn btn-default sb_bttn updateData  mt-3 " name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--  modal end -->

<!-- ADD CATEGORY MODAL START -->
<div class="modal fade" id="CategoryModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">
                    Add Category
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="register-form">
                    <form action="javascript:void(0)" method="post" enctype="multipart/form-data" class="AddCatData">
                        @csrf
                        
                            <div class="styled-input">
                                <input type="text" name="product_name"  class="form-control" id="city" placeholder="Product_name">
                            </div>
                        <div class="styled-input">
                        <select name="data_id" class="catData">
                            
                        </select>
                        </div>                       
                            <button type="submit" class="btn btn-default sb_bttn  mt-3 " name="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

            </div>
        </div>
    </div>
</div>
<!--  modal end -->

