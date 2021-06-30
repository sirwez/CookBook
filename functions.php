<?php

//cadastro

if(!empty($_POST['button'])){

    if(!empty($_POST['url'])  && !empty($_POST['nome'])  && !empty($_POST['description']) && !empty($_POST['ingredientes']) && !empty($_POST['dificuldade']) && !empty($_POST['urlImage'])){

        $nome = $_POST['nome'];
        $description = $_POST['description'];
        $ingredientes = $_POST['ingredientes'];
        $dificuldade = $_POST['dificuldade'];
        $urlImage = $_POST['urlImage'];
        $url= $_POST['url'];

        global $wpdb;
        $wpdb->insert('wp_recipes', array(
           
            'nome' => $nome,
            'dificuldade' => $dificuldade, 
            'description' => $description, 
            'ingredientes' => $ingredientes, 
            'urlImage' => $urlImage,
            'url' => $url
        ));
    }
    wp_redirect("http://localhost/sic-control/"); //redireciona para a home
    exit;
}

if(!empty($_GET['delete'])){

    global $wpdb;

    $id = $_GET['delete'];

    $delete_user = $wpdb->delete('wp_recipes', array(
        'id'=>$id
    ));
    wp_redirect("http://localhost/sic-control/"); //redireciona para a home
    exit;
}

if(!empty($_POST['update'])){


    $nome = $_POST['nome'];
    
    $description = $_POST['description'];
    $ingredientes = $_POST['ingredientes'];
    $dificuldade = $_POST['dificuldade'];
    $urlImage = $_POST['urlImage'];
    $url = $_POST['url'];
    $id = $_POST['id'];


   
    if($nome !='' && !empty($_POST['nome'])){
        updateWpdb($nome, 'nome', $id);
    }
    if($description !='' && !empty($_POST['description'])){
        updateWpdb($description, 'description', $id);
    }
    if($ingredientes !='' && !empty($_POST['ingredientes'])){
        updateWpdb($ingredientes, 'ingredientes', $id);
    }
    if($dificuldade !='' && !empty($_POST['dificuldade'])){
        updateWpdb($dificuldade, 'dificuldade', $id);
    }
    if($urlImage !='' && !empty($_POST['urlImage'])){
        updateWpdb($urlImage, 'urlImage', $id);
    }
    if($url !='' && !empty($_POST['url'])){
        updateWpdb($url, 'url', $id);
    }

    wp_redirect("http://localhost/sic-control/"); //redireciona para a home
    exit;
}

function updateWpdb($val, $type, $id){
    global $wpdb;
    $wpdb->update('wp_recipes', array(
        $type => $val,
    ), array(
        'id' => $id
    )
);
}
?>