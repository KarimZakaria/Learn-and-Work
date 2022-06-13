@extends('layouts.app')

@section('content')

    <h3 class="text-primary"> Student /  {{ $student->name }} / 
        @if($student->age !== null) 
            {{$student->age}}
        @else
            Age Is Not Avaliable 
        @endif 
    </h3>

    And He Has Enrolled {{$student->course->count()}} Courses
    And They Are 
    
        @forelse($student->course as $course)
            <li>   {{ $course->name }} </li> 
        @empty
            No Courses Yet He Has Enrolled
        @endforelse

@endsection