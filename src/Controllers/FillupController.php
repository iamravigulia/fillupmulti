<?php
namespace edgewizz\fillup\Controllers;

use App\Http\Controllers\Controller;
use Edgewizz\Fillup\Models\FillupAns;
use Edgewizz\Fillup\Models\FillupQues;
use Illuminate\Http\Request;

class FillupController extends Controller
{
    //
    public function test()
    {
        dd('hello');
    }
    public function store(Request $request)
    {
        // dd($request->ans_correct1);
        $fillupQues = new FillupQues();
        $fillupQues->question = $request->question;
        $fillupQues->save();
        /*  */
        if ($request->answer1) {
            $fillupAns1 = new FillupAns();
            $fillupAns1->question_id = $fillupQues->id;
            $fillupAns1->answer = $request->answer1;
            if ($request->ans_correct1) {
                $fillupAns1->arrange = 1;
            }
            $fillupAns1->save();
        }
        /*  */
        /*  */
        if ($request->answer2) {
            $fillupAns2 = new FillupAns();
            $fillupAns2->question_id = $fillupQues->id;
            $fillupAns2->answer = $request->answer2;
            if ($request->ans_correct2) {
                $fillupAns2->arrange = 1;
            }
            $fillupAns2->save();
        }
        /*  */
        /*  */
        if ($request->answer3) {
            $fillupAns3 = new FillupAns();
            $fillupAns3->question_id = $fillupQues->id;
            $fillupAns3->answer = $request->answer3;
            if ($request->ans_correct3) {
                $fillupAns3->arrange = 1;
            }
            $fillupAns3->save();
        }
        /*  */
        /*  */
        if ($request->answer4) {
            $fillupAns4 = new FillupAns();
            $fillupAns4->question_id = $fillupQues->id;
            $fillupAns4->answer = $request->answer4;
            if ($request->ans_correct4) {
                $fillupAns4->arrange = 1;
            }
            $fillupAns4->save();
        }
        /*  */
        /*  */
        if ($request->answer5) {
            $fillupAns5 = new FillupAns();
            $fillupAns5->question_id = $fillupQues->id;
            $fillupAns5->answer = $request->answer5;
            if ($request->ans_correct5) {
                $fillupAns5->arrange = 1;
            }
            $fillupAns5->save();
        }
        /*  */
        /*  */
        if ($request->answer6) {
            $fillupAns6 = new FillupAns();
            $fillupAns6->question_id = $fillupQues->id;
            $fillupAns6->answer = $request->answer6;
            if ($request->ans_correct6) {
                $fillupAns6->arrange = 1;
            }
            $fillupAns6->save();
        }
        /*  */
        return back();
    }
    public function edit($id, Request $request)
    {
    }
    public function uploadFile(Request $request)
    {
        
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
                                $fill_Q = new FillupQues();
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
                                    $f_Ans1 = new FillupAns();
                                    $f_Ans1->question_id = $fill_Q->id;
                                    $f_Ans1->answer = $insertData['answer1'];
                                    $f_Ans1->arrange = $insertData['arrange1'];
                                    $f_Ans1->save();
                                }
                                if($insertData['answer2'] == '-'){
                                }else{
                                    $f_Ans2 = new FillupAns();
                                    $f_Ans2->question_id = $fill_Q->id;
                                    $f_Ans2->answer = $insertData['answer2'];
                                    $f_Ans2->arrange = $insertData['arrange2'];
                                    $f_Ans2->save();
                                }
                                if($insertData['answer3'] == '-'){
                                }else{
                                    $f_Ans3 = new FillupAns();
                                    $f_Ans3->question_id = $fill_Q->id;
                                    $f_Ans3->answer = $insertData['answer3'];
                                    $f_Ans3->arrange = $insertData['arrange3'];
                                    $f_Ans3->save();
                                }
                                if($insertData['answer4'] == '-'){
                                }else{
                                    $f_Ans4 = new FillupAns();
                                    $f_Ans4->question_id = $fill_Q->id;
                                    $f_Ans4->answer = $insertData['answer4'];
                                    $f_Ans4->arrange = $insertData['arrange4'];
                                    $f_Ans4->save();
                                }
                                if($insertData['answer5'] == '-'){
                                }else{
                                    $f_Ans5 = new FillupAns();
                                    $f_Ans5->question_id = $fill_Q->id;
                                    $f_Ans5->answer = $insertData['answer5'];
                                    $f_Ans5->arrange = $insertData['arrange5'];
                                    $f_Ans5->save();
                                }
                                if($insertData['answer6'] == '-'){
                                }else{
                                    $f_Ans6 = new FillupAns();
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
        $q = FillupQues::where('id', $id)->first();
        $q->question = $request->question;
        $q->level = $request->question_level;
        $q->score = $request->question_score;
        $q->hint = $request->question_hint;
        $q->save();
        $answers = FillupAns::where('question_id', $q->id)->get();
        foreach($answers as $ans){
            if($request->ans.$ans->id){
                $inputAnswer = 'answer'.$ans->id;
                $inputArrange = 'ans_correct'.$ans->id;
                $ans->answer = $request->$inputAnswer;
                if($request->$inputArrange){
                    $ans->arrange = 1;
                }else{
                    $ans->arrange = 0;
                }
                $ans->save();
            }
        }
        return back();
    }

    public function delete($id){
        $f = FillupQues::where('id', $id)->first();
        $f->delete();
        $ans = FillupAns::where('question_id', $f->id)->pluck('id');
        if($ans){
            foreach($ans as $a){
                $f_ans = FillupAns::where('id', $a)->first();
                $f_ans->delete();
            }
        }
        // dd($ans);
        return back();
    }
}
