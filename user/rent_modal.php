<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
            <button type="button" class="close" style="margin-left: 90%;" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <div class="modal-body">
                <img src="" id="equipment_image" width="106%" height="300" style="margin-left: -3%; margin-top: -8%; border-radius: 15px; border: none;">
                <br>
                <h5 id="equipment" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="year_model" style="float: left !important; margin-left: 3%;"></h5>
                <h5 id="rate_per_day_text" style="float: right; margin-right: 3%;"></h5>
                <br><br>
                <form id="rentalForm" method="post">
                    <input type="hidden" id="convert_start_date" name="start_date">
                    <input type="hidden" id="convert_end_date" name="end_date">

                    <input type="hidden" id="equipment_id" name="equipment_id" style="border:1px solid black;">

                    <input type="hidden" id="user_id" name="user_id">
                    <input type="hidden" id="rate_per_day" name="rate_per_day">
                    <input type="hidden" id="user_email" name="user_email">
                    <input type="hidden" id="days_summary_text" name="days_summary">
                    <input type="hidden" id="total_input" name="total">
                    
                   
                </form>
                <label for="range_date" id="days_summary">Date Duration:</label>
                <input type="text" id="range_date"  style="font-size: 1rem; background-color: transparent; border-bottom: 0.8px solid black !important; width: 75%;" placeholder="Select Date..">
                <br>
            </div>
            <div class="modal-footer">
                <h5 id="total" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="rent_btn" class="btn" style="background-color: #E88A1A !important;">Rent</button>
            </div>
        </div>
    </div>
</div>
