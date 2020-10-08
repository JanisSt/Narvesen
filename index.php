<?php declare(strict_types=1);

require_once 'Store.php';
require_once 'Product.php';
require_once 'ProductFormatter.php';
require_once 'ProductStorage.php';
require_once 'Person.php';

$person = new Person('Janis', 1000);
$storage = new ProductStorage('./products.txt', $basket = []);
//$after_storage = new AfterProductStorage('./products.txt');
$store = new Store('Purčika Narvesen', $storage->load());

echo 'Costumer: ' . $person->name() . PHP_EOL;
echo 'Current funds: ' . ProductFormatter::price($person->funds(0));
echo PHP_EOL;
echo PHP_EOL;
echo '------------------------------------' . PHP_EOL;
echo $store->getName() . PHP_EOL;
echo '0: To EXIT the shop' . PHP_EOL;

foreach ($store->getAllProducts() as $key => $product) {
    echo $key + 1 . ': ';
    echo $product->name() . ' ';
    echo ProductFormatter::price($product->price()) . ' ';
    echo ProductFormatter::amount($product->amount()) . ' ';
    echo PHP_EOL;
}

$P = readline('What would you want to buy: ') . PHP_EOL;
$buyName = intval($P) - 1;
if ($P == 0) {
    exit;
};

$Q = readline('How many would you want to buy: ') . PHP_EOL;
$buyAmount = intval($Q);
$arr = [];

while ($person->funds(0) > 0) {
//-----------------------------------------------------------------------
    echo '-----------------------------------------------;' . PHP_EOL;
    echo 'Shop loading // Shop loading // Shop loading // ' . PHP_EOL;
    echo '-----------------------------------------------;' . PHP_EOL;
    echo 'Costumer: ' . $person->name() . PHP_EOL;
    $payment = ProductFormatter::price($person->removeFunds($storage->pay($buyName, $buyAmount)));
    echo 'Current funds: ' . $payment;
    echo PHP_EOL;
    echo 'Current basket: ' . PHP_EOL;
    echo $storage->buy($buyName, $buyAmount) . PHP_EOL;
    echo PHP_EOL;
    echo '------------------------------------' . PHP_EOL;
    echo $store->getName() . PHP_EOL;
    echo '0: To EXIT the shop' . PHP_EOL;
    foreach ($store->getAllProducts() as $key => $product) {
        echo $key + 1 . ': ';
        echo $product->name() . ' ';
        echo ProductFormatter::price($product->price()) . ' ';
        echo ProductFormatter::amount($product->amount()) . ' ';
        echo PHP_EOL;
    }

    echo '-----------------------' . PHP_EOL;

    echo 'Current money left: ' . $payment . PHP_EOL;
    $P = readline('What would you want to buy: ') . PHP_EOL;
    $buyName = intval($P) - 1;
    if ($P == 0) {
        exit;
    };
    $Q = readline('How many would you want to buy: ') . PHP_EOL;
    $buyAmount = intval($Q);
}