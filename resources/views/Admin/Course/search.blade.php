

@forelse ($courses as $course)
   <li class="list-unstyled ml-3">
       <a href="{{ route('Admin.Course.show' , $course->id) }}">{{ $course->name }}</a>
    </li>        
@empty 
    <p class="ml-3">No Contributed Data</p>
@endforelse