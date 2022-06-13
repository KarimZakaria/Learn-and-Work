@if($errors->any())
    <ul class="bg-danger list-unstyled ">
        @foreach ($errors->all() as $error)
            <li class="text-white">{{$error}}</li>
        @endforeach    
    </ul>
@endif