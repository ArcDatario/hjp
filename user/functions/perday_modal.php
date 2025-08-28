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
                <br><br>

                <form id="rentalForm" method="post">
                    <input type="hidden" id="perday_convert_start_date" name="perday_start_date">
                    <input type="hidden" id="perday_convert_end_date" name="perday_end_date">
                    <input type="hidden" id="perday_equipment_id" name="perday_equipment_id" style="border:1px solid black;">
                    <input type="hidden" id="perday_user_id" name="perday_user_id">
                    <input type="hidden" id="perday_equipment_rate_per_day" name="perday_rate_per_day">
                    <input type="hidden" id="perday_user_email" name="perday_user_email">
                    <input type="hidden" id="perday_days_summary_input" name="perday_days_summary_input">
                    <input type="hidden" id="perday_total_input" name="perday_total">

                </form>
                

                <div class="container">.
                <b><label id="perday_days_summary_text"></label></b>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="perday_rent_start_date" class="col-form-label">Start Date:</label>
                <input type="text" class="form-control" id="perday_rent_start_date"  name="perday_rent_start_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="Select Date..">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                            <label for="perday_rent_end_date" class="col-form-label">End Date:</label>
                <input type="text" class="form-control" id="perday_rent_end_date"  name="perday_rent_end_date" style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important;" placeholder="Select Date..">
                            </div>
                        </div>
                    </div>
                </div>
             
            </div>
            <div class="modal-footer">
                <h5 id="perday_total_text" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="rent_btn" class="btn" style="background-color: #E88A1A !important;">Rent</button>
            </div>
        </div>
    </div>
</div>
