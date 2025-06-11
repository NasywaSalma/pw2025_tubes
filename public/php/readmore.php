<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>readmore</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
      font-family: 'poppins', sans-serif;
      outline: none;
      border: none;
      text-decoration: none;
      text-transform: capitalize;
      transition: all .2s linear;
    }

    body {
      background: white;
      color: black;
      font-family: sans-serif;
      height: 100vh;
      overflow: hidden;
    }

    .car-container {
      display: flex;
      align-items: center;
      justify-content: center;
      gap: 50px;
      height: 100vh;
      width: 100vw;
      padding: 40px;
    }

    #car-img {
      width: 40%;
      max-width: 500px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    }

    .car-info {
      width: 50%;
    }

    #car-title {
      color: #ffc107;
      margin-bottom: 20px;
      font-size: 30px;
    }

    #car-desc {
      font-size: 16px;
      line-height: 1.6;
      text-align: justify;
      color: #333;
    }

    .back-link {
      display: inline-block;
      margin-top: 1rem;
      border-radius: .5rem;
       background: #ffee80;
      color: black;
      font-weight: 300;
      font-size: 1rem;
      cursor: pointer;
      padding: .3rem 1rem;
      text-decoration: none;
    }

    .back-link:hover {
      background:#f9d806;
    }

    @media (max-width: 768px) {
      .car-container {
        flex-direction: column;
        height: auto;
        padding: 30px 20px;
        text-align: center;
      }

      #car-img {
        width: 80%;
        box-shadow: yellow 4 9px 20px rgba(231, 223, 81, 0.2);

      }

      .car-info {
        width: 100%;
      }

      #car-desc {
        text-align: left;
      }
    }
  </style>
</head>
<body>

  <div class="car-container" id="content">
    <img id="car-img" src="" alt="Car Image">
    <div class="car-info">
      <h1 id="car-title"></h1>
      <p id="car-desc"></p>
      <a href="index.php" class="back-link">← Back to Gallery</a>
    </div>
  </div>

  <script>
    const cars = {
      1: {
        img: "../../img/model.jpg",
        title: "Our Car Model",
        desc: "Terima kasih telah memilih salah satu mobil paling revolusioner di kelasnya. Ini bukan sekadar transaksi, tapi langkah awal Anda menuju era baru dalam berkendara..."
      },
      2: {
        img: "../../img/repair.jpg",
        title: "Our Parts Repair",
        desc: "Mobil sport legendaris dengan performa dan gaya yang memukau."
      },
      3: {
        img: "../../img/battery.jpg",
        title: "Battery Replacement",
        desc: "Supercar Jepang dengan akselerasi gila dan desain ikonik."
      },
      4: {
        img: "../../img/oil.jpg",
        title: "Oil Change",
        desc: "Supercar Jepang dengan akselerasi gila dan desain ikonik."
      },
      5: {
        img: "../../img/5.jpg",
        title: "Battery Replacement",
        desc: "Supercar Jepang dengan akselerasi gila dan desain ikonik."
      },
      6: {
        img: "../../img/support.jpg",
        title: "Our 24/7 Service",
        desc: "Layanan bantuan penuh kapanpun dibutuhkan."
      }
    };

    const params = new URLSearchParams(window.location.search);
    const id = params.get('id');

    if (cars[id]) {
      document.getElementById('car-img').src = cars[id].img;
      document.getElementById('car-title').innerText = cars[id].title;
      document.getElementById('car-desc').innerText = cars[id].desc;
    } else {
      document.getElementById('content').innerHTML = `
        <div style="text-align:center; width:100%">
          <h1>Mobil tidak ditemukan.</h1>
          <a href='index.php' class='back-link'>← Kembali</a>
        </div>`;
    }
  </script>

</body>
</html>