<?php
include("connectDb.php");
    session_start();
     if (isset($_SESSION['id'])) {
    header('Content-Type: text/html; charset=UTF-8');
} else {

  header("Location: index.php");
  exit;
}



   
    
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // POST isteği geldiyse devam edin
    if (isset($_SESSION['id'])) {
        // User ID'yi alın
        $meals= generateMealPlan(); // Örnek bir öğün planı üretici fonksiyon
        $start_date = date("Y-m-d");
        $userId = $_SESSION['id'];
        $foods=generateFoods();
        $foods_quantities=generateQuantities();
        $calori_values=generateCalories();
        

        // INSERT sorgusunu oluşturun ve yeni satırı ekleyin
        $insertSql = "INSERT INTO dietplanslist (meals, start_date, user_id, foods,foods_quantities,calori_values) 
                      VALUES ('$meals','$start_date','$userId','$foods','$foods_quantities','$calori_values')";

        // Sorguyu çalıştırın
        if (mysqli_query($connection, $insertSql)) {
            // Başarı durumunda geri dönüş mesajı
            header("Location: userHome.php");
            exit; 
        } else {
            // Hata durumunda geri dönüş mesajı
            echo "Error generating diet plan: " . mysqli_error($connection);
        }
    } else {
        // Hata durumunda geri dönüş mesajı
        echo "User ID is missing.";
    }
} else {
    // Hata durumunda geri dönüş mesajı
    echo "Invalid request method.";
}

// Örnek bir öğün planı üretici fonksiyon
function generateMealPlan() {
    // Burada öğün planı oluşturma mantığınızı uygulayabilirsiniz
    // Örneğin, rastgele bir öğün planı oluşturup geri döndürebilirsiniz
    // Bu fonksiyonu kendi ihtiyaçlarınıza göre güncelleyebilirsiniz
    $mealPlan = "Kahvaltı: Yulaf ezmesi, meyve, süt\n";
    $mealPlan .= "Öğle Yemeği: Izgara tavuk, sebzeler, pirinç\n";
    $mealPlan .= "Akşam Yemeği: Balık, salata, tam buğday ekmeği\n";

    return $mealPlan;
}

function generateFoods() {
    // Burada öğün planı oluşturma mantığınızı uygulayabilirsiniz
    // Örneğin, rastgele bir öğün planı oluşturup geri döndürebilirsiniz
    // Bu fonksiyonu kendi ihtiyaçlarınıza göre güncelleyebilirsiniz
    $mealPlan = "Kahvaltı: Yulaf ezmesi, meyve, süt\n";
    $mealPlan .= "Öğle Yemeği: Izgara tavuk, sebzeler, pirinç\n";
    $mealPlan .= "Akşam Yemeği: Balık, salata, tam buğday ekmeği\n";

    return $mealPlan;
}
function generateQuantities() {
    // Burada öğün planı oluşturma mantığınızı uygulayabilirsiniz
    // Örneğin, rastgele bir öğün planı oluşturup geri döndürebilirsiniz
    // Bu fonksiyonu kendi ihtiyaçlarınıza göre güncelleyebilirsiniz
    $mealPlan = "Kahvaltı: Yulaf ezmesi, meyve, süt\n";
    $mealPlan .= "Öğle Yemeği: Izgara tavuk, sebzeler, pirinç\n";
    $mealPlan .= "Akşam Yemeği: Balık, salata, tam buğday ekmeği\n";

    return $mealPlan;
}
function generateCalories() {
    // Burada öğün planı oluşturma mantığınızı uygulayabilirsiniz
    // Örneğin, rastgele bir öğün planı oluşturup geri döndürebilirsiniz
    // Bu fonksiyonu kendi ihtiyaçlarınıza göre güncelleyebilirsiniz
    $mealPlan = "Kahvaltı: Yulaf ezmesi, meyve, süt\n";
    $mealPlan .= "Öğle Yemeği: Izgara tavuk, sebzeler, pirinç\n";
    $mealPlan .= "Akşam Yemeği: Balık, salata, tam buğday ekmeği\n";

    return $mealPlan;
}
?>
