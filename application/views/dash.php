      <div id="page-wrapper" style="background-color:#dff0d8">

        <div class="row">
          <div class="col-lg-12">
            <h1 style="color:#303030;"><i class="fa fa-dashboard"></i> Dashboard  <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Create Event </button> </h1><br>
    
          
            <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        <h4 class="modal-title" id="myModalLabel">Create your event</h4>
                      </div>
                      <div class="modal-body">
                        
                          <div class="form-horizontal">
                          <fieldset>

                          <!-- Form Name -->
                          
                          

                          <!-- Text input-->
                          <div class="control-group">
                            <label class="control-label" for="Event Name">Event Name</label>
                            <div class="controls">
                              <input id="EventName" name="EventName" type="text" placeholder="Event Name" class="input-medium" required="">
                              
                            </div>
                          </div>

                          <!-- Text input-->
                          <div class="control-group">
                            <label class="control-label" for="textinput">Event Start Date</label>
                            <div class="controls">
                              <input id="EventDate" name="EventDate" type="date" placeholder="mm/dd/yyyy" class="input-xlarge" required="">
                              
                            </div>
                          </div>

                           <div class="control-group">
                            <label class="control-label" for="textinput">Event Start Time</label>
                            <div class="controls">
                              <input id="startTime" name="startTime" type="time" placeholder="hh:mm" class="input-xlarge" required="">
                             
                            </div>
                          </div>

                          <div class="control-group">
                            <label class="control-label" for="textinput">Event End Date</label>
                            <div class="controls">
                              <input id="EventEndDate" name="EventEndDate" type="date" placeholder="mm/dd/yyyy" class="input-xlarge" required="">
                            
                            </div>
                          </div>

                           <div class="control-group">
                            <label class="control-label" for="textinput">Event End Time</label>
                            <div class="controls">
                              <input id="endTime" name="endTime" type="time" placeholder="hh:mm" class="input-xlarge" required="">
                            
                            </div>
                          </div>

                          <!-- Text input-->
                          <div class="control-group">
                            <label class="control-label" for="Event Location">Event Address</label>
                            <div class="controls">
                              <input id="EventLocation" name="EventLocation" type="text" placeholder="123 Main St. " class="input-medium">
                          
                            </div>
                          </div>

                          <!-- Textarea -->
                          <div class="control-group">
                            <label class="control-label" for="textinput">Event Description</label>
                            <div class="controls">                     
                              <textarea id="EventDesc" name="EventDesc" placeholder = "event description"></textarea>
                            </div>
                          </div>
                          
                          <!-- Textarea -->
                          <div class="control-group">
                            <label class="control-label" for="textinput">Event Parking</label>
                            <div class="controls">                     
                              <textarea id="EventParking" name="EventParking" placeholder = "Lot C"></textarea>
                            </div>
                          </div>
                          
                          <!-- Textarea -->
                          <div class="control-group">
                            <label class="control-label" for="textinput">Event Building Location</label>
                            <div class="controls">                     
                              <textarea id="EventAddress" name="EventAddress" placeholder = "The Hub Ballroom"></textarea>
                            </div>
                          </div>

                          <!-- Button -->
                         

                          </fieldset>

                          </div>

                          <div id="eventStatus"></div>

                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button"  onclick="newEvent1();" class="btn btn-primary">Save changes</button>



                      </div>
                    </div>
                  </div>
                </div>

          </div>
        </div><!-- /.row -->

<div class="row hidden-xs">
<div class="col-lg-12">

        <div class="col-lg-8 col-lg-offset-2">
          <div id="my-timeline" style="border: 0;"></div>
          <br/>
      </div>
</div>
</div>

 


