<?php
try {
    $connection = new MongoClient();
    echo 'connected!';
} catch (MongoConnectionException $e) {
    echo 'not Connected';
    die($e->getMessage());
}

$db = $connection->selectDB('consumoPessoal');
$valores[] = array('valor'=>30.33,'data'=>date('d/m/Y'));
$valores[] = array('valor'=>30.33);
$valores[] = array('valor'=>30.33);

$consumo = array(
    'nomePessoa' => 'Elias Müller',
    'consumos' => $valores

);

$collection = $db->consumo;
//$collection->insert($consumo);
//$result = $collection->remove();
$result = $collection->find();

// $collection->remove(array('_id'=>new MongoId('553c644641923ebb328b4567')));
while ($var = $result->getNext()) {
    var_dump($var);
}

