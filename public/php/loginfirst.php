<!DOCTYPE html>
 <html lang="en">
 
 <head>
     <meta charset="UTF-8">
     <title>Halaman Admin</title>
     <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;700&display=swap" rel="stylesheet">
     <style>
         * {
             margin: 0;
             padding: 0;
             box-sizing: border-box;
             font-family: 'Poppins', sans-serif;
         }
 
         body {
             height: 100vh;
             background: linear-gradient(to right, rgb(255, 255, 255), #ffee80);
             height: 100vh;
             margin: 0;
             background-size: cover;
             background-repeat: no-repeat;
             background-position: center;
             display: flex;
             justify-content: center;
             align-items: center;
             font-family: 'Poppins', sans-serif;
         }

         .container {
            background-color: white;
             padding: 50px;
             border-radius: 15px;
             box-shadow: 0 10px 25px #f9d806;
             width: 350px;
             text-align: center;
         }

         .container .back {
            margin-top: 30px;
            
         }

         img {
            width: 10rem;
            margin-top: -10px;
         }
 
         h1 {
             color:rgb(0, 0, 0);
             margin-bottom: 30px;
             
         }
 
         a {
             text-decoration: none;
             color: white;
             background-color: #f9d806;
             padding: 10px 30px;
             border-radius: 8px;
             font-weight: bold;
             transition: background-color 0.3s ease;
         }
 
         a:hover {
             background-color:rgb(195, 170, 4);
         }
     </style>
 </head>
 
 <body>
     <div class="container">
         <h1>Please Login!</h1>
         <div><img src="Cutie.jpg" alt=""></div>
         <div><a href="../../register.php">Login</a></div>
         <div class="back"><a href="index.php">Back</a></div>
     </div>
 </body>
 
 </html>