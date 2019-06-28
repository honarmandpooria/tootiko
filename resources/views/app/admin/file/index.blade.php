@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="mx-md-5">
            <table dir="rtl" class="table table-hover mt-3">
                <thead>
                <tr>
                    <th scope="col">فایل</th>
                    <th scope="col">زمان آپلود</th>
                    <th scope="col">عملیات</th>
                    <th scope="col">نوع فایل</th>

                </tr>
                </thead>
                <tbody>

                @foreach($files as $file)

                    <tr class="#">
                        <th scope="row">
                            <a download target="_blank" href="{{Storage::url($file->file)}}"
                               class="btn btn-primary rounded-circle shadow"><i class="fas fa-download"></i></a>
                        </th>
                        <td>{{$file->created_at->diffForHumans()}}</td>
                        <td>

                            @if($file->order)

                                <a class="btn btn-primary" href="{{route('admin-orders.edit',$file->order->id)}}">مشاهده
                                    سفارش</a>

                            @elseif($file->order()->withTrashed()->first())

                                سفارش مربوط به این فایل هنوز در زباله دان است.

                                @else

                                <form method="post" action="{{route('files.destroy', $file->id)}}">
                                    @csrf
                                    @method('delete')
                                   <button class="btn btn-danger" type="submit"><i class="fas fa-times mx-2"></i>حذف فایل</button>

                                </form>


                            @endif

                        </td>
                        <td>

                            <p>{{Storage::mimeType($file->file)}}</p>

                        </td>

                    </tr>

                @endforeach


                </tbody>
            </table>
        </div>

    </div>
@endsection


