<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        date_default_timezone_set("Asia/Calcutta");
    }

	public function index()
	{
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function studentData(){

		/*start pagination section*/
		$config = array();
        $config["base_url"] ='#';
		$config['use_page_numbers'] = TRUE;
        $config["total_rows"] = $this->db->count_all('student');
        $config["per_page"] = 5;
        $config['full_tag_open']    = '<nav><ul class="pagination">';
        $config['full_tag_close']   = '</ul></nav>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tag_close']  = '<span aria-hidden="true"></span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tag_close']  = '</span></li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tag_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tag_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
		$page = $this->uri->segment(2);
         $start = ($page - 1) * $config['per_page'];
        $data = $this->db->limit($config["per_page"],$start)->get('student')->result();
        $links = $this->pagination->create_links();
       /*end pagination section*/

		$i = 1;
		$row = '';
		foreach($data as $val){
		$row .= ' <tr>
		<th>'.$i.'</th>
		<td><a href="javascript:void(0);" onclick="show('.$val->id.')">'.ucfirst($val->student_name).'</a></td>
		<td>'.$val->email.'</td>
		<td>'.$val->phone_no.'</td>
		<td>'.$val->class.'</td>
		<td>'.$val->marks.' % </td>
		<td><a href="javascript:void(0);" class="btn btn-info btn-sm" onclick="edit('.$val->id.')">Edit</a></td>
		</tr>';
		$i++;

		}
		exit(json_encode(['data'=>$row,'links'=>$links]));
	}



	public function student_details(){
	    $id = $this->input->post('id');
		$resutl = $this->db->where('id',$id)->get('student')->row();
		die(json_encode($resutl));
	}



	public function edit(){
	    $id = $this->input->post('id');
		$resutl = $this->db->where('id',$id)->get('student')->row();

		die(json_encode($resutl));
	}

	public function save(){

		$id = $this->input->post('id');

		$this->form_validation->set_rules('student_name', 'Student Name', 'required');
		$this->form_validation->set_rules('father_name', 'Father Name', 'required');
		$this->form_validation->set_rules('marks', 'Marks', 'required|numeric');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('state', 'State', 'required');
		$this->form_validation->set_rules('pin', 'Pin', 'required|numeric');
		$this->form_validation->set_rules('class', 'Class', 'required|numeric');
		if($id){
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone_no', 'Phone No', 'required|numeric|min_length[10]|max_length[10]');
		}else{
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[student.email]');
			$this->form_validation->set_rules('phone_no', 'Phone No', 'required|numeric|is_unique[student.phone_no]|min_length[10]|max_length[10]');
		}
       
        if ($this->form_validation->run() == FALSE) {
            $errMsg = [
                'student_name' => form_error('student_name'),
                'email' => form_error('email'),
				'phone_no' => form_error('phone_no'),
                'father_name' => form_error('father_name'),
				'city' => form_error('city'),
                'state' => form_error('state'),
				'pin' => form_error('pin'),
				'marks' => form_error('marks'),
				'class' => form_error('class'),
                'errorType' => 'errorMsg'
            ];
        } else {

			$id = $this->input->post('id');

			$dataArr = [
				'student_name'=>$this->input->post('student_name'),
				'father_name'=>$this->input->post('father_name'),
				'dob'=>$this->input->post('dob'),
				'address'=>$this->input->post('address'),
				'city'=>$this->input->post('city'),
				'state'=>$this->input->post('state'),
				'pin'=>$this->input->post('pin'),
				'phone_no'=>$this->input->post('phone_no'),
				'email'=>$this->input->post('email'),
				'class'=>$this->input->post('class'),
				'marks'=>$this->input->post('marks'),
				'date_enrolled'=>date('Y-m-d H:i:s')
			];

			if(empty($id)){
				$result = $this->db->insert('student', $dataArr);
				$text = 'Added';
			}else{
				$result = $this->db->where('id',$id)->update('student', $dataArr);
				$text = 'Updated';
			}
            if ($result) {

                $errMsg = array('status' => "success", 'text' => "Student $text Successfully!",'dismis' => true);
            } else {
                $errMsg = array('status' => 'error', 'text' => "Student Not $text!",'dismis' => true);
            }
	}
	die(json_encode($errMsg));
	}
}
