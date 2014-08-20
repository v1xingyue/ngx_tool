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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">资料推荐</h3>
            </div>

            <div class="panel-body">
                <div class="container-fluid">
                    <div class="row">
                    <?php for($i = 0; $i < 3; $i++) : ?>
                        <div class="col-md-4">

                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" src="http://image2.sina.com.cn/pfp/ishare/gx_bgws.gif" alt="...">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{_top_title_<?php echo $i; ?>_}</h4>
                                    <p>清朝时期的历史全图，细到...</p>
                                    <p>文件大小: {_top_size_<?php echo $i ?>_}</p>
                                    <p>文件格式: {_top_format_<?php echo $i ?>_}</p>
                                    <p>上传时间: {_top_createtime_<?php echo $i;?>_}</p>
                                    <p>下载次数: <span class="badge">{_top_download_times_<?php echo $i ?>_}</span></p>
                                    <a href="{_top_url_<?php echo $i ?>_}">点击下载</a>
                                </div>
                            </div> 

                        </div>
<?php endfor; ?>
                     </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">娱乐、生活</h3>
                    </div>

                    <div class="panel-body">

                        <table class="table">
                            <tbody>
   <?php $classid = 1819; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>
                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/1819.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>

                        <!--

                        <dl class="dl-horizontal">
                            <dt style="width:260px;">
                            <img src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif">
                            <a href="#" target="_blank" title="极其宝贵的资料，供欣赏、收藏.doc">极其宝贵的资料，供欣赏、收藏.doc</a>
                            </dt>
                            <dd style="margin-left:350px;">07月14日</dd>

                            <dt style="width:260px;">
                            <img src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif">
                            <a href="#" target="_blank" title="极其宝贵的资料，供欣赏、收藏.doc">极其宝贵的资料，供欣赏、收藏.doc</a>
                            </dt>
                            <dd style="margin-left:350px;">07月14日</dd>

                            <dt style="width:260px;">
                            <img src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif">
                            <a href="#" target="_blank" title="极其宝贵的资料，供欣赏、收藏.doc">极其宝贵的资料，供欣赏、收藏.doc</a>
                            </dt>
                            <dd style="margin-left:350px;">07月14日</dd>
                            <dt style="width:260px;">
                            <img src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif">
                            <a href="#" target="_blank" title="极其宝贵的资料，供欣赏、收藏.doc">极其宝贵的资料，供欣赏、收藏.doc</a>
                            </dt>
                            <dd style="margin-left:350px;">07月14日</dd>


                            <dt style="width:260px;">
                            <img src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif">
                            <a href="#" target="_blank" title="极其宝贵的资料，供欣赏、收藏.doc">极其宝贵的资料，供欣赏、收藏.doc</a>
                            </dt>
                            <dd style="margin-left:350px;">07月14日</dd>

                        </dl>
                        
                            <div> >>>更多</div>
                            -->

                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">教育资料</h3>
                    </div>
                    <div class="panel-body">

                 <table class="table">
                            <tbody>
   <?php $classid = 1816; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>

                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/1816.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>





</div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">IT资料</h3>
                    </div>
                    <div class="panel-body">

              <table class="table">
                            <tbody>
   <?php $classid = 1822; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>
                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/1822.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>




</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">专业资料</h3>
                    </div>
                    <div class="panel-body">
 <table class="table">
                            <tbody>
   <?php $classid = 1820; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>
                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/1820.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>






</div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">经济管理</h3>
                    </div>
                    <div class="panel-body">
 <table class="table">
                            <tbody>
   <?php $classid = 1821; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>

                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/1821.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>






</div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">游戏资料</h3>
                    </div>
                    <div class="panel-body">
<table class="table">
                            <tbody>
   <?php $classid = 4959; for($i = 0; $i < 5 ; $i++) : ?>
                            <tr>
                                <td style="border-top:none;"><img align="absmiddle" src="http://i0.sinaimg.cn/pfp/ask/images/doc.gif"> <a class="f13" title="极其宝贵的资料，供欣赏、收藏.doc" target="_blank" href="{_<?php echo $classid ?>_url_<?php echo $i?>_}">{_<?php echo $classid ?>_title_<?php echo $i?>_}</a></td>
                                <td style="border-top:none;">{_<?php echo $classid ?>_createtime_<?php echo $i ?>_}</td>
                            </tr>
<?php endfor; ?>
                            <tr>
                                <td style="border-top:none;"></td>
                                <td style="border-top:none;"><a target="_blank" href="http://10.13.0.41/c/4959.html">更多&gt;&gt;</a></td>
                            </tr>

                            </tbody>
                        </table>





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


<script src="http://10.13.0.0.41/js/jquery-2.1.1.min.js"></script>
<script src="http://10.13.0.41/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
 $(function(){
    $('#myCarousel').carousel({interval: 3000});
})
</script>
</body>
</html>
