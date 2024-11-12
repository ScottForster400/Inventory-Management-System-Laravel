<x-app-layout>
    <x-slot name="header">
        <h1 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Checkout</h1>
    </x-slot>

    <body>

<div class="checkout-display">
        <h2>Cart Summary</h2>
        <ul class="cart-items">
        <li class="item">
            <span class="item-name">Bananagrams</span>
            <span class="item-price">£31.99</span>
        </li>
        <li class="item">
            <span class="item-name">Uno</span>
            <span class="item-price">£11.99</span>
        </li>
        <li class="item">
            <span class="item-name">Lego Supermario</span>
            <span class="item-price">£39.99</span>
        </li>
        </ul>
        <div class="total">
        <span>Total:</span>
        <span class="total-amount">£6</span>
        </div>
        <button class="pay-button">Pay</button>
    </div>


<section class = "main-checkout">
        
        <div class="checkout-container">
    <a href="second-checkout.blade.php" class="checkout-box-link">
        <div class="checkout-box">Board  Games</div>
    </a>
    <a href="second-checkout.blade.php" class="checkout-box-link">
        <div class="checkout-box">Card Games</div>
    </a>
    <a href="second-checkout.blade.php" class="checkout-box-link">
        <div class="checkout-box">Puzzles</div>
    </a>
    <a href="second-checkout.blade.php" class="checkout-box-link">
        <div class="checkout-box">Figures</div>
    </a>
</div>

<div class= "checkout-functions">
            
             <a href="auditroll.php" class="checkout-main-small-buttons">   
            <div class ="checkout-buttons"> AUDIT ROLL</div>  </a>        
            
            <a href="receipt.php" class="checkout-main-small-buttons">   
            <div class ="checkout-buttons"> PRINT LAST RECEIPT</div> </a>
            
  </section>

    
</x-app-layout>
