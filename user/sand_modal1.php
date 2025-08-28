<div class="modal fade" id="sandModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
            <button type="button" class="close" style="margin-left: 90%;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <img src="" id="sand_image" width="106%" height="300" style="margin-left: -3%; margin-top: -8%; border-radius: 15px; border: none;">
                <br>
                <h5 id="sand_name" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="rate_per_bucket" style="float: right; margin-right: 3%;"></h5>
                <br><br>
                
            <form method="post" id="order_form" action="insert_order.php">

                    <input type="hidden" id="sand_id" name="sand_id" style="border:1px solid black;">
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="hidden" id="user_email" name="user_email">
                    <input type="hidden" id="order_summary" name="order_summary">
                    <input type="hidden" id="order_total" name="order_total">
                    <input type="hidden" id="rate_per_bucket_input" name="rate_per_bucket_input">


                <div class="container">
                    <b><label for="" id="order_summary_text"></label></b>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="perload_rent_start_date" class="col-form-label">Quantity</label>
                            <input type="number" class="form-control" id="bucket_input" name="bucket_input"   style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important; text-align:center; font-size:1rem;" placeholder="Bucket qty" required>
                            </div>
                        </div>
            <div class="col-6">
                <div class="form-group">
                <label for="municipality" class="col-form-label">Municipality</label>
                <select class="form-control"required id="municipality" name="municipality" style="background: transparent; border: none; border-bottom: 1px solid #3B3E4B; border-radius: 1px !important; text-align: center; font-size: 1rem;" >

                <option disabled selected hidden>Choose..</option>
                <option value="Bansud" style="background:white;" id="arc">Bansud</option>
                <option value="Gloria" style="background:white;">Gloria</option>
                 <option value="Pinamalayan" style="background:white;">Pinamalayan</option>
                </select>
            </div>
            </div>

            <div class="col-6">
                <?php include "select_barangay.php";?>
            </div>
            
            <div class="col-12">
            <div class="input-group">
                <textarea required class="form-control" name="street" id="text_area" aria-label="With textarea" placeholder="Street , Sitio and sign/clue on your Place..."></textarea>
                </div>
                    </div>                   
                    </div>
                </div>
        
            </div>
            <div class="modal-footer">
                <h5 id="order_total_display" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="order_btn" class="btn" style="background-color: #E88A1A !important;">Order</button>
            </div>
            </form>
        </div>
    </div>
</div>




