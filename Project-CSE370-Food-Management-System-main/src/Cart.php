<!DOCTYPE html>
<html data-theme="light" lang="en" style="scroll-behavior: smooth;">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>cart</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.9.0/dist/full.min.css" rel="stylesheet" type="text/css" />
    <!-- design plugs -->
    <script src="https://kit.fontawesome.com/5f28ebb90a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
      tailwind.config = {
        theme: {
          extend: {
            colors: {
              yellowPrimary: '#FFBF00',
              redSecondary: '#D2222D',
              greenSecondary: '#008F11',
            }
          }
        }
      }
    </script>
</head>
<body>
    <header>
      <nav class="h-24 px-60 flex justify-between items-center">
        <div class="flex items-center">
          <img class="h-16 w-16" src="../ICON/logo.png" alt="">
          <h1 class="text-3xl font-bold ml-3">TarcDining</h1>
        </div>  
        <div class="flex items-center">
            <div class="flex items-center hover:text-redSecondary">
            <i class="fa-solid fa-house fa-rotate-by mr-2"></i>
            <a href="customerHome.php" class="text-xl font-semibold uppercase">Home</a>
            </div>
          </div>
          <div class="flex items-center ml-5 hover:text-redSecondary">
            <i class="fa-solid fa-list mr-2"></i>
            <a href="allItems.php" class="text-xl font-semibold uppercase">Items</a>
          </div>
          <div class='flex items-center ml-5 hover:text-redSecondary'>
                             <!--changed-->
            <i class="fa-solid fa-list-check mr-2"></i>
            <a href='Cart.php' class='text-xl font-semibold uppercase'>Add</a>
          </div>
        <div>
          <?php
            if(isset($_COOKIE['username'])) {
                $username = $_COOKIE['username'];
                echo 
                "<div class='flex items-center'>
                  <i class='fa-solid fa-user mr-2 text-2xl'></i>
                  <h1 class='text-xl font-semibold uppercase'>$username</h1>
                 </div>";
            } else {
                echo "No username cookie set";
            }
            ?>
        </div>
      </nav>
    </header>
    <main>
      <section class="px-[15rem]">
        <h1 class="text-center text-7xl font-extrabold my-10">
            Confirm your order
        </h1>
        <div class='overflow-x-auto'>
          <table class='table'>
              <thead>
                  <tr>
                    <!--changed-->
                      <th>Food Name</th>
                      <th>Food Price</th>
                      <th>Quantity</th>
                      <th></th>
                  </tr>
              </thead>
              <tbody>
              <?php 
                require_once('DBconnect.php');
                $useremail = $_COOKIE['email'];
                $query = "SELECT * FROM carts WHERE customeremail = '$useremail'";
                $result = mysqli_query($conn, $query);
                $totalCost = 0;
                if (mysqli_num_rows($result) > 0){
                    while ($row = mysqli_fetch_assoc($result)){
                        $productid = $row['productId'];
                        $productname = $row['productname'];
                        $productprice = $row['price'];
                        $productquantity = $row['productamount'];
                        $totalCost = ($productprice * $productquantity)+$totalCost;
                        // checking the product amount type
                        $sql = "SELECT * FROM products WHERE productId = '$productid'";
                        $productResult = mysqli_query($conn, $sql);
                        $row = mysqli_fetch_assoc($productResult);
                        // $productMeasurementUnits = explode(",",$row['ammount']);
                        // if($productMeasurementUnits[0] == 'wp') {
                        //   $unit= 'Pounds';
                        // } else if ($productMeasurementUnits[0] == 'wk') {
                        //   $unit= 'Kg';
                        // } else if ($productMeasurementUnits[0] == 'p') {
                        //   $unit= 'Pieces';
                        // }
                        ?>
                            <tr>
                              <td><?php echo $productname; ?></td>
                              <td><?php echo $productprice; ?>$</td>
                              <td class="uppercase"><?php echo $productquantity .' '. $unit; ?></td>
                              <td onclick="handleForm('<?php echo $useremail; ?>','<?php echo $productid; ?>')"><i class='fa-solid fa-trash hover:text-red-500 cursor-pointer'></i></td>
                            </tr>
                  <?php
                        }
                  }?>
                </tbody>
            </table>
        </div>
        <div class="my-20">
            <h1 class="text-2xl font-semibold">Total Cost: $<?php echo $totalCost; ?></h1>
        </div>
        <div class="hidden">
            <form action="handleRemoveCart.php" method="post" id="addForm">
                <input type="text" name="customeremail">
                <input type="text" name="productid">
            </form>
        </div>
        <script>
            function handleForm(useremail, productid) {
            document.getElementById('addForm').elements['productid'].value = productid;
            document.getElementById('addForm').elements['customeremail'].value = useremail;
            document.getElementById('addForm').submit();
            }
        </script>
        </section>
    </main>
</body>
</html>