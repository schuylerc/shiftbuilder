      <div id="page-wrapper" style="background-color:#dff0d8">

        <div class="row">
          <div class="col-lg-12">
            <h1 style="color:#303030;"><i class="fa fa-dashboard"></i> Dashboard  <button class="pull-right btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Create Event </button> </h1><br>
    
                          <script type="text/javascript">

                            function newEvent1(){

                            $.ajax({
                                type: 'POST',
                                url: '/dash/ajax_add_event',
                                data: { EventName: $("#EventName").val(), EventDate: $("#EventDate").val(),
                                        EventLocation: $("#EventLocation").val(), EventDesc: $("#EventDesc").val(),
                                        EventEndDate: $("#EventEndDate").val(), EventAddress: $('#EventAddress').val(), EventParking: $('#EventParking').val()
                                 },
                                beforeSend:function(){
                                  // this is where we append a loading image
                                  $('#eventStatus').html('<i class="glyphicon glyphicon-refresh"></i>&nbsp;Creating Event...');

                                },
                                success:function(data){
                                  // successful request; do something with the data
                                  $('#eventStatus').empty();
                                  //print result here
                                  $('#eventStatus').append('created successfully');
                                  window.location = '/event/edit/' + data;
                                
                                },
                                error:function(){
                                  // failed request; give feedback to user
                                  $('#eventStatus').append('An Error occured while creating this survey');
                                  
                                }
                                });
                              }
                          

                          </script>

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
  <script src="/assets/js/jquery-2.1.0.min.js"></script>
  <script type="text/javascript" src="http://cdn.knightlab.com/libs/timeline/latest/js/storyjs-embed.js"></script>
        <script>
            $(document).ready(function() {
                createStoryJS({
                    type:       'timeline',
                    width:      '800',
                    height:     '600',
                    source:     '<?php echo base_url();?>/dash/ajax_timeline_json',
                    embed_id:   'my-timeline'
                });
            });
        </script>
        <div class="col-lg-8 col-lg-offset-2">
          <div id="my-timeline" style="border: 0;"></div>
          <br/>
      </div>
</div>
</div>

 <div class="row">
        <?php 
  foreach ($event as $event_item) {
  ?>
  
          <div class="col-lg-6">

            <div class="event">

            <h2><a href='/event/view/<?php echo $event_item->handle; ?>'> <?php echo $event_item->event_name; ?> </a></h2>
            <h4> <strong>at</strong> <?echo $event_item->location;?> <strong>on</strong> <?php echo date("l, F jS, Y",strtotime($event_item->start_time)); ?></h4>
            <p> <?php echo $event_item->event_description; ?> </p>
          </div>
        </div>
<?php              
                
  }

?>
       
</div>



