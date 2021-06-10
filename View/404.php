<!-- purple x moss 2020 -->

<head>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@600;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/404.css">
    <script src="https://kit.fontawesome.com/4b9ba14b0f.js" crossorigin="anonymous"></script>
    <title></title>
</head>
<body>
<div class="mainbox">
    <div class="err">4</div>
    <i class="far fa-question-circle fa-spin"></i>
    <div class="err2">4</div>
    <div class="msg">Maybe this page moved? Got deleted? Is hiding out in quarantine? Never existed in the first
        place?<p><?php if ($message) {
                echo($message);
            } ?></p> <a href="javascript:history.back()">Return</a></div>
</div>

<script src="js/script.js"></script>