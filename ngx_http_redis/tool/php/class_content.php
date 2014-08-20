<?php for($i = 0; $i< 20 ; $i++ ) : ?>
<dl>
    <dt>
    <img width="16" height="14" align="absmiddle" alt="Acrobat文档" src="http://www.sinaimg.cn/pfp/ask/images/pdf.gif">
    <a href="http://10.13.0.41/f/{_file_id_<?php echo $i;?>_}.html">{_title_<?php echo $i?>_}</a>
    </dt>
    <dd>
    <span>格式：{_format_<?php echo $i?>_}</span> 
    | <span>上传时间:{_create_time_<?php echo $i ?>_} </span> 
    | <span>下载: {_down_times_<?php echo $i?>_} 次 </span> 
    | <span>大小:{_size_<?php echo $i ?>_}</span>
    </dd>
</dl>
<?php endfor;?>
<center>
    <ul class="pagination">
        <li><a href="javascript:;">&laquo;</a></li>
        <li><a href="javascript:;">1</a></li>
        <li><a href="javascript:;">2</a></li>
        <li><a href="javascript:;">3</a></li>
        <li><a href="javascript:;">4</a></li>
        <li><a href="javascript:;">5</a></li>
        <li><a href="javascript:;">&raquo;</a></li>
    </ul>
</center>
<script type="text/javascript">
$("ul.pagination li").eq({_page_count_} + 1).addClass("active");
$("ul.pagination a").each(function(i,obj){
    $(obj).click(function(){
        var p = $(this).html();
        p--;
        var new_uri = "http://10.13.0.41/class_content/{_class_id_}_" + p  +".html";
        $("#content_panel").load(new_uri);
    });
});
</script>
