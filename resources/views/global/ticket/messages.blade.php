<hr class="border-success">

@foreach($messages as $message)

    <div dir="rtl" class="card mb-2 rounded-0 {{$message->user_id === 1 ? 'mr-5' : 'ml-5'}}">
        <div class="card-header text-white rounded-0 {{$message->user_id === 1 ? 'bg-success' : 'bg-info'}}">

            @if($message->user_id === 1)
                <span><i class="fas fa-headphones-alt ml-2"></i>پشتیبانی طوطیکو</span>
            @else
                {{$ticket->user->name}}
            @endif

            <span dir="rtl" class="float-left">{{$message->created_at->diffForHumans()}}</span>
        </div>
        <div class="card-body rounded-0">{{$message->message}}</div>
    </div>

@endforeach


