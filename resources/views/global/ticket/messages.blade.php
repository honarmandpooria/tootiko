<hr class="border-success">

@foreach($messages as $message)

    <div dir="rtl" class="card mb-2 rounded-0">
        <div class="card-header text-white rounded-0 {{$message->user_id === 1 ? 'bg-success' : 'bg-info'}}">

            @if($message->user_id === 1)
                <span><i class="fas fa-headphones-alt ml-2"></i>پشتیبانی طوطیکو</span>
            @else
                {{$ticket->user->name}}
            @endif

            <span dir="rtl" class="float-left">{{$message->created_at->diffForHumans()}}</span>
        </div>
        <div class="card-body rounded-0">{{$message->message}}</div>


        @if(Auth::user()->id === 1 && $message->user_id ===1)
            <div class="card-footer rounded-0">
                <button data-toggle="modal" data-target="#{{'text' . $message->id}}"
                        class="btn btn-warning float-left"><i class="fas fa-edit"></i></button>
            </div>


            <div dir="rtl" class="modal fade" id="{{'text' . $message->id}}">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form method="post" action="{{route('admin-messages.update',$message->id)}}">
                        @csrf
                        @method('put')
                        <!-- Modal Header -->
                            <div class="modal-header">
                                <h4 class="modal-title">ویرایش پیام</h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">

                                <div class="form-group">
                                    <label for="text{{$message->ticket->order->code}}"></label>
                                    <textarea class="form-control" name="message"
                                              id="text{{$message->ticket->order->code}}"
                                              style="width: 100%;" rows="3">{{$message->message}}</textarea>
                                </div>

                            </div>

                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">ذخیره</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


        @else

        @endif

    </div>

@endforeach


