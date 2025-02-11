@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="card col-12 col-md-8 col-lg-6 p-4">

                <div class="card-body ">

                    @if ($plate->image)
                        <img src="{{ asset('/storage/' . $plate->image) }}" class="card-img-top" alt="{{ $plate->name }}">
                    @else
                        <img src="{{ asset('images/placeholder-plate.png') }}" class="card-img-top" alt="Placeholder">
                    @endif

                    <h1 class="card-title text-center fw-bold mt-2">
                        Piatto: {{ $plate->name }}
                    </h1>
                    <p class="card-text">
                        Descrizione Piatto: {{ $plate->description }}
                    </p>
                    <p class="card-text">
                        Ingredienti: {{ $plate->ingredients }}
                    </p>
                    <p class="card-text">
                        Disponibilità del piatto:
                        @if ($plate->visibility)
                            Disponibile
                        @else
                            Non Disponibile
                        @endif
                    </p>
                    <p class="card-text fw-bold">
                        Prezzo: <strong>€ {{ $plate->price }}
                    </p>
                    <a href="{{ route('admin.plates.index') }}" class="btn btn-primary">Lista completa</a>
                </div>
            </div>
        </div>
    </div>
@endsection
