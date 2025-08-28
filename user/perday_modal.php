<div class="modal fade" id="perDayModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
            <button type="button" class="close" style="margin-left: 90%;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <img src="" id="perday_equipment_image" width="106%" height="300" style="margin-left: -3%; margin-top: -8%; border-radius: 15px; border: none;">
                <br>
                <h5 id="perday_equipment_name" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perday_equipment_year_model" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perday_rate_per_day_text" style="float: right; margin-right: 3%;"></h5>
                <br>

                <form id="rentalForm" method="post">
                    <input type="hidden" id="perday_convert_start_date" name="perday_start_date">
                    <input type="hidden" id="perday_convert_end_date" name="perday_end_date">
                    <input type="hidden" id="perday_equipment_id" name="perday_equipment_id" style="border:1px solid black;">
                    <input type="hidden" id="perday_user_id" name="perday_user_id">
                    <input type="hidden" id="perday_equipment_rate_per_day" name="perday_rate_per_day">
                    <input type="hidden" id="perday_user_email" name="perday_user_email">
                    <input type="hidden" id="perday_user_municipality" name="perday_user_municipality">
                    <input type="hidden" id="perday_user_barangay" name="perday_user_barangay">
                    <input type="hidden" id="perday_user_details" name="perday_user_details">
                    <input type="hidden" id="perday_days_summary_input" name="perday_days_summary_input">
                    <input type="hidden" id="perday_total_input" name="perday_total">
                    <input type="hidden" id="perday_equipment_name_input" name="perday_equipment_name_input">
          
                    

                <div class="container">
                <b><label id="perday_days_summary_text"></label></b>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                           
                                <input type="text" class="form-control" id="perday_rent_start_date"  name="perday_rent_start_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="Start Date..">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                           
                            <input type="text" class="form-control" id="perday_rent_end_date"  name="perday_rent_end_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="End Date..">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group ">
                            <label for="receipt" class="col-form-label">Gcash Downpayment (Min.₱500) send to  <a href=" " style="margin-top:2% !important; margin-left:42% !important;">09566320135</a>

                            </label>
                            
                            <input type="file" class="form-control" id="perday_receipt" required required name="gcash_receipt" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" accept="image/*" placeholder="Gcash Receipt here...">
                            
                            </div>
                            
                            
                        </div>
                        
                        <div class="col-12" style="display: flex; align-items: left;">
                        <input type="checkbox" name="tac" required class="tac" id="tac" style="margin-left: 10px; width: 5%; height:15px;">

                         <a href="" style="margin-top:-1% !important">Terms and conditions</a>
                        </div>

                    </div>
                   
                </div>
                
            </div>
            <div class="modal-footer">
                <h5 id="perday_total_text" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="rent_btn" class="btn" style="background-color: #E88A1A !important;">Rent</button>
            </div>
           </form>
        </div>
    </div>
</div>

<div class="modal fade tac-modal" id="termsModalperday" tabindex="-1" aria-labelledby="termsModalLabel" aria-hidden="true">
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
                    <li><strong>Balance Payment:</strong> At the end of your1111 equipment rental duration, you will be required to pay the remaining balance for the equipment. 
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
                <button type="button" class="btn btn-primary" id="acceptTermsperday">I Accept</button>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener('DOMContentLoaded', function () {
    // Get the checkbox and modal elements
    var tacCheckbox = document.getElementById('tac'); // Assuming this is your checkbox
    var termsModal = new bootstrap.Modal(document.getElementById('termsModalperday')); // Bootstrap modal instance
    var acceptButton = document.getElementById('acceptTermsperday');

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

