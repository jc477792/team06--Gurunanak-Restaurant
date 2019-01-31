<?php
include_once("Connections\cn.php");
session_start();
 
 $cart;
 if(isset($_SESSION['cart_item'])){
     $cart=$_SESSION['cart_item'];
 }
  $selectorder="SELECT max(orderGroup) as n FROM tbl_orders";
  $maxorder= mysqli_query($cn, $selectorder);
  $order=mysqli_fetch_assoc($maxorder);
 if(!empty($cart)){
               date_default_timezone_set('Australia/Brisbane');
                $group=$order['n']+1;
                $query="";
                $date = date('Y-m-d');
                
                foreach($cart as $k=>$c){
                $query.="INSERT INTO tbl_orders(item_id, user_id, quantity,date,orderGroup) VALUES ('" . $c['id'] . "','" . $_SESSION['id'] . "','" . $c['quantity'] . "','".$date."',".$group.");";
                
                
                }
                 $result = mysqli_multi_query($cn, $query);
                 if($result){
                     $_SESSION['cart_item']=[];
                     $_SESSION['msg']="Order added successfully.";
                     header('location:addTocart.php');
                 }
                 else{
                      $_SESSION['errmsg']="Order added successfully.";
                     header('location:addTocart.php');
                 }
 } else{
                      $_SESSION['errmsg']="Please add items to cart.";
                    // header('location:addTocart.php');
                 }
 
        
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

