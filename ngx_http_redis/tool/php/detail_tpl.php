<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mini Ishare</title>
<link href="http://10.13.0.41/bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<!-- start navigator -->
<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="http://10.13.0.41/home">MiniIshare</a>
    </div>
    <div>
        <p class="navbar-text navbar-right">
        <a href="http://www.sina.com.cn" target="_blank">新浪首页</a>
        </p>
    </div>
    <div>
        <p class="navbar-text navbar-right">
        <a class="toplink" onclick="javascript:window.external.AddFavorite(document.location.href,document.title);" href="javascript:void(0);">收藏本站</a>
        </p>
    </div>
</nav>
<!-- end navigator -->

<!-- start search box -->
<div style="padding: 10px 30px 10px;">
<form role="form" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="input-group">
                <input type="text" class="form-control">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="button" onclick="javascript:alert('搜索');">搜索</button>
                </span>
            </div>
        </div>
    </div>

    <label class="checkbox-inline">
        <input type="checkbox" id="schall" value="all" checked>全部
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schpdf" value="pdf"> PDF
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schchm" value="chm"> CHM
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schrar" value="rar"> RAR
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schtxt" value="txt"> TXT
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schdoc" value="doc"> DOC
    </label>
    <label class="checkbox-inline">
        <input type="checkbox" id="schppt" value="ppt"> PPT
    </label>
</form>
</div>
<!-- end search box -->
<hr/>


<div class="container-fluid">
<div class="row">
    <!-- start center panel -->
    <div class="col-md-9">

        <ol class="breadcrumb">
            <li><a href="#"> 资料分类</a></li>
            <li><a href="#">经济管理</a></li>
            <li class="active">经济金融</li>
        </ol>

        <div class="panel panel-info">
            <div class="panel-heading">
                <h6 class="panel-title">{_file_title_}</h6>
            </div>
            <div class="panel-body">
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://10.13.0.41/images/icon/icon_doc.gif" alt="doc">
                    </a>
                    <div class="media-body">
                        <strong>说明:</strong>
                        <p>{_description_}</p>
                        <p>
                        <span>文件大小: {_filesize_}</span> | <span>创建时间: {_file_create_time_}</span> | <span>下载次数: {_file_down_times_}</span> 
                        </p>
                        <button type="button" class="btn btn-success" onclick="window.location.href='{_file_url_}'">
                            <span class="glyphicon glyphicon-download-alt"></span> 立即下载 
                        </button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- end center panel -->

    <!-- start left panel -->
    <div class="col-md-3">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">站内公告</h3>
            </div>
            <div class="panel-body">
                <ul class="inline">
                    <li><a href="http://ishare.iask.sina.com.cn/help/gonggao130603.html" target="_blank">服务器升级完毕公告</a><span class="red">New</span></li>
                    <li><a href="http://ishare.iask.sina.com.cn/help/prepare.html" target="_blank">服务器升级公告</a></li>
                    <li><a href="/help/gonggao121113.html?from=notice" target="_blank">资料搜索问题及…</a></li>
                    <li><a href="/weibo/ishare_medal_new.php?from=notice" target="_blank">共享资料微博勋章</a></li>
                    <li><a href="/info/pptman.php?from=notice" target="_blank">成就职场PPT达人</a></li>
                    <li><a href="/help/ppt.html?from=notice" target="_blank">谁说菜鸟不懂PPT</a></li>
                </ul>
            </div>
        </div>


        <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators" style="bottom: -10px;">
                <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                <li data-target="#myCarousel" data-slide-to="1"></li>
                <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="http://10.13.0.41/images/1.jpg" alt="我军重火力攻击">
                    <div class="carousel-caption" style="bottom:-5px;">我军重火力攻击</div>
                    
                </div>
                <div class="item">
                    <img src="http://10.13.0.41/images/2.jpg" alt="梵高的信件">
                    <div class="carousel-caption" style="bottom:-5px;">梵高的信件</div>
                </div>
                <div class="item">
                    <img src="http://10.13.0.41/images/3.jpg" alt="厦大女神级校花曝光">
                    <div class="carousel-caption" style="bottom:-5px;">厦大女神级校花曝光</div>
                </div>
            </div>
            <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>




    </div>
    <!-- end left panel -->

</div>
</div>

<hr/>
<center>
<a href="javascript:void(0);">
    <font color="#666666">&copy; 2012</font>
</a>
&nbsp;<span style="font-family:Arial;">mshare.com</span>
</center>


<script src="http://10.13.0.41/js/jquery-2.1.1.min.js"></script>
<script src="http://10.13.0.41/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
 $(function(){
    $('#myCarousel').carousel({interval: 3000});
})
</script>
</body>
</html>
