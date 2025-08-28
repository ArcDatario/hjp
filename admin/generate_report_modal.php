<div class="modal fade" id="reportModal">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius: 15px !important; margin-top: 15%;">
           
            <div class="modal-body">
                <h5 id="reportText">Generate Report</h5>
                
                <br><br>
                <form method="post" id="generate_report_form">
                        <input type="hidden" id="start_date" name="start_date">
                        <input type="hidden" id="end_date" name="end_date">        
                <div class="container">
                    <b><label for="" id="report_duration"></label></b>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                            <label for="start_date_calendar" class="col-form-label">Start Date:</label>
                            <input type="text" class="form-control" id="start_date_calendar" name="start_date_calendar"   style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important; text-align:center; font-size:1.3rem;">
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                            <label for="end_date_calendar" class="col-form-label">End Date:</label>
                            <input type="text" class="form-control" id="end_date_calendar" name="end_date_calendar"  style="background:transparent; border:none; border-bottom:1px solid #3B3E4B; border-radius:1px !important; text-align:center; font-size:1.3rem;">
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="modal-footer">
                <h5 id="load_total" style="margin-right: 15% !important; text-decoration: underline;"></h5>
                <button type="button" id="close_modal_btn" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" id="generate_btn" class="btn" style="background-color: #E88A1A !important;">Generate</button>
            </div>
            </form>
        </div>
    </div>
</div>
