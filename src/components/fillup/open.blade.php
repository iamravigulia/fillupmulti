<link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
<div class="border border-gray-400 rounded-xl m-8 p-8 bg-white">
    <form action="{{route('fmt.fillup.store')}}" method="post" class="fmt_box">
        <div class="fmt_headline">Add a Fill up Question</div>
        <div id="validationBox" hidden class="text-red-600 py-4 px-2">

        </div>
        <div class="my-2">
            <label class="block" for="">Question</label>
            <textarea class="w-full border border-gray-400 rounded-lg p-2" name="question" id="" cols="30" rows="4" placeholder="Question" required></textarea>
        </div>
        <hr>
        <div class="flex flex-wrap my-4"  id="ans1">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 1</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer1" placeholder="Answer" required>
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct1" id="ans_correct1">
            </div>
        </div>
        <div class="flex flex-wrap my-4"  id="ans2">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 2</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer2" placeholder="Answer" required>
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <div class="flex w-full justify-start">
                    <div class="flex-initial">
                        <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct2" id="ans_correct2">
                    </div>
                    <div class="flex-initial my-5 mx-4 hidden" id="work_2">
                        {{-- <span onclick="deleteFun(2);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Delete</span> --}}
                        <span onclick="addFun(2);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Add</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap my-4" id="ans3">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 3</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer3" placeholder="Answer">
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <div class="flex w-full justify-start">
                    <div class="flex-initial">
                        <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct3" id="ans_correct3">
                    </div>
                    <div class="flex-initial my-5 mx-4 hidden" id="work_3">
                        <span onclick="deleteFun(3);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Delete</span>
                        <span onclick="addFun(3);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Add</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap my-4" id="ans4">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 4</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer4" placeholder="Answer">
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <div class="flex w-full justify-start">
                    <div class="flex-initial">
                        <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct4" id="ans_correct4">
                    </div>
                    <div class="flex-initial my-5 mx-4" id="work_4">
                        <span onclick="deleteFun(4);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Delete</span>
                        <span onclick="addFun(4);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Add</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap my-4 hidden" id="ans5">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 5</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer4" placeholder="Answer">
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <div class="flex w-full justify-start" >
                    <div class="flex-initial">
                        <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct5" id="ans_correct5">
                    </div>
                    <div class="flex-initial my-5 mx-4" id="work_5">
                        <span onclick="deleteFun(5);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Delete</span>
                        <span onclick="addFun(5);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Add</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="flex flex-wrap my-4 hidden" id="ans6">
            <div class="w-1/2">
                <label class="w-full" for="">Answer 6</label>
                <input class="my-2 border border-gray-400 p-2 w-full rounded-lg" type="text" name="answer4" placeholder="Answer">
            </div>
            <div class="w-1/2 px-4">
                <label class="w-full" for="">Correct</label>
                <div class="flex w-full justify-start">
                    <div class="flex-initial">
                        <input class="block my-3 w-10 h-10" type="checkbox" name="ans_correct6" id="ans_correct6">
                    </div>
                    <div class="flex-initial my-5 mx-4" id="work_6">
                        <span onclick="deleteFun(6);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Delete</span>
                        {{-- <span onclick="addFun(6);" class="mx-4 px-2 bg-red-600 text-white cursor-pointer">Add</span> --}}
                    </div>
                </div>
            </div>
        </div>
        <div>
            <input id="subBtn" type="submit" class="block py-2 px-8 text-white text-uppercase rounded-lg" value="Submit">
        </div>
    </form>
    {{-- <button id="addOption">Add option</button> --}}
    <script>
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
    </script>
    {{--  --}}
    <div class="my-12 py-4 px-4 border border-gray-400 shadow-lg">
        <div>Import csv</div>
        <form class="flex" action="{{route('fmt.fillup.csv')}}" method="POST" enctype='multipart/form-data'>
            @csrf
            <input type="file" name="file">
            <button type="submit" style="display: inline-block; padding:4px 20px; background:green; color:#fff; text-transform:uppercase; border-radius:4px;">submit</button>
        </form>
    </div>
    {{--  --}}
</div>
<script>
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
</script>