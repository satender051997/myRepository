<div class="container bg-3">    
  <h3 class="margin">Students
  <a href="<?php echo site_url('/stud/');?>" class="btn btn-primary pull-right">Back</a>
  </h3>
  <div class="row">
    <div class="col-sm-6">  
    <?php echo validation_errors(); ?>
         <?php 
            echo form_open('Stud_controller/add_student');?>
            <div class="form-group">
            <label for="roll_no">Roll No.</label>
            <input type="number" class="form-control" id="roll_no" placeholder="Enter Roll No." name="roll_no">
            </div>
            <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
            </div>
            <button type="submit" class="btn btn-default btn-warning" id="submit" >Add Record</button>
            
         <?php   
         echo form_close(); 
         ?> 
  </div>
  </div>
</div>
<br />
<br />