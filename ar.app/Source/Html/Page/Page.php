<!DOCTYPE html>
<html lang="pt-PT">
  
<head>
    <meta charset="utf-8">
    <title><?php echo DATA['TITLE']; ?></title>

    <?php if(DATA['META'] != null) 
          { ?>
            <meta name="description" content="<?php echo DATA['META']['DESCRIPTION']; ?>">
            <meta name="keywords" content="<?php echo DATA['META']['KEYWORDS']; ?>">
            <meta name="author" content="<?php echo DATA['META']['AUTHOR']; ?>">
    <?php } ?>

    <?php if(DATA['META'] == null) 
          { ?>
            <!--noindex-->
    <?php }; ?>

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo ASSET; ?>logo/favicon.png">

    <link rel="stylesheet" media="screen" href="<?php echo  ASSET; ?>vendor/boxicons/css/boxicons.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo ASSET; ?>vendor/bootstrap-icons/bootstrap-icons.css">

    <script src="<?php echo ASSET; ?>vendor/sweetalert/dist/sweetalert.js"></script>
    <link rel="stylesheet" href="<?php echo ASSET; ?>vendor/sweetalert/dist/sweetalert.css">

    <script src="<?php echo ASSET; ?>vendor/chartjs/dist/chart.js"></script>

    <script src="<?php echo ASSET; ?>vendor/jquery/jquery.min.js"></script>

    <link rel="stylesheet" media="screen" href="<?php echo  ASSET; ?>css/theme.min.css">

    <style>
      .page-loading {
        position: fixed;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 100%;
        -webkit-transition: all .4s .2s ease-in-out;
        transition: all .4s .2s ease-in-out;
        background-color: #fff;
        opacity: 0;
        visibility: hidden;
        z-index: 9999;
      }
      .dark-mode .page-loading {
        background-color: #131022;
      }
      .page-loading.active {
        opacity: 1;
        visibility: visible;
      }
      .page-loading-inner {
        position: absolute;
        top: 50%;
        left: 0;
        width: 100%;
        text-align: center;
        -webkit-transform: translateY(-50%);
        transform: translateY(-50%);
        -webkit-transition: opacity .2s ease-in-out;
        transition: opacity .2s ease-in-out;
        opacity: 0;
      }
      .page-loading.active > .page-loading-inner {
        opacity: 1;
      }
      .page-loading-inner > span {
        display: block;
        font-size: 1rem;
        font-weight: normal;
        color: #9397ad;
      }
      .dark-mode .page-loading-inner > span {
        color: #fff;
        opacity: .6;
      }
      .page-spinner {
        display: inline-block;
        width: 2.75rem;
        height: 2.75rem;
        margin-bottom: .75rem;
        vertical-align: text-bottom;
        border: .15em solid #b4b7c9;
        border-right-color: transparent;
        border-radius: 50%;
        -webkit-animation: spinner .75s linear infinite;
        animation: spinner .75s linear infinite;
      }
      .dark-mode .page-spinner {
        border-color: rgba(255,255,255,.4);
        border-right-color: transparent;
      }
      @-webkit-keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
      @keyframes spinner {
        100% {
          -webkit-transform: rotate(360deg);
          transform: rotate(360deg);
        }
      }
    </style>

    <script>
      let mode = window.localStorage.getItem('mode'),
          root = document.getElementsByTagName('html')[0];
      if (mode !== null && mode === 'dark') {
        root.classList.add('dark-mode');
      } else {
        root.classList.remove('dark-mode');
      }
    </script>

    <script>
      (function () {
        window.onload = function () {
          const preloader = document.querySelector('.page-loading');
          preloader.classList.remove('active');
          setTimeout(function () {
            preloader.remove();
          }, 1000);
        };
      })();
    </script>
    
  </head>

  <body>
  
  <main class="page-wrapper">