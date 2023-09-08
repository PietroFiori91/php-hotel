<!DOCTYPE html>
<html>

<head>
    <title>Lista Hotel</title>
</head>

<body>
    <h1>Lista degli Hotel</h1>
    <form method="GET">
        <label for="filter_parking">Parcheggio:</label>
        <input type="checkbox" name="filter_parking" id="filter_parking" value="1">

        <label for="filter_vote">Voto superiore a:</label>
        <input type="number" name="filter_vote" id="filter_vote" min="1" max="5">

        <input type="submit" value="Filtra">
    </form>
    <table>
        <tr>
            <th>Nome</th>
            <th>Descrizione</th>
            <th>Parcheggio</th>
            <th>Voto</th>
            <th>Distanza al centro</th>
        </tr>
        <?php
        $hotels = [
            [
                'name' => 'Hotel Belvedere',
                'description' => 'Hotel Belvedere Descrizione',
                'parking' => true,
                'vote' => 4,
                'distance_to_center' => 10.4
            ],
            [
                'name' => 'Hotel Futuro',
                'description' => 'Hotel Futuro Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 2
            ],
            [
                'name' => 'Hotel Rivamare',
                'description' => 'Hotel Rivamare Descrizione',
                'parking' => false,
                'vote' => 1,
                'distance_to_center' => 1
            ],
            [
                'name' => 'Hotel Bellavista',
                'description' => 'Hotel Bellavista Descrizione',
                'parking' => false,
                'vote' => 5,
                'distance_to_center' => 5.5
            ],
            [
                'name' => 'Hotel Milano',
                'description' => 'Hotel Milano Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 50
            ],
        ];

        $filteredHotels = $hotels;

        // Applica i filtri
        if (isset($_GET['filter_parking']) && $_GET['filter_parking'] == '1') {
            $filteredHotels = array_filter($filteredHotels, function ($hotel) {
                return $hotel['parking'] === true;
            });
        }

        if (isset($_GET['filter_vote']) && is_numeric($_GET['filter_vote'])) {
            $filteredHotels = array_filter($filteredHotels, function ($hotel) {
                return $hotel['vote'] >= $_GET['filter_vote'];
            });
        }

        foreach ($filteredHotels as $hotel) {
            echo '<tr>';
            echo '<td>' . $hotel['name'] . '</td>';
            echo '<td>' . $hotel['description'] . '</td>';
            echo '<td>' . ($hotel['parking'] ? 'Sì' : 'No') . '</td>';
            echo '<td>' . $hotel['vote'] . '</td>';
            echo '<td>' . $hotel['distance_to_center'] . '</td>';
            echo '</tr>';
        }
        ?>
    </table>
</body>

</html>