<h2 class="ct">線上訂票</h2>
<style>

    table tr:nth-child(odd){
        background:#aaa;
    }
    table tr:nth-child(even){
        background:#ccc;
    }
    table td:nth-child(1){
        padding:5px;
        text-align:center;
        width:60px;
    }
    table td select{
        width:100%;
    }

    table{
        width:400px;
        margin:auto;
        padding:20px;
        background:#eee;
        border:1px solid #999;
    }
</style>
<table>
    <tr>
        <td>電影：</td>
        <td>
            <select name="movie" id="movie">
                
            </select>
        </td>
    </tr>
    <tr>
        <td>日期：</td>
        <td>
            <select name="date" id="date"></select>
        </td>
    </tr>
    <tr>
        <td>場次：</td>
        <td>
            <select name="session" id="session"></select>
        </td>
    </tr>
</table>
<div class="ct">
    <button>確定</button>
    <button>重置</button>
</div>
<script>
getMovieList()
//取得電影列表
function getMovieList(){
    let id='<?=$_GET['id']??'';?>';
    /* let url=location.href
        url=url.substr(url.indexOf('?')+1);
        url=url.split("&");
        url=url[1].split("=")
        console.log(url)
    let id=url[1]; */
    $.get("api/get_movie_list.php",{id},(list)=>{
        $("#movie").html(list)
    })
    
}



</script>