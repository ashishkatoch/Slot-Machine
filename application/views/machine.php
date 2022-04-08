<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href='<?= base_url("assets/css/style.css"); ?>'>
    <link rel="stylesheet" href='//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css'>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>

<body>
<header>Slot Machine</header>
    <div class="content">
       
        <div class="userCredits"><label>Credits: </label><span id="amt_creadits"><?php echo $this->session->userdata('credits'); ?></span></div>
        <div id="rotate" class="machine">
            <div class="cell"><span class="items 0">X</span></div>
            <div class="cell"><span class="items 1">X</span></div>
            <div class="cell"><span class="items 2">X</span></div>
            <button class="st-btn startBtn">Shuffle</button>
        </div>
        <button id="cashoutBtn" class="st-btn-red">Cash Out</button>
    </div>
    <script>
        var baseAssetUrl = '<?= base_url("assets/"); ?>';
    </script>
    <script src='<?= base_url("assets/js/script.js"); ?>'></script>
</body>


</html>