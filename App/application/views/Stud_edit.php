<div class="container bg-3">    
  <h3 class="margin">Students
  <a href="<?php echo site_url('/stud/');?>" class="btn btn-primary pull-right">Back</a>
  </h3>
  <div class="row">
    <div class="col-sm-6">  
    <?php echo validation_errors(); 
      
            echo form_open('Stud_controller/update_student'); 
         
            echo form_hidden('old_roll_no',$old_roll_no); 
            ?>
            <div class="form-group">
            <label for="roll_no">Roll No.</label>
            <input type="text" class="form-control" id="roll_no" value="<?php echo $records[0]->roll_no ?>" name="roll_no">
            </div>
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $records[0]->name ?>">
            </div>
            <button type="submit" class="btn btn-default btn-warning btn-block" id="submit">Edit</button>
          <?php 
            echo form_close();
         ?> 
</div>
  </div>
</div>
<br />
<br />