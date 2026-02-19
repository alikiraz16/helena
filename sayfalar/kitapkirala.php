<!DOCTYPE html>
<html lang="tr">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Kitap Kiralama Sistemi</title>
  <link rel="stylesheet" href="../css/musteriPanel.css" />
  <style>
    body {
      margin: 0;
      padding: 0;
      font-family: 'Roboto', sans-serif;
      font-size: 16px;
      background-color: #f7f7f7;
      background: linear-gradient(to bottom, rgb(228, 217, 193), #ece6db, #e8e1d5, #ece7e2);
      color: #10375C;
      height: auto;
    }

    .header-container {
      display: flex;
      align-items: center;
      justify-content: first baseline;
      max-width: 1000px;
      margin: 20px auto;
      padding: 10px 20px;
      background: linear-gradient(to bottom, #ffffff, rgb(226, 226, 226));
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
    }

    .logo {
      width: 80px;
      cursor: pointer;
      margin-right: 0px;
    }

    h1 {
      text-align: center;
      color: #10375c;
      font-size: 1.8rem;
      margin-left: 280px;
    }

    .container {
      max-width: 1000px;
      margin: 20px auto;
      padding: 20px;
      box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
      border-radius: 8px;
      background: linear-gradient(to bottom, #ffffff, rgb(226, 226, 226));
    }

    #kitap-listesi {
      display: flex;
      flex-direction: column;
      gap: 15px;
      padding: 0 10px;
    }

    .kitap {
      display: flex;
      justify-content: space-between;
      align-items: center;
      padding: 15px;
      border: 1px solid #ddd;
      border-radius: 5px;
      background: #f7f7f7;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
      color: #10375c;
      width: calc(100% - 20px);
      margin: 0 auto;
      background: linear-gradient(to bottom, #ffffff, rgb(226, 226, 226));
    }

    .kitap span {
      font-size: 1.1rem;
      flex: 1;
      text-align: left;
    }

    .kitap button {
      padding: 10px 15px;
      background-color: #005bb5;
      color: white;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-weight: bold;
      transition: background-color 0.3s;
    }

    .kitap button:hover {
      background-color: #2d2574;
    }

    .kitap button:disabled {
      background-color: #ccc;
      cursor: not-allowed;
    }

    .kitap button:disabled:hover {
      background-color: #ccc;
    }
  </style>
</head>

<body>
  <div class="header-container">
    <a href="musteriPanel.php">
      <img src="../dosyalar/LogoIcon/logo.png" alt="Helena Logo" class="logo" />
    </a>
    <h1>Kitap Kiralama Sistemi</h1>
  </div>
  <div class="container">
    <div id="kitap-listesi">
    </div>
  </div>
  <script>
    async function fetchBooks() {
      try {
        const response = await fetch("../php/get_books.php");
        const kitaplar = await response.json();

        const kitapListesi = document.getElementById("kitap-listesi");
        kitaplar.forEach((kitap) => {
          const kitapDiv = document.createElement("div");
          kitapDiv.classList.add("kitap");
          kitapDiv.innerHTML = `
              <span>${kitap.kitap_adi} - ${kitap.yazar} (${kitap.tur})</span>
              <button onclick="kirala(${kitap.kitap_id})" id="kirala-${kitap.kitap_id}" ${
                kitap.adet > 0 ? "" : "disabled"
              }>
                ${kitap.adet > 0 ? "Kirala" : "Stok Yok"}
              </button>
            `;
          kitapListesi.appendChild(kitapDiv);
        });
      } catch (error) {
        console.error("Kitaplar yüklenirken bir hata oluştu:", error);
      }
    }

    function kirala(kitapId) {
      fetch("../php/kirala.php", {
          method: "POST",
          headers: {
            "Content-Type": "application/json",
          },
          body: JSON.stringify({
            kitap_id: kitapId
          }),
        })
        .then((response) => response.json())
        .then((data) => {
          if (data.success) {
            alert("Kitap başarıyla kiralandı!");
            disableAllButtons();
          } else {
            alert(
              data.message || "Kitap kiralanamadı. Lütfen tekrar deneyin."
            );
          }
        })
        .catch((error) => console.error("Hata:", error));
    }

    function disableAllButtons() {
      const buttons = document.querySelectorAll("button");
      buttons.forEach((button) => (button.disabled = true));
    }

    document.addEventListener("DOMContentLoaded", fetchBooks);
  </script>
</body>

</html>