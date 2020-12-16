<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="border border-gray-400 rounded-xl m-8 p-8 bg-white">
    <form action="{{route('fmt.fillupmulti.store')}}" method="post" class="fmt_box">
        <div class="fmt_headline" style="text-align: center; background:#f2f2f2;color:#3e5569; padding: 10px; font-weight: 500;">ADD NEW FILLUP QUESTION</div>
        <input type="integer" name="problem_set_id" value="{{$pbs72 ?? ''}}" hidden style="border:1px solid #000000;">
        <input type="integer" name="format_type_id" value="{{$fmt72 ?? ''}}" hidden style="border:1px solid #000000;">
        <div class="my-2 flex flex-wrap -mx-2">
            
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Subject</label>
                @php $subjects = DB::table('subjects')->get(); @endphp
                <select name="subject_id" id="subject_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Subject --</option>
                    @foreach ($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Topic</label>
                <select name="topic_id" id="topic_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Topic --</option>
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Sub Topic</label>
                <select name="subtopic_id" id="subtopic_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Sub Topic --</option>
                </select>
            </div>{{-- //w-1/2 --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Question Level</label>
                @php $question_levels = DB::table('question_levels')->get(); @endphp
                <select name="question_level_id" id="question_level_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Question Level --</option>
                    @foreach ($question_levels as $q_level)
                        <option value="{{$q_level->id}}">{{$q_level->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
            {{-- <div class="w-1/2 px-2" >
                <label for="">Question Format</label>
                @php $question_formats = DB::table('question_formats')->get(); @endphp
                <select name="question_format_id" id="question_format_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Question Level --</option>
                    @foreach ($question_formats as $q_level)
                        <option value="{{$q_level->id}}">{{$q_level->name}}</option>
                    @endforeach
                </select>
            </div> --}}
            <div class="w-1/2 px-2">{{-- w-1/2 --}}
                <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;" for="">Question Sub Format</label>
                <select name="question_sub_format_id" id="question_sub_format_id" class="w-full my-2 px-2 py-2 border border-gray-400 rounded text-gray-700" required>
                    <option disabled selected > -- Select Question Sub Format --</option>
                    @php $subFormats = DB::table('question_sub_formats')->where('question_format_id', 3)->get();  @endphp
                    @foreach ($subFormats as $q_level)
                        <option value="{{$q_level->id}}">{{$q_level->name}}</option>
                    @endforeach
                </select>
            </div>{{-- //w-1/2 --}}
            <input hidden type="integer" id="blanks" name="blanks" placeholder="blanks">
        </div>
        {{-- base url == {{URL::to('/')}} --}}
        <script>
            // var formatSelect = document.getElementById('question_format_id');
            // formatSelect.addEventListener('change', function(){
            //     var base_url = window.location.origin;
            //     var send_url = base_url+'/fmt_fillupmulti/get-sub-question-format/'+formatSelect.value;
            //     let xhr = new XMLHttpRequest();
            //     xhr.open('GET', send_url, true);
            //     xhr.onload = function(){
            //         var list = document.querySelector('#question_sub_format_id');
            //         var subs = JSON.parse(this.responseText);
            //         var output = '';
            //         if(subs.length > 0){
            //             output += '<option>Select a Sub Format</option>';
            //             for(var i in subs){
            //             output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
            //             }
            //         } else{
            //             output += '<option> -- No Sub Format Found --</option>';
            //         }				
            //         list.innerHTML = output;
            //     }
            //     xhr.send();
            // });

            var topicSelect = document.getElementById('topic_id');
            topicSelect.addEventListener('change', function(){
                // var base_url = window.location.origin;
                var base_url = "{{ URL::to('/') }}";
                console.log(base_url);
                var send_url = base_url+'/fmt_fillupmulti/getsubtopics/'+topicSelect.value;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', send_url, true);
                xhr.onload = function(){
                    var list = document.querySelector('#subtopic_id');
                    var subs = JSON.parse(this.responseText);
                    var output = '';
                    if(subs.length > 0){
                        output += '<option>Select a Sub Topic</option>';
                        for(var i in subs){
                        output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
                        }
                    } else{
                        output += '<option> -- No Sub Topic Found --</option>';
                    }
                    list.innerHTML = output;
                }
                xhr.send();
            });
            /*  */
            var subjectSelect = document.getElementById('subject_id');
            subjectSelect.addEventListener('change', function(){
                // var base_url = window.location.origin;
                var base_url = "{{ URL::to('/') }}";
                var send_url = base_url+'/fmt_fillupmulti/getTopics/'+subjectSelect.value;
                let xhr = new XMLHttpRequest();
                xhr.open('GET', send_url, true);
                xhr.onload = function(){
                    var list = document.querySelector('#topic_id');
                    var subs = JSON.parse(this.responseText);
                    var output = '';
                    if(subs.length > 0){
                        output += '<option>Select a Topic</option>';
                        for(var i in subs){
                        output += '<option value="'+ subs[i].id +'">'+ subs[i].name + '</option>';
                        }
                    } else{
                        output += '<option> -- No Topic Found --</option>';
                    }				
                    list.innerHTML = output;
                }
                xhr.send();
            });
        </script>
        <div class="my-2 relative">
            <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;"  class="block" for="">Question</label>
            <textarea id="que_box" class="w-full my-2 border border-gray-500 rounded-lg p-2 relative" name="question_title" id="" cols="30" rows="4" placeholder="Question" required></textarea>
            <span id="add_blank" class="cursor-pointer border border-black text-xs px-2 inline-block shadow-lg rounded-full bottom-0 right-0 mr-2 mb-4 absolute">add blank</span>
        </div>
        <div class="my-2">
            <div class="flex flex-wrap -mx-2">
                <div class="w-1/3 px-2">
                    <label style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;"  class="w-full" for="">Level</label>
                    <select name="question_level" id="" class="w-full my-2 px-2 py-2 border border-gray-500 rounded-lg">
                        <option value="1">easy</option>
                        <option value="2">medium</option>
                        <option value="3">hard</option>
                    </select>
                </div>
                <div class="w-1/3 px-2">
                    <label  style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;"  class="w-full" for="">Score</label>
                    <input class="my-2 border border-gray-500 p-2 w-full rounded-lg" type="text" name="question_score" placeholder="Score" required value="1">
                </div>
                <div class="w-1/3 px-2">
                    <label  style="font-size: 12px; font-weight:bold; color:#3e5569; margin:5px 0;"  class="w-full" for="">Hint (optional)</label>
                    <input class="my-2 border border-gray-500 p-2 w-full rounded-lg" type="text" name="question_hint" placeholder="hint" >
                </div>
            </div>
        </div>
        <hr>
        <div id="ans_box">
            {{-- <div class='flex flex-wrap my-4' id='ans1'>
                <div class='w-1/2'>
                    <label class='w-full' for=''>Answer 1</label>
                    <input class='my-2 border border-gray-400 p-2 w-full rounded-lg' type='text' name='answer1' placeholder='Answer' required>
                </div>
            </div> --}}
        </div>
        <div>
            <input id="subBtn" type="submit" class="block py-2 px-8 bg-blue-600 text-white text-uppercase rounded-lg" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
    {{-- <script>
        function deleteFun(id){
            next_id = id+1;
            prev_id = id-1;
            var box = document.getElementById('ans'+id);
            box.classList.add('hidden');
            var prev_work = document.getElementById('work_'+prev_id);
            prev_work.classList.remove('hidden');
        }
        function addFun(id){
            next_id = id+1;
            prev_id = id-1;
            var box = document.getElementById('ans'+next_id);
            box.classList.remove('hidden');
            var prev_work = document.getElementById('work_'+id);
            prev_work.classList.add('hidden');
        }
    </script> --}}
    {{--  --}}
    {{-- <div class="my-12 py-4 px-4 border border-gray-400 shadow-lg">
        <div>Import csv</div>
        <form class="flex" action="{{route('fmt.fillupmulti.csv')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <input type="file" name="file">
            <button type="submit" style="display: inline-block; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
        </form>
    </div> --}}
    {{--  --}}
</div>
{{-- <script>
    var ans_correct1 = document.getElementById('ans_correct1');
    var ans_correct2 = document.getElementById('ans_correct2');
    var ans_correct3 = document.getElementById('ans_correct3');
    var ans_correct4 = document.getElementById('ans_correct4');
    var subBtn = document.getElementById('subBtn');
    var valBox = document.getElementById('validationBox');
    
    ans_correct1.addEventListener('change', check);
    ans_correct2.addEventListener('change', check);
    ans_correct3.addEventListener('change', check);
    ans_correct4.addEventListener('change', check);
    check();
    function check(){
        if(!ans_correct1.checked && !ans_correct2.checked && !ans_correct3.checked && !ans_correct4.checked){
            valBox.innerText = "not valid";
            subBtn.classList.remove("bg-blue-600");
            subBtn.classList.add("bg-gray-600");
            subBtn.disabled = true;
        }else{
            valBox.innerText = "valid";
            subBtn.classList.remove("bg-gray-600");
            subBtn.classList.add("bg-blue-600");
            subBtn.disabled = false;
        }
    }
</script> --}}
<script>
    var queBox = document.getElementById('que_box');
    var ansBox = document.getElementById('ans_box');
    var addBlank = document.getElementById('add_blank');
    var blanks = document.getElementById('blanks');   
    addBlank.addEventListener('click', function(){
        add__();wowo();
    });
    queBox.addEventListener('keydown', wowo);
    function add__(){
        queBox.value += "(_)";
    }
    function wowo(){
        ansBox.innerHTML = " ";
        strArr = queBox.value.split("(_)");
        var blankLength = strArr.length;
        blanks.value = blankLength - 1;
        console.log(blankLength);
        for(i = 1; i < blankLength; i++){
            var ans = "";
            ans += "<div class='flex flex-wrap my-4' id='ans1'>";
            ans += "<div class='w-1/2'>";
            ans += "<label class='w-full' for=''>Answer "+i+"</label>";
            ans += "<input class='my-2 border border-gray-500 p-2 w-full rounded-lg' type='text' name='answer"+i+"' placeholder='Answer'>";
            ans += "</div>";
            ans += "</div>";
            ansBox.innerHTML += ans;
        }
    }
</script>