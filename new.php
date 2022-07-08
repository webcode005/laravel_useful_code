use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

				$rules = [
                    'cimage' => ['required','image','mimes:jpeg,png,jpg,gif,svg','max:2048'
                               ,'dimensions:min_width=100,min_height=100,max_width=1000,max_height=1000']
               ];

               $customMessage = [
                  
                   'cimage.required' => 'Course Image is required',
                   'cimage.dimensions' => 'Course Image has invalid image dimensions (min_width=100,min_height=100,max_width=1000,max_height=1000).',
                   'cimage.mimes' => 'Course Image must have in jpeg,png,jpg,gif,svg only',
                //    'cimage.max' => 'Course Image max size below 2MB',
               ];

               $validator = $this->validate($request,$rules,$customMessage);


                if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
                {
                    
                    return back()->withInput()->withErrors($validator);
                    // validation failed redirect back to form
        
                }
                else
                {
                    //handle the form 

                 }


$data['courses'] = Course::select("*")
->where('uploaded_by',$User_Id)
->orderBy('tid', 'DESC')
->get();


$join->on('a.field1', '=', 'b.field2')
        ->where('b.field3', '=', true)
        ->where('b.field4', '=', '1');


$where = array('course_id' => $course_id,'uploaded_by' => $User_Id);
        $course_topics = CourseTopic::where($where)->get()->toArray();



     $departments =DB::table('exam_participants')
                            ->join('courses', 'exam_participants.course_id', '=', 'courses.tid')
                            ->join('users', 'users.id', '=', 'exam_participants.uploaded_by')
                            ->select('exam_participants.*', 'courses.course_name', 'courses.course_category')
                            ->where([["exam_participants.cp_department", '=',$department],["exam_participants.course_id", '=', $course_id],["exam_participants.status", '=', "Pending"]])
                            ->get()->toArray();




$validator = Validator::make($request->all(),[

	'file' => 'max:50000',

])



$score = 0;
foreach($_POST as $k=>$v)
{
	$answer = $db->answer($k);
	if($answer[0][2] == $v) { // option is correct
		$score++;
	}
}
$score = $score	/ 4 *100;
if($score < 50)
{
	echo '<h2>You need to score at least 50% to pass the exam.</h2>';
}
else 
{
	echo '<h2>You have passed the exam and scored '.$score.'%.</h2>';
}





var timeLeft = 30;
    var elem = document.getElementById('some_div');
    
    var timerId = setInterval(countdown, 1000);
    
    function countdown() {
      if (timeLeft == -1) {
        clearTimeout(timerId);
        doSomething();
      } else {
        elem.innerHTML = timeLeft + ' seconds remaining';
        timeLeft--;
      }
    }
<div id="some_div">
</div>





$(".deletesection").click(function(){
    var title = $(this).attr("title");
    if(confirm("Are You Sure to delete this " + title+"?"))
    {
        return true;
    }
    else
    {
        return false;
    }

});
