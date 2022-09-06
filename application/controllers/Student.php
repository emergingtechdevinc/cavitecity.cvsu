<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Student extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model("Student_Model");

    }

    public function index(){
		$this->load->view('student-portal/Login');
	}


	public function validate_login(){

        $this->form_validation->set_rules('username','Username','trim|required|max_length[9]');
        $this->form_validation->set_rules('password','Password','trim|required|max_length[16]');

        
		if($this->form_validation->run() == TRUE){

			$passVal = $this->input->post("password", TRUE);

			$result = $this->Student_Model->validate_login();

			if($result['success']==TRUE){

				$account_data = array(
					'student_id'         => $result['student_id'],
					'student_fn'         => $result['student_fn'],
					'student_mn'         => $result['student_mn'],
					'student_ln' 	     => $result['student_ln'],
					'student_course' 	 => $result['student_course'],
					'student_image'      => $result['student_image'],
					'schoolyear'         => $result['schoolyear'],
					'semester'           => $result['semester'],
					'curriculum'         => $result['curriculum'],
					'yearAdmitted'       => $result['yearAdmitted'],
					'semesterAdmitted'   => $result['semesterAdmitted'],
					'logged_in' 	     => TRUE
				);

				$this->session->set_userdata($account_data);

				redirect("student/dashboard","refresh");


			}else{

				$message = "Invalid user credential";
				echo "<script type='text/javascript'>alert('$message');</script>";
			}

			if($result['success']==FALSE){
				redirect("Student", "refresh");
			}


		}
		else{
			$message = "Invalid user credential";
			echo "<script type='text/javascript'>alert('$message');</script>";
			redirect("Student","refresh");
		}
        

    }


	 public function dashboard(){
        $this->load->view('student-portal/Dashboard');
    }


	public function information(){
        $currentUser = $this->session->student_id;
        $currentSY = $this->session->schoolyear;
        $currentSem = $this->session->semester;

        $query = $this->Student_Model->loadStudentInfo($currentUser);
        $module['sfData'] = $query;

        $query = $this->Student_Model->getYearLevelandSection($currentSY, $currentSem, $currentUser);
        $module['YLSData'] = $query;

        $query = $this->Student_Model->loadStudentEnroll($currentUser);
        $module['siData'] = $query;

        $currentUser = $this->session->student_id;
        $query = $this->Student_Model->loadLMSData($currentUser);
        $module['lmsData'] = $query;


        $this->load->view('student-portal/Information', $module);
    }


	public function schedule(){

        $currentUser = $this->session->student_id;

		$enrollment='CLOSE';
		
        if($enrollment=='OPEN'){

            $OldSY = $this->session->schoolyear;
            $ldSem = $this->session->semester;

            if($ldSem=='FIRST') {
                $currentSY = $OldSY;
                $currentSem = 'SECOND';
            } else {
                $currentSY = (intval(substr($OldSY, 0, 4)) + 1) . "-" . (intval(substr($OldSY, 5, 4)) + 1);
                $currentSem = 'FIRST';
            }

        }else{

            $currentSY = $this->session->schoolyear;
            $currentSem = $this->session->semester;

        }

		$module['studentid'] = $currentUser;
        $module['schoolyear'] = $currentSY;
        $module['semester'] = $currentSem;

        $schoolyear = $currentSY;
        $semester = $currentSem;
        $studentNumber = $currentUser;

        $query = $this->Student_Model->loadEnrolledSubject($currentSY, $currentSem, $currentUser);
        $module['subjData'] = $query;

        $query = $this->Student_Model->getYearLevelandSection($currentSY, $currentSem, $currentUser);
        $module['YLSData'] = $query;

        $query = $this->Student_Model->getFacultyName();
        $module['fData'] = $query;

        $query = $this->Student_Model->getScheduleBySectionWithTitle($schoolyear, $semester, $studentNumber);
        $module['schedData'] = $query;

        $this->load->view('student-portal/Schedule', $module);

    }

	public function loadSchedules(){

        $schoolyear = $this->input->post('schoolyear1');
        $semester = $this->input->post('semester1');
        $studentNumber = $this->input->post('studentid1');

        $fresult = array();
        $result = $this->Student_Model->getScheduleBySectionWithTitle($schoolyear, $semester, $studentNumber);
        $i1=0;

        $decodeData = json_decode(json_encode($result), true);

        foreach($decodeData as $res){
            $subj = array();
            $subj['title'] = $res['subjectcode'];
            $subj['subjtitle'] =$res['subjectTitle'];
            $subj['allday'] = false;
            $subj['color'] = $this->color($i1);
            $subj['schedules'] = array();
            if($res['day1'] != 'N/A'){
                $s1['room'] = $res['room1'];
                $s1['instructor'] = $res['instructor'];
                $s1['day'] = $res['day1'];
                $s1['start'] = $res['timein1'].':00';
                $s1['end'] = $res['timeout1'].':00';
                array_push($subj['schedules'],$s1);
            }
            if($res['day2'] != 'N/A'){
                $s1['room'] = $res['room2'];
                $s1['instructor'] = $res['instructor'];
                $s1['day'] = $res['day2'];
                $s1['start'] = $res['timein2'].':00';
                $s1['end'] = $res['timeout2'].':00';
                array_push($subj['schedules'],$s1);
            }
            if($res['day3'] != 'N/A'){
                $s1['room'] = $res['room3'];
                $s1['instructor'] = $res['instructor'];
                $s1['day'] = $res['day3'];
                $s1['start'] = $res['timein3'].':00';
                $s1['end'] = $res['timeout3'].':00';
                array_push($subj['schedules'],$s1);
            }
            if($res['day4'] != 'N/A'){
                $s1['room'] = $res['room4'];
                $s1['instructor'] = $res['instructor'];
                $s1['day'] = $res['day4'];
                $s1['start'] = $res['timein4'].':00';
                $s1['end'] = $res['timeout4'].':00';
                array_push($subj['schedules'],$s1);
            }
            array_push($fresult,$subj);

            $i1 ++;
        }

        echo json_encode($fresult);


    }

	public function color($i){
        $color = array("#06214c","#ff8000","#00b33c","#002db3","#cc8800","#0000cc","#803300","#00802b","#990099","#34d26");
        return $color[$i];
    }

    public function grades(){
        $currentUser = $this->session->student_id;
        $currentSY = $this->session->schoolyear;
        $currentSem = $this->session->semester;

        $query = $this->Student_Model->loadStudentSY($currentUser);
        $module['syData'] = $query;

        $query = $this->Student_Model->loadStudentSem($currentUser);
        $module['semData'] = $query;

        $query = $this->Student_Model->loadStudentGrades($currentSY, $currentSem, $currentUser);
        $module['gradesData'] = $query;

        $query = $this->Student_Model->getYearLevelandSection($currentSY, $currentSem, $currentUser);
        $module['YLSData'] = $query;


        $module['schoolyear'] = $currentSY;
        $module['semester'] = $currentSem;

        $this->load->view('student-portal/Grades', $module);
    }

    public function getSemester(){
        $currentStudent = $this->session->student_id;
        $schoolyear = $this->input->post('schoolyear',TRUE);
        $query = $this->Student_Model->getSemesterData($currentStudent, $schoolyear);
        echo json_encode($query);
    }

    public function view_grades(){

        $currentUser = $this->session->student_id;
        $currentSY = $this->input->post('schoolyear', true);
        $currentSem = $this->input->post('semester', true);

        $query = $this->Student_Model->loadStudentSY($currentUser);
        $module['syData'] = $query;

        $query = $this->Student_Model->loadStudentGrades($currentSY, $currentSem, $currentUser);
        $module['gradesData'] = $query;

        $query = $this->Student_Model->getYearLevelandSection($currentSY, $currentSem, $currentUser);
        $module['YLSData'] = $query;

        $module['schoolyear'] = $currentSY;
        $module['semester'] = $currentSem;

        $this->load->view('student-portal/Grades', $module);

    }

    public function checklist($studentID){

        $gCurriculum = $this->Student_Model->getCurriculumID($studentID);

        $cID = $gCurriculum['curriculumID'];

        $module['studentNum'] = $gCurriculum['studentNumber'];
        $module['studentName'] = $gCurriculum['firstName'] ." ". $gCurriculum['lastName'];
        $module['course'] = $gCurriculum['course'];

        $query = $this->Student_Model->loadStudentSY($studentID);
        $module['schoolYearData'] = $query;

        $module['Curriculum'] = $cID;

        $query = $this->Student_Model->courselist();
        $module['courseData'] = $query;
        $query = $this->Student_Model->loadYearAndSemester($cID);
        $module['ysData'] = $query;
        $query = $this->Student_Model->loadSubject($cID);
        $module['sData'] = $query;
        $query = $this->Student_Model->loadSubjectCode();
        $module['scData'] = $query;
        $query = $this->Student_Model->loadStudentGrade($studentID);
        $module['sgData'] = $query;

        $this->load->view('student-portal/Checklist', $module);
    }


  

}