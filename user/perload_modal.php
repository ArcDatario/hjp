<div class="modal fade" id="perLoadModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
            <button type="button" class="close" style="margin-left: 90%;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <img src="" id="perload_equipment_image" width="106%" height="300" style="margin-left: -3%; margin-top: -8%; border-radius: 15px; border: none;">
                <br>
                <h5 id="perload_equipment_name" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perload_equipment_year_model" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perload_rate_per_load_text" style="float: right; margin-right: 3%;"></h5>
                <br><br>
                <form method="post" id="perload_form">
                   
                                  
                    <input type="hidden" id="perload_equipment_id" name="perload_equipment_id" style="border:1px solid black;">
                    
                    <input type="hidden" id="perload_user_id" name="perload_user_id">
                    <input type="hidden" id="perload_equipment_rate_per_load" name="perload_equipment_rate_per_load">
                    <input type="hidden" id="perload_user_email" name="perload_user_email">
                    <input type="hidden" id="perload_user_municipality" name="perload_user_municipality">
                    <input type="hidden" id="perload_user_barangay" name="perload_user_barangay">
                    <input type="hidden" id="perload_user_details" name="perload_user_details">
                    <input type="hidden" id="perload_total_input" name="perload_total_input">

                    <input type="hidden" id="perload_load_summary_input" name="perload_total">
                    
                    <input type="hidden" id="equipment_load" name="per_load">
                    <input type="hidden" id="perload_equipment_name_input" name="perload_equipment_name_input">
                
                
                <div class="container">
                    <b><label for="" id="load_summary_text"></label></b>
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                            <label for="perload_rent_start_date" class="col-form-label">Load Quantity</label>
                            <input type="number" class="form-control" id="perload_input"   style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important; text-align:center; font-size:1.3rem;" placeholder="Load qty">
                            </div>
                        </div>

                         <div class="col-12">
                            <div class="form-group ">
                            <label for="receipt" class="col-form-label">Gcash Downpayment (Min.₱500) send to  <a href="gcash:09566320135" style="margin-top:2% !important; margin-left:42% !important;">09566320135</a>

                            </label>
                            
                            <input type="file" class="form-control" id="receipt" required required name="gcash_receipt" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" accept="image/*" placeholder="Gcash Receipt here...">
                            
                            </div>
                            
                            
                        </div>
                        
                        <div class="col-12" style="display: flex; align-items: left;">
                        <input type="checkbox" name="tac" required class="tac" id="tacperload" style="margin-left: 10px; width: 5%; height:15px;">

                         <a href="" style="margin-top:-1% !important">Terms and conditions</a>
                        </div>
                        
                    </div>
                </div>
             
            </div>
            <div class="modal-footer">
                <h5 id="load_total" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="perload_btn" class="btn" style="background-color: #E88A1A !important;">Rent</button>
            </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade tac-modal" id="termsModalperload" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsModalLabel">Terms and Conditions</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <p>By renting an equipment through our website, you agree to the following terms and conditions:</p>
                <ul>
               
                    <li><strong>Payment:</strong> You are required to send a minimum of 500 pesos as a downpayment for your equipment rental. 
                        Please send the payment to the GCash number <strong>09566320135</strong>. 
                        After sending the payment, save the receipt and upload it through the provided input field on the website. Your rental will not be confirmed until the receipt is received and verified.</li>
                    <li><strong>Rental Confirmation:</strong> Once your downpayment is received and verified, your rental will be approved. 
                        Please note that once your rental has been confirmed, it cannot be canceled. 
                        The rental agreement is binding, and cancellations will not be accepted under any circumstances after approval.Refund will be void once the rent has been approved</li>
                    <li><strong>Balance Payment:</strong> At the end of your equipment rental duration, you will be required to pay the remaining balance for the equipment. 
                        The remaining balance must be paid on or before the due date. **Your approved downpayment will be deducted from the remaining balance.** 
                        Failure to pay the balance within the specified time frame will result in legal action as per applicable laws.</li>
                  <br><br>
                        <h5>HJP Management Information</h5>
                        <div class="alert alert-info" role="alert">
                    <strong>Important Notice:</strong><br>
                    HJP Construction is only available online for bookings from <strong>6:00 AM to 3:00 PM</strong>. 
                    If you book your rental request outside of these hours, please expect a delay in the approval of your rental. 
                    We appreciate your understanding and cooperation.
                </div>
 
                <div class="alert alert-info" role="alert">
                    <strong>Per Day Rate:</strong><br>
                    The daily rate for equipment rental is based on a total of <strong>8 hours</strong> of use. Your equipment will arrive at <strong>7:00 AM</strong> and be done by <strong>4:00 PM</strong>. 
                    Please note that the equipment, including the operator, will have a lunch break from <strong>12:00 PM to 1:00 PM</strong>. 
                    This schedule should be considered when planning your equipment usage. Thank you for your understanding.
                </div>

                </ul>


            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="acceptTermsperload">I Accept</button>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get the checkbox and modal elements
    var tacCheckbox = document.getElementById('tacperload'); // Assuming this is your checkbox
    var termsModal = new bootstrap.Modal(document.getElementById('termsModalperload')); // Bootstrap modal instance
    var acceptButton = document.getElementById('acceptTermsperload');

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