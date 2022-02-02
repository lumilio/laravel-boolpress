@extends('layouts.app')

@section('content')
<div class="p-5 bg-light">
    <div class="container">
        <h1 class="display-3">Contact Us</h1>
        <p class="lead">We will help you 24/24</p>
    </div>
</div>
@if (session('message'))
<div class="alert alert-success" role="alert">
    <strong>{{ session('message') }}</strong>
</div>
@endif
<div class="container">
    <form action="{{route('guest.contact.save')}}" method='post'>
    @csrf

        <div class="mb-3">
            <div class="row mb-5">
                <div class="col-3">
                    <label for="name" class="form-label"></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Mario Bross" required minleght='4' maxlenght='50' aria-describedby="nameHelper" value="{{old('name')}}">
                    <small id="helpId" class="text-muted">Inserisci il tuo nome</small>
                    @error('name')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-3">
                    <label for="e-mail" class="form-label"></label>
                    <input type="email" name="e-mail" id="e-mail" class="form-control" placeholder="mario.bross@gmail.com" required aria-describedby="e-mailHelper" value="{{old('e-mail')}}">
                    <small id="helpId" class="text-muted">inserici la tua mail migliore</small>
                    @error('e-mail')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <label for="cars">Tipo:</label>
            <select class='mb-3' name="cars" id="cars" form="carform">
                <option value="Preventivo">Preventivo</option>
                <option value="Consulenza">Consulenza</option>
                <option value="Assistenza">Assistenza</option>
                <option value="altro">altro</option>
            </select>
            <div class="row">
                <div class="mb-5">
                    <textarea class="form-control" name="content" required id="content" rows="3">{{old('content')}}</textarea>
                    <small id="content" class="text-muted">Scrivi quello che vuoi dirci</small>
                    @error('content')
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
@endsection