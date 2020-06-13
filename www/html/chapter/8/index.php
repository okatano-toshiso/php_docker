<?php
define('DB_HOST', 'db');
define('DB_USER', 'root');
define('DB_PASSWORD', 'secret');
define('DB_NAME', 'test');

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $pdo = new PDO($dsn, DB_USER, DB_PASSWORD);
//     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     print('接続しました。');
// }
// catch(PDOException $e){
//     print('ERROR:'.$e->getMessage());
//     exit;
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
//     // ここで$dbを使って何らかの処理を行う
//     } catch (PDOException $e) {
//     print "Couldn't connect to the database: " . $e->getMessage();
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
//     echo var_dump($db);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $q = $db->exec("CREATE TABLE dishes (
//     dish_id INT,
//     dish_name VARCHAR(255),
//     price DECIMAL(4,2),
//     is_spicy INT
//     )");
// } catch (PDOException $e) {
//     print "Couldn't create table: " . $e->getMessage();
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $affectedRows = $db->exec("INSERT INTO dishes (dish_name, price, is_spicy)
//     VALUES ('Sesame Seed Puff', 2.50, 0)");
// } catch (PDOException $e) {
//     print "Couldn't insert a row: " . $e->getMessage();
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
//     $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $affectedRows = $db->exec("INSERT INTO dishes (dish_size, dish_name,
//     price, is_spicy)
//     VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
// } catch (PDOException $e) {
//     print "Couldn't insert a row: " . $e->getMessage();
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
// } catch (PDOException $e) {
//     print "Couldn't connect: " . $e->getMessage();
// }
// $result = $db->exec("INSERT INTO dishes (dish_size, dish_name, price, is_spicy)
// VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
// if (false === $result) {
//     $error = $db->errorInfo();
//     print "Couldn't insert!\n";
//     print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
// }

// try {
//     $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
//     $db = new PDO($dsn, DB_USER, DB_PASSWORD);
// } catch (PDOException $e) {
//     print "Couldn't connect: " . $e->getMessage();
// }
// $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
// $result = $db->exec("INSERT INTO dishes (dish_size, dish_name, price, is_spicy)
// VALUES ('large', 'Sesame Seed Puff', 2.50, 0)");
// if (false === $result) {
//     $error = $db->errorInfo();
//     print "Couldn't insert!\n";
//     print "SQL Error={$error[0]}, DB Error={$error[1]}, Message={$error[2]}\n";
// }

try {
    $dsn = 'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8;';
    $db = new PDO($dsn, DB_USER, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Eggplant with Chili Sauceは辛い
    // 影響を受ける行数に関心がなければ、
    // exec()の返り値を保持する必要はない
    $db->exec("UPDATE dishes SET is_spicy = 1
    WHERE dish_name = 'Eggplant with Chili Sauce'");
    // Lobster with Chili Sauceは辛くて高い
    $db->exec("UPDATE dishes SET is_spicy = 1, price=price * 2
    WHERE dish_name = 'Lobster with Chili Sauce'");
} catch (PDOException $e) {
    print "Couldn't insert a row: " . $e->getMessage();
}

