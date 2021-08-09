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


//當電影選單改變時執行上映日期檢查
$("#movie").on("change",()=>{
    getDateList()
})

//當日期選單改變時執行可訂單場次檢查
$("#date").on("change",()=>{
    getSessionList()
})


//取得電影列表-頁面載入時執行一次
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
        getDateList()
    })
    
}


function getDateList(){
    let movie=$("#movie").val()
    $.get("api/get_movie_days.php",{movie},(list)=>{
        //console.log(list)
        $("#date").html(list)
        getSessionList()
    })
}


</script>