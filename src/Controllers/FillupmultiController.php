<?php
namespace edgewizz\fillupmulti\Controllers;

use App\Http\Controllers\Controller;
use Edgewizz\Edgecontent\Models\ProblemSetQues;
use Edgewizz\Fillupmulti\Models\FillupmultiAns;
use Edgewizz\Fillupmulti\Models\FillupmultiQues;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class FillupmultiController extends Controller
{
    //
    public function store(Request $request)
    {
        // dd($request->ans_correct1);
        $fillupmultiQues = new FillupmultiQues();
        $fillupmultiQues->question_title = $request->question_title;
        $fillupmultiQues->level_id = $request->question_level;
        $fillupmultiQues->score = $request->question_score;
        $fillupmultiQues->hint = $request->question_hint;
        $fillupmultiQues->subject_id = $request->subject_id;
        $fillupmultiQues->topic_id = $request->topic_id;
        $fillupmultiQues->sub_topic_id = $request->subtopic_id;
        $fillupmultiQues->question_level_id = $request->question_level_id;
        $fillupmultiQues->question_format_id = $request->question_format_id;
        $fillupmultiQues->question_sub_format_id = $request->question_sub_format_id;
        // $fillupmultiQues->question_level_id = $request->question_level_id;
        $fillupmultiQues->save();
        /*  */
        $blanks = $request->blanks;
        // dd($blanks);
        if($blanks){
            for($i = 1; $i <= $blanks; $i++){
                $answer = 'answer'.$i;
                $ans_correct = 'ans_correct1'.$i;
                $fillupmultiAns1 = new FillupmultiAns();
                $fillupmultiAns1->question_id = $fillupmultiQues->id;
                $fillupmultiAns1->answer_title = $request->$answer;
                if ($request->$ans_correct) {
                    $fillupmultiAns1->arrange = 1;
                }
                $fillupmultiAns1->save();
            }
        }
        if($request->problem_set_id && $request->format_type_id){
            $pbq = new ProblemSetQues();
            $pbq->problem_set_id = $request->problem_set_id;
            $pbq->question_id = $fillupmultiQues->id;
            $pbq->format_type_id = $request->format_type_id;
            $pbq->save();
        }
        // if ($request_title1) {
        //     $fillupmultiAns1 = new FillupmultiAns();
        //     $fillupmultiAns1->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns1_title = $request->answer1;
        //     if ($request->ans_correct1) {
        //         $fillupmultiAns1->arrange = 1;
        //     }
        //     $fillupmultiAns1->save();
        // }
        // if ($request->answer2) {
        //     $fillupmultiAns2 = new FillupmultiAns();
        //     $fillupmultiAns2->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns2->answer = $request->answer2;
        //     if ($request->ans_correct2) {
        //         $fillupmultiAns2->arrange = 1;
        //     }
        //     $fillupmultiAns2->save();
        // }
        // if ($request->answer3) {
        //     $fillupmultiAns3 = new FillupmultiAns();
        //     $fillupmultiAns3->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns3->answer = $request->answer3;
        //     if ($request->ans_correct3) {
        //         $fillupmultiAns3->arrange = 1;
        //     }
        //     $fillupmultiAns3->save();
        // }
        // if ($request->answer4) {
        //     $fillupmultiAns4 = new FillupmultiAns();
        //     $fillupmultiAns4->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns4->answer = $request->answer4;
        //     if ($request->ans_correct4) {
        //         $fillupmultiAns4->arrange = 1;
        //     }
        //     $fillupmultiAns4->save();
        // }
        // if ($request->answer5) {
        //     $fillupmultiAns5 = new FillupmultiAns();
        //     $fillupmultiAns5->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns5->answer = $request->answer5;
        //     if ($request->ans_correct5) {
        //         $fillupmultiAns5->arrange = 1;
        //     }
        //     $fillupmultiAns5->save();
        // }
        // if ($request->answer6) {
        //     $fillupmultiAns6 = new FillupmultiAns();
        //     $fillupmultiAns6->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns6->answer = $request->answer6;
        //     if ($request->ans_correct6) {
        //         $fillupmultiAns6->arrange = 1;
        //     }
        //     $fillupmultiAns6->save();
        // }
        // if ($request->answer7) {
        //     $fillupmultiAns7 = new FillupmultiAns();
        //     $fillupmultiAns7->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns7->answer = $request->answer7;
        //     if ($request->ans_correct7) {
        //         $fillupmultiAns7->arrange = 1;
        //     }
        //     $fillupmultiAns7->save();
        // }
        // if ($request->answer8) {
        //     $fillupmultiAns8 = new FillupmultiAns();
        //     $fillupmultiAns8->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns8->answer = $request->answer8;
        //     if ($request->ans_correct8) {
        //         $fillupmultiAns8->arrange = 1;
        //     }
        //     $fillupmultiAns8->save();
        // }
        // if ($request->answer9) {
        //     $fillupmultiAns9 = new FillupmultiAns();
        //     $fillupmultiAns9->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns9->answer = $request->answer9;
        //     if ($request->ans_correct9) {
        //         $fillupmultiAns9->arrange = 1;
        //     }
        //     $fillupmultiAns9->save();
        // }
        // if ($request->answer10) {
        //     $fillupmultiAns10 = new FillupmultiAns();
        //     $fillupmultiAns10->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns10->answer = $request->answer10;
        //     if ($request->ans_correct10) {
        //         $fillupmultiAns10->arrange = 1;
        //     }
        //     $fillupmultiAns10->save();
        // }
        // if ($request->answer11) {
        //     $fillupmultiAns11 = new FillupmultiAns();
        //     $fillupmultiAns11->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns11->answer = $request->answer11;
        //     if ($request->ans_correct11) {
        //         $fillupmultiAns11->arrange = 1;
        //     }
        //     $fillupmultiAns11->save();
        // }
        // if ($request->answer12) {
        //     $fillupmultiAns12 = new FillupmultiAns();
        //     $fillupmultiAns12->question_id = $fillupmultiQues->id;
        //     $fillupmultiAns12->answer = $request->answer12;
        //     if ($request->ans_correct12) {
        //         $fillupmultiAns12->arrange = 1;
        //     }
        //     $fillupmultiAns12->save();
        // }
        return back();
    }
    public function edit($id, Request $request){
    }
    public function uploadFile(Request $request){
        
            $file = $request->file('file');
            // dd($file);
            // File Details
            $filename = time().$file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();
            $tempPath = $file->getRealPath();
            $fileSize = $file->getSize();
            $mimeType = $file->getMimeType();
            // Valid File Extensions
            $valid_extension = array("csv");
            // 2MB in Bytes
            $maxFileSize = 2097152;
            // Check file extension
            if (in_array(strtolower($extension), $valid_extension)) {
                // Check file size
                if ($fileSize <= $maxFileSize) {
                    // File upload location
                    $location = 'uploads';
                    // Upload file
                    $file->move($location, $filename);
                    // Import CSV to Database
                    $filepath = public_path($location . "/" . $filename);
                    // Reading file
                    $file = fopen($filepath, "r");
                    $importData_arr = array();
                    $i = 0;
                    while (($filedata = fgetcsv($file, 1000, ",")) !== false) {
                        $num = count($filedata);
                        // Skip first row (Remove below comment if you want to skip the first row)
                        if($i == 0){
                            $i++;
                            continue;
                        }
                        for ($c = 0; $c < $num; $c++) {
                            $importData_arr[$i][] = $filedata[$c];
                        }
                        $i++;
                    }
                    fclose($file);
                    // Insert to MySQL database
                    foreach ($importData_arr as $importData) {
                        $insertData = array(
                                "question" => $importData[1],
                                "answer1" => $importData[2],
                                "arrange1" => $importData[3],
                                "answer2" => $importData[4],
                                "arrange2" => $importData[5],
                                "answer3" => $importData[6],
                                "arrange3" => $importData[7],
                                "answer4" => $importData[8],
                                "arrange4" => $importData[9],
                                "answer5" => $importData[10],
                                "arrange5" => $importData[11],
                                "answer6" => $importData[12],
                                "arrange6" => $importData[13],
                                "score" => $importData[14],
                                "level" => $importData[15],
                                "hint" => $importData[16],
                            );
                            // var_dump($insertData['answer1']); 
                            /*  */
                            if($insertData['question']){
                                $fill_Q = new FillupmultiQues();
                                $fill_Q->question = $insertData['question'];
                                if($insertData['level'] == '-'){
                                }else{
                                    $fill_Q->level = $insertData['level'];
                                }
                                if($insertData['score'] == '-'){
                                }else{
                                    $fill_Q->score = $insertData['score'];
                                }
                                if($insertData['hint'] == '-'){
                                }else{
                                    $fill_Q->hint = $insertData['hint'];
                                }
                                $fill_Q->save();
                                
                                if($insertData['answer1'] == '-'){
                                }else{
                                    $f_Ans1 = new FillupmultiAns();
                                    $f_Ans1->question_id = $fill_Q->id;
                                    $f_Ans1->answer = $insertData['answer1'];
                                    $f_Ans1->arrange = $insertData['arrange1'];
                                    $f_Ans1->save();
                                }
                                if($insertData['answer2'] == '-'){
                                }else{
                                    $f_Ans2 = new FillupmultiAns();
                                    $f_Ans2->question_id = $fill_Q->id;
                                    $f_Ans2->answer = $insertData['answer2'];
                                    $f_Ans2->arrange = $insertData['arrange2'];
                                    $f_Ans2->save();
                                }
                                if($insertData['answer3'] == '-'){
                                }else{
                                    $f_Ans3 = new FillupmultiAns();
                                    $f_Ans3->question_id = $fill_Q->id;
                                    $f_Ans3->answer = $insertData['answer3'];
                                    $f_Ans3->arrange = $insertData['arrange3'];
                                    $f_Ans3->save();
                                }
                                if($insertData['answer4'] == '-'){
                                }else{
                                    $f_Ans4 = new FillupmultiAns();
                                    $f_Ans4->question_id = $fill_Q->id;
                                    $f_Ans4->answer = $insertData['answer4'];
                                    $f_Ans4->arrange = $insertData['arrange4'];
                                    $f_Ans4->save();
                                }
                                if($insertData['answer5'] == '-'){
                                }else{
                                    $f_Ans5 = new FillupmultiAns();
                                    $f_Ans5->question_id = $fill_Q->id;
                                    $f_Ans5->answer = $insertData['answer5'];
                                    $f_Ans5->arrange = $insertData['arrange5'];
                                    $f_Ans5->save();
                                }
                                if($insertData['answer6'] == '-'){
                                }else{
                                    $f_Ans6 = new FillupmultiAns();
                                    $f_Ans6->question_id = $fill_Q->id;
                                    $f_Ans6->answer = $insertData['answer6'];
                                    $f_Ans6->arrange = $insertData['arrange6'];
                                    $f_Ans6->save();
                                }
                            }
                            /*  */
                        }
                    // Session::flash('message', 'Import Successful.');
                } else {
                    // Session::flash('message', 'File too large. File must be less than 2MB.');
                }
            } else {
                // Session::flash('message', 'Invalid File Extension.');
            }
        return back();
    }

    public function update($id, Request $request){
        $q = FillupmultiQues::where('id', $id)->first();
        $q->question_title = $request->question_title;
        $q->level_id = $request->question_level;
        $q->score = $request->question_score;
        $q->hint = $request->question_hint;
        $q->save();
        $answers = FillupmultiAns::where('question_id', $q->id)->get();
        foreach($answers as $ans){
            if($request->ans.$ans->id){
                $inputAnswer = 'answer'.$ans->id;
                // $inputArrange = 'ans_correct'.$ans->id;
                $ans->answer_title = $request->$inputAnswer;
                $ans->save();
            }
        }
        return back();
    }

    public function delete($id){
        $f = FillupmultiQues::where('id', $id)->first();
        $f->delete();
        $ans = FillupmultiAns::where('question_id', $f->id)->pluck('id');
        if($ans){
            foreach($ans as $a){
                $f_ans = FillupmultiAns::where('id', $a)->first();
                $f_ans->delete();
            }
        }
        // dd($ans);
        return back();
    }

    // public function getClassesByCountryId($id){

    // }
    public function getTopicBySubjectId($id){
        $topics = DB::table('topics')->where('subject_id', $id)->get();
        return response()->json(
            $topics
        );
    }
    public function getSubTopicByTopicId($id){
        $subTopics = DB::table('sub_topics')->where('topic_id', $id)->get();
        return response()->json(
            $subTopics
        );
    }
    public function getSubQuestionByQuestionFormatId($id){
        $subTopics = DB::table('question_sub_formats')->where('question_format_id', $id)->get();
        return response()->json(
            $subTopics
        );
    }
    public function getTopic($id){

    }










    
}
