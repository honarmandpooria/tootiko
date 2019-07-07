<form class="mt-3" dir="rtl" method="post" action="{{route('messages.store')}}">
    @csrf
    @method('post')
    <input name="code" type="hidden" value="{{$ticket->order->code}}">
    <div class="form-group">
        <label class="mr-4" for="message">پیام:</label>
        <textarea placeholder="لطفا پیام خود را اینجا وارد کنید..." name="message" id="message" rows="3"
                  class="form-control" style="width: 100%;"></textarea>
    </div>
    <button class="btn btn-success" type="submit">ارسال</button>
</form>
