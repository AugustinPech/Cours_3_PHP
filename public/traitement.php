<?php
$filters = array_fill_keys(array_keys(filter_input_array(INPUT_POST)),FILTER_SANITIZE_SPECIAL_CHARS);
$filters["email"]=FILTER_SANITIZE_EMAIL;
$formulaire=filter_input_array(INPUT_POST, $filters);
// $prenom = filter_input(INPUT_POST,'prenom',  FILTER_SANITIZE_SPECIAL_CHARS);
// $nom = filter_input(INPUT_POST,'nom',  FILTER_SANITIZE_SPECIAL_CHARS);
// $gender = filter_input(INPUT_POST,'gender',  FILTER_SANITIZE_SPECIAL_CHARS);
// $email = filter_input(INPUT_POST,'email', FILTER_SANITIZE_EMAIL);
// $statut=filter_input(INPUT_POST,'statut', FILTER_SANITIZE_SPECIAL_CHARS);
// $mission = filter_input(INPUT_POST,'mission', FILTER_SANITIZE_SPECIAL_CHARS);
// $message = filter_input(INPUT_POST,'message', FILTER_SANITIZE_SPECIAL_CHARS);

$data;
foreach ($formulaire as $key =>$value) {
    $data = $data . "[$key] - - $value </br>";
}
$file='contact/contact'.date('y-m-d_h:i:s').'.txt';
file_put_contents($file, $data);

header("Location:  /cours01/traitement/resultat.php");
