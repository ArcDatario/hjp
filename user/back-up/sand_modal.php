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
                
                <form method="post" id="order_form" action="insert_order.php" enctype="multipart/form-data">
                    <input type="hidden" id="sand_id" name="sand_id" style="border:1px solid black;">
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="hidden" id="user_email" name="user_email">
                    <input type="hidden" id="user_municipality" name="user_municipality" value="<?php echo htmlspecialchars($_SESSION['municipality']); ?>">
                    <input type="hidden" id="user_barangay" name="user_barangay" value="<?php echo htmlspecialchars($_SESSION['barangay']); ?>">
                    <input type="hidden" id="user_details" name="user_details" value="<?php echo htmlspecialchars($_SESSION['details']); ?>">
                    <input type="hidden" id="order_summary" name="order_summary">
                    <input type="hidden" id="order_total" name="order_total">
                    <input type="hidden"   id="sand_name_input" name="sand_name">
                    <input type="hidden" id="rate_per_bucket_input" name="rate_per_bucket_input">

                    <div class="container">
                        <b><label for="" id="order_summary_text"></label></b>
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="perload_rent_start_date" class="col-form-label">Quantity</label>
                                    <input type="number" required class="form-control" id="bucket_input" name="bucket_input" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important; text-align:center; font-size:1rem;" placeholder="Bucket qty" required>
                                </div>
                            </div>
                            <div class="col-12">
                            <div class="form-group ">
                            <label for="receipt" class="col-form-label">Gcash Downpayment (Min.₱500) send to  <a href="gcash:09566320135" style="margin-top:2% !important; margin-left:42% !important;">09566320135</a>

                            </label>
                            
                            <input type="file"required class="form-control" id="sand_receipt"   name="gcash_receipt" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" accept="image/*" placeholder="Gcash Receipt here...">
                            
                            </div>
                            

                        </div>
                        
                        <div class="col-12" style="display: flex; align-items: left;">
                        <input type="checkbox" required name="tac" class="tac" id="tacsand" style="margin-left: 10px; width: 5%; height:15px;">

                         <a href="" style="margin-top:-1% !important">Terms and conditions</a>
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
</div>



<div class="modal fade tac-modal" id="termsModalsand" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>By placing an order for aggregates through our website, you agree to the following terms and conditions:</p>
<ul>
    <li><strong>Payment:</strong> A minimum downpayment of 500 pesos is required for your order. Please send the payment to the GCash number <strong>09566320135</strong>. After sending the payment, save the receipt and upload it through the provided input field on the website. Your order will not be confirmed until the receipt is received and verified.</li>
    <li><strong>Order Confirmation:</strong> Once your downpayment is received and verified, your order will be approved. Please note that once your order is confirmed, it cannot be canceled. The order agreement is binding, and cancellations will not be accepted under any circumstances after approval. Refunds will not be provided once the order is confirmed.</li>
    <li><strong>Balance Payment:</strong> The remaining balance for your order must be paid on or before the specified due date. **Your approved downpayment will be deducted from the remaining balance.** Failure to pay the balance within the specified time frame may result in legal action in accordance with applicable laws.</li>
</ul>

<br><br>

<h5>HJP Management Information</h5>

<div class="alert alert-info" role="alert">
    <strong>Important Notice:</strong><br>
    HJP Construction accepts online bookings for aggregate orders from <strong>6:00 AM to 3:00 PM</strong>. If you place your order outside of these hours, please expect a delay in the approval process. We appreciate your understanding and cooperation.
</div>

<div class="alert alert-info" role="alert">
    <strong>Delivery Schedule:</strong><br>
    The delivery schedule for your aggregates order will be between <strong>6:00 AM and 11:30 AM</strong>. You will receive an email notification from management once your order is on its way. Please plan accordingly and thank you for your understanding.
</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="acceptTermssand">I Accept</button>
            </div>
        </div>
    </div>
</div>





<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get the checkbox and modal elements
    var tacCheckbox = document.getElementById('tacsand'); // Assuming this is your checkbox
    var termsModal = new bootstrap.Modal(document.getElementById('termsModalsand')); // Bootstrap modal instance
    var acceptButton = document.getElementById('acceptTermssand');

    // Flag to track if the checkbox has been clicked (initial click)
    var checkboxClicked = false;

    // Add event listener to the checkbox
    tacCheckbox.addEventListener('click', function() {
        if (!checkboxClicked) {
            checkboxClicked = true; // Set the flag to true after the first click
            termsModal.show(); // Show the modal
            tacCheckbox.checked = false; // Ensure the checkbox is not checked when clicked
        }
    });

    // Add event listener for the "I Accept" button in the modal
    acceptButton.addEventListener('click', function() {
        tacCheckbox.checked = true; // Programmatically check the checkbox when the user accepts
        termsModal.hide(); // Hide the modal
    });
});






</script>
