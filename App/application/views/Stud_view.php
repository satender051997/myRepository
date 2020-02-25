<div class="container">
   <div class="form-group">
     <br />
     <br />
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Student name or rollno." class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
   <h3 class="margin">Students
  <a href="<?php echo site_url('/stud/add_view');?>" class="btn btn-primary pull-right">Add Record</a>
  </h3>
  </div>
  <div style="clear:both"></div>
  <script>
      $(document).ready(function(){

      load_data();

      function load_data(query)
        {
            $.ajax({
            url:"<?php echo site_url('Stud_controller/fetch');?>",
            method:"POST",
            data:{query:query},
            success:function(data){
              $('#result').html(data);
            }
            });
        }

        $('#search_text').keyup(function(){
          var search = $(this).val();
          if(search != '')
          {
          load_data(search);
          }
          else
          {
          load_data();
          }
          });
      });
</script>
  

      
            