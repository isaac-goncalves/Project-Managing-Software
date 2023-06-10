<html>

<head>
    <?php 
        require_once('navbar.php'); 
    ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-xxxxx" crossorigin="anonymous" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  
    <!-- <link rel="stylesheet" href="styles/tasks.css"> -->
    <title>Creditos</title>
    <style>
        .image-container {
            text-align: center;
            margin-bottom: 20px;
        }

        .image-container img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            margin-top: 4rem;
            margin-bottom: 5px;
        }
    </style>
</head>

<body>
    <?php
    $imagens = [
        ['url' => './img/isaac.jpg', 'titulo' => 'Isaac C. Gonçalves', 'sub-titulo' => '5º ADS'],
        ['url' => './img/carol.jpeg', 'titulo' => 'Caroline S. Amarante', 'sub-titulo' => '5º ADS']
    ];
    ?>

    <div class="container text-center">
        <div class="row">
            <?php foreach ($imagens as $imagem) { ?>
                <div class="col-md-6">
                    <div class="image-container">
                        <img src="<?php echo $imagem['url']; ?>" alt="Imagem">
                        <h4><?php echo $imagem['titulo']; ?></h4>
                        <p><?php echo $imagem['sub-titulo']; ?></p>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</body>

</html>
