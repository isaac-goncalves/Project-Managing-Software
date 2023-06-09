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
    <script type="text/javascript" src="./creditos.js"></script>
    <!-- <link rel="stylesheet" href="styles/tasks.css"> -->

    <script>
        // $(document).ready(function() {
        //     $('#myModal').modal();
        // }); 
    </script>

</head>

<body>
    <?php
    $imagens = [
        ['url' => './img/isaac.jpg', 'titulo' => 'Isaac C. Gonçalves', 'sub-titulo' => '5º ADS'],
        ['url' => './img/carol.jpeg', 'titulo' => 'Caroline S. Amarante', 'sub-titulo' => '5º ADS']
    ];
    ?>

    <div class="d-flex justify-content-center align-items-center">
        <?php foreach ($imagens as $imagem) { ?>
            <div class="d-flex flex-column align-items-center mx-3">
                <div class="rounded-circle" style="width: 150px; height: 150px; overflow: hidden;">
                    <img src="<?php echo $imagem['url']; ?>" class="img-fluid" alt="Imagem">
                </div>
                <h2 class="text-center"><?php echo $imagem['titulo']; ?></h2>
                <h4 class="text-center"><?php echo $imagem['sub-titulo']; ?></h4>
            </div>
        <?php } ?>
    </div>

</body>

</html>
