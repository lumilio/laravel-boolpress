


@extends('admin.layouts.DashboardTemplate')

@section('table')
<div class=" container-fluid d-flex justify-content-center">
    <div class="container d-flex">
        <div style='margin-top:30px' class='me-2 container-fluid'>
            <div class="container-fluid p-4 bg-primary">
                <p class='mb-4'>{{$message->name}} - {{$message['e-mail-user']}}</p>
                <p>Ha scritto:</p>
                <p class='bg-white p-4'>{{$message->content}}</p>
            </div>


            <form action="{{route('admin.inbox.store')}}" method='post'>
            @csrf
                <div class="mb-3">
                    <div class="row mt-5">
                        <div class="col-3">
                            <label for="e-mail-user" class="form-label"></label>
                            <input type="email" name="e-mail-user" id="e-mail-user" class="form-control" placeholder="mario.bross@gmail.com" required aria-describedby="e-mail-userHelper" value="{{$message['e-mail']}}">
                            <small id="helpId" class="text-muted">la sua mail</small>
                            @error('e-mail-user')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-5">
                            <textarea class="form-control" name="content-answer" required id="content-answer" rows="3">{{old('content-answer')}}</textarea>
                            <small id="content-answer" class="text-muted">Rispondigli</small>
                            @error('content-answer')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="container-fluid d-flex justify-content-center">
                    <button type="submit" class="btn px-5 text-white btn-primary">Send</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection