hello every on
{{$party->title_partie}}
{{-- {{$party->content->type_content}} --}}
@foreach ($party->devoir as $devoir)
    {{$devoir->devoir_title }} <br>
    {{$devoir->enonce }}
@endforeach