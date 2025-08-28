<div class="modal fade" id="perHourModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
            <button type="button" class="close" style="margin-left: 90%;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <img src="" id="perhour_equipment_image" width="106%" height="300" style="margin-left: -3%; margin-top: -8%; border-radius: 15px; border: none;">
                <br>
                <h5 id="perhour_equipment_name" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perhour_equipment_year_model" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="perhour_rate_per_day_text" style="float: right; margin-right: 3%;"></h5>
                <br><br>
                <form method="post" id="perhour_form">
                    <input type="hidden" id="perhour_convert_start_date" name="perhour_start_date">
                    <input type="hidden" id="perhour_convert_end_date" name="perhour_end_date">

                    <input type="hidden" id="perhour_equipment_id" name="perhour_equipment_id" style="border:1px solid black;">

                    <input type="hidden" id="perhour_user_id" name="perhour_user_id">
                    <input type="hidden" id="perhour_equipment_rate_per_hour" name="perhour_rate_per_hour">
                    <input type="hidden" id="perhour_user_email" name="perhour_user_email">
                    <input type="hidden" id="perhour_hours_summary_input" name="perhour_days_summary">
                    <input type="hidden" id="perhour_total_input" name="perhour_total">
                    <input type="hidden" id="perhour_equipment_name_input" name="perhour_equipment_name_input">
 
                    
                </form>
                

                <div class="container">
                <b><label id="perhour_hours_summary_text"></label></b>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="perhour_rent_start_date" class="col-form-label">Start Date:</label>
                <input type="text" class="form-control" id="perhour_rent_start_date"  name="perhour_rent_start_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="Select Date..">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="perhour_rent_end_date" class="col-form-label">End Date:</label>
                <input type="text" class="form-control" id="perhour_rent_end_date"  name="perhour_rent_end_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="Select Date..">
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
            <div class="modal-footer">
                <h5 id="perhour_total_text" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="perhour_btn"  class="btn" style="background-color: #E88A1A !important;">Rent</button>
            </div>
        </div>
    </div>
</div>
