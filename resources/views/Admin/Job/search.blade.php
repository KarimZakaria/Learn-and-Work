

@forelse ($jobs as $job)
   <li class="list-unstyled ml-3">
       <a href="{{ route('Admin.Job.show' , $job->id) }}">{{ $job->job_name }}</a>
    </li>        
@empty 
    <p class="ml-3">No Contributed Data</p>
@endforelse