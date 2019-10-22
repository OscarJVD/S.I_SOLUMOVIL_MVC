<?php
 $dashboard_s = "";
 $product_s = "";
 $service_s = "";
 $sale_s = "";
 $buy_s = "";
 $user_s = "";
 $client_s = "";
 $provider_s = "";
 $category_s = "";
 $report_s = "";

   switch($_REQUEST["c"]):
      case "main":
      $dashboard_s = "active";
      break;
      case "product":
      $product_s = "active";
      break;
      case "service":
      $service_s = "active";
      break;
      case "sale":
      $sale_s = "active";
      break;
      case "buy":
      $buy_s = "active";
      break;
      case "user":
      $user_s = "active";
      break;
      case "client":
      $client_s = "active";
      break;
      case "provider":
      $provider_s = "active";
      break;
      case "category":
      $category_s = "active";
      break;
      case "report":
      $report_s = "active";
      break;
      default;
      $dashboard_s = "active";

   endswitch;
?>