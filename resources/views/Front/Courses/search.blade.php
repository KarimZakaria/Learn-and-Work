<style>
    li:hover .nav
    {
        background: lightgray ; 
        text-decoration: none ;
    }

</style>

@foreach ($courses as $course)

    <ul class="m-auto w-50">
        <li class="w-25 mt-1">
            <a class="text-dark nav" href="{{ route('Front.show' , [$course->category->id , $course->id]) }}">{{ $course->name }}</a>
        </li>        
    </ul>
@endforeach