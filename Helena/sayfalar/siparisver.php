<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sipariş Sayfası</title>
    <link rel="stylesheet" href="../css/siparisVer.css">
</head>

<body>
    <header>
        <h1>Sipariş Menüsü</h1>
    </header>

    <nav class="category-nav">
        <?php
        $conn = new mysqli("localhost", "root", "", "helena");
        if ($conn->connect_error) {
            die("Bağlantı hatası: " . $conn->connect_error);
        }

        $categoriesSql = "SELECT * FROM kategoriler";
        $categoriesResult = $conn->query($categoriesSql);

        if ($categoriesResult->num_rows > 0) {
            while ($category = $categoriesResult->fetch_assoc()) {
                $isActive = (isset($_GET['category']) && $_GET['category'] == $category['kategori_adi']) ? 'active' : '';
                echo '<a href="?category=' . $category['kategori_adi'] . '" class="' . $isActive . '">' . $category['kategori_adi'] . '</a>';
            }
        }
        ?>
    </nav>

    <div class="menu-container">
        <table id="menu-table">
            <thead>
                <tr>
                    <th>Ürün Adı</th>
                    <th>İçerik</th>
                    <th>Fiyat</th>
                    <th>Adet</th>
                    <th>İşlemler</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $selectedCategory = isset($_GET['category']) ? $_GET['category'] : 'Soğuk İçecekler';

                $categorySql = "SELECT kategori_id FROM kategoriler WHERE kategori_adi = ?";
                $stmt = $conn->prepare($categorySql);

                if (!$stmt) {
                    die("Sorgu hazırlama hatası: " . $conn->error . " | SQL: " . $categorySql);
                }

                $stmt->bind_param("s", $selectedCategory);
                $stmt->execute();
                $categoryResult = $stmt->get_result();

                if ($categoryResult->num_rows > 0) {
                    $categoryRow = $categoryResult->fetch_assoc();
                    $categoryId = $categoryRow['kategori_id'];

                    $menuSql = "SELECT * FROM urunler WHERE kategori_id = ?";
                    $stmt = $conn->prepare($menuSql);


                    if (!$stmt) {
                        die("Ürün sorgusu hazırlama hatası: " . $conn->error . " | SQL: " . $menuSql);
                    }

                    $stmt->bind_param("i", $categoryId);
                    $stmt->execute();
                    $menuResult = $stmt->get_result();

                    if ($menuResult->num_rows > 0) {
                        while ($row = $menuResult->fetch_assoc()) {
                            echo '<tr>';
                            echo '<td>' . $row["urun_adi"] . '</td>';
                            echo '<td>' . $row["icerik"] . '</td>';
                            echo '<td>' . $row["fiyat"] . ' TL</td>';
                            echo '<td id="item-' . $row["urun_id"] . '-quantity">0</td>';
                            echo '<td>';
                            echo '<button class="adjust-btn" onclick="updateCart(' . $row["urun_id"] . ', \'' . $row["urun_adi"] . '\', ' . $row["fiyat"] . ', -1)">-</button>';
                            echo '<span class="button-space"></span>';
                            echo '<button class="adjust-btn" onclick="updateCart(' . $row["urun_id"] . ', \'' . $row["urun_adi"] . '\', ' . $row["fiyat"] . ', 1)">+</button>';
                            echo '</td>';
                            echo '</tr>';
                        }
                    } else {
                        echo '<tr><td colspan="5">Bu kategoride ürün bulunmamaktadır.</td></tr>';
                    }
                } else {
                    echo '<tr><td colspan="5">Kategori bulunamadı.</td></tr>';
                }
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <div class="cart">
        <h3>Sepet</h3>
        <div id="cart-items">

        </div>
        <div id="total-price">
            Toplam Fiyat: 0.00 TL
        </div>
        <button id="order-button" onclick="submitOrder()">Sipariş Ver</button>
    </div>

    <script>
        const cart = JSON.parse(localStorage.getItem("cart")) || {};
        function updateCart(itemId, itemName, itemPrice, change) {
            const quantityElement = document.getElementById(`item-${itemId}-quantity`);
            const currentQuantity = parseInt(quantityElement.textContent);

            if (change === -1 && currentQuantity === 0) return;

            const newQuantity = currentQuantity + change;
            quantityElement.textContent = newQuantity;

            if (newQuantity === 0) {
                delete cart[itemId];
            } else {
                cart[itemId] = {
                    name: itemName,
                    price: itemPrice,
                    quantity: newQuantity
                };
            }

            localStorage.setItem("cart", JSON.stringify(cart));
            updateCartView();
        }

        function updateCartView() {
            const cartItemsContainer = document.getElementById("cart-items");
            cartItemsContainer.innerHTML = "";
            let totalPrice = 0;

            for (const [itemId, item] of Object.entries(cart)) {
                const cartItem = document.createElement("div");
                cartItem.classList.add("cart-item");
                cartItem.textContent = `${item.name} x${item.quantity} - ${(item.price * item.quantity).toFixed(2)} TL`;

                cartItemsContainer.appendChild(cartItem);
                totalPrice += item.price * item.quantity;
            }

            document.getElementById("total-price").textContent = `Toplam Fiyat: ${totalPrice.toFixed(2)} TL`;
        }

        function submitOrder() {
    let orderData = Object.entries(cart).map(([itemId, item]) => ({
        urun_id: itemId,
        miktar: item.quantity,
        toplam_fiyat: (item.price * item.quantity).toFixed(2)
    }));
    console.log("ordered data: ",orderData);

    fetch('../php/siparis_ver.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        console.log(data);
        if (data.success) {
            alert('Siparişiniz başarıyla alındı!');
            localStorage.removeItem('cart');
            location.reload();
        } else {
            alert('Sipariş oluşturulamadı: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Hata:', error.message);
        alert('Sipariş sırasında bir hata oluştu.');
    });
}

        window.onload = updateCartView;
    </script>
</body>

</html>