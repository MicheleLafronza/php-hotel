
<?php

    // array degli hotel
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

    // data del get
    $data = $_GET;
    var_dump($data);

    // array di hotel filtrati

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- cdn bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <title>PHP Hotel</title>
</head>
<body>

<div class="container my-5">
    <h1 class="text-center">Hotels</h1>

    <form action="index.php" method="get">
        <h3>Parcheggio</h3>
        <select name="parcheggio" id="parcheggio">
            <option value="Sì">Sì</option>
            <option value="No">No</option>
        </select>
        <h3>Voto</h3>
        <select name="voto" id="voto">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select>
        <button class="btn btn-primary" >Filtra</button>
        <a class="btn btn-primary" href="index.php">Reset</a>
    </form>
        
    <!-- tabella -->
    <table class="table">
        <thead>
            <!-- titoli categorie -->
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrizione</th>
                <th scope="col">Parcheggio</th>
                <th scope="col">Voto</th>
                <th scope="col">Distanza</th>
            </tr>
        </thead>
        <tbody>

            <?php if(!count($data) || !isset($data['parcheggio']) || !isset($data['voto'])): ?>
                <!-- foreach degli array degli hotel -->
                <?php foreach($hotels as $hotel): ?>
                    
                    <!-- if per cambiare il valore di parkin da true o false a si o no -->
                    <?php if ($hotel['parking'] === true) {
                            $hotel['parking'] = 'Sì';
                        } else {
                            $hotel['parking'] = 'No';
                        }
                    ?>
                    
                    <!-- stampo tutti i valori in tabella -->
                    <tr>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] . ' ' . 'km' ?></td>
                    </tr>


                <?php endforeach; ?> 
            <?php else: ?>
                    
                <?php foreach($hotels as $hotel): ?>
                    
                    <!-- if per cambiare il valore di parkin da true o false a si o no -->
                    <?php if ($hotel['parking'] === true) {
                            $hotel['parking'] = 'Sì';
                        } else {
                            $hotel['parking'] = 'No';
                        }
                    ?>
                    

                    <?php if ($hotel['vote'] >= $data['voto'] && $hotel['parking'] === $data['parcheggio']): ?>

                    <!-- stampo tutti i valori in tabella -->
                    <tr>
                        <td><?php echo $hotel['name'] ?></td>
                        <td><?php echo $hotel['description'] ?></td>
                        <td><?php echo $hotel['parking'] ?></td>
                        <td><?php echo $hotel['vote'] ?></td>
                        <td><?php echo $hotel['distance_to_center'] . ' ' . 'km' ?></td>
                    </tr>
                    <?php endif; ?>

                <?php endforeach; ?>
            <?php endif; ?>
                
        </tbody>
    </table>

</div>
    
</body>
</html>
