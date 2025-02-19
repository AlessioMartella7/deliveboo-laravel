@extends('layouts.app')

@section('content')
    {{-- @dd($orders) --}}
    <div class="container">
        <div class="row">
            <div class="col-12 text-center">
                <h1>Statistiche Ordini</h1>
                <div>
                    <button id="monthsBtn"  class="btn btn-primary">Mesi</button>
                    <button id="yearsBtn" class="btn btn-secondary">Anni</button>
                </div>
            </div>
            <div class="col-12 my-2" id="monthlyDiv">
                <h2>Andamento Vendite Mensili</h2>
                <canvas id="myChart"></canvas>
            </div>
            <div class="col-12 mt-5 d-none" id="annualDiv">
                <h2>Andamento Vendite Annuali</h2>
                <canvas id="annualChart"></canvas>
            </div>
        </div>
    </div>
@endsection

@section('additional-scripts')
    <script>
        //passo gli ordini del ristorante da php a js
        let orders = @json($orders);

        // oggetto di mapping tra mese e importo
        // serve per calcolare i totali
        // chiave: mese, valore: totale ordini per quel mese
        const monthsTotals = {};

        orders.forEach(element => {

            const orderDate = new Date((element.created_at));
            const orderMonth = orderDate.toLocaleString('default', { month: 'long' });

            // se il mese non è censito nell'oggetto monthsTotals, lo inserisco
            if (monthsTotals[orderMonth] === undefined) {
                monthsTotals[orderMonth] = 0;
            }

            // vado ad aggiungere all'esistente l'importo dell'ordine
            // corrente
            monthsTotals[orderMonth] = monthsTotals[orderMonth] + parseFloat(element.total);

        });

        const x = Object.keys(monthsTotals);
        const y = Object.values(monthsTotals);

        // console.log("x", x);
        // console.log("y", y);

        const yearsTotals = {};

        orders.forEach(element => {

            const orderDate2 = new Date((element.created_at));
            const orderYear = orderDate2.toLocaleString('default', { year: 'numeric' });

            if (yearsTotals[orderYear] === undefined) {
                yearsTotals[orderYear] = 0;
            }

            yearsTotals[orderYear] = yearsTotals[orderYear] + parseFloat(element.total);

            });

        const x1 = Object.keys(yearsTotals);
        const y1 = Object.values(yearsTotals);
    </script>

    @vite('resources/js/orders/stats.js');
@endsection
