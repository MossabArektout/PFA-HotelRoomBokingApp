<x-dashboard-layout>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .heading {
            text-align: center;
            margin-bottom: 30px;
        }

        .card {
            background-color: #f9f9f9;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
        }

        .card h2 {
            margin-top: 0;
        }

        .card p {
            margin-bottom: 0;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .col {
            flex-basis: calc(50% - 10px);
            margin-bottom: 20px;
        }

        @media (max-width: 768px) {
            .col {
                flex-basis: 100%;
            }
        }

        .large-number {
            font-size: 24px;
            /* Changer la taille de la police selon vos préférences */
            font-weight: bold;
            /* Optionnel : pour rendre les nombres plus visibles */
        }
    </style>
    </head>

    <body>
        <div class="container">
            <h1 class="heading">Statistics</h1>
            <div class="row">
                <div class="col">
                    <div class="card">
                        <h2>Total Clients</h2>
                        <p>Le nombre total d'utilisateurs enregistrés : </p>
                        <p class="large-number">{{ $totalClients }}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h2>Total Bookings</h2>
                        <p>Le nombre de réservations effectuées : </p>
                        <p class="large-number">{{ $totalOrders }}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h2>Revenue</h2>
                        <p>Les revenus générés jusqu'à présent : </p>
                        <p class="large-number">{{ $totalRevenue }}</p>
                    </div>
                </div>
                <div class="col">
                    <div class="card">
                        <h2>Conversion Rate</h2>
                        <p class="large-number">Placeholder for conversion rate.</p>
                    </div>
                </div>
            </div>
        </div>



</x-dashboard-layout>
