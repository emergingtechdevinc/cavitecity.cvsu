<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student_Model extends CI_Model
{

    function __construct(){
        parent::__construct();
        $this->hr = $this->load->database('hr', TRUE);
    }


    public function validate_login()
    {
        $result = array();
        $student_id = array();
        $student_fn = array();
        $student_mn = array();
        $student_ln = array();
        $student_course = array();
        $student_image = array();
        $schoolyear = array();
        $semester = array();
        $curriculum = array();
        $yearAdmitted = array();
        $semesterAdmitted = array();

        $password = md5($this->input->post("password", TRUE));

        /* ADMIN LOGIN VALIDATION */

        $this->db->where('studentNumber', $this->input->post("username", TRUE));
        $this->db->where('web_password', $password);

        $admin_account = $this->db->get("enrollstudentinformation");

        if ($admin_account->num_rows() == 1) {

            $rs = $admin_account->row();
            $result = true;
            $student_id = $rs->studentNumber;
            $student_fn = $rs->firstName;
            $student_mn = $rs->middleName;
            $student_ln = $rs->lastName;
            $student_course = $rs->course;
            $student_image = $rs->image;
            $curriculum = $rs->curriculumid;
            $yearAdmitted = $rs->yearAdmitted;
            $semesterAdmitted = $rs->SemesterAdmitted;

            $currentSYS = $this->db->get('legend');
            if($currentSYS->num_rows() == 1){
                $data =  $currentSYS->row();
                $schoolyear = $data->schoolyear;
                $semester = $data->semester;
            }
    

        } else {
            $result = false;
        }




        return array(
            'success' => $result,
            'student_id' => $student_id,
            'student_fn' => $student_fn,
            'student_mn' => $student_mn,
            'student_ln' => $student_ln,
            'student_course' => $student_course,
            'student_image' => $student_image,
            'schoolyear' => $schoolyear,
            'semester' => $semester,
            'curriculum' => $curriculum,
            'yearAdmitted' => $yearAdmitted,
            'semesterAdmitted' => $semesterAdmitted
        );

    }



    public function loadStudentInfo($currentStudent){
        
        $this->db->select('*');
        $this->db->from('enrollstudentinformation');
        $this->db->where('studentNumber', $currentStudent);
        $query = $this->db->get();
        return $query->result();
      

    }

    public function loadLMSData($currentUser){

       
        $this->db->select('*');
        $this->db->from('cvsu_lmsinfo');
        $this->db->where('profile_field_studentno', $currentUser);
        $query = $this->db->get();
        return $query->result();
        

    }

    public function loadStudentEnroll($currentStudent){
        
        $this->db->select('MAX(yearLevel) AS ylevel, enrollcoursetbl.courseTitle, enrollstudentenroll.majorCourse');
        $this->db->from('enrollstudentenroll');
        $this->db->join('enrollcoursetbl','enrollcoursetbl.courseCode = enrollstudentenroll.coursenow');
        $this->db->where('enrollstudentenroll.studentNumber', $currentStudent);
        $query = $this->db->get();
        return $query->result();
        

    }


    public function getYearLevelandSection($sy, $sem, $currentStudent){

        $this->db->select('enrollscheduletbl.section, COUNT(enrollscheduletbl.section) AS sectionCount');
        $this->db->from('enrollgradestbl');
        $this->db->join('enrollscheduletbl', 'enrollscheduletbl.schedcode = enrollgradestbl.schedcode');
        $this->db->where('enrollgradestbl.studentnumber', $currentStudent);
        $this->db->where('enrollgradestbl.schoolyear', $sy);
        $this->db->where('enrollgradestbl.semester', $sem);
        $this->db->group_by('enrollscheduletbl.section');
        $this->db->order_by('sectionCount', 'ASC');
        $query = $this->db->get();
        return $query->result();
        
    }

    public function loadEnrolledSubject($currentSY, $currentSem, $currentUser){

        $this->db->select('enrollsubjectenrolled.schedcode, enrollscheduletbl.subjectCode, enrollsubjectstbl.subjectTitle, enrollscheduletbl.units, enrollscheduletbl.instructor, enrollscheduletbl.gclassroomcode, enrollscheduletbl.gclassmeetlink, enrollscheduletbl.gclasssinvitelink');
        $this->db->from('enrollsubjectenrolled');
        $this->db->join('enrollscheduletbl', 'enrollscheduletbl.schedcode = enrollsubjectenrolled.schedcode', 'left');
        $this->db->join('enrollsubjectstbl', 'enrollsubjectstbl.subjectcode = enrollscheduletbl.subjectCode');
        $this->db->where('enrollsubjectenrolled.studentnumber', $currentUser);
        $this->db->where('enrollsubjectenrolled.schoolyear', $currentSY);
        $this->db->where('enrollsubjectenrolled.semester', $currentSem);
        $query = $this->db->get();
        return $query->result();

    }

    public function getFacultyName(){
        $this->hr->select('*');
        $this->hr->from('employee');
        $query = $this->hr->get();
        return $query->result();
    }


    public function getScheduleBySectionWithTitle($schoolyear, $semester, $studentNumber){

        $this->db->select('enrollscheduletbl.subjectcode, enrollscheduletbl.section, enrollscheduletbl.instructor, enrollscheduletbl.room1, enrollscheduletbl.room2, enrollscheduletbl.room3, enrollscheduletbl.room4, enrollscheduletbl.timein1, enrollscheduletbl.timeout1, enrollscheduletbl.day1, enrollscheduletbl.timein2, enrollscheduletbl.timeout2, enrollscheduletbl.day2, enrollscheduletbl.timein3, enrollscheduletbl.timeout3, enrollscheduletbl.day3, enrollscheduletbl.timein4, enrollscheduletbl.timeout4, enrollscheduletbl.day4, enrollsubjectstbl.subjectTitle');
        $this->db->from('enrollscheduletbl');
        $this->db->join('enrollevaluatesubjectstbl', 'enrollevaluatesubjectstbl.schedcode = enrollscheduletbl.schedcode');
        $this->db->join('enrollsubjectstbl', 'enrollsubjectstbl.subjectcode = enrollscheduletbl.subjectCode');
        $this->db->where('enrollscheduletbl.schoolyear', $schoolyear);
        $this->db->where('enrollscheduletbl.semester', $semester);
        $this->db->where('enrollevaluatesubjectstbl.studentNumber', $studentNumber);
        $query = $this->db->get();
        return $query->result();
        
    }


    public function loadStudentSY($studentID){
        
        $this->db->select('schoolyear');
        $this->db->distinct();
        $this->db->from('enrollgradestbl');
        $this->db->where('studentnumber', $studentID);
        $this->db->order_by('schoolyear', 'ASC');
        $query = $this->db->get();
        return $query->result();
       
    }


    public function loadStudentSem($currentStudent){
        
        $this->db->select('semester');
        $this->db->distinct();
        $this->db->from('enrollgradestbl');
        $this->db->where('studentnumber', $currentStudent);
        $query = $this->db->get();
        return $query->result();
       
    }

    public function loadStudentGrades($sy, $sem, $currentStudent){
        
        $this->db->select('enrollgradestbl.schedcode, enrollgradestbl.subjectcode, enrollgradestbl.units, enrollgradestbl.mygrade, enrollgradestbl.makeupgrade, enrollsubjectstbl.subjectTitle');
        $this->db->distinct();
        $this->db->from('enrollgradestbl');
        $this->db->join('enrollsubjectstbl', 'enrollsubjectstbl.subjectcode = enrollgradestbl.subjectcode');
        $this->db->where('studentnumber', $currentStudent);
        $this->db->where('schoolyear', $sy);
        $this->db->where('semester', $sem);
        $query = $this->db->get();
        return $query->result();
        
    }

    public function getSemesterData($currentStudent, $schoolyear){
        
        $this->db->select('semester');
        $this->db->distinct();
        $this->db->from('enrollgradestbl');
        $this->db->where('studentnumber', $currentStudent);
        $this->db->where('schoolyear', $schoolyear);
        $query = $this->db->get();
        return $query->result();
       
    }

    public function getCurriculumID($studentID){

        $curriculumID = array();
        $studentNumber = array();
        $firstName = array();
        $lastName = array();
        $course = array();

       
        $this->db->where('studentNumber', $studentID);
        $studentInfo = $this->db->get("enrollstudentinformation");

        if ($studentInfo->num_rows() > 0) {
            $rs = $studentInfo->row();
            $curriculumID = $rs->curriculumid;
            $studentNumber = $rs->studentNumber;
            $firstName = $rs->firstName;
            $lastName = $rs->lastName;
            $course = $rs->course;
        }
    

        return array(
            'curriculumID'   =>  $curriculumID,
            'studentNumber'  =>  $studentNumber,
            'firstName'      =>  $firstName,
            'lastName'       =>  $lastName,
            'course'         =>  $course
        );

    }

    public function courselist(){

        $this->db->select('*');
        $this->db->from('enrollcoursetbl');
        $query = $this->db->get();
        return $query->result();

    }

    public function loadYearAndSemester($cID){
        
        $this->db->select('yearlevel, semester');
        $this->db->from('enrollcurriculumcontent2');
        $this->db->where('curriculumnid', $cID);
        $this->db->group_by('yearlevel, semester');
        $this->db->order_by('yearlevel, semester');
        $query = $this->db->get();
        return $query->result();
       

    }

    public function loadSubject($cID){
       
        $this->db->select('enrollcurriculumcontent2.subjectcode, enrollcurriculumcontent2.yearlevel, enrollcurriculumcontent2.semester, enrollsubjectstbl.*');
        $this->db->from('enrollcurriculumcontent2');
        $this->db->join('enrollsubjectstbl', 'enrollsubjectstbl.subjectcode = enrollcurriculumcontent2.subjectcode');
        $this->db->where('enrollcurriculumcontent2.curriculumnid', $cID);
        $query = $this->db->get();
        return $query->result();

    }

    public function loadSubjectCode(){

        $this->db->select('*');
        $this->db->from('enrollsubjectstbl');
        $query = $this->db->get();
        return $query->result();
        
    }
      
    public function loadStudentGrade($studentID){
       
        $this->db->select('enrollscheduletbl.instructor, enrollscheduletbl.schoolyear, enrollscheduletbl.semester, enrollgradestbl.schedcode, enrollgradestbl.subjectcode, enrollgradestbl.units ,enrollgradestbl.units as unit, enrollgradestbl.mygrade, enrollgradestbl.creditsubjectcode, makeupgrade, mylecgrade, mylabgrade');
        $this->db->distinct();
        $this->db->from('enrollgradestbl');
        $this->db->join('enrollscheduletbl', 'enrollscheduletbl.schedcode = enrollgradestbl.schedcode','left');
        $this->db->where('enrollgradestbl.studentnumber', $studentID);
        $this->db->order_by('enrollscheduletbl.schoolyear, enrollscheduletbl.semester', 'ASC');
        $query = $this->db->get();
        return $query->result();
       
    }

    

}


