<?php 
   class Stud_controller extends CI_Controller {
	
      function __construct() { 
         parent::__construct(); 
         $this->load->helper('url'); 
         $this->load->database(); 
      } 
  
      public function index() { 
         $query = $this->db->get("student"); //select query 
         $data['records'] = $query->result();
		   $this->load->helper('url'); 
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_view',$data); 
         $this->load->view('includes/footer',$data); 
      } 
      
      function fetch()
      {
       $output = '';
       $query = '';
       $this->load->model('Stud_Model');
       if($this->input->post('query'))
       {
        $query = $this->input->post('query');
       }
       $data = $this->Stud_Model->fetch_data($query);
       $output .= '
       <div class="table-responsive">
          <table class="table table-bordered table-striped" style="color:grey;">
           <tr>
            <th>Roll No</th>
            <th>Name</th>
            <th>Created Time</th>
            <th>Edit</th>
            <th>Delete</th>
           </tr>
       ';
       if($data->num_rows() > 0)
       {
        foreach($data->result() as $row)
        {
         $output .= '
           <tr>
            <td>'.$row->roll_no.'</td>
            <td>'.$row->name.'</td>
            <td>'.$row->created_time.'</td>
            <td><a href = '.site_url('stud/edit/'.$row->roll_no).'>Edit</a></td>
            <td><a href = '.site_url('stud/delete/'.$row->roll_no).'>Delete</a></td>
           </tr>
         ';
        }
       }
       else
       {
        $output .= '<tr>
            <td colspan="5">No Data Found</td>
           </tr>';
       }
       $output .= '</table>';
       echo $output;
      }
      
     
     

  
      public function add_student_view() { 
         $this->load->helper('form'); 
         $data['title'] = "Add Students";
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_add'); 
         $this->load->view('includes/footer',$data); 
      } 
  
      public function add_student() { 
         $this->load->model('Stud_Model');
         $this->load->helper(array('form'));
         $this->load->library('form_validation');
         $this->form_validation->set_rules('roll_no', 'Roll no', 'required|is_unique[student.roll_no]');
         $this->form_validation->set_rules('name', 'Name', 'required|regex_match[/^[A-Za-z]+$/]');
         date_default_timezone_set('Asia/Kolkata'); 
         if ($this->form_validation->run() == TRUE)
         {
            $data = array( 
               'roll_no' => $this->input->post('roll_no'), 
               'name' => $this->input->post('name'),
               'created_time'=>date('Y-m-d H:i:s',time()) 
            );
            $this->Stud_Model->insert($data); 
            redirect('stud');
         }
         $data['title'] = "Add Students";
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_add'); 
         $this->load->view('includes/footer',$data); 
      } 
  
      public function update_student_view() { 
         $this->load->helper('form'); 
         $roll_no = $this->uri->segment('3'); 
         $query = $this->db->get_where("student",array("roll_no"=>$roll_no));
         $data['records'] = $query->result(); 
         $data['old_roll_no'] = $roll_no; 
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_edit',$data); 
         $this->load->view('includes/footer',$data); 
      } 
  
      public function update_student(){ 
         
         $this->load->model('Stud_Model');
			$data = array( 
            'roll_no' => $this->input->post('roll_no'), 
            'name' => $this->input->post('name') 
         ); 
			
         $old_roll_no = $this->input->post('old_roll_no'); 
         $this->Stud_Model->update($data,$old_roll_no); 
			
         $query = $this->db->get("student");
         redirect('stud'); 
         $data['records'] = $query->result(); 
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_view',$data); 
         $this->load->view('includes/footer',$data); 
      } 
  
      public function delete_student() { 
         $this->load->model('Stud_Model'); 
         $roll_no = $this->uri->segment('3'); 
         $this->Stud_Model->delete($roll_no); 
   
         $query = $this->db->get("student");
         redirect('stud');
         $data['records'] = $query->result(); 
         $this->load->view('includes/header',$data); 
         $this->load->view('Stud_view',$data); 
         $this->load->view('includes/footer',$data); 
      } 
   } 
?>