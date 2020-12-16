<style>
        table {
            background: #fff;
            width: 100%;
            border: 0;
        }
        th {
            padding: 10px 5px;
            text-align: left;
            border: 1px solid rgba(206, 206, 206, 0.789);
        }
        td {
            border: 1px solid rgba(206, 206, 206, 0.789);
            padding: 5px;
        }
        tr:nth-child(odd) {
            background: rgb(242, 242, 242);
        }
        .fmt_fpm_date{
            font-size: 12px;
        }
        .fmt_fpm_edit{
            font-size:12px;
            background: rgb(0, 98, 189);
            color:#fff;
            padding: 1px 4px;
            display: inline;
            border: none;
            border-radius: 4px;
        }
        .fmt_fpm_delete{
            font-size:12px;
            background: rgb(189, 13, 0);
            color:#fff;
            padding: 1px 4px;
            display: inline;
            border: none;
            border-radius: 4px;
        }
        #fmt_fillupmulti_index_length{
            
        }
        #fmt_fillupmulti_index_wrapper{
            display: block;
        }
</style>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
<table class="cell-border" id="fmt_fillupmulti_index" style="width:100%">
    <thead>
        <th>#</th>
        <th>Info</th>
        <th>Question</th>
        <th>Answers</th>
        <th>Hint</th>
        <th>Level</th>
        <th>Score</th>
        <th>Created/Updated</th>
        <th>Actions</th>
    </thead>
    <tbody>
        @php
            $fmt_fillupques = DB::table('fmt_fillupmulti_ques')->get();
        @endphp
        @foreach ($fmt_fillupques as $que)
        <tr>
            <td>{{$que->id}}</td>
            @php $subject = DB::table('subjects')->where('id', $que->subject_id)->first(); @endphp
            @php $topic = DB::table('topics')->where('id', $que->topic_id)->first(); @endphp
            @php $subtopic = DB::table('sub_topics')->where('id', $que->sub_topic_id)->first(); @endphp
            @php $q_level = DB::table('question_levels')->where('id', $que->question_level_id)->first(); @endphp
            @php $q_format = DB::table('question_formats')->where('id', $que->question_format_id)->first(); @endphp
            @php $q_sub_format = DB::table('question_sub_formats')->where('id', $que->question_sub_format_id)->first(); @endphp
            <td>
                @if ($subject) <b>Subject:</b> {{$subject->name}}<br> @endif
                @if ($topic) <b>Topic:</b> {{$topic->name}}<br> @endif
                @if ($subtopic) <b>Sub Topic:</b> {{$subtopic->name}}<br> @endif
                @if ($q_level) <b>Question Level:</b> {{$q_level->name}}<br> @endif
                @if ($q_format) <b>Question Format:</b> {{$q_format->name}}<br> @endif
                @if ($q_sub_format) <b>Question Sub Format:</b> {{$q_sub_format->name}}<br> @endif
            </td>
            <td>
                @php
                    $queStr = $que->question_title;
                    $queStr = str_replace("(_)","_____",$queStr);
                    // $queArr = explode("_____", $queStr);
                @endphp
                {{$queStr}}
                {{-- @foreach ($queArr as $q_a)
                    {{$q_a}}
                @endforeach --}}
            </td>
            <td>
                <ul>
                    @php $fmt_fillans = DB::table('fmt_fillupmulti_ans')->where('question_id', $que->id)->get() @endphp
                    @foreach ($fmt_fillans as $key => $ans)
                        <li><span style="font-size:12px;">{{$key+1}}.</span> {{$ans->answer_title}}</li>
                    @endforeach
                </ul>
            </td>
            <td>{{$que->hint ?? '-null-'}}</td>
            <td>{{$que->level ?? '-null-'}}</td>
            <td>{{$que->score ?? '-null-'}}</td>
            <td>
                <div class="fmt_fpm_date">
                    <span>Created:</span>
                    {{date('d-n-Y, g:i a',strtotime($que->created_at))}}
                </div>
                <div class="fmt_fpm_date">
                    <span>Updated:</span>
                    {{date('d-n-Y, g:i a',strtotime($que->updated_at))}}
                </div>
            </td>
            <td>
                <a class="fmt_fpm_edit" href="javascript:void(0);" onclick="modalCMA({{$que->id}})">Edit</a>
                <a class="fmt_fpm_delete" href="{{route('fmt.fillupmulti.delete', $que->id)}}">Delete</a>
            </td>
        </tr>
        <x-fillupmulti.edit :message="$que->id"/>
        @endforeach
    </tbody>
</table>
<script>
    function modalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.remove("hidden");
    }
    function closeModalCMA($id){
        var modal = document.getElementById('modalCMA'+$id);
        modal.classList.add("hidden");
    }
</script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.3.1/dt-1.10.22/r-2.2.6/datatables.min.js"></script>
<script>
    $('#fmt_fillupmulti_index').dataTable( {
        "paging": true
    });
</script>