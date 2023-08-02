<style type="text/css">
    @page{
        size:A4 landscape;
        margin:10mm;
    }
    body{
        margin:0;
        padding:0;
        border:1mm solid #1e88e5;
        height:188mm;
    }
    .border-pattern{
        position:absolute;
        left:0mm;
        top:-1mm;
        height:200mm;
        width:100%;
        border:1mm solid #1e88e5;
    }
    .content{
        position:absolute;
        left:3mm;
        top:3mm;
        height:191mm;
        width:97%;
        border:8px solid #1e88e5;
    }
    .inner-content{
        border:1mm solid #1e88e5;
        margin:2mm;
        padding:10mm;
        height:164mm;
        text-align:center;
    }
    h1{
        text-transform:uppercase;
        font-size:48pt;
        margin-bottom:0;
    }
    p{
        font-size:16pt;
        text-align: left;
    }
    .footer{
        position: absolute;
        bottom: 10mm;
        font-weight: bolder;
    }
    table{
        margin-left:-5mm;
        width:250mm;
    }
    td{
        width: 50%;
        font-weight: bold;
    }
    .date{text-align: left;}
    .sign{text-align: right;}
    .certif-content{margin-top: 150px;}
</style>
<body>
<div class="border-pattern">
    <div class="content">
        <div class="inner-content">
            <?=$certif_content;?>
        </div>
    </div>
</div>
</body>